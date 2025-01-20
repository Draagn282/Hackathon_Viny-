<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'password', 'date_of_birth'];

    public function Blogs()
    {
        return $this->hasMany(Blogs::class);
    }

    public function comments()
    {
        return $this->hasMany(Comments::class);
    }

}
