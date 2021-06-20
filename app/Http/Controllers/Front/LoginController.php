<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Front\ContactUs;

use View;
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
    public function login(){
        return view('clientside.page.login');
    }

    function login_process(Request $req) {
        $controlls=$req->all();
        $rules=array(
            'email'=>"required|max:50|exists:contact_us,email",
            'password'=>"required"
        );

        $validator=Validator::make($controlls,$rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($controlls);
        }
        else {
            $credientials=['email'=>$req->email,'password'=>$req->password];
            // dd($credientials);
            if (!Auth::guard('contact')->attempt($credientials)) {
                return redirect()->route('login')->withErrors(['error'=>"Invalid Credientials"]);
            }
            else {
                return redirect()->route('/client/dashboard');
            }
        }
    }

    public function Logout() {
        Auth::guard('contact')->logout();
        return redirect()->route('login');
    }

    public function profile(){
        return view('clientside.page.profile');
    }

    function updateProfile(Request $req) {
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
        else {
            session()->flash('message','old password doesnt matched ');
            return redirect()->back();
        }
    }

    public function forget() {
        return view('client.page.forget');
    }

    public function forget_process(Request $req) {
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

    public function newpass() {
        return view('client.page.newpassword');
    }


    public function resetpassword_process(Request $req) {
        $controlls=$req->all();

        $rules=array(
            "newpassword"=>"required|min:8",
            "confirmpassword"=>"required|min:8|same:newpassword"
        );

        $validator=Validator::make($controlls,$rules);
        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator)->withInput($controlls);
        }
        else {
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

