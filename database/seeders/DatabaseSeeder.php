<?php

namespace Database\Seeders;

use App\Models\Mine;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $height = 10;
        $width = 10;

        $mines = [];

        for ($i = 0; $i < $height * $width; $i++) {
            $mine = new Mine();
            $mine->is_mine = fake()->boolean(10);
            $mine->mines_around = 0;
            $mine->is_opened = 0;
            $mines[] = $mine;
        }

        for ($i = 0; $i < $height * $width; $i++) {
            if ($mines[$i]->is_mine) {
                if (isset($mines[$i - $width])) {
                    $mines[$i - $width]->mines_around++;
                    if ($i % $width > 0) {
                        $mines[$i - $width - 1]->mines_around++;
                    }
                    if ($i % $width != $width - 1) {
                        $mines[$i - $width + 1]->mines_around++;
                    }
                }
                if ($i % $width > 0) {
                    $mines[$i - 1]->mines_around++;
                }
                if ($i % $width != $width - 1) {
                    $mines[$i + 1]->mines_around++;
                }
                if (isset($mines[$i + $width])) {
                    $mines[$i + $width]->mines_around++;
                    if ($i % $width > 0) {
                        $mines[$i + $width - 1]->mines_around++;
                    }
                    if ($i % $width != $width - 1) {
                        $mines[$i + $width + 1]->mines_around++;
                    }
                }
            }
        }

        foreach ($mines as $mine) {
            $mine->save();
        }
    }
}
