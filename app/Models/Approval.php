<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Approval extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'location_id',
        'doc_approval',
        'kpnl_approval',
        'central_approval',
        'description'
    ];
}
