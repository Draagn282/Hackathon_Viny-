<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
    use HasFactory;

    // Define the table if it's not the plural form of the model name
    protected $table = 'blogs'; 

    // Define the fillable fields (mass assignment)
    protected $fillable = ['header', 'description', 'account_id'];

    // Relationship: A forum topic belongs to an account
    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    // Relationship: A forum topic has many comments
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
