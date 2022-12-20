<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;
use Cookie;
use Session;
use Auth;
class AdminController extends Controller
{
    //
    public function LoginPage(Request $request){
        return view('admin.index');
    }
    public function login(Request $request){
        //dd($request->all());

        $request->validate([
            "Username"=>"required",
            "Password"=>"required"
        ]);

        
        //echo Hash::make('admin');
        //die;

        $pass = md5($request->Password);
        $find = DB::table('admin')->select()->where('password',"$pass")->get();

        if(count($find) > 0){
            // create session 
            session([
                "id"=>$find[0]->id,
                "username"=>$find[0]->username,
                "role"=>'admin'
            ]);
            $user = $request->Username;

            if($request->remember=='on'){
                $minutes = 86400 * 30;
                Cookie::queue('user', $user, $minutes);
            }
            return redirect()->route('dashboard');
        }else{
            // wrong login
            return redirect()->back()->with('message','Username OR Password Invalid');
        }
    }
    public function logout(){
      //  session_destroy();
       // session()->flush();
        //session()->regenerate();  
        Auth::logout();
        Session::flush();
        session()->regenerate(true);
        return redirect('/Admin/login');
        Session::flush();
    }

    // dashboard
    public function dashboard(){
        //dd(session()->all());
         $count = DB::table('contactus')->count('id');
        
        return view('admin.dashboard',['msg'=>$count]);
    }

    // add company information 
    public function addinfo(){
       $data = DB::table('company_details')->select()->get();      
        return view('admin.addinfo',compact('data'));
    }
    // save company info
    public function SaveInfo(Request $request){
        //dd($request->all());

        $request->validate([
            "CompanyName" => "required",
            "Email" => "required|email",
            "Mobile" => "required",
            "Whatapp" => "required",
            "Address" => "required",
            "Description" => "required",
            "Logo" => "required|image|mimes:jpeg,png,jpg"
        ]);

        // save image first 
        $logo = $request->file('Logo');
        $save = time().rand(9999,99999).'.'.$logo->GetClientOriginalExtension();
        

        // check db has record or not 
        $check = DB::table('company_details')->select()->get();

        if(count($check) > 0){
            // remove old image if exists

            $image = $check[0]->logo;
            
            $path = "image/Logo/$image";
            if (\Storage::disk('public')->exists($path))
            \Storage::disk('public')->delete($path);

            // save new image
            $logo->StoreAs('public/image/Logo/',$save);

            $id = $check[0]->id;
            // update krna hai only
            DB::table('company_details')->where('id',$id)->update([
                "company_name"=>$request->CompanyName,
                "Email"=>$request->Email,
                "Mobile"=>$request->Mobile,
                "Whatapp"=>$request->Whatapp,
                "Facebook"=>$request->Facebook,
                "Twitter"=>$request->Twitter,
                "linkedin"=>$request->linkedin,
                "Address"=>$request->Address,
                "Description"=>$request->Description,
                "logo"=>$save,
                "updated_at" => date('Y-m-d H:i:s')
            ]);
            return redirect()->back()->with('message','Record Update Successfully');
        }else{
            // save new image
            $logo->StoreAs('public/image/Logo/',$save);
            //insert krna hai 
            DB::table('company_details')->insert([
                "company_name"=>$request->CompanyName,
                "Email"=>$request->Email,
                "Mobile"=>$request->Mobile,
                "Whatapp"=>$request->Whatapp,
                "Facebook"=>$request->Facebook,
                "Twitter"=>$request->Twitter,
                "linkedin"=>$request->linkedin,
                "Address"=>$request->Address,
                "Description"=>$request->Description,
                "logo"=>$save,
                "created_at" =>  date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s')
            ]);
            return redirect()->back()->with('message','Record Insert Successfully');
        }
    }

