<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\AddCustomer;
use Session;
use App\Http\Helpers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use  Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;


class UserController extends Controller
{    public $agent;
	 public function  __construct()
    {
        $this->customerObject = new AddCustomer();
        
    }
    public function addcustomer(Request $request)
    {
        $user = $this->customerObject;
        
        request()->validate([

            'name' => 'required|min:2|max:50',
            'phone' => 'required|numeric',            
            // 'email' => 'required|email|unique:user',
            'address' => 'required',                
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',

        ], [
            'name.required' => 'Name is required',
            'name.min' => 'Name must be at least 2 characters.',
            'name.max' => 'Name should not be greater than 50 characters.',
        ]);

        $user ->name = $request->input('name');
        $user ->email = $request->input('email');
        $user ->phone = $request->input('phone');
        $user ->address = $request->input('address');
        $user ->city = $request->input('city');
        $user ->state = $request->input('state');
        $user ->zip = $request->input('zip');

        $user ->save();
        $id = DB::getPdo()->lastInsertId();

        $data = ([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'address' => $request->get('address'),
            'phone' => $request->get('phone'),
            ]);
        $email = $request->get('email');

        Mail::to($email)->send(new WelcomeMail($data));

        return view('login');

       
    }

    public function FunctionName(Type $var = null)
    {
        $data1 = [
            'data1' => 'value_1',
            'data2' => 'value_2',
        ];
        
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://register.portal/street-address",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30000,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($data2),
            CURLOPT_HTTPHEADER => array(
                // Set here requred headers
                "accept: */*",
                "accept-language: en-US,en;q=0.8",
                "content-type: application/json",
            ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            print_r(json_decode($response));
        }
    }


}