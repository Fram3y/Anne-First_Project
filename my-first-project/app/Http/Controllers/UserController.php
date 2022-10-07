<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    
    // @param int 
    // @return \Illuminate\View\View

    public function show($id){
        return view('user.profile', [
            'user' => User::findOrFail($id)
        ]);
    }

}
