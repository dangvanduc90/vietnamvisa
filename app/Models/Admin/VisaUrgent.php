<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class VisaUrgent extends Model
{
    protected $fillable = [
        'purpose_id',
        'day_number',
        'day_text',
        'fee',
    ];

    protected $with = ['purpose'];

    public function purpose()
    {
        return $this->hasOne('App\Models\Admin\VisaPurpose', 'id', 'purpose_id')->withDefault();
    }
}
