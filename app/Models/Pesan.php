<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['produkId'];

    public function produkId()
    {
        return $this->belongsTo(Produk::class, 'produks_id');
    }
}
