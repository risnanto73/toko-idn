<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\This;

class Produk extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $fillable = [
        'id',
        'nama_produk',
        'kategori_id',
        'harga',
        'sedia',
        'berat',
        'gambar',
        'slug',
    ];

    public function kategori(){
        return $this->belongsTo(Kategori::class);
    }
    public function details(){
        return $this->hasMany(DetailPesanan::class,'id','produk_id');
    }
}
