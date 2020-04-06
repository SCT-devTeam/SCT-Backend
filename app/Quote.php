<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    protected $table = "quotes";
    protected $primaryKey = "id";
    public $timestamps = false;

    protected $fillable = [
        'company_id',
        'customer_id',
        'qualification',
        'edition_date',
        'validity_delay_in_days',
        'payment_delay_in_days',
        'payment_terms',
        'payment_method',
        'down_payment_percentage',
        'notice',
        'accepting_conditions',
        'sending_date',
        'revived_date',
        'last_qualification_date',
    ];
}
