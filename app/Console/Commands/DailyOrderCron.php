<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use DB;
use App\Mail\Mailtrap;
use App\Mail\Mailorder;
use App\Mail\DailyOrder;

use Mail;
use App\Role;
use App\User;
use App\Order;

class DailyOrderCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'order:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $role=Role::where('role_name','=','superadmin')->first();
        $user=User::where('roles','=',$role->id)->first();
        $orderdetails = DB::table('order_details')
                  ->whereRaw('Date(created_at) = CURDATE()')
                  ->get();
       // dd($orderdetails);
        Mail::to($user->email)->send(new DailyOrder($orderdetails));

    }
}
