<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Lomba;
use Illuminate\Http\Request;

class LombaController extends Controller
{
    public function index(Request $request)
    {
        $query = Lomba::query();

        if ($request->has('search') && $request->search != '') {
            $query->where('nama_lomba', 'like', '%' . $request->search . '%');
        }

        if ($request->has('bulan') && $request->bulan != '') {
            $query->whereMonth('tanggal_pelaksanaan', $request->bulan);
        }

        $lomba = $query->get();

        return view('lomba.index', compact('lomba'));
    }

    public function create()
    {
        return view('lomba.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lomba' => 'required',
            'jenis_lomba' => 'required',
            'status' => 'required',
            'deskripsi' => 'required',
            'timeline' => 'required',
            'ketentuan' => 'required',
            'biaya' => 'required',
            'link_pendaftaran' => 'required',
            'link_guidebook' => 'required',
            'kontak' => 'required',
            'poster' => 'nullable|image',
            'tanggal_pelaksanaan' => 'required|date'
        ]);

        $data = $request->all();
        if ($request->hasFile('poster')) {
            $data['poster'] = $request->file('poster')->store('posters', 'public');
        }
        $data['tanggal_pelaksanaan'] = $request->input('tanggal_pelaksanaan', now());

        Lomba::create($data);

        return redirect()->route('admin.daftar_lomba')->with('success', 'Lomba berhasil ditambahkan');
    }

    public function edit($id)
    {
        $lomba = Lomba::findOrFail($id);
        return view('admin.edit_lomba', compact('lomba'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_lomba' => 'required',
            'jenis_lomba' => 'required',
            'status' => 'required',
            'deskripsi' => 'required',
            'timeline' => 'required',
            'ketentuan' => 'required',
            'biaya' => 'required',
            'link_pendaftaran' => 'required',
            'link_guidebook' => 'required',
            'kontak' => 'required',
            'poster' => 'nullable|image',
            'tanggal_pelaksanaan' => 'required|date'
        ]);

        $lomba = Lomba::findOrFail($id);
        $data = $request->except('poster');

        if ($request->hasFile('poster')) {
            $data['poster'] = $request->file('poster')->store('posters', 'public');
        }

        $data['tanggal_pelaksanaan'] = $request->input('tanggal_pelaksanaan', now());

        $lomba->update($data);

        return redirect()->route('admin.daftar_lomba')->with('success', 'Lomba berhasil diupdate');
    }

    public function destroy($id)
    {
        $lomba = Lomba::findOrFail($id);
        $lomba->delete();

        return redirect()->route('admin.daftar_lomba')->with('success', 'Lomba berhasil dihapus');
    }

    public function daftarLombapencari(Request $request)
    {
        $query = Lomba::query();

        if ($request->has('search') && $request->search != '') {
            $query->where('nama_lomba', 'like', '%' . $request->search . '%')
                  ->orWhere('deskripsi', 'like', '%' . $request->search . '%');
        }

        if ($request->has('bulan') && $request->bulan != '') {
            $query->whereMonth('tanggal_pelaksanaan', '=', $request->bulan);
        }

        $lomba = $query->get();

        return view('lomba.index', ['lomba' => $lomba]);
    }
}
