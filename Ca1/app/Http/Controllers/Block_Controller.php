<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Block;

class Block_Controller extends Controller
{

    //Pulling blocks from database
    public function index()
    {
        // $userId = Auth::id();
        $blocks = Block::where('user_id', Auth::id())->latest('updated_at')->paginate(5);
        return view('blocks.index')->with('blocks', $blocks);
    }

    //function to route to block create page
    public function create()
    {
        return view('blocks.create');
    }

    //pushing new blocks to database
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

        return to_route('blocks.index');
    }

    //pulling specific blocks by uuid to show page
    public function show(Block $block)
    {
        return view('blocks.show')->with('block', $block);

        if($block->user_id != Auth::id()){
            return abort(403);
        }
    }

    //pulling specific blocks by uuid to edit page
    public function edit(Block $block)
    {
        
        if($block->user_id != Auth::id()){
            return abort(403);
        }

        return view('blocks.edit')->with('block', $block);
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

        return to_route('blocks.show', $block);
        
    }

    //deletes block
    public function destroy(Block $block)
    {
        if($block->user_id != Auth::id()){
            return abort(403);
        }

        $block->delete();

        return to_route('blocks.index');
    }
}
