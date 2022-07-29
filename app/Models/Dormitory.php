<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dormitory extends Model
{
    protected $fillable = [
        'name',
        'user_id',
        'roomNumber',
        'address',
        'telephone',
        'description',
    ];
    use HasFactory;
    public function rooms(){
        return $this->hasMany(Room::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
