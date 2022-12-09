<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Block;
use App\Models\Developer;
use App\Models\Texturepack;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class Block_Controller extends Controller
{
    public function index()
    {
        // User Authentication
        $user = Auth::user();
        $user->authorizeRoles('admin');

        // defintion of texture packs
        $Texturepacks = Texturepack::all();

        // Blocks called at a time
        $blocks = Block::paginate(10);

        // route to home page
        return view('admin.blocks.index')->with('blocks', $blocks)->with('Texturepacks', $Texturepacks);
    }

    public function create()
    {
        // User Authentication
        $user = Auth::user();
        $user->authorizeRoles('admin');

        // defintion of texture packs and developers
        $Texturepacks = Texturepack::all();
        $developers = Developer::all();

        // re-route to the create page
        return view('admin.blocks.create')->with('Texturepacks', $Texturepacks)->with('developers', $developers);
    }

    public function store(Request $request)
    {
        // definition of developers
        $developers = Developer::pluck('id');

        // User Authentication
        $user = Auth::user();
        $user->authorizeRoles('admin');

        // Block Validation
        $request->validate([
            'title' => 'required|max:60',
            'block_image' => 'required',
            'texture_id' => 'required',
            'developers' => ['required', 'exists:developers,id']
        ]);

        //creating variable for block image and extenstion
        $block_image = $request->file('block_image');
        $extension = $block_image->getClientOriginalExtension();

        //creates unique file name to database
        $filename = date('Y-m-d-his') . '_' . $request->input('title') . '.' . $extension;

        //pushes file with new name to images folder
        $path = $block_image->storeAs('public/images', $filename);

        //create block function (weird af)
        $block = new Block;
        $block->user_id = Auth::id();
        $block->uuid = Str::uuid();
        $block->title = $request->title;
        $block->block_image = $filename;
        $block->texture_id = $request->texture_id;
        $block->save();

        $block->developers()->attach($request->developers);


        // re-route back to homepage
        return to_route('admin.blocks.index');
    }

    public function show(Block $block)
    {
        // defintion of texture packs and developers
        $Texturepacks = Texturepack::where("id", $block->texture_id)->firstOrFail();
        $developers = Developer::pluck('id');
        
        // route to the show page
        return view('admin.blocks.show')->with('block', $block)->with('Texturepacks', $Texturepacks)->with('developers', $developers);
    }

    public function edit(Block $block)
    {
        // user role authentication
        $user = Auth::user();
        $user->authorizeRoles('admin');

        // defintion of texture packs and developers
        $Texturepacks = Texturepack::all();
        $developers = Developer::all();

        // route to edit page
        return view('admin.blocks.edit')->with('block', $block)->with('Texturepacks', $Texturepacks)->with('developers', $developers);
    }

    public function update(Request $request, Block $block)
    {

        // Block Update Validation
        $request->validate([
            'title' => 'required|max:60',
            'block_image' => 'required',
            'texture_id' => 'required',
            'developers' => ['required', 'exists:developers,id']
        ]);

        // definintion of texture packs
        $Texturepacks = Texturepack::all();

        //creating variable for block image and extenstion
        $block_image = $request->file('block_image');
        $extension = $block_image->getClientOriginalExtension();

        //creates unique file name to database
        $filename = date('Y-m-d-his') . '_' . $request->input('title') . '.' . $extension;

        //pushes file with new name to images folder
        $path = $block_image->storeAs('public/images', $filename);

        if($block->user_id != Auth::id()){
            return abort(403);
        }

        $block_developer = DB::table('block_developer')->get();

        foreach ($block_developer as $developerCheck) {
            if($developerCheck->block_id = $block->id){
                DB::table('block_developer')->where('id', $developerCheck->id)->delete();
            }
        }

        //update block function (weird af)
        $block->title = $request->title;
        $block->block_image = $filename;
        $block->texture_id = $request->texture_id;
        $block->developers()->attach($request->developers);
        $block->save();

        // re-route back to homepage
        return to_route('admin.blocks.index', $block)->with('Texturepacks', $Texturepacks);
        
    }

    public function destroy(Block $block)
    {
        // user role authentication
        $user = Auth::user();
        $user->authorizeRoles('admin');

        // deletes block
        $block->delete();

        // re-routes back to homepage
        return to_route('admin.blocks.index');
    }
}
