<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'payment_id',
        'payer_email',
        'amount',
        'currency',
        'payment_status',
        'user_id',
        
    ];

public function users(){
    return $this->belongsTo(User::class);
}
}
