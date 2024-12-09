<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    // Define the fillable fields
    protected $fillable = ['name', 'email', 'password', 'date_of_birth'];

    // Relationship: An account can have many forum topics
    public function Blogs()
    {
        return $this->hasMany(Blogs::class);
    }

    // Relationship: An account can have many comments
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // Add any other necessary methods (like password hashing) here
}
