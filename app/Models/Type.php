<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $fillable = [
        'id',
        'name',
        'description',
    ];
    public function hasMenus(){
        return $this->hasMany(MenuItem::class,'type_id','id');
    }

}
