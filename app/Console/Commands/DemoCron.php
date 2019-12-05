<?php
namespace App\Console\Commands;
use Illuminate\Console\Command;
use DB;
use App\Mail\Mailtrap;
use Mail;
use App\Wishlist;

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
       // echo $data[0]->wishlistProduct->product_id;
        //dd($data[0]->ProductImage->first()->product_image);
        $data['flag']="cron";
        Mail::to('kharwadeamar@gmail.com')->send(new Mailtrap($data));
    }

}