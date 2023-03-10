<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $fillable = [
        'id',
        'code',
        'capacity',
        'status'
    ];

    public function hasOrder(){
        return $this->hasOne(Order::class,'table_id','id');
    }
    public function hasReservation(){
        return $this->hasMany(Reservation::class,'table_preserve_id','id');
    }
}
