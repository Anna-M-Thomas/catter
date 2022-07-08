<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meow extends Model
{
    use HasFactory;

    protected $fillable = ['message', 'user_id'];

    public function users()
    {
        return $this->belongsTo('App\Models\User');
    }
}
