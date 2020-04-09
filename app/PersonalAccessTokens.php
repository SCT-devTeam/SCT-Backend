<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\PersonalAccessToken;

/**
 * App\PersonalAccessTokens
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PersonalAccessTokens newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PersonalAccessTokens newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PersonalAccessTokens query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $token
 * @property string|null $abilities
 * @property string|null $last_used_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PersonalAccessTokens whereAbilities($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PersonalAccessTokens whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PersonalAccessTokens whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PersonalAccessTokens whereLastUsedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PersonalAccessTokens whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PersonalAccessTokens whereToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PersonalAccessTokens whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PersonalAccessTokens whereUserId($value)
 * @property-read \App\User $tokenable
 * @property-read \App\User $user
 */
class PersonalAccessTokens extends PersonalAccessToken
{
   protected $table = "personal_access_tokens";

    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }

    public function tokenable()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
