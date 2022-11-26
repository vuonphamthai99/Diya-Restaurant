<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $dates = ['created_at','reservation_time'];
    public $fillable = [
        'id',
        'created_at',
        'reservation_time',
        'reservation_hour',
        'people',
        'customer_id',
        'message',
        'status',
    ];

}
