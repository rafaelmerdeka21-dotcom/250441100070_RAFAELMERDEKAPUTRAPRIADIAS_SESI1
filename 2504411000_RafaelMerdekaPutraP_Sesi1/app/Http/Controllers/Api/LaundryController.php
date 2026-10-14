<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLaundryRequest;
use App\Http\Requests\UpdateMahasiswaRequest;
use App\Models\Laundry;
use Illuminate\Http\Request;

class LaundryController extends Controller
{

    public function index(Request $request)
    {
        $mahasiswa = Laundry::with('kategori')
            ->withCount('peminjaman')
            ->when($request->filled('cari'), function ($query) use ($request) {
                $query->where('nama_layanan', 'like', '%' . $request->cari . '%')
                      ->orWhere('id', 'like', '%' . $request->cari . '%');
            })
            ->when($request->filled('kategori'), fn ($q) => $q->where('kategori_id', $request->kategori))
            ->when($request->filled('tahun'), fn ($q) => $q->where('tahun_terbit', $request->tahun))
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return response()->json($mahasiswa, 200);
    }


    public function store(StoreLaundryRequest $request)
    {
        $mahasiswa = Laundry::create($request->validated());

        return response()->json([
            'message' => 'Mahasiswa berhasil ditambahkan.',
            'data' => $mahasiswa->load('kategori')
        ], 201);
    }


    public function show($id)
    {
        $mahasiswa = Mahasiswa::with(['kategori', 'peminjaman'])->find($id);

        if (!$mahasiswa) {
            return response()->json([
                'message' => 'Not Found'
            ], 404);
        }

        return response()->json($mahasiswa, 200);
    }

    public function update(UpdateMahasiswaRequest $request, $id)
    {
        $mahasiswa = Mahasiswa::find($id);

        if (!$mahasiswa) {
            return response()->json([
                'message' => 'Not Found'
            ], 404);
        }

        $mahasiswa->update($request->validated());

        return response()->json([
            'message' => 'Mahasiswa berhasil diperbarui.',
            'data' => $mahasiswa->load('kategori')
        ], 200);
    }


    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::find($id);

        if (!$mahasiswa) {
            return response()->json([
                'message' => 'Not Found'
            ], 404);
        }

        $Laundry->delete();

        return response()->json([
            'message' => 'Pesanan berhasil dihapus.'
        ], 200);
    }
}