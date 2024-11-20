<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dispatch extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'gate_pass_id', 'dispatched_to'];

    public function gatePass()
    {
        return $this->belongsTo(GatePass::class);
    }

}
