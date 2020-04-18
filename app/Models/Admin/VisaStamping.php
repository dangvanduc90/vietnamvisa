<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class VisaStamping extends Model
{
    protected $fillable = [
        'month_id',
        'fee',
    ];

    public function month()
    {
        return $this->hasOne('App\Models\Admin\VisaMonth', 'id', 'month_id')->withDefault();
    }
}
