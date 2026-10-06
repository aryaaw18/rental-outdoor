<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Equipment;

class Reservation extends Model
{
    protected $fillable = [
        'user_id',
        'equipment_id',
        'start_date',
        'end_date',
        'quantity',
        'total_price',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function equipment()
    {
        return $this->belongsTo(Equipment::class);
    }
}