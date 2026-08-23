<?php
namespace Database\Seeders;

use App\Features\Post\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        Post::factory()->count(20)->create();
    }
}