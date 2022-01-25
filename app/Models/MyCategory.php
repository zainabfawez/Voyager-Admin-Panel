<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyCategory extends Model
{
    use HasFactory;

    public function kits()
    {
        return $this->belongsToMany(Kit::class, 'category_kit', 'category_id', 'kit_id');
    }
}
