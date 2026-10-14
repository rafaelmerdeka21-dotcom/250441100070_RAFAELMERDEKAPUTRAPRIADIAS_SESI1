<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;
    protected $fillable = ['id','nama_layanan'];

    protected function casts(): array 
    { 
        return [ 
            'status_aktif'   => 'boolean', 
            'tanggal_dibuka' => 'datetime', 
        ]; 
    } 
}

