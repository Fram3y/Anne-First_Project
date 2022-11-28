<?php

namespace Database\Seeders;

use App\Models\TexturePack;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TextureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TexturePack::factory()
        ->times(3)
        ->hasBlocks(4)
        ->create();
    }
}
