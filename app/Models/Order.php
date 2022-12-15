<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $dates = ['order_date','finish_date'];
    public $fillable = [
        'id',
        'customer_id',
        'order_date',
        'finish_date',
        'type_order',
        'table_id',
        'address_id',
        'status',
        'processed_by',
        'payment_id'
    ];
    public function hasDetail(){
        return $this->hasMany(OrderDetail::class,'order_id','id');
    }
    public function hasProcessor(){
        return $this->hasOne(User::class,'id','processed_by');
    }
    public function ofTable(){
        return $this->hasOne(Table::class,'id','table_id');
    }
    public function ofCustomer(){
        return $this->hasOne(User::class,'id','customer_id');
    }
    public function ofAddress(){
        return $this->hasOne(Address::class,'id','address_id');
    }
    public function hasPayment(){
        return $this->hasOne(Payment::class,'id','payment_id');
    }
}
