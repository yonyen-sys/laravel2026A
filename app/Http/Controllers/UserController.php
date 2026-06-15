<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('user');
    }

    public function show($id)
    {
        return "The user ID is:" . $id;
    }

    public function getUsernameEmail($username, $email)
    {
        return 'Your username is :' . $username . 'and email is:' . $email;
    }
}
