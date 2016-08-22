<?php 

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        //return view('user.profile', ['user' => User::findOrFail($id)]);
		return view("home.index");
    }
}
?>