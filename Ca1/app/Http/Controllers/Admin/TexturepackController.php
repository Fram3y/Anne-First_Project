<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Texturepack;

class TexturepackController extends Controller
{

    // displays all texture packs onto index page
    public function index()
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        $Texturepack = Texturepack::all();

        return view('admin.texturepacks.index')->with('Texturepack', $Texturepack);
    }

    // adds action to the create button that links to the create form
    public function create()
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        $Texturepack = Texturepack::all();
        return view('admin.texturepacks.create')->with('Texturepack', $Texturepack);
    }

    // pushes new texture pack to the database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:60'
        ]);

        //create texture pack function (weird af)
        $Texturepack = new Texturepack;
        $Texturepack->name = $request->name;
        $Texturepack->save();

        return to_route('admin.texturepacks.index');
    }

    // adds a redirect to get to the more information page of the texture pack
    public function show(Texturepack $Texturepack)
    {
        return view('admin.texturepacks.show')->with('Texturepack', $Texturepack);
    }

    // adds a redirect to get to the edit form to update the info of the texture pack
    public function edit(Texturepack $Texturepack)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        return view('admin.texturepacks.edit')->with('Texturepack', $Texturepack);
    }

    // this re-writes the data of the texture pack and pushes
    public function update(Request $request, Texturepack $Texturepack)
    {

        $request->validate([
            'name' => 'required|max:60'
        ]);
        
        //update texture pack function (weird af)
        $Texturepack->name = $request->name;
        $Texturepack->save();

        return to_route('admin.texturepacks.index', $Texturepack);
    }

    // button that deletes a texture pack from the database
    public function destroy(Texturepack $Texturepack)
    {
        $Texturepack->delete();

        return to_route('admin.texturepacks.index');
    }

}
