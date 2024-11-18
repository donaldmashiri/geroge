<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GatePass extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'description', 'status', 'asset_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
