<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    public function kit()
    {
        return $this->belongsTo(Kit::class);
    }

    protected $fillable = [
        'name', 'kit_id'
    ];
}
