<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
	/**
	 * Seed the application's database.
	 */
	public function run(): void {
		// User::factory(10)->create();

		User::create( [ 
			'name' => 'admin',
			'email' => 'admin@gmail.com',
			'password' => '123456789',
		] );
		Post::factory( 100 )->create();
		Category::factory( 5 )->create();
		$posts = Post::all();
		$categories = Category::all();
		$posts->each( fn( $post ) => $post->categories()
			->attach( [ fake()->numberBetween( 1, $categories->count() ) ] ) );
	}
}
