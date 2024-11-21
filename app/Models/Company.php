<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'industry',
        'company_email',
        'country',
        'state',
        'address',
        'company_career_email',
        'company_phone',
        'career_page',
    ];

    public function hr()
    {
        return $this->hasMany(Hr::class);
    }
}
