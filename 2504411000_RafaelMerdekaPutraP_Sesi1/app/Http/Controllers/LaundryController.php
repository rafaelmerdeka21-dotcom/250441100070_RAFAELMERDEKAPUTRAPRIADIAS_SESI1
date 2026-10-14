<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;

class LaundryController extends Controller
{
        public function index()
    {
        $daftarLaundry = Layanan::all()->map(fn (Layanan $layanan) => [
            'id' => $layanan->id,
            'kode_layanan' => $layanan->nama,
            'nama_layanan' => $layanan->nim,
            'jenis' => $layanan->jenis,
            'tarif_per_satuan' => $layanan->tarif_per_satuan,
            
        ])->toArray();

        return view('layanan.index', compact('daftarLayanan'));
    }
}
