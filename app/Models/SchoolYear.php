<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SchoolYear extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_school_year',
        'end_school_year',
    ];

    public function scholarships(): HasMany
    {
        return $this->hasMany(Scholarship::class);
    }

}
