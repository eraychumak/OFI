<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Questionnaire;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 3)->create()->each(function ($user) {
            $user->questionnaires()->save(factory(Questionnaire::class)->make());
        });
    }
}
