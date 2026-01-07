<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Phone extends Model
{
    
    use HasFactory;

    protected $fillable = [
        'phone',
        'is_primary',
    ];

    public function phoneable()
    {
        return $this->morphTo();
    }
}
