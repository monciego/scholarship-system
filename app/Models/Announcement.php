<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;
    protected $with = ['user'];
    protected $fillable = [
        'user_id',
        'title',
        'body',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
