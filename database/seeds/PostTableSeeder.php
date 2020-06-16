<?php

use Illuminate\Database\Seeder;
use App\Post;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post = new Post;
        $post->user_id = 2;
        $post->title = "Using Laravel Seeder";
        $post->body = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia numquam ipsa maiores ab laboriosam labore, consequuntur explicabo asperiores sequi quas ipsam ratione? Eos deleniti non aperiam quia perspiciatis iure in?";
        $post->save();

        $post = new Post;
        $post->user_id = 2;
        $post->title = "Lorem Ipsum";
        $post->body = "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolorum quibusdam aliquid, iure earum saepe quidem laudantium reprehenderit, laboriosam adipisci culpa alias blanditiis. Accusamus porro dolores repudiandae, culpa laudantium alias suscipit.";
        $post->save();
    }
}
