<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TexturePack;

class Block extends Model
{
    protected $fillable = ['user_id'];
    protected $guarded = [];

    public function texturePack(){
        return $this->belongsTo(Texturepack::class);
    }

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    use HasFactory;
}
