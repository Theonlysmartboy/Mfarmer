<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller {

    public function login(Request $request) {
        if ($request->isMethod('post')) {
            $data = $request->input();
            //Attempt to login
            if (Auth::attempt(['email' => $data['email'], 'password' => $data['password'], 'role' => '1'])) {
                echo "Login Successfull for Admin";
                die;
            } else if (Auth::attempt(['email' => $data['email'], 'password' => $data['password'], 'role' => '0'])) {
                echo "Login Successfull for User";
                die;
            } else {
                echo"Login Failed";
                die;
            }
        }
        return view('admin.admin_login');
    }
    public function dashboard(){
        return view('admin.dashboard');
    }

}
