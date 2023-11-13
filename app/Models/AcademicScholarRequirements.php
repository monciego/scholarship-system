<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AcademicScholarRequirements extends Model
{
    use HasFactory;

    protected $fillable = [
        'scholarship_id',
        'user_id',

        'student_id',
        'campus',
        'degree',
        'average',
        'admission_test_score',
        'email',

        'first_name',
        'middle_name',
        'last_name',
        'requirements',
    ];

    public function scholarship(): BelongsTo
    {
        return $this->belongsTo(Scholarship::class, 'scholarship_id');
    }

    public function applicant(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
