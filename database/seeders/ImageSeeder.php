<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Comment;
use Nette\Utils\Random;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jsonData = file_get_contents("C:\\temp\\baleart\\spaces.json");
        $spaces = json_decode($jsonData, true);
        if ($jsonData === false || $spaces === null) {
            throw new \Exception("Error al leer o procesar el JSON.");
        }

        foreach($spaces as $imagen){
            Image::create([
                'url'=> $imagen['image'],
                'comment_id' => Comment::inRandomOrder()->first()->id,
            ]);
        }
    }
}
