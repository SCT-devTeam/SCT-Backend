<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Quote
 *
 * @property int $id
 * @property int $company_id
 * @property int $customer_id
 * @property string $qualification
 * @property string $edition_date
 * @property int $validity_delay_in_days
 * @property int $payment_delay_in_days
 * @property string $payment_terms
 * @property string $payment_method
 * @property int $down_payment_percentage
 * @property string $notice
 * @property string $accepting_conditions
 * @property string $sending_date
 * @property string $revived_date
 * @property string $last_qualification_date
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Quote newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Quote newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Quote query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Quote whereAcceptingConditions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Quote whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Quote whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Quote whereDownPaymentPercentage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Quote whereEditionDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Quote whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Quote whereLastQualificationDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Quote whereNotice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Quote wherePaymentDelayInDays($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Quote wherePaymentMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Quote wherePaymentTerms($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Quote whereQualification($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Quote whereRevivedDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Quote whereSendingDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Quote whereValidityDelayInDays($value)
 * @mixin \Eloquent
 */
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
