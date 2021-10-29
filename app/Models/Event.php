<?php

namespace App\Models;

use App\Traits\WithUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    use WithUuid;

    protected $fillable = [
        'uuid',
        'user_id',
        'event_name',
        'event_venue',
        'event_date',
        'event_time',
        'event_details',
    ];

    protected $casts = [
        'event_date' => 'date',
    ];
}
