<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Aduan;
use App\Models\Zona;
use App\Models\Rating;
use Illuminate\Support\Facades\Storage;

class AduanController extends Controller
{
    /**
     * Store aduan oleh mahasiswa
     * PATCH WAJIB:
     * 1. Cegah duplikasi aduan yang BELUM selesai pada zona yang sama oleh user yang sama.
     * 2. Pastikan mahasiswa hanya bisa membuat aduan baru jika tidak ada aduan aktif.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        if (!$user || $user->role !== 'mahasiswa') {
            abort(403, 'Akses ditolak.');
        }

        $request->validate([
            'zona_id' => 'required|exists:zonas,id',
            'keterangan' => 'required|string',
            'gambar' => 'required|image|max:4096'
        ]);

        // PATCH WAJIB: Cek apakah user masih punya aduan aktif di zona yang sama
        $aduanAktif = Aduan::where('user_id', $user->id)
            ->where('zona_id', $request->zona_id)
            ->whereIn('status', ['diadukan', 'diproses'])
            ->first();

        if ($aduanAktif) {
            return back()->with('error', 'Anda masih memiliki aduan aktif pada zona ini.');
        }

        // Simpan gambar
        $gambarPath = $request->file('gambar')->store('aduan', 'public');

        // Buat aduan baru
        $aduan = Aduan::create([
            'user_id' => $user->id,
            'zona_id' => $request->zona_id,
            'keterangan' => $request->keterangan,
            'gambar' => $gambarPath,
            'status' => 'diadukan',
        ]);

        return back()->with('success', 'Aduan berhasil dibuat.');
    }

    /**
     * Staf memberi status "diproses"
     */
    public function proses($id)
    {
        $user = Auth::user();
        if (!$user || $user->role !== 'staf') {
            abort(403, 'Akses ditolak.');
        }

        $aduan = Aduan::findOrFail($id);

        if ($aduan->status !== 'diadukan') {
            return back()->with('error', 'Aduan tidak dalam status "diadukan".');
        }

        $aduan->status = 'diproses';
        $aduan->save();

        return back()->with('success', 'Aduan diproses.');
    }

    /**
     * Staf menyelesaikan aduan
     */
    public function selesai(Request $request, $id)
    {
        $user = Auth::user();
        if (!$user || $user->role !== 'staf') {
            abort(403, 'Akses ditolak.');
        }

        $request->validate([
            'bukti_selesai' => 'required|image|max:4096'
        ]);

        $aduan = Aduan::findOrFail($id);

        if ($aduan->status !== 'diproses') {
            return back()->with('error', 'Aduan harus dalam status "diproses" terlebih dulu.');
        }

        // Simpan gambar bukti
        $path = $request->file('bukti_selesai')->store('bukti_selesai', 'public');

        $aduan->bukti_selesai = $path;
        $aduan->status = 'perbaikan selesai';
        $aduan->save();

        return back()->with('success', 'Aduan telah ditandai selesai.');
    }

    /**
     * Mahasiswa memberi rating
     */
    public function rating(Request $request, $id)
    {
        $user = Auth::user();
        if (!$user || $user->role !== 'mahasiswa') {
            abort(403, 'Akses ditolak.');
        }

        $request->validate([
            'value' => 'required|integer|min:1|max:5'
        ]);

        $aduan = Aduan::findOrFail($id);

        if ($aduan->status !== 'perbaikan selesai') {
            return back()->with('error', 'Hanya aduan yang telah selesai yang dapat diberi rating.');
        }

        // PATCH WAJIB: Cegah rating duplikat oleh mahasiswa yang sama
        $exists = Rating::where('aduan_id', $aduan->id)
                        ->where('user_id', $user->id)
                        ->exists();

        if ($exists) {
            return back()->with('error', 'Anda sudah memberi rating pada aduan ini.');
        }

        Rating::create([
            'aduan_id' => $aduan->id,
            'user_id' => $user->id,
            'value' => $request->value,
        ]);

        // PATCH: update aggregasi zona
        $zona = $aduan->zona;
        if ($zona) {
            $zona->recalcRatingAggregate();
        }

        return back()->with('success', 'Terima kasih, rating berhasil dikirim.');
    }
}
