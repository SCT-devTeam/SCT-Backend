<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Customer
 *
 * @property int $id
 * @property string $customer_type
 * @property string $status
 * @property string $meeting_date
 * @property string $company_name
 * @property int $siret
 * @property string $tva_number
 * @property string $firstname
 * @property string $lastname
 * @property int $street_number
 * @property string $street_name
 * @property int $zipcode
 * @property string $city
 * @property string $note
 * @property string $default_payment_method
 * @property int $company
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereCompanyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereCustomerType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereDefaultPaymentMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereFirstname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereLastname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereMeetingDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereSiret($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereStreetName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereStreetNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereTvaNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereZipcode($value)
 * @mixin \Eloquent
 */
class Customer extends Model
{
    public $timestamps = false;
    protected $table = "customers";
    protected $primaryKey = 'id';
    /**
     * @var array
     */
    protected $fillable = [
        'customer_type',
        'status',
        'meeting_date',
        'company_name',
        'siret',
        'tva_number',
        'firstname',
        'lastname',
        'street_number',
        'street_name',
        'zipcode',
        'city',
        'note',
        'default_payment_method',
    ];

    protected $hidden = ['id'];


}
