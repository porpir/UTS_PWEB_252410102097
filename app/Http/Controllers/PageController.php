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

        return view('dashboard', compact('username', 'ringkasan'));
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

        return view('pengelolaan', compact('username', 'daftarMinuman'));
    }

    public function profile(Request $request)
    {
        $username = $request->query('username', 'Pengunjung');
        $infoAdmin = [
            'peran' => 'Pengelola Operasional Kedai',
            'lokasi' => 'Jember, Jawa Timur',
            'shift' => 'Pagi - Sore (08.00 - 16.00 WIB)',
            'status_akun' => 'Aktif'
        ];

        return view('profile', compact('username', 'infoAdmin'));
    }
}