    // SliderPage
    public function SliderPage(Request $request){
        $data = DB::table('sliders')->select()->orderBy('id','Desc')->get();
        return view('admin.slider',['data'=>$data,'find'=>'']);
    }
    // slider submit
    public function AddSlider(Request $request){
       // dd($request->all());
        $request->validate([
            "HeadingSmall"=>"required",
            "HeadingLarge"=>"required",
            "Description"=>"required",
            "slider"=>"required|image|mimes:jpg,jpeg,png"
        ]);

        $slider = $request->file('slider');
        //dd($slider);
        // save the image first
        $image = time().rand(99,9999).'.'.$slider->getclientoriginalextension();
        $slider->StoreAs('public/image/slider/',$image);

        DB::table('sliders')->insert([
            "slider"=>$image,
            "small_hdg"=>$request->HeadingSmall,
            "heading"=>$request->HeadingLarge,
            "small_desc"=>$request->Description,
            "link"=>$request->URL,
            "link_hdg"=>$request->ButtonName,
            "created_at" =>  date('Y-m-d H:i:s'),
            "updated_at" => date('Y-m-d H:i:s')
        ]);

        return redirect()->back()->with('message','Slider Added Successfully');
    }
    // slider delete
    public function DelSlider($id){
        $find = DB::table('sliders')->where('id',$id)->select()->get();
        if(count($find) > 0){
            // unlink the image first
            $image = $find[0]->slider;
            
            $path = "image/slider/$image";
            if (\Storage::disk('public')->exists($path))
            \Storage::disk('public')->delete($path);

            DB::table('sliders')->where('id',$id)->delete();    
            return redirect('Admin/slider')->with('del','Record Deleted Successfully');
        }else{
            return redirect('Admin/slider')->with('del','Record Not Found');
        }
    }
    // edit slider
    public function EditSlider($id){
        $find = DB::table('sliders')->where('id',$id)->select()->get();
        $data = DB::table('sliders')->select()->orderBy('id','Desc')->get();
        if(count($find) > 0){
            // unlink the image first
            return view('admin.slider',['data'=>$data,'find'=>$find]);
        }else{
            return redirect()->back()->with('del','Record Not Found');
        }
    }
    // edit slider form submit
    public function EditSubmit(Request $request){
       //  dd($request->all());
        $request->validate([
            "HeadingSmall"=>"required",
            "HeadingLarge"=>"required",
            "Description"=>"required",
            "id"=>"required",
            "Oldimage"=>"required"
        ]);
        if($request->hasFile('slider')){
            // new image aa rha h old delete krna hai 
            $slider = $request->file('slider');
            $image = time().rand(99,9999).'.'.$slider->getclientoriginalextension();
            $slider->StoreAs('public/image/slider/',$image);
          
            $path = "image/slider/$request->Oldimage";
            if (\Storage::disk('public')->exists($path))
            \Storage::disk('public')->delete($path);
        }else{
           $image = $request->Oldimage;
        }

        DB::table('sliders')->where('id',$request->id)->update([
            "slider"=>$image,
            "small_hdg"=>$request->HeadingSmall,
            "heading"=>$request->HeadingLarge,
            "small_desc"=>$request->Description,
            "link"=>$request->URL,
            "link_hdg"=>$request->ButtonName,
            "updated_at" => date('Y-m-d H:i:s')
        ]);

        return redirect()->back()->with('message','Record Update Successfully');
    }   

    // Add Technology service
    public function AddServicePage(){
        $data = DB::table('services')->select()->orderBy('id','Desc')->get();
        return view('admin.service',['data'=>$data,'find'=>'']);
    }
    public function SaveSerice(Request $request){
        //dd($request->all());

        $request->validate([
            "heading"=>"required",
            "Description"=>"required",
            "image"=>"required|image|mimes:jpg,png,jpeg"
        ]);

        $file = $request->file('image');
        
        $image = time().rand(99,9999).'.'.$file->getclientoriginalextension();
        $file->storeAs('public/image/service/',$image);
        DB::table('services')->insert([
            "logo"=>$image,
            "heading"=>$request->heading,
            "description"=>$request->Description,
            "created_at" =>  date('Y-m-d H:i:s'),
            "updated_at" => date('Y-m-d H:i:s')
        ]);
        return redirect()->back()->with('message','Record Insert Successfully');
    }
    // edit or delete service
    public function DelService($id){
        $find = DB::table('services')->where('id',$id)->select()->get();
        if(count($find) > 0){
            // unlink the image first
            $image = $find[0]->logo;
            
            $path = "image/service/$image";
            if (\Storage::disk('public')->exists($path))
            \Storage::disk('public')->delete($path);

            DB::table('services')->where('id',$id)->delete();    
            return redirect('Admin/service')->with('message','Record Deleted Successfully');
        }else{
            return redirect('Admin/slider')->with('del','Record Not Found');
        }
    }
    public function EditService($id){
        $find = DB::table('services')->where('id',$id)->select()->get();
        $data = DB::table('services')->select()->orderBy('id','Desc')->get();
        if(count($find) > 0){
            // unlink the image first
            return view('admin.service',['data'=>$data,'find'=>$find]);
        }else{
            return redirect()->back()->with('del','Record Not Found');
        }
    }
    public function EditServiceSubmit(Request $request){
       // dd($request->all());
        $request->validate([
            "heading"=>"required",
            "Description"=>"required",
            "id"=>"required",
            "Oldimage"=>"required"
        ]);
        if($request->hasFile('image')){
            // new image aa rha h old delete krna hai 
            $slider = $request->file('image');
            $image = time().rand(99,9999).'.'.$slider->getclientoriginalextension();
            $slider->StoreAs('public/image/service/',$image);
          
            $path = "image/service/$request->Oldimage";
            if (\Storage::disk('public')->exists($path))
            \Storage::disk('public')->delete($path);
        }else{
            $image = $request->Oldimage;
         }

        DB::table('services')->where('id',$request->id)->update([
            "logo"=>$image,
            "heading"=>$request->heading,
            "description"=>$request->Description,
            "updated_at" => date('Y-m-d H:i:s')
        ]);

        return redirect()->back()->with('message','Record Update Successfully');
    }

