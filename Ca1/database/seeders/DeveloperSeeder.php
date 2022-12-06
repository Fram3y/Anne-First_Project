<?php

namespace Database\Seeders;

use App\Models\Developer;
use App\Models\Block;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeveloperSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Developer::factory()
        ->times(3)
        ->create();

        foreach(Block::all() as $block)
        {
            $developers = Developer::intRandomOrder()->take(rand(1,3))->pluck('id');
            $block->developers()->attach($developers);
        }
    }
}
