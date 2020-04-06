<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Company
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $legal_form
 * @property string $name
 * @property int $siret
 * @property string $email
 * @property int $phone
 * @property int $street_number
 * @property string $street_name
 * @property int $zipcode
 * @property string $city
 * @property int $capital_in_cents
 * @property string $insurance
 * @property string $bban
 * @property int $bban_anytmie
 * @property int $default_revive_delay_in_days
 * @property int $default_payment_delay_in_days
 * @property string $default_payment_terms
 * @property string $default_payment_method
 * @property int $default_down_payment_percentage
 * @property int $default_quote_validity_delay_in_days
 * @property string $default_quote_accepting_conditions
 * @property string $default_invoice_notice
 * @property string $default_quote_notice
 * @property string $notes
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereBban($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereBbanAnytmie($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereCapitalInCents($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereDefaultDownPaymentPercentage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereDefaultInvoiceNotice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereDefaultPaymentDelayInDays($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereDefaultPaymentMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereDefaultPaymentTerms($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereDefaultQuoteAcceptingConditions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereDefaultQuoteNotice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereDefaultQuoteValidityDelayInDays($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereDefaultReviveDelayInDays($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereInsurance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereLegalForm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereSiret($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereStreetName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereStreetNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereZipcode($value)
 */
class Company extends Model
{
    protected $table = "companies";
    protected $primaryKey = 'id';
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = [
        'legal_form','name','siret', 'email', 'phone', 'street_number','street_name', 'zipcode', 'city',
        'capital_in_cents','insurance', 'bban', 'bban_anytmie', 'default_revive_delay_in_days',
        'default_payment_delay_in_days', 'default_payment_terms', 'default_payment_method',
        'default_down_payment_percentage', 'default_quote_validity_delay_in_days', 'default_quote_accepting_conditions',
        'default_invoice_notice', 'default_quote_notice', 'notes'];

    /**
     * @var array
     */
    protected $hidden = ['id'];



}
