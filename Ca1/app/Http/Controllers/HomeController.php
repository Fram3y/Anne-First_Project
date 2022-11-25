<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }    

    public function index(Request $request)
    {
        $user = Auth::user();
        $home = 'home';

        if($user->hasRole('admin')){
           $home = 'admin.blocks.index';
        }
        else if ($user->hasRole('user')){
            $home = 'user.blocks.index';
        }
        return redirect()->route($home);
    }
}
