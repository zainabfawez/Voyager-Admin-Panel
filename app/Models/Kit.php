<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kit extends Model
{
    use HasFactory;

    protected $table = 'kits';

    protected $fillable = [
        'name',
        'user_id',
    ];

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categories()
    {
        return $this->belongsToMany(MyCategory::class, 'category_kit', 'kit_id', 'my_category_id');
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'kit_order', 'kit_id', 'order_id');
    }
}
