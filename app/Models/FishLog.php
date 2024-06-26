<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FishLog extends Model
{
    protected $fillable = [
        'fish',
        'image',
        'weight',
        'mass_unit',
        'fish_length',
        'length_unit',
        'rod',
        'rod_length',
        'rod_weight',
        'reel',
        'reel_weight',
        'line',
        'line_type',
        'line_weight',
        'tippet',
        'tippet_weight',
        'fly',
        'fly_category',
        'hook_size',
        'location',
        'weather',
        'day_time',
        'precise_time',
        'water_clarity',
        'water_movement',
        'visibility',
        'note',
        'user_id'
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

}
