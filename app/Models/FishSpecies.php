<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class FishSpecies extends Model
{
    protected $fillable = [
        'name',
        'description',
        'tactics',
        'water',
        'environment',
        'image',
        'fish_species_category_id',
    ];

    public function getImage() {
        return Storage::url($this->image);
    }

    public function category(): BelongsTo {
        return $this->belongsTo(FishSpeciesCategory::class, 'fish_species_category_id', 'id');
    }

}
