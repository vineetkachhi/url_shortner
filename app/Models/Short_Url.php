<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Short_Url extends Model
{
    protected $table = 'short_urls';

    protected $fillable = [
        'original_url',
        'short_code',
        'company_id',
        'user_id',
        'clicks',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
