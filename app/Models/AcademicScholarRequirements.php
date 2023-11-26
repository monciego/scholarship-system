<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AcademicScholarRequirements extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = static::generateRandomId();
        });
    }

    private static function generateRandomId()
    {
        // Logic to generate a random 6-character string
        return substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 6);
    }
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
        'remarks',
        'approve',
        'reject',
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
