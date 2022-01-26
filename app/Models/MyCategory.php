<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyCategory extends Model
{
    use HasFactory;
    protected $table = 'my_categories';

    public function kits()
    {
        return $this->belongsToMany(Kit::class, 'category_kit', 'my_category_id', 'kit_id');
    }
}
