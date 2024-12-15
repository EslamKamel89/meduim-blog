<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Builder;

class Post extends Model {
	/** @use HasFactory<\Database\Factories\PostFactory> */
	use HasFactory;
	protected $fillable = [ 
		'users_id',
		'image',
		'title',
		'slug',
		'body',
		'published_at',
		'featured',
	];
	public function user(): BelongsTo {
		return $this->belongsTo( User::class);
	}
	public function categories(): BelongsToMany {
		return $this->belongsToMany(
			Category::class,
			'category_post',
			'post_id',
			'category_id',
		);
	}
	public function casts(): array {
		return [ 
			'published_at' => 'datetime',
		];
	}

	public function scopePublished( Builder $query ) {
		$query->where( 'published_at', '<=', Carbon::now() );
	}
	public function scopeFeatured( Builder $query ) {
		$query->where( 'featured', true );
	}
}
