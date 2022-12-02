<?php

namespace Database\Seeders;

use App\Models\TexturePack;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TexturepackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $texture_pack = new Texturepack();
       $texture_pack->name = 'Doku';
        $texture_pack->save();
    }
}
