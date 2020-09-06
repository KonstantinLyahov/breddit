<?php

use App\Post;
use App\PostFile;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post = new Post();
        $post->title = "Test title";
        $post->body = "<b>Test body</b>";
        User::where('email', 'test@test.com')->first()->posts()->save($post);

        $postFile = new PostFile();
        $postFile->path = 'uploads/rei.jpg';
        $post->files()->save($postFile);
    }
}
