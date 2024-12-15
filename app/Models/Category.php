<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model {
	/** @use HasFactory<\Database\Factories\CategoryFactory> */
	use HasFactory;
	public $fillable = [ 
		'title',
		'slug',
		'text_color',
		'bg_color',
	];
	public function posts(): BelongsToMany {
		return $this->belongsToMany(
			Post::class,
			'category_post',
			'category_id',
			'post_id'
		);
	}
}
