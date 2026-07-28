<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(){
        return view('index');
    }
    public function dashboard(){
        // $customer = [
        //     'id' => 1,
        //     'name' => 'ravy',
        //     'phone' => '0987654'
        // ];
        $customer = [
            [
                'id' => 1,
                'name' => 'ravy',
                'phone' => '0987654'  
            ],
            [
                'id' => 2,
                'name' => 'ravy',
                'phone' => '0987654'  
            ]
        ];
        return view('admin.dashboard',compact('customer'));
    }
}
