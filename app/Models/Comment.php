<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    // Define the table if it's not the plural form of the model name
    protected $table = 'comments'; 

    // Define the fillable fields
    protected $fillable = ['body', 'forum_id', 'account_id'];

    // Relationship: A comment belongs to a forum topic
    public function forum()
    {
        return $this->belongsTo(Forum::class);
    }

    // Relationship: A comment belongs to an account
    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}
