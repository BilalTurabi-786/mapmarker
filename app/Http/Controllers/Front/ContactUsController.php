<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Front\ContactUs;
use App\Models\SchoolRequest;
use App\Models\Admin\Admin;
use Mail;


use Validator;
class ContactUsController extends Controller
{
    //
    public function index(){
        // $admin=new Admin;
        // $admin->name="khalid";
        // $admin->email="meerkhalid482@gmail.com";
        // $admin->password=bcrypt(12345678);
        // $admin->role_id=1;
        // $admin->phone=1;

        // $admin->save();

        return view('clientside.page.contact');

    }
    public function store(Request $request){
        $controlls=$request->all();
        $rules=array(
            "name"=>"required",
            "email"=>"required|email|unique:contact_us,email",
            "ava_date_one"=>"required|date",
            "ava_date_two"=>"required|date",
            "ava_time_one"=>"required",
            "ava_time_two"=>"required",
        );
        $validator=Validator::make($controlls,$rules);
        if ($validator->fails()) {
            // dd($validator);s
            return redirect()->back()->withErrors($validator)->withInput($controlls);

        }
        else{
            $contact=new ContactUs;

            $contact->name=$request->name;
            $contact->password=bcrypt($request->password);
            $contact->email=$request->email;
            $contact->phone=$request->code.$request->number;
            $contact->ava_date_one=$request->ava_date_one;
            $contact->ava_date_two=$request->ava_date_two;
            $contact->ava_time_one=$request->ava_time_one;
            $contact->ava_time_two=$request->ava_time_two;
            $contact->token=$request->_token;
            $contact->save();
            $schoolReq = new SchoolRequest;
            $schoolReq->contact_us_id = $contact->id;
            $schoolReq->save();
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

    public function schoolRequest(){
        return view('clientdash.pages.school-request');
    }

    public function schools(){
        return view('clientdash.pages.school');
    }

    public function list_process(){

    }
}
