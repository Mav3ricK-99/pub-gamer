<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComentariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comment::create([
            'user_id' => User::first()->id,
            'mensaje' => 'Primer comentario!',
            'comentable_type' => Post::class,
            'comentable_id' => Post::first()->id,
        ]);
    }
}
