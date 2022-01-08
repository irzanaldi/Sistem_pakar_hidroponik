<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnsurHara extends Model
{
    use HasFactory;

    public $fillable = ['nama'];

    public function Gejalas()
    {
        return $this->hasMany(Gejala::class);
    }
}
