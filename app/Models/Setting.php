<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name', 'company_address', 'company_phone', 'company_email', 'company_logo', 'company_city','company_country', 'company_zipcode'
    ];
}
}
