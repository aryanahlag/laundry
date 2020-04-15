<?php

namespace App\Helpers;
use Illuminate\Http\Request;
use App\Log as LogActivityModel;


class LogActivity
{


    public static function addToLog($subject)
    {
    	$log = [];
    	$log['msg'] = $subject;
    	$log['url'] = Request::fullUrl();
    	$log['user_id'] = auth()->check() ? auth()->user()->id : 1;
    	LogActivityModel::create($log);
    }


    public static function logActivityLists()
    {
    	return LogActivityModel::latest()->get();
    }


}
