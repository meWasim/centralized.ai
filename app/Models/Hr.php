<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Hr extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'company_id',
        'phone_number',
        'email',
        'linkedin',
        
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
