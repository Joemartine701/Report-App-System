<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

namespace App\Actions\Fortify\Controller;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class HomeController extends Controller
{
    public function register(){
        return view('auth.register');
    }

}
