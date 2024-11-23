<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'type', 'serial_number' ];

    public function gatePasses()
    {
        return $this->hasMany(GatePass::class); // Define the relationship to GatePass
    }
}
