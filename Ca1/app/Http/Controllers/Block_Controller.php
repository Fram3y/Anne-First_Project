<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Block;

class Block_Controller extends Controller
{
    public function index()
    {
        // $userId = Auth::id();
        $blocks = Block::where('user_id', Auth::id())->latest('updated_at')->paginate(5);
        return view('blocks.index')->with('blocks', $blocks);
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'block_image' => 'file|image'
        ]);

        $block_image = $request->file('block_image');
        $extension = $block_image->getClientOriginalExtension();

        $filename = date('Y-m-d-his') . '_' . $request->input('title') . '.' . $extension;

        $path = $block_image->storeAs('public/images', $filename);

        Block::create([
            'title' => $request->title,
            'block_image' => $filename
        ]);

        return to_route('blocks.index');
    }

    public function show($id)
    {

    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {

    }
}
