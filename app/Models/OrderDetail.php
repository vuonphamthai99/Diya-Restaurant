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
        'no_of_serving',
    ];
    public function ofMenu(){
        return $this->hasOne(Menu::class,'id','menu_id');
    }
}
