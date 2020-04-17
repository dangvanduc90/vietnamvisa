<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class VisaMonth extends Model
{
    protected $table = 'visa_months';

    protected $fillable = [
        'month_text',
        'month_number',
        'purpose_id',
        'month_fee',
    ];

    protected $with = ['purpose'];

    public function purpose()
    {
        return $this->hasOne('App\Models\Admin\VisaPurpose', 'id', 'purpose_id')->withDefault();
    }
}
