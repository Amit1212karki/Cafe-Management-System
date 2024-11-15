<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    protected $fillable = [
        'user_id',
        'member_id',
        'bill_no',
        'bill_amount',
        'points',
    ];

    public function user()
{
    return $this->belongsTo(User::class);
    return $this->belongsTo(Member::class);

}
}

