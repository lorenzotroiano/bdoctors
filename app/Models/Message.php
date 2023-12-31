<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'lastname',
        'email',
        'text',
        'profile_id'

    ];

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
