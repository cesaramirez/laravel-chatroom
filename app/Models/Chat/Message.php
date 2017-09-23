<?php

namespace App\Models\Chat;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['body'];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['selfOwned'];

    /**
     * Get message owned to user
     * @return boolean
     */
    public function getSelfOwnedAttribute()
    {
        return $this->user_id === auth()->user()->id;
    }
    
    /**
     * Message related with user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
