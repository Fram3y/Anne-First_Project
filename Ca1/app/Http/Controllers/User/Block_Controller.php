<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Block;

class Block_Controller extends Controller
{
    public function index()
    {
        // $userId = Auth::id();
        $blocks = Block::where('user_id', Auth::id())->latest('updated_at')->paginate(5);
        return view('user.blocks.index')->with('blocks', $blocks);
    }

    public function show(Block $block)
    {
        if($block->user_id != Auth::id()){
            return abort(403);
        }

        return view('user.blocks.show')->with('block', $block);
    }

}