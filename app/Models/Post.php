<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $with = ['category', 'user'];

    public function scopeFilter($query, array $filters)
    {
        // if(isset($filters['search']) ? $filters['search'] : false) {
        //   return $query->where(function($query) use ($filters) {
        //     $query->where('title', 'like', '%' .$filters['search']. '%');
        //   }); 
        // }

        if(isset($filters['search']) ? $filters['search'] : false) {
          $query->where(fn ($query) => 
          $query->where('title', 'like', '%' .$filters['search']. '%')
                ->orWhere('body', 'like', '%' . $filters['search'] . '%'));
        }

        if(isset($filters['category']) ? $filters['category'] : false) {
          $query->whereHas('category', fn($query) => 
          $query->where('slug', $filters['category']));
        }

        if(isset($filters['author']) ? $filters['author'] : false) {
          $query->whereHas('user', fn($query) => 
          $query->where('username', $filters['author']));
        }
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
