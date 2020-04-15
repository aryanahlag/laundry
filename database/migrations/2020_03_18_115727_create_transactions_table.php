<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('invoice');
            $table->date('date');
            $table->date('date_pay')->nullable();
            $table->bigInteger('pay')->nullable();
            $table->date('date_line');
            $table->enum('status', ['baru', 'diambil', 'proses', 'selesai']);
            $table->enum('pay_process', ['dibayar', 'belumDibayar']);
            $table->integer('tax')->nullable();
            $table->integer('discount')->nullable();
            $table->integer('addit_pay')->nullable();
            $table->unsignedInteger('outlet_id')->nullable();
            $table->foreign('outlet_id')->references('id')->on('outlets')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('member_id')->nullable();
            $table->foreign('member_id')->references('id')->on('members')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
