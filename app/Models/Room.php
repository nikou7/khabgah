<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'no',
        'capacity',
        'remaining_capacity',
        'dormitory_id',
    ];
    use HasFactory;
    public function dormitory()
    {
        return $this->belongsTo(Dormitory::class);
    }
    public function requests(){
        return $this->hasMany(Request::class);
    }
    public function roomItems(){
        return $this->hasMany(RoomItem::class);
    }
}
