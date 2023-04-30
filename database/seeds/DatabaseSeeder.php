<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Questionnaire;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RequiredDataTableSeeder::class,
            UsersTableSeeder::class
        ]);
    }
}
