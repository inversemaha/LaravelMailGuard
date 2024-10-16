<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'nature_of_ownership',
        'tin',
        'bin',
        'year_of_registration',
        'years_in_operation',
        'registered_office_address',
        'website_url',
        'contact_person_name',
        'contact_person_email',
        'contact_person_phone',
        'trade_license',
        'tin_certificate',
        'bin_certificate',
        'certificate_of_incorporation',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
