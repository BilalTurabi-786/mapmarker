<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Front\ContactUs;
use App\Models\Admin\Admin;
use Mail;


use Validator;
class ContactUsController extends Controller
{
    //
    public function index(){
        $admin=new Admin;
        $admin->name="khalid";
        $admin->email="meerkhalid482@gmail.com";
        $admin->password=bcrypt(12345678);
        $admin->role_id=1;
        $admin->phone=1;

        $admin->save();

    return view('clientside.page.contact');

    }
    public function store(Request $request){
        $controlls=$request->all();
        $rules=array(
            "email"=>"required|email|unique:contact_us,email",
            "subject"=>"required",
            "name"=>"required",
            "comment"=>"required",
        );
        $validator=Validator::make($controlls,$rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($controlls);
        
        }
        else{
            $contact=new ContactUs;
            $contact->name=$request->name;
            $contact->email=$request->email;
            $contact->message=$request->comment;
            $contact->subject=$request->subject;
            $contact->token=$request->_token;

            $contact->save();
            return redirect()->back()->withSuccess("We Will Contact You Soon");

        }
    }
    public function get_contacts(){
        $contacts=ContactUs::all();
        return view('admin.pages.user.list',['contacts'=>$contacts]);
    }
    public function send_qoute(Request $request){
        $token=$request->token;
        Mail::send('clientside.page.verify',['token' => $token], function($message) use ($request,$token)   {
            $message->from('harisahmedshaikh12@gmail.com');
            $message->to($request->email);
            $message->subject('Add Your Scholl Info');
         });
         return ['message'=>"Message Has Been Sendt...!"];
    }
    public function list_process(){

    }
}
