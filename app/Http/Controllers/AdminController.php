<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Beasiswa; // Pastikan Anda memiliki model Beasiswa
use App\Models\Lomba; // Pastikan Anda memiliki model Lomba
use Barryvdh\DomPDF\Facade as PDF;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function tambahBeasiswa()
    {
        return view('admin.tambah_beasiswa');
    }

    public function storeBeasiswa(Request $request)
    {
        $validatedData = $request->validate([
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
            'poster' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('poster')) {
            $imageName = time() . '.' . $request->poster->extension();
            $request->poster->move(public_path('assets/images/poster_beasiswa'), $imageName);
            $validatedData['poster'] = 'assets/images/poster_beasiswa/' . $imageName;
        }

        Beasiswa::create($validatedData);

        return redirect()->route('admin.daftar_beasiswa')->with('success', 'Beasiswa berhasil ditambahkan');
    }

    public function tambahLomba()
    {
        return view('admin.tambah_lomba');
    }

    public function daftarLomba(Request $request)
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

        return view('admin.daftar_lomba', ['lomba' => $lomba]);
    }

    public function daftarBeasiswa(Request $request)
    {
        $query = Beasiswa::query();

        if ($request->has('search') && $request->search != '') {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
        }

        if ($request->has('bulan') && $request->bulan != '') {
            $query->where('bulan', $request->bulan);
        }

        $beasiswa = $query->get();

        return view('admin.daftar_beasiswa', ['beasiswa' => $beasiswa]);
    }

    public function hapusLomba($id)
    {
        $lomba = Lomba::findOrFail($id);
        $lomba->delete();

        return redirect()->route('admin.daftar_lomba')->with('success', 'Lomba berhasil dihapus');
    }

    public function historiLogin()
    {
        $users = User::select('name', 'email', 'role', 'last_login_at')->get();
        return view('admin.histori_login', ['users' => $users]);
    }

    public function hapusBeasiswa($id)
    {
        $beasiswa = Beasiswa::findOrFail($id);
        $beasiswa->delete();

        return redirect()->route('admin.daftar_beasiswa')->with('success', 'Beasiswa berhasil dihapus');
    }

    public function storeLomba(Request $request)
    {
        $validatedData = $request->validate([
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
            'poster' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tanggal_pelaksanaan' => 'required|date'
        ]);

        if ($request->hasFile('poster')) {
            $imageName = time() . '.' . $request->poster->extension();
            $request->poster->move(public_path('assets/images/poster_lomba'), $imageName);
            $validatedData['poster'] = 'assets/images/poster_lomba/' . $imageName;
        }

        Lomba::create($validatedData);

        return redirect()->route('admin.daftar_lomba')->with('success', 'Lomba berhasil ditambahkan');
    }

    public function editLomba($id)
    {
        $lomba = Lomba::findOrFail($id);
        $formattedDate = $lomba->tanggal_pelaksanaan ? $lomba->tanggal_pelaksanaan->format('Y-m-d') : null;
        return view('admin.edit_lomba', compact('lomba', 'formattedDate'));
    }

    public function editBeasiswa($id)
    {
        $beasiswa = Beasiswa::findOrFail($id);
        // $formattedDate = $beasiswa->tanggal_pelaksanaan ? $lomba->tanggal_pelaksanaan->format('Y-m-d') : null;
        return view('admin.edit_beasiswa', compact('beasiswa'));
    }

    public function downloadLoginHistoryTxt()
    {
        $users = User::all(); // Sesuaikan query sesuai kebutuhan
        $txtContent = "";

        foreach ($users as $user) {
            $txtContent .= "Nama: {$user->name}, Email: {$user->email}, Role: {$user->role}, Terakhir Login: " . ($user->last_login_at ? $user->last_login_at->format('Y-m-d H:i:s') : 'Belum pernah login') . "\n";
        }

        return response($txtContent)
            ->header('Content-Type', 'text/plain')
            ->header('Content-Disposition', 'attachment; filename="histori_login.txt"');
    }

    public function updateBeasiswa(Request $request, $id)
    {
        $beasiswa = Beasiswa::findOrFail($id);
        if ($request->hasFile('poster')) {
            $file = $request->file('poster');
            $destinationPath = 'assets/images/poster_lomba';  // Tentukan path direktori tujuan
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move($destinationPath, $filename);
            $lomba->poster = $destinationPath . '/' . $filename ;  // Simpan lokasi file di database
        }
        $lomba->update($request->all());
        return redirect()->route('admin.daftar_beasiswa')->with('success', 'Data beasiswa berhasil diperbarui.');
    }

    public function updateLomba(Request $request, $id)
    {
        $lomba = Lomba::findOrFail($id);
        if ($request->hasFile('poster')) {
            $file = $request->file('poster');
            $destinationPath = 'assets/images/poster_lomba';  // Tentukan path direktori tujuan
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move($destinationPath, $filename);
            $lomba->poster = $destinationPath . '/' . $filename ;  // Simpan lokasi file di database
        }
        $lomba->update($request->all());
        return redirect()->route('admin.daftar_lomba')->with('success', 'Data lomba berhasil diperbarui.');
    }
}
