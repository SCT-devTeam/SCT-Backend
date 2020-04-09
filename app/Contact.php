<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Contact
 *
 * @property int $id
 * @property string $gender
 * @property string $firstname
 * @property string $lastname
 * @property string $job
 * @property string $email
 * @property int $phone_mobile
 * @property int $phone_fix
 * @property int $phone_personnal
 * @property int $phone_fax
 * @property string $notes
 * @property int $customer
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contact newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contact newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contact query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contact whereCustomer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contact whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contact whereFirstname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contact whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contact whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contact whereJob($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contact whereLastname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contact whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contact wherePhoneFax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contact wherePhoneFix($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contact wherePhoneMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contact wherePhonePersonnal($value)
 * @mixin \Eloquent
 */
class Contact extends Model
{
    public $timestamps = false;
    protected $table = "contacts";
    protected $primaryKey = "id";
    protected $fillable = [
        'gender',
        'firstname',
        'lastname',
        'job',
        'email',
        'phone_mobile',
        'phone_fix',
        'phone_personnal',
        'phone_fax',
        'notes',
    ];
}
