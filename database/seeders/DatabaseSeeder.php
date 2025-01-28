<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Image;

use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\ZoneSeeder;
use Database\Seeders\Space_Address_PivotsSeeder;
use Database\Seeders\IslandSeeder;
use Database\Seeders\CommentSeeder;
use Database\Seeders\ServiceSeeder;
use Database\Seeders\ModalitySeeder;
use Database\Seeders\SpaceTypesSeeder;
use Database\Seeders\MunicipalitySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {   
        // User::factory(10)->create();

        //Seeders

        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(IslandSeeder::class);
        $this->call(ZoneSeeder::class);
        $this->call(MunicipalitySeeder::class);
        $this->call(ModalitySeeder::class);
        $this->call(SpaceTypesSeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(Space_Address_PivotsSeeder::class);
        $this->call(CommentSeeder::class);

        //Factories
        User::factory(100)->create();
        Image::factory(100)->create();

    }
}
