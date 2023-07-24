<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['subcategory_id', 'image_path'];

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }
}
