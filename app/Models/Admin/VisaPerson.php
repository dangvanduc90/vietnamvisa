<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class VisaPerson extends Model
{
    protected $table = 'visa_persons';

    protected $fillable = [
        'month_id',
        'urgent_id',
        'person_number',
        'person_text',
        'country_allow',
        'person_fee',
    ];

    protected $with = ['month'];

    public function month()
    {
        return $this->hasOne('App\Models\Admin\VisaMonth', 'id', 'month_id')->withDefault();
    }
}
