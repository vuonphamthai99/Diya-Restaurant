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
        'people',
        'customer_id',
        'table_preserve_id',
        'user_confirmed_id',
        'status',
        'message',
        'response',
    ];

    public function ofCustomer(){
        return $this->hasOne(User::class,'id','customer_id');
    }
    public function ProcessedBy(){
        return $this->hasOne(User::class,'id','user_confirmed_id');
    }
    public function ofTable(){
        return $this->hasOne(Table::class,'id','table_preserve_id');
    }
}
