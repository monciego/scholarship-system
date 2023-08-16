<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Scholarship extends Model
{
    use HasFactory;

    protected $with = ['representative'];

    protected $fillable = [
        'scholarshipName',
        'deadlineAt',
        'availableFor',
        'status',
        'slot',
        'applicationLink',
        'details',
    ];

    public function representative(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
