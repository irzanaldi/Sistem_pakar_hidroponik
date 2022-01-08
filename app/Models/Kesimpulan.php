<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kesimpulan extends Model
{
    use HasFactory;

    public $fillable = ['name', 'unsur_id'];

    public function UnsurHara()
    {
        return $this->belongsTo(UnsurHara::class);
    }
}
