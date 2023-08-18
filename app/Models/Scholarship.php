<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Scholarship extends Model
{
    use HasFactory;

    protected $with = ['representative', 'applicationForm'];

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

    public function applicationForm(): HasMany
    {
        return $this->hasMany(ApplicationForm::class);
    }
}
