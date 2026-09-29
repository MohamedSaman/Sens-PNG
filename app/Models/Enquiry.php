<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    protected $fillable = [
        'reference_no',
        'business_name',
        'contact_name',
        'email',
        'phone',
        'province',
        'city',
        'business_type',
        'category_interest',
        'brands_interested',
        'estimated_volume',
        'message',
        'status',
        'admin_notes',
        'ip_address',
    ];

    protected $casts = [
        'brands_interested' => 'array',
    ];

    public static function generateReferenceNo(): string
    {
        return 'SENS-'.date('Y').'-'.strtoupper(substr(uniqid(), -5));
    }
}
