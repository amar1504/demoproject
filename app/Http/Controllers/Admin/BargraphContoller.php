<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Charts;
use App\User;
use DB;

class BargraphContoller extends Controller
{
  
    /**
     * function to create bar graph of registered users
     */
    public function index()
    {
    	$users = User::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))
    				->get();
        $chart = Charts::database($users, 'bar', 'highcharts')
			      ->title("Monthly new Register Users")
			      ->elementLabel("Total Users")
			      ->dimensions(600, 500)
			      ->responsive(false)
			      ->groupByMonth(date('Y'), true);
        return view('admin.chart',compact('chart'));
    }
}
