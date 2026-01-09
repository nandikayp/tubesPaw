<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documents extends Model
{
    /** @use HasFactory<\Database\Factories\DocumentsFactory> */
    use HasFactory;
    protected $guarded = [];

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }
}
