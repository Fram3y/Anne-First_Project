<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Texturepack;

class TexturepackController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        $Texturepacks = Texturepack::all();
        // $Texturepacks = Texture::paginate(10);
        // need to test if with 'blocks' works
        // $Texturepacks = Publisher::with('blocks')->get();

        return view('admin.texturepacks.index')->with('Texturepacks', $Texturepacks);
    }

    public function show(Texturepack $Texturepacks)
    {
        $Texturepacks = Texturepack::where("id", $Texturepacks->id)->firstOrFail();

        return view('admin.texturepacks.show')->with('Texturepacks', $Texturepacks);
    }

}
