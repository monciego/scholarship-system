<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ApplicationForm extends Model
{
    use HasFactory;

    // protected $with = ['scholarship'];
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
        'remarks',

        /*
        'birth_date',
        'birth_place',
        'gender',
        'religion',
        'civil_status',
        'spouse_name',
        'spouse_occupation',
        'height',
        'weight',
        'address',
        'telephone',
        'cellphone',
        'highschool_name',
        'highschool_address',
        'year_graduated',
        'skills',
        'course',
        'curriculum_year',

        'father_name',
        'father_middle_name',
        'father_last_name',
        'father_occupation',
        'mother_name',
        'mother_middle_name',
        'mother_last_name',
        'mother_occupation',
        'father_monthly_income',
        'mother_monthly_income',
        'brother_number',
        'sister_number',
        'family_income',
        'father_education',
        'father_school',
        'mother_education',
        'mother_school',
        'image_upload',
        'disability',
        */
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
