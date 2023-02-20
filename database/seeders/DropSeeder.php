<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Faq;
use App\Models\Fungsi;
use App\Models\Identity;
use App\Models\Sumber;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DropSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Fungsi Mitigasi
        Fungsi::create(['name' => 'Umum']);
        Fungsi::create(['name' => 'IPDS']);
        Fungsi::create(['name' => 'Nerwilis']);
        Fungsi::create(['name' => 'Distribusi']);
        Fungsi::create(['name' => 'Sosial']);
        Fungsi::create(['name' => 'Produksi']);

        // Category Laporan
        Category::create(['name' => 'Peraturan']);
        Category::create(['name' => 'Pelayanan Terpadu']);
        Category::create(['name' => 'Pegawai']);
        Category::create(['name' => 'Birokrasi']);
        Category::create(['name' => 'Fasilitas']);

        // Sumber Risk Mitigasi
        Sumber::create(['name' => 'Internal']);
        Sumber::create(['name' => 'BPS Pusat']);
        Sumber::create(['name' => 'Ekternal BPS']);

        Faq::create([
            'question' => 'Apakah aplikasi Pengaduan BPS Provinsi Kalimantan Selatan ini?',
            'answer' => 'Aplikasi Pengaduan BPS Provinsi Kalimantan Selatan ini adalah aplikasi pengelolaan dan tindak lanjut pengaduan serta pelaporan hasil pengelolaan pengaduan yang disediakan oleh BPS Provinsi Kalimantan Selatan. Aplikasi ini sebagai salah satu sarana bagi pejabat/pegawai BPS Provinsi Kalimantan Selatan sebagai pihak internal dan masyarakat luas pengguna layanan BPS Provinsi Kalimantan Selatan sebagai pihak eksternal untuk melaporkan dugaan adanya pelanggaran dan/atau ketidakpuasan terhadap pelayanan yang dilakukan/diberikan oleh pejabat/pegawai BPS Provinsi Kalimantan Selatan'
        ]);
        Faq::create([
            'question' => 'Apakah bentuk respon yang diberikan kepada pelapor atas pengaduan yang disampaikan?',
            'answer' => 'Respon yang diberikan kepada pelapor berupa respon awal (ucapan terima kasih telah melakukan pengaduan) dan status/tindak lanjut pengaduan paling akhir sesuai dengan respon yang telah diberikan oleh pihak penerima pengaduan. Respon terkait dengan status/tindak lanjut pengaduan dapat dilihat pada menu tracking pengaduan pada aplikasi pengaduan BPS Provinsi Kalimantan Selatan'
        ]);
        Faq::create([
            'question' => 'Berapa lama respon atas pengaduan yang disampaikan diberikan kepada pelapor?',
            'answer' => 'Jawaban/respon atas pengaduan yang disampaikan wajib diberikan dalam kurun waktu paling lambat 5 (lima) hari terhitung sejak pengaduan diterima. Untuk respon yang disampaikan tertulis melalui surat dapat diberikan apabila pelapor mencantumkan identitas secara jelas (nama dan alamat koresponden). Untuk respon dari media pengaduan lainnya akan disampaikan dan diberikan sesuai identitas pelapor yang dicantumkan dalam media pengaduan tersebut.'
        ]);
        Faq::create([
            'question' => 'Apakah pengaduan yang saya berikan akan selalu mendapatkan respon?',
            'answer' => 'Pengaduan yang anda berikan akan direspon dan tercantum dalam aplikasi pengaduan ini dan akan terupdate secara otomatis sesuai dengan respon yang telah diberikan oleh pihak penerima pengaduan. Untuk dapat melihat respon yang diberikan, anda harus memasukkan nomor tiket/register yang telah diberikan pada menu tracking pengaduan. Sebagai catatan, pengaduan anda akan lebih mudah ditindaklanjuti apabila memenuhi unsur pengaduan. Hal Lebih lanjut/lengkap terkait dengan unsur pengaduan dapat dilihat disini'
        ]);
        Faq::create([
            'question' => 'Saya sudah mengirimkan pengaduan namun di kemudian hari saya ingin merubah/menambahkan data terkait pengaduan yang saya lakukan, apa yang harus saya lakukan? Apakah harus membuat pengaduan baru?',
            'answer' => 'Data yang sudah dilaporkan sebelumnya tidak dapat dilakukan perubahan namun anda bisa menambahkan data lain terkait pengaduan dengan mengunggah data dalam bentuk seperti dokumen, foto, link video, dan lain sebagainya masing-masing dengan ukuran maksimum 10 MB. Untuk melakukan hal tersebut di atas tidak perlu membuat pengaduan baru. Mengunggah data tambahan baru dapat dilakukan dengan memasukkan tiket/registrasi pengaduan anda pada menu tracking pengaduan dan telah mendapat respon awal dari penerima aduan BPS Provinsi Kalimantan Selatan.'
        ]);

        Identity::create([
            'alamat' =>'Jalan Gatot Subroto No. 5 Banjarmasin 70235',
            'prov' =>'Kalimantan Selatan',
            'kab' =>'Kota Banjarmasin',
            'telp' =>'(0511) 6773031, 6773932',
            'email' =>'bps6371@bps.go.id, bps6371@gmail.com',
        ]);
    }
}
