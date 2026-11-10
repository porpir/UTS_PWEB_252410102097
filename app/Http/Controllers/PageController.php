<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function prosesLogin(Request $request)
    {
        $request->validate([
            'username' => 'required|min:3',
            'password' => 'required',
        ]);

        $username = $request->input('username');
        return redirect()->route('dashboard', ['username' => $username]);
    }

    public function dashboard(Request $request)
    {
        $username = $request->query('username', 'Pengunjung');
        
        $ringkasan = [
            'total_menu' => 5,
            'stok_tersedia' => 110,
            'kategori_aktif' => 3
        ];

        $fokusOperasional = [
            [
                'tugas' => 'Pengecekan persediaan rempah herbal pagi',
                'selesai' => true
            ],
            [
                'tugas' => 'Update data stok Es Bunga Telang (25 Cup)',
                'selesai' => true
            ],
            [
                'tugas' => 'Restock kemasan cup 16oz & sedotan ramah lingkungan',
                'selesai' => false
            ],
            [
                'tugas' => 'Rekap kasir & pembukuan sore (16:00 WIB)',
                'selesai' => false
            ]
        ];

        $rekomendasiHarian = [
            'judul' => 'REKOMENDASI HARI INI',
            'pesan' => 'Varian Es Bunga Telang Lemon dan Es Kunyit Asam Jawa paling diminati di cuaca siang hari. Pastikan stok es batu dan bahan segar tetap mencukupi.'
        ];

        return view('dashboard', compact('username', 'ringkasan', 'fokusOperasional', 'rekomendasiHarian'));
    }

    public function pengelolaan(Request $request)
    {
        $username = $request->query('username', 'Pengunjung');

        $daftarMinuman = [
            [
                'kode' => 'MNM-01',
                'nama' => 'Es Bunga Telang Lemon',
                'kategori' => 'Herbal Segar',
                'harga' => 'Rp 8.000',
                'stok' => 25,
                'status' => 'Tersedia'
            ],
            [
                'kode' => 'MNM-02',
                'nama' => 'Es Sereh Madu Alami',
                'kategori' => 'Herbal Segar',
                'harga' => 'Rp 10.000',
                'stok' => 20,
                'status' => 'Tersedia'
            ],
            [
                'kode' => 'MNM-03',
                'nama' => 'Wedang Jahe Merah Susu',
                'kategori' => 'Tradisional Hangat',
                'harga' => 'Rp 9.000',
                'stok' => 15,
                'status' => 'Tersedia'
            ],
            [
                'kode' => 'MNM-04',
                'nama' => 'Es Kunyit Asam Jawa',
                'kategori' => 'Herbal Segar',
                'harga' => 'Rp 8.000',
                'stok' => 30,
                'status' => 'Tersedia'
            ],
            [
                'kode' => 'MNM-05',
                'nama' => 'Kopi Tubruk Gula Aren',
                'kategori' => 'Kopi Lokal',
                'harga' => 'Rp 12.000',
                'stok' => 20,
                'status' => 'Tersedia'
            ]
        ];

        $statusPersediaan = [
            [
                'status' => 'Stok Aman',
                'nama' => 'Es Kunyit Asam',
                'stok' => '30 Cup',
                'warna' => '#2e7d32',
                'bg' => '#e8f5ec',
                'text' => '#173822'
            ],
            [
                'status' => 'Stok Stabil',
                'nama' => 'Es Bunga Telang',
                'stok' => '25 Cup',
                'warna' => '#e06d3d',
                'bg' => '#fef2e9',
                'text' => '#4a2818'
            ],
            [
                'status' => 'Perlu Restock',
                'nama' => 'Wedang Jahe',
                'stok' => '15 Cup',
                'warna' => '#3b82f6',
                'bg' => '#edf4fe',
                'text' => '#1b3152'
            ]
        ];

        $daftarKategori = ['Herbal Segar', 'Tradisional Hangat', 'Kopi Lokal'];

        return view('pengelolaan', compact('username', 'daftarMinuman', 'statusPersediaan', 'daftarKategori'));
    }

    public function profile(Request $request)
    {
        $username = $request->query('username', 'Pengunjung');
        
        $infoAdmin = [
            'peran' => 'Pengelola Operasional Kedai',
            'lokasi' => 'Jember, Jawa Timur',
            'shift' => 'Pagi - Sore (08.00 - 16.00 WIB)',
            'status_akun' => 'Aktif',
            'kehadiran' => '100%',
            'menu_aktif' => 5,
            'catatan_sistem' => 'Akun pengelola aktif dan bertugas di cabang Jember, Jawa Timur dengan jadwal shift Pagi - Sore (08.00 - 16.00 WIB).'
        ];

        return view('profile', compact('username', 'infoAdmin'));
    }
}
