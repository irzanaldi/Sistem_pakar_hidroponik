<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gejala extends Model
{
    use HasFactory;

    public $fillable = ['bagian_tanamen_id', 'unsur_id', 'tanamen_id', 'name'];

    public function bagianTanamen()
    {
        return $this->belongsTo(BagianTanaman::class);
    }

    public function unsur()
    {
        return $this->belongsTo(UnsurHara::class);
    }

    public function tanamen()
    {
        return $this->belongsTo(Tanaman::class);
    }

}
