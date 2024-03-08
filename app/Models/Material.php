<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Material extends Model
{
    protected $fillable = [
        'name',
        'description',
        'material_category_id',
        'image',
    ];

    public function category(): BelongsTo {
       return $this->belongsTo(MaterialCategory::class, 'material_category_id', 'id');
    }

    public function getImage() {
        return Storage::url($this->image);
    }
}
