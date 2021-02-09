<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Input; use DB; use Mail; use Redirect;
use Session; use Crypt;

class UserController extends Controller
{
    public function index()
    {
        return view('frontend.register');
    }

    public function register_user(){

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
       'email_verification_status'=>0 ,
       'admin_approval_status'=>0,
       'trash_status'=>0
         
     );
     $user_id =   DB::table('userdetails')->insertGetId($userdata);

      
       
      
      
       if($user_id){
        return view('frontend.thankyou');       /*vendor-submit-successful*/
       }

        // Mail::later(3,'mails.vendor_registration', ['key' => $string], function($message)  use ($email) 
        //       {
        //           $message->to($email, '')->subject('Welcome to Cash For Cars Quotes!');
        //       });

    }

}
?>