<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\Block;

class Texturepack extends Model
{

    use HasFactory;

    public function blocks(){
        return $this->hasMany(Block::class);
    }

    public function getRouteKeyName()
    {
        return 'id';
    }
}
