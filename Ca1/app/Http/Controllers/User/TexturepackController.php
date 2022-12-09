<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Texturepack;

class TexturepackController extends Controller
{
    
    // displays all texture packs onto index page
    public function index()
    {
        // texturepacks definition
        $Texturepack = Texturepack::all();  
        //route to homepage
        return view('user.texturepacks.index')->with('Texturepack', $Texturepack);
    }

    // adds a redirect to get to the more information page of the texture pack
    public function show(Texturepack $Texturepack)
    {
        // route to the show page
        return view('user.texturepacks.show')->with('Texturepack', $Texturepack);
    }

}
