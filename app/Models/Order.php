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
        'status',
        'processed_by'
    ];
    public function hasDetail(){
        return $this->hasMany(OrderDetail::class,'order_id','id');
    }
    public function hasProcessor(){
        return $this->hasOne(User::class,'id','processed_by');
    }
}
