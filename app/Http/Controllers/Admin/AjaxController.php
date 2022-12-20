<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;
use session;

class AjaxController extends Controller
{
    //
    public function AjaxRequest(Request $request){
        if($request->ajax()){
           $action = $request->action;

           if($action=='editbtn'){
                $id = $request->id;
                $type = $request->type;
                if($type=='testimonials'){
                    $data = DB::table('feedback')->where('id',$id)->select()->get();
                    if(count($data) > 0){                        
                        ?>   
                            <h5 class="text-center text-white">Edit Testimonials</h5>
                            <form method='POST' action="<?php echo route('edit_Testimonials');?>" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="<?php echo csrf_token();?>">
                                <input type="hidden" name="id" value="<?php echo $data[0]->id;?>">
                                <input type="hidden" name="oldimage" value="<?php echo $data[0]->logo;?>">
                                <div class="card-body">                        
                                    <div class="form-group">
                                        <label>Client Name</label>
                                        <input value="<?php echo $data[0]->name;?>" autofocus type="text" required  name='Name' class='form-control'>
                                    
                                    </div>   
                                    <div class="form-group">
                                        <label>Designation</label>
                                        <input value="<?php echo $data[0]->designation;?>" required type="text" name='Designation' class='form-control'>
                                    
                                    </div> 
                                    <div class="form-group">
                                        <label>Feedback</label>
                                        <textarea class='form-control' required name='Feedback'><?php echo urldecode($data[0]->description);?></textarea>
                                    
                                    </div>  
                                    <div class="form-group">
                                        <label>Image</label>
                                        <input  accept="image/jpg,image/jpeg,image/png" name='Image'  type="file" class='form-control'>
                                    </div> 
                                    <div class="form-group">
                                        <label>Old Image</label>
                                        <img width="30%" src="<?php echo asset("storage/image/client/".$data[0]->logo); ?>" class="img-fluid">
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-block">Update Record</button>
                                </div>
                            </form>     
                        <?php
                    }else{
                            echo "No Record Found";
                    }
                }

                // team
                if($type=='team'){
                    $data = DB::table('team_')->where('id',$id)->select()->get();
                    if(count($data) > 0){
                        ?>   
                            <h5 class="text-center text-white">Edit Team Member's</h5>
                            <form method='POST' action="<?php echo route('edit_team');?>" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="<?php echo csrf_token();?>">
                                <input type="hidden" name="id" value="<?php echo $data[0]->id;?>">
                                <input type="hidden" name="oldimage" value="<?php echo $data[0]->image;?>">
                                <div class="card-body">                        
                                    <div class="form-group">
                                        <label>Member Photo</label>
                                        <input accept="image/jpg,image/png,image/jpeg"  type='file' name='Photo'  class='form-control'>
                                        
                                    </div> 
                                    <div class="form-group">
                                        <label>Member Name</label>
                                        <input autofocus required value="<?php echo $data[0]->name?>" type='text' name='Member' placeholder="Enter Member Name" class='form-control'>
                                        
                                    </div>   
                                    <div class="form-group">
                                        <label>Designation</label>
                                        <input placeholder="Member Designation" value="<?php echo $data[0]->designation?>" required  name='Designation' class='form-control'>
                                       
                                    </div>  
                                    <div class="form-group">
                                        <label>Facebook Link (optional)</label>
                                        <input value="<?php echo $data[0]->fb?>"  name='Facebook' class='form-control'>
                                        
                                    </div>  
                                    <div class="form-group">
                                        <label>Linkedin Link (optional)</label>
                                        <input value="<?php echo $data[0]->ln?>"  name='Linkedin' class='form-control'>
                                       
                                    </div> 
                                    <div class="form-group">
                                        <label>Twitter Link (optional)</label>
                                        <input value="<?php echo $data[0]->tw?>"  name='Twitter' class='form-control'>
                                       
                                    </div> 
                                    <div class="form-group">
                                        <label>Old Photo</label>
                                        <img src="<?php echo asset('storage/image/team/'.$data[0]->image);?>" width="50%" >
                                    </div> 
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-block">Update Team Member</button>
                                </div>
                            </form>
                        <?php
                    }else{
                        echo "No Record Found";
                    }
                }
               
           }

        }
    }
}
