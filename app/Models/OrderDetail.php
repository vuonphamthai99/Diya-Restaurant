<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $fillable = [
        'id',
        'order_id',
        'menu_id',
        'quantity',
        'order_time'
    ];
    public function ofMenu(){
        return $this->hasOne(MenuItem::class,'id','menu_id');
    }
}
