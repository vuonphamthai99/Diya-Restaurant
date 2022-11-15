<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    public $timestamps = false;
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
        return $this->hasOne(OrderDetail::class,'order_id','id');
    }
}
