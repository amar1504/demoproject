<?php
namespace App\Console\Commands;
use Illuminate\Console\Command;
use DB;
use App\Mail\Mailtrap;
use App\Mail\DailyOrder;
use App\Mail\Mailorder;
use Mail;
use App\Wishlist;
use App\Role;
use App\User;
use App\Order;


class DemoCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */

    protected $signature = 'demo:cron';
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
        $data =Wishlist::with('wishlistProduct','ProductImage')->whereRaw('Date(created_at) = CURDATE()')
                ->OrderBy('id','desc')->first();
        //dd($data);
        //echo $data->product_id;
        //dd('hi');
         //dd($data->wishlistProduct[0]->product_name);
        $role=Role::where('role_name','=','superadmin')->first();
        $user=User::where('roles','=',$role->id)->first();
        $data['flag']="cron";
        Mail::to($user->email)->send(new DailyOrder($data));
        
    }

}