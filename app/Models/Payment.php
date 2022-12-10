<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $fillable = [
        'id',
        'payment_id_code',
        'paypal_payer_id',
        'payer_email',
        'amount',
        'currency',
        'payment_status'
    ];

}
