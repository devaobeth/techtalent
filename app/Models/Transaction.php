<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    public function location(){
        return $this->belongsTo(Location::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function scopeSuccess($query)
    {
        return $query->where('status', 'Success');
    }
    public function scopePending($query)
    {
        return $query->where('status', 'Pending');
    }
    public function scopeFailed($query)
    {
        return $query->where('status', 'Failed');
    }

}
