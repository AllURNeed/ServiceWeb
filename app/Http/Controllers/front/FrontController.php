<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class FrontController extends Controller
{
    //
    public function query(Request $request){
        $request->validate([
            "FullName"=>"required",
            "Mobile"=>"required",
            "Email"=>"required",
            "Suject"=>"required",
            "Message"=>"required"
       ]);
       $clientIP = \Request::ip();
       DB::table('contactus')->insert([
            "name"=>$request->FullName,
            "Email"=>$request->Email,
            "Message"=>urlencode($request->Message),
            "mobile"=>$request->Mobile,
            "subject"=>$request->Suject,
            "ip"=>$clientIP,                
            "created_at" =>  date('Y-m-d H:i:s'),
            "updated_at" => date('Y-m-d H:i:s')
       ]);

       return redirect('/#contact')->with('message','Message Send Successfully.');
    }

    public function LoadAll(){
        $heder = DB::table('company_details')->select()->get();
        $slider = DB::table('sliders')->select()->get();
        $service = DB::table('services')->select()->get();
        $plan = DB::table('plans')->select()->get();
        $faq = DB::table('faq')->select()->get();
        $client = DB::table('feedback')->select()->get();
        $team = DB::table('team_')->select()->get();
        // die;
        return view('index',[
            "info"=>$heder[0],
            "slider"=>$slider,
            "service"=>$service,
            "plan"=>$plan,
            "faq"=>$faq,
            "client"=>$client,
            "team"=>$team
        ]);
    }

    public static  function  getlist($plan){
        $p = $plan;
       $list = DB::table('plan_list')->where('plan',$p)->select('feature_list')->get();
       return $list;
    }
}
