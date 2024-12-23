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
        'rental_approval',
        'detail_location',
        'request_type',
        'description'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function billings()
    {
        return $this->hasMany(Billing::class);
    }
}
