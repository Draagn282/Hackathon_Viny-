<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['content', 'blog_id', 'account_id'];

    // Relationship: A comment belongs to a blog post
    public function blog()
    {
        return $this->belongsTo(Blogs::class);
    }

    // Relationship: A comment belongs to a user (who wrote the comment)
    public function Account()
    {
        return $this->belongsTo(Account::class);
    }
}

