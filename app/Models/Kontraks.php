<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontraks extends Model
{
    use HasFactory;
    protected $guarded = ['mana'];

    public function Kontraks()
    {
        return $this->belongsTo('App\Models\Kontraks');
    }
}
