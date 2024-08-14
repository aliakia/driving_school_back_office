<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DSHomeController extends Controller
{
    public function index() {
        $loggedUser = session('logged_in');

        // Access specific columns from the session data
        $first_name = $loggedUser->first_name;

        // Pass the data to the Blade view
        return view('content.pages.home-page', [
            'first_name' => $first_name,
        ]);
        // return dd($loggedUser);
    }

}
