<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Block;
use App\Models\Texturepack;
use App\Models\Developer;

class Block_Controller extends Controller
{
    public function index()
    {
        $blocks = Block::paginate(10);

        // defintion of texture packs
        $Texturepack = Texturepack::all();

        return view('user.blocks.index')->with('blocks', $blocks)->with('Texturepack', $Texturepack);
    }

    public function show(Block $block, Texturepack $Texturepack, Developer $developers)
    {
        return view('user.blocks.show')->with('block', $block)->with('developers', $developers)->with('Texturepack', $Texturepack);
    }

}