<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $fillable = [
        'id',
        'address',
        'feeShip',
        'distance',
        'phone',
        'name',
        'user_id',
    ];

    public function ofUser(){
        return $this->hasOne(User::class,'id','user_id');
    }
}