    // PlansPage 
    public function PlansPage(){
        $data = DB::table('plans')->select()->orderBy('id','Desc')->get();
        return view('admin.plan',['data'=>$data]);
    }
    public function AddPlans(Request $request){
        //dd($request->all());
        $request->validate([
            "Plan"=>"required",
            "Description"=>"required",
            "Rate"=>"required"
        ]);

        DB::table('plans')->insert([
            "plan"=>$request->Plan,
            "heading"=>$request->Description,
            "rate"=>$request->Rate,
            "created_at" =>  date('Y-m-d H:i:s'),
            "updated_at" => date('Y-m-d H:i:s')
        ]);
        return redirect()->back()->with('message','Record Insert Successfully');
    }

    public function DelPlan($id){
        if (ctype_digit($id)) {
           $plan = DB::table('plans')->where('id',$id)->select('plan')->get();
            $plan = $plan[0]->plan;
            DB::table('plans')->where('id',$id)->delete();
            DB::table('plan_list')->where('plan',$plan)->delete();
            return redirect()->back()->with('message','Record Deleted Successfully');
        } 
    }

    public function planlist(){
        $data = DB::table('plan_list')->select()->orderBy('id','Desc')->get();
        $plan = DB::table('plans')->select()->get();
       // dd($plan);
        return view('admin.planlist',['data'=>$data,'plan'=>$plan]);
    }

    public function Addplanlist(Request $request){
        $request->validate([
            "Plan"=>"required",
            "Features"=>"required"
        ]);

        DB::table('plan_list')->insert([
            "plan"=>$request->Plan,
            "feature_list"=> $request->Features,
            "created_at" =>  date('Y-m-d H:i:s'),
            "updated_at" => date('Y-m-d H:i:s')
        ]);
        return redirect()->back()->with('message','Record Insert Successfully');
    }

    public function DelListPlan($id){
        DB::table('plan_list')->where('id',$id)->delete();
        return redirect()->back()->with('message','Record Deleted Successfully');
    }

    // FAQ
    public function faq(){
        $data = DB::table('faq')->select()->Get();
        return view('admin.faq',['data'=>$data]);
    }

    public function add_faq(Request $request){
       // dd($request->all());
        $request->validate([
            "Question"=>"required",
            "Answere"=>"required",
            "Logo"=>"required"
        ]);
        $logo = $request->file('Logo');
        $image = time().rand(99,999).'.'.$logo->getClientOriginalExtension();
        
        $logo->storeAs('public/image/faq/',$image);

        DB::table('faq')->insert([
            "logo"=>$image,
            "question"=> urlencode("$request->Question"),
            "answere"=> urlencode("$request->Answere"),
            "created_at" =>  date('Y-m-d H:i:s'),
            "updated_at" => date('Y-m-d H:i:s')
        ]);
        return redirect()->back()->with('message','Record Insert Successfully');
    }
    public function delfaq($id){

        $logo = DB::table('faq')->where('id',$id)->select("logo")->get();
        if(count($logo) > 0 ){
            $logo = $logo[0]->logo;
            $path = "image/faq/$logo";
            if (\Storage::disk('public')->exists($path))
            \Storage::disk('public')->delete($path);
        }
        DB::table('faq')->where('id',$id)->delete();
        return redirect()->back()->with('message','Record Deleted Successfully');
    }

    //Testimonials
    public function Testimonials(){
        $data = DB::Table('feedback')->select()->Get();
        return view('admin.Testimonials',compact('data'));
    }
    
