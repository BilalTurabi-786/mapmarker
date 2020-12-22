<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\category;
use App\Models\Front\Order;
use App\Models\Front\OrderDetail;
use App\Models\Vendor\Book;


use View;

use App\Models\Admin\StoreInformation;



use Session;
use Auth;
use Validator;

//use Hash;
use Str;
use Mail;
use DB;
use Carbon\Carbon;
//use App\Models\Admin\StoreInformation;



class LoginController extends Controller
{
    public function __construct(){
        $showCategory = category::with('subCategory')->get();
        if (!empty($showCategory)) {
            $showCategory=$showCategory;
        }else{
            $showCategory='null';
        }
        $information=StoreInformation::first();

        if (!empty($information)) {
            $information=$information;
        }else{
            $information='null';
        }
        $data=['categories'=>$showCategory,'information'=>$information];
    
        View::share('data',$data);
    }
    function index()
    {
        $orderdetails = Order::with('user')->whereHas('orderdetail')->where('customer_id',Auth::user()->id)->get();
        //dd($orderdetails);
        $purchasebook = Order::with('orderdetail.book')->where('customer_id',Auth::user()->id)->get();
        //dd($purchasebook);

        return view('client.page.myaccount',['orderdetails'=>$orderdetails,'purchasebook'=>$purchasebook]);
    }

    function home()
    {
        return view('client.page.home');
    }
    
    function login_process(Request $req)
    {
        // $validatedData = $req->validate([
            
        //     'email' => 'required',
        //     'password' => 'required'
        // ]);

        $controlls=$req->all();
        $rules=array(
            'email'=>"required|max:50|exists:users,email",
            'password'=>"required");
  
        $validator=Validator::make($controlls,$rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($controlls);
            
        }
       else
       {
            $user = User::where(['email'=>$req->email])->first();
            if($user->email_verified_at!='')
        {
            $credientials=['email'=>$req->email,'password'=>$req->password]; 
            if (!Auth::attempt($credientials)) 
            {
                
              return redirect()->route('login')->withErrors(['error'=>"Invalid Credientials"]);
            }
            else
            {
             return redirect('myaccount');    
            }
         
        }else{
            return redirect()->route('login')->with(['message'=>"Verify Your Email"]);    

        }
         
        //    $req->session()->put('user',$user);
        //    return redirect('/');
       }
    }
       public function Logout()
       {
         
           Auth::logout();
           return redirect()->route('login');         
             
       }

      
   
       function updateProfile(Request $req)
       {
        // $controlls=$req->all();
        // $rules=array(
        //     'name'=>"required|unique:users,id,$req->id|max:50",
        //     "email"=>"required|unique:users,id,$req->id|max:50",
        //     "newpassword"=>"required|unique:users,id,$req->id|max:8|min:6");

        
    
  
        // $validator=Validator::make($controlls,$rules);
        // if ($validator->fails()) {
        //     return redirect()->back()->withErrors($validator)->withInput($controlls);
            
        // }

        $hashedPassword = Auth::user()->password;
 
        if (\Hash::check($req->oldpassword , $hashedPassword )) {
  
          if (!\Hash::check($req->newpassword , $hashedPassword)) {
  
               $users =User::find(Auth::user()->id);
               $users->password = bcrypt($req->newpassword);
               User::where( 'id' , Auth::user()->id)->update( array( 'password' =>  $users->password));
  
               session()->flash('message','password updated successfully');
               return redirect()->back();
             }
  
             else{
                   session()->flash('message','new password can not be the old password!');
                   return redirect()->back();
                 }
  
            }
  
           else{
                session()->flash('message','old password doesnt matched ');
                return redirect()->back();
              }

         
    }
    public function forget()
    {
        return view('client.page.forget');
    }

    public function forget_process(Request $req)
    {
        $controlls=$req->all();
        
        $rules=array(
            "email"=>"required|exists:users,email",
        );
            $messages=array(
                "email.exists"=>"Email Does Not Exists",
            );
            $validator=Validator::make($controlls,$rules,$messages);
            if ($validator->fails()) {
                
                return redirect()->back()->withErrors($validator)->withInput($controlls);
            }
            else{
               
                $token = Str::random(60);
                DB::table('password_resets')->insert(
                    ['email' => $req->email, 'token' => $token, 'created_at' => Carbon::now()]
                );
                Mail::send('client.page.verify',['token' => $token], function($message) use ($req,$token)   {
                          $message->from('harisahmedshaikh12@gmail.com');
                          $message->to($req->email);
                          $message->subject('Reset Password Notification');
                       });
        
                return back()->with('success', 'Successfully Sent Your Password Link To Your Email !');
            }
               // return redirect()->route('admin.auth.resetpassword');
            

    }
    public function newpass()
    {
        return view('client.page.newpassword');
    }

    

    public function resetpassword_process(Request $req)
    {
        $controlls=$req->all();
        
        $rules=array(
            "newpassword"=>"required|min:8",
            "confirmpassword"=>"required|min:8|same:newpassword"
        );
            
            $validator=Validator::make($controlls,$rules);
            if ($validator->fails()) {
                
                return redirect()->back()->withErrors($validator)->withInput($controlls);
            }
            else
            {
                $updatePassword = DB::table('password_resets')
                ->where([ 'token' => $req->token])
                ->first();
                
        if(!$updatePassword){
            return back()->withInput()->with('error', 'Invalid token!');

        }
        else{
          $user = User::where('email', $updatePassword->email)->first();
          $user->password=bcrypt($req->newpassword);
          $user->save();

        //  return redirect()->back()->withSuccess('Your password has been changed...!');



          DB::table('password_resets')->where(['email'=> $updatePassword->email])->delete();

          return redirect('/newpassword')->with('success', 'Your password has been changed!');
        }

          

            }

    }

}

