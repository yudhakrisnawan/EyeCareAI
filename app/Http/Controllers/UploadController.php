<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class UploadController extends Controller
{
    public function classify(Request $request)
    {
        // Validasi file yang diunggah
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Ambil file gambar yang diunggah
        $image = $request->file('image');

        // Kirim gambar ke API Flask untuk klasifikasi
        $classification = $this->sendToFlaskAPI($image);

        // Simpan hasil klasifikasi di session
        session(['classification_result' => $classification]);

        // Redirect ke halaman hasil
        return redirect()->route('result');
    }

    public function result()
    {
        // Ambil hasil klasifikasi dari session
        $result = session('classification_result');

        // Jika tidak ada hasil klasifikasi, kembalikan ke halaman home
        if (!$result) {
            return redirect()->route('home')->with('error', 'No classification result found.');
        }

        // Tampilkan hasil di halaman
        return view('result', compact('result'));
    }

    // Fungsi untuk mengirim gambar ke API Flask dan menerima hasil klasifikasi
    private function sendToFlaskAPI($image)
    {
        $client = new Client();
        $response = $client->post('http://localhost:5000/predict', [
            'multipart' => [
                [
                    'name'     => 'image',
                    'contents' => fopen($image->getPathname(), 'r'),
                    'filename' => $image->getClientOriginalName()
                ]
            ]
        ]);

        // Ambil data hasil prediksi dari response API
        $data = json_decode($response->getBody()->getContents(), true);

        // Kembalikan hasil klasifikasi atau error jika tidak ditemukan
        return $data['result'] ?? 'Error in prediction';
    }
}
