<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 3; $i++) {
            Slider::create([
                'title'     => 'test',
                'big_title' => 'test',
                'image_url' => 'empty',
                'is_active' => '1'
            ]);
        }
    }
}