    public function Testimonials_add(Request $request){
       // dd($request->all());
        $request->validate([
            "Name"=>"required",
            "Designation"=>"required",
            "Feedback"=>"required",
            "Image"=>"required|image|mimes:jpg,png,jpeg"
        ]);
        $logo = $request->file('Image');
        $image = time().rand(99,999).'.'.$logo->getClientOriginalExtension();
        
        $logo->storeAs('public/image/client/',$image);

        DB::table('feedback')->insert([
            "name"=>$request->Name,
            "designation"=>$request->Designation,
            "logo"=>$image,
            "description"=> urlencode("$request->Feedback"),
            "created_at" =>  date('Y-m-d H:i:s'),
            "updated_at" => date('Y-m-d H:i:s')
        ]);
        return redirect()->back()->with('message','Record Insert Successfully');
    }

    public function delclient($id){
        $logo = DB::table('feedback')->where('id',$id)->select("logo")->get();
        if(count($logo) > 0 ){
            $logo = $logo[0]->logo;
            $path = "image/client/$logo";
            if (\Storage::disk('public')->exists($path))
            \Storage::disk('public')->delete($path);
        }
        DB::table('feedback')->where('id',$id)->delete();
        return redirect()->back()->with('message','Record Deleted Successfully');
    }
    public function edit_Testimonials(Request $request){
       // dd($request->all());
        $request->validate([
            "id"=>"required",
            "Name"=>"required",
            "Designation"=>"required",
            "Feedback"=>"required",
            "oldimage"=>"required"
        ]);

        if($request->hasFile('Image')){
            // remove old image
            $path = "image/client/$request->oldimage";
            if (\Storage::disk('public')->exists($path))
            \Storage::disk('public')->delete($path);
            
            $logo = $request->file('Image');
            $image = time().rand(99,999).'.'.$logo->getClientOriginalExtension();            
            $logo->storeAs('public/image/client/',$image);
        }else{
            $image = $request->oldimage;
        }

        DB::table('feedback')->where('id',$request->id)->update([
            "name"=>$request->Name,
            "designation"=>$request->Designation,
            "logo"=>$image,
            "description"=> urlencode("$request->Feedback"),
            "updated_at" => date('Y-m-d H:i:s')
        ]);
        return redirect()->back()->with('message','Record Update Successfully');
    }

    // Team
    public function team(){
        $data = DB::table('team_')->select()->get();
        return view('admin.team',compact('data'));
    }

    public function AddTeam(Request $request){
       // dd($request->all());
        $request->validate([
            "Member"=>"required",
            "Designation"=>"required",
            "Photo"=>"required|image|mimes:jpg,png,jpeg"
        ]);
        $logo = $request->file('Photo');
        $image = time().rand(99,999).'.'.$logo->getClientOriginalExtension();
        
        $logo->storeAs('public/image/team/',$image);

        DB::table('team_')->insert([
            "name"=>$request->Member,
            "designation"=>$request->Designation,
            "image"=>$image,
            "fb"=> $request->Facebook,
            "ln"=> $request->Linkedin,
            "tw"=> $request->Twitter,
            "created_at" =>  date('Y-m-d H:i:s'),
            "updated_at" => date('Y-m-d H:i:s')
        ]);
        return redirect()->back()->with('message','Record Insert Successfully');
    }
    public function teamdlt($id){
         $logo = DB::table('team_')->where('id',$id)->select("image")->get();
        if(count($logo) > 0 ){
            $logo = $logo[0]->image;
            $path = "image/team/$logo";
            if (\Storage::disk('public')->exists($path))
            \Storage::disk('public')->delete($path);
        }
        DB::table('team_')->where('id',$id)->delete();
        return redirect()->back()->with('message','Record Deleted Successfully');
    }
    public function edit_team(Request $request){
        //dd($request->all());
        $request->validate([
            "id"=>"required",
            "oldimage"=>"required",
            "Member"=>"required",
            "Designation"=>"required"
        ]);

        if($request->hasFile('Photo')){
            // remove old image
            $path = "image/team/$request->oldimage";
            if (\Storage::disk('public')->exists($path))
            \Storage::disk('public')->delete($path);
            
            $logo = $request->file('Photo');
            $image = time().rand(99,999).'.'.$logo->getClientOriginalExtension();            
            $logo->storeAs('public/image/team/',$image);
        }else{
            $image = $request->oldimage;
        }

        DB::table('team_')->where('id',$request->id)->update([
            "name"=>$request->Member,
            "designation"=>$request->Designation,
            "image"=>$image,
            "fb"=>$request->Facebook,
            "ln"=>$request->Linkedin,
            "tw"=>$request->Twitter,
            "updated_at" => date('Y-m-d H:i:s')
        ]);
        return redirect()->back()->with('message','Record Update Successfully');
    }

    //message
    public function message(){
        $data = DB::table('contactus')->orderBy('id','desc')->select()->paginate(20);
        return view('admin.message',compact('data'));
    }
}
