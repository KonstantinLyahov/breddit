<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 5)->create()->each(function($user){
            $user->posts()->saveMany(factory(App\Post::class, 1)->make());
        });
        $users = App\User::all();
        $posts = App\Post::all();
        foreach ($users as $user) {
            foreach ($posts as $post) {
                $vote = new App\Vote();
                $vote->user_id = $user->id;
                $vote->post_id = $post->id;
                $vote->up = rand(0,1);
                $vote->save();
            }
        }
    }
}
