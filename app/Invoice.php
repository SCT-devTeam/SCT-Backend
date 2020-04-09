<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Invoice
 *
 * @property int $id
 * @property int $company_id
 * @property int $customer_id
 * @property string $qualification
 * @property string $edition_date
 * @property string $payment_date
 * @property int $payment_delay_in_days
 * @property string $payment_terms
 * @property string $notice
 * @property string $payment_method
 * @property string $sending_date
 * @property string $revived_date
 * @property string $last_qualification_date
 * @property string $chasing_date
 * @property string $note
 * @property int $original_quote
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Invoice newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Invoice newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Invoice query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Invoice whereChasingDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Invoice whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Invoice whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Invoice whereEditionDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Invoice whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Invoice whereLastQualificationDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Invoice whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Invoice whereNotice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Invoice whereOriginalQuote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Invoice wherePaymentDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Invoice wherePaymentDelayInDays($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Invoice wherePaymentMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Invoice wherePaymentTerms($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Invoice whereQualification($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Invoice whereRevivedDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Invoice whereSendingDate($value)
 * @mixin \Eloquent
 */
class Invoice extends Model
{
    public $timestamps = false;
    protected $table = "invoices";
    protected $primaryKey = "id";
    protected $fillable = [
        'company_id',
        'customer_id',
        'qualification',
        'edition_date',
        'payment_date',
        'payment_delay_in_days',
        'payment_terms',
        'notice',
        'payment_method',
        'sending_date',
        'revived_date',
        'last_qualification_date',
        'chasing_date',
        'note',
        'original_quote',
    ];
}
