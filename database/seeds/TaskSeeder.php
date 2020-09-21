<?php

use App\User;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tasks = collect([
            ['title' => 'estudiar'],
            ['title' => 'limpiar'],
            ['title' => 'jugar'],
            ['title' => 'merendar']
        ]);

        $users = User::all();

        foreach ($users as $user) {
            $user->tasks()->create($tasks->random());
        }
    }
}
