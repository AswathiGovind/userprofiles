<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Collection;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use View;use Mail;use Redirect;
use DB;use Auth;use Input;use Hash;use Validator;use Crypt;
use Request; use Route;
use Response; use Session; use Carbon; 


class AdminController extends BaseController
{
   
    public function index(){  

        if (Auth::check()){
            return Redirect::to(route('dashboard')); 
        }
        else{
            return View::make('admin/login'); 
        }
    }

    public function dologin(){

        $userdata=array(
          'email'=>request('username'),   
          'password'=>request('password')   
        );

        // if(Auth::attempt($userdata)){

        //      // Session::put('user_type',1); //type : 1 for admin , type : 2 for vendors              
        //       return 123;
 
        //  }

        // else{ 
           
        //     return View::make('admin/login')->with('message','Check Your Entries.Invalid Login!');
        // }

       // $input = request()->except('_token');
        
            if(auth()->attempt($userdata)){
               
                return redirect()->route('dashboard');
            }else{
              return View::make('admin/login')->with('message','Check Your Entries.Invalid Login!');
            }
    }

    public function dashboard(){

        $strActiveMenu = 'dashboard'; 

       


         return View::make('admin.dashboard')
                    ->with('strActiveMenu',$strActiveMenu);
                      
                      
    }

    public function add_users(){

        $strActiveMenu = 'addusers';   
      
        

      
      
        return View::make('admin.add_users')
                        ->with('strActiveMenu',$strActiveMenu);

    }

        
    public function save_new_user(){


         $img=request('user_img');
         $password=request('password');

         if($img!=''){
                $file_name = $img->getClientOriginalName(); 
                $newname  = $file_name.'-'.uniqid();
                $destinationPath = 'admin/user_image/'; // upload path
                $img->move($destinationPath, $newname);
               
            }else{
                $newname  = '';
            }

       $userdata=array(
        'fname'=>request('first_name'),   
        'lname'=>request('last_name') ,
        'mobile'=>request('mobile'), 
        'email'=>request('email'), 
        'password'=>md5('cfcq-'.$password) ,
        'image'=>$newname ,
        'email_verification_status'=>1 ,
        'admin_approval_status'=>1,
        'trash_status'=>0
          
      );
      $user_id =   DB::table('userdetails')->insertGetId($userdata);

       
        
        if($user_id){
            echo  $msg ='Add-SUCCESS';
        }
        else{
            echo  $msg = 'ERROR';
        }


        
        

        return Redirect::to(route('list_users'))->with('message',$msg); 
    }

    public function list_users(){

        $strActiveMenu = 'listusers';



        $arr= DB::table('userdetails')
                    ->where('trash_status',0)
                    ->orderBy('id','desc')
                    ->select('userdetails.*')
                    ->paginate(10);

              
       


        return View::make('admin.list_users')
                ->with('data',$arr)
                ->with('strActiveMenu',$strActiveMenu);
                
                
    }

    public function edit_user($id){

        $id  =  Crypt::decrypt($id);
        
        $strActiveMenu = 'listusers';   
      
        $arr = DB::table('userdetails')
                ->where('id',$id)
                ->get();

        
        return View::make('admin.edit_user')
                  ->with('data',$arr)
                  ->with('strActiveMenu',$strActiveMenu);
                  

    }

    public function update_user(){
              
       $id=request('user_id'); 
       //$password = request('password');

       $img=request('user_img');
      

       if($img!=''){
              $file_name = $img->getClientOriginalName(); 
              $newname  = $file_name.'-'.uniqid();
              $destinationPath = 'admin/user_image/'; // upload path
              $img->move($destinationPath, $newname);
             
          }  
       
       $userdata=array(
        'fname'=>request('first_name'),   
        'lname'=>request('last_name') ,
        'mobile'=>request('mobile'), 
       
        'updated_at'   => date('Y-m-d H:i:s')
       
        
          
      );

      if($img!=''){
        $userdata['image'] = $newname;
  }


        

       $affected =   DB::table('userdetails')->where('id',$id)->update($userdata);





       

        if($affected){
         $msg = 'Edit-SUCCESS';
       }
       else{
             $msg = 'ERROR';
       }

       return Redirect::to(route('list_users'))->with('message',$msg);   



        
  }

  public function check_user_email(){
              
    $email = request('email'); 
    
    $qry = DB::table('userdetails')
                  ->where('email',trim($email))
                  ->where('email_verification_status',1);
                  
    
   $exist_id  = $qry->pluck('id');
   if($exist_id)
   echo $exist_id;
    }

    

    public function delete_user(){

        $id = request('id');
        $id= Crypt::decrypt($id);

        $affected =   DB::table('userdetails')->where('id',$id)->update(['trash_status'=>1,'updated_at'=>date('Y-m-d H:i:s')]);
            if($affected) $msg = 1;
            else          $msg = 0;

        echo $msg;

    }

    public function user_search(){

        $strActiveMenu = 'listusers';
        
        $form_data = request('filterOpts');
        parse_str($form_data, $values);

        $qry = DB::table('userdetails')
                
                ->where('trash_status','0')
                ->orderBy('id','desc');
                
                
        if($values['email'])        
                $qry->where('email', 'like',trim($values['email']));

        if($values['name'])        
                $qry->where('fname','like', '%'.$values['name'].'%');        

                    

        $qry = $qry->select('userdetails.*');

        $arr = $qry->paginate(10);

        $dataR = [
                  'view' => View::make('admin.users_paginate_ajax')
                                ->with('data',$arr)
                                ->render()
                  ];

        return Response::json($dataR, 200);     

    }

    
    public function logout(){

        Auth::logout();
        Session::forget('user_type');
        return View::make('admin/login')->with('message','Succesfully Logged Out!');

    }

    public function change_user_approval(){

        $id = request('user_id');
        $id= Crypt::decrypt($id);
        $status= request('status');

        
        if($status==0)
            $status = 1;
        else
            $status = 0;

        //to check the limit in a location exceed 5  
        if($status==1){
             
        $affected =   DB::table('userdetails')
                          ->where('id',$id)
                          ->update([
                                'admin_approval_status'=>$status,
                                'updated_at'=>date('Y-m-d H:i:s')
                            ]);
            
            if($affected) $msg = 1;
            else          $msg = 0;


       
        echo $msg;

        }
    }


}
