<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TexturePack;
use App\Models\Developer;

class Block extends Model
{
    protected $fillable = ['user_id'];
    protected $guarded = [];

    public function texturePack()
    {
        return $this->belongsTo(Texturepack::class);
    }

    public function developers()
    {
        return $this->belongsToMany(Developer::class)->withTimestamps();
    }

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    use HasFactory;
}
