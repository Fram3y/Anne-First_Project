<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Block;
use App\Models\User;

class Block_Controller extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        $blocks = Block::paginate(10);

        return view('admin.blocks.index')->with('blocks', $blocks);
    }

    public function create()
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        return view('admin.blocks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:60',
            'block_image' => 'required'
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
        $block->save();

        return to_route('admin.blocks.index');
    }

    public function show(Block $block)
    {
        return view('admin.blocks.show')->with('block', $block);

        if($block->user_id != Auth::user()){
            return abort(403);
        }
    }

    public function edit(Block $block)
    {
        
        if($block->user_id != Auth::id()){
            return abort(403);
        }

        return view('admin.blocks.edit')->with('block', $block);
    }

    public function update(Request $request, Block $block)
    {

        $request->validate([
            'title' => 'required|max:60',
            'block_image' => 'required'
        ]);

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

        //update block function (weird af)
        $block->title = $request->title;
        $block->block_image = $filename;
        $block->save();

        return to_route('admin.blocks.index', $block);
        
    }

    public function destroy(Block $block)
    {
        if($block->user_id != Auth::id()){
            return abort(403);
        }

        $block->delete();

        return to_route('admin.blocks.index');
    }
}
