<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Beasiswa;

class BeasiswaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $bulan = $request->input('bulan');

        $beasiswa = Beasiswa::query();

        if ($search) {
            $beasiswa->where('name', 'like', '%' . $search . '%');
        }

        if ($bulan) {
            $beasiswa->where('bulan', $bulan);
        }

        $beasiswa = $beasiswa->get();

        return view('beasiswa.index', compact('beasiswa'));
    }

    public function create()
    {
        return view('beasiswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'provider' => 'required',
            'status' => 'required',
            'description' => 'required',
            'field_of_study' => 'required',
            'country' => 'required',
            'eligibility_criteria' => 'required',
            'education_level' => 'required',
            'benefits' => 'required',
            'selection_process' => 'required',
            'document_requirements' => 'required',
            'language_requirements' => 'required',
            'application_method' => 'required',
            'guide_book' => 'required',
            'official_website' => 'required',
            'bulan' => 'required',
            'poster' => 'nullable|image',
        ]);

        $data = $request->all();
        if ($request->hasFile('poster')) {
            $data['poster'] = $request->file('poster')->store('posters', 'public');
        }
        $data['tanggal_pelaksanaan'] = $request->input('tanggal_pelaksanaan', now());

        Beasiswa::create($data);

        return redirect()->route('daftar_beasiswa')->with('success', 'Beasiswa berhasil ditambahkan');
    }

    public function edit($id)
    {
        $beasiswa = Beasiswa::findOrFail($id);
        return view('admin.edit_beasiswa', compact('beasiswa'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'provider' => 'required',
            'status' => 'required',
            'description' => 'required',
            'field_of_study' => 'required',
            'country' => 'required',
            'eligibility_criteria' => 'required',
            'education_level' => 'required',
            'benefits' => 'required',
            'selection_process' => 'required',
            'document_requirements' => 'required',
            'language_requirements' => 'required',
            'application_method' => 'required',
            'guide_book' => 'required',
            'official_website' => 'required',
            'bulan' => 'required',
            'poster' => 'nullable|image',

        ]);

        $beasiswa = Beasiswa::findOrFail($id);
        $data = $request->except('poster');


        if ($request->hasFile('poster')) {
            $data['poster'] = $request->file('poster')->store('posters', 'public');
        }

        $data['tanggal_pelaksanaan'] = $request->input('tanggal_pelaksanaan', now());

        // $beasiswa = Beasiswa::find($id);
        $beasiswa->update($data);

        return redirect()->route('admin.daftar_beasiswa')->with('success', 'Beasiswa berhasil diperbarui');
    }

    public function destroy($id)
    {
        $beasiswa = Beasiswa::find($id);
        $beasiswa->delete();

        return redirect()->route('admin.daftar_beasiswa')->with('success', 'Beasiswa berhasil dihapus');
    }
}
