<?php

namespace App\Http\Controllers;

use App\Models\Village;
use Illuminate\Http\Request;

class VillageController extends Controller
{


    public function index()
    {
        // Tampilkan daftar desa
        $villages = Village::all();
        return response()->json($villages);
    }

    public function create(Request $request)
    {
        // Tampilkan form untuk membuat desa baru
        $data = $request->all();
        // Lakukan sesuatu dengan data
        return response()->json('Create form');
    }

    public function store(Request $request)
    {
        // Simpan desa baru ke dalam basis data
        Village::create($request->all());
        $response = response()->json('Village created', 201);
        $response->header('X-CSRF-TOKEN', $request->session()->token());
        return $response;
    }

    public function show($id)
    {
        // Tampilkan detail desa berdasarkan ID
        $village = Village::findOrFail($id);
        return response()->json($village);
    }

    public function edit($id)
    {
        // Tampilkan form untuk mengedit desa berdasarkan ID
        // Anda dapat menyesuaikan logika ini sesuai dengan kebutuhan Anda
        return response()->json('Edit form');
    }

    public function update(Request $request, $id)
    {
        // Update desa berdasarkan ID
        $village = Village::findOrFail($id);
        $village->update($request->all());
        return response()->json('Village updated');
    }

    public function destroy($id)
    {
        // Hapus desa berdasarkan ID
        $village = Village::findOrFail($id);
        $village->delete();

        return response()->json('Village deleted');
    }
}
