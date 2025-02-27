<?php

namespace App\Models;

use App\Events\ChirpCreated;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Chirp extends Model
{
    //
    protected $fillable = ["message",];

    protected $dispatchEvents = [
        "created" => ChirpCreated::class
    ];

    function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
