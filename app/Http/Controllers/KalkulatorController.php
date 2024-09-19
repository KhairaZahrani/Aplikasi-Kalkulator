<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KalkulatorController extends Controller
{
    public function index(){
        return view('kalkulator');
    }

    public function hitung(Request $request){
        $request->validate([
            'angka1' => 'required|numeric',
            'angka2' => 'required|numeric',
            'operator' => 'required|string|in:tambah,kurang,kali,bagi',
        ]);

        $angka1 = $request->angka1;
        $angka2 = $request->angka2;
        $operator = $request->operator;
        $hasil = 0;

        switch ($operator) {
            case 'tambah':
                $hasil = $angka1 + $angka2;
                break;
            case 'kurang':
                $hasil = $angka1 - $angka2;
                break;
            case 'kali':
                $hasil = $angka1 * $angka2;
                break;
            case 'bagi':
                if ($angka2 == 0) {
                    return back()->withErrors(['error' => 'Pembagian dengan nol tidak diperbolehkan']);
                }
                $hasil = $angka1 / $angka2;
                break;
        }

        // Return the result in the display field
        return view('kalkulator', [
            'hasil' => $hasil,
            'display' => $request->input('display') . ' = ' . $hasil
        ]);
    }
}
