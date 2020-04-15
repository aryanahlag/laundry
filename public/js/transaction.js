$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

let findP = $('#findP');
let package = $('#package');
let packageId = $('#package-id');
let qty = $('#qty');
let tax = $('#tax');
let discount = $('#discount');
let outlet = $('#outlet');
let price = $('#price');
let tambah = $('#tambah');
let member = $('#member');
let additPay = $('#additPay');
let tbody = $('#tbody');
window.onload = loaded();

function loaded() {
    package.val('');
    qty.val(1);
    tax.val(10);
    discount.val('');
    additPay.val('');
    $('input[type="text"]').attr('autocomplete', 'off');
}

$('body').on('click', '.p-paket', function(e) {
    e.preventDefault();
    const id = $(this).data('s-sid');
    const name = $(this).parent().parent().find('.s-name').data('s-name');
    // const nama = $(this).attr('data-s-name');
    const dPrice = $(this).attr('data-s-price');
    package.val(name);
    // paket.attr('data-paket-id', id)
    packageId.val(id);
    // $('#price').val(dPrice);
    price.val(dPrice);
    $('#modalPaket').modal('hide');
});

$('body').on('click', '#tambah', function(e) {
    e.preventDefault();
    if (qty.val() == '') {
        Swal.fire({
            title: 'Peringatan !',
            type: 'warning',
            text: "Masukan Quantitas",
        });
    } else {
        toTable();
    }
});

function toTable() {
    let pid = $('#package-id').attr('data-s-sid');
    let tPrice = parseInt(price.attr('data-s-price'));
    let there = $(`[data-package-id=${pid}]`);
    let subt = there.find('.qty').val() * parseInt(price.attr('data-s-price'));
    // console.log(pid);
    if (there.length != 0) {
        let thereQty = there.find('.qty').val();
        let totQ = parseInt(thereQty) + parseInt(qty.val());
        there.find('.qty').val(totQ);
        there.find('.price').val(totQ * parseInt(tPrice))
    } else {
        tbody.prepend(`
            <tr data-package-id="${pid}">
            <input type="hidden" name="pid[]" value="${pid}">
            <input type="hidden" name="res_harga[]" class="res_harga" value="${tPrice}">
                <td></td>
                <td>
                    <input type="text" name="name[]" autocomplete="off" class="cl-line name" value="${package.val()}" readonly>
                </td>
                <td>
                    <input type="text" name="qty[]" autocomplete="off" class="grey-line qty" value="${qty.val()}">
                </td>
                <td>
                    <input type="text" name="price[]" class="cl-line price" value="${subt}" readonly>
                </td>
                <td>
                    <a href="javascript:void(0)" class="rmv"><i class="fa fa-times text-danger"></i></a>
                </td>
            </tr>
    	`);
    }
    qty.val(1)
    package.val('')
    packageId.val('')
    price.val('')
    total();

    $('body').on('change', '.qty', function() {
        let qty = $(this).val();
        if (qty == '' || qty == '0') {
            Swal.fire({
                title: 'Peringatan !',
                type: 'warning',
                text: "Kuantitas Tidak Valid",
            });
        } else {
            let price = $(this).parent().parent().find('.tot_price').val()
            $(this).parent().parent().find('.price').val(parseFloat(qty) * parseFloat(price));
            total();
        }
    })

    function total() {
        let sub_total = 0;
        $('.price').each(function(i, e) {
            var sub = $(this).val() - 0;
            sub_total += sub;
        });
        let rp_subTotal = formatRp(sub_total.toString(), '');
        $('#subtot').html(`
            Sub Total : ${rp_subTotal}`)
    }

    function row() {
        $('#tbody tr').length
    }

    $('body').on('click', '.rmv', function(e) {
        e.preventDefault();
        $(this).parent().parent().remove();
        row();
        total();
    });

    $('body').on('click', '#btn-order', function(e) {
        let there = $('#tbody tr').length
        $('.form-group').find('.form-control').removeClass('is-invalid')
        $('form').find('.help-block').remove()
        if (there == 0) {
            Swal.fire({
                title: '!',
                type: 'warning',
                text: "Tidak Ada Transaksi",
            });
        } else {
            $('#form-transaction').submit();
        }
    });

    $('body').on('submit', '#form-transaction', function(e) {
        e.preventDefault();
        $(this).find(':input[type=submit]').prop('disabled', true);
        const url = $(this).attr('action');
        const data = $(this).serializeArray();
        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            success: res => {
                window.open(res.url, '_blank')
                window.location.href = res.back;
            },
            error: xhr => {
                $(this).find(':input[type=submit]').prop('disabled', false);
                errors = xhr.responseJSON;
                if (xhr.status == 500) {
                    Swal.fire({
                        title: '!',
                        type: 'warning',
                        text: "Terjadi Kesalahan",
                        showConfirmButton: false,
                        timer: 2000
                    });
                }

                if (xhr.status == 401) {
                    Swal.fire({
                        title: '!',
                        type: 'warning',
                        text: errors.msg,
                        showConfirmButton: false,
                        timer: 2000
                    });
                }
            }
        })
    });
}
