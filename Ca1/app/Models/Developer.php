<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Block;

class Developer extends Model
{
    use HasFactory;

    public function blocks()
    {
        return $this->belongsToMany(Block::class)->withTimestamps();
    }
}
