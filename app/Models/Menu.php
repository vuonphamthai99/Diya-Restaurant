<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $table = 'menu';
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $fillable = [
        'id',
        'name',
        'price',
        'type_id',
        'image_id',
        'ingredients',
        'status'
    ];
    public function hasStatus(){
        return $this->hasOne(Status::class,'id','status');
    }
    public function hasImage(){
        return $this->hasOne(Image::class,'id','image_id');
    }
    public function hasType(){
        return $this->hasOne(Type::class,'id','type_id');
    }
}
