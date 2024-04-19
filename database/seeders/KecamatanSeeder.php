<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kecamatan;

class KecamatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Contoh penambahan data kecamatan
        Kecamatan::create(['nama_kecamatan' => 'Adiwerna']);
        Kecamatan::create(['nama_kecamatan' => 'Balapung']);
        Kecamatan::create(['nama_kecamatan' => 'Bojong']);
        Kecamatan::create(['nama_kecamatan' => 'Bumijawa']);
        Kecamatan::create(['nama_kecamatan' => 'Dukuhwaru']);
        Kecamatan::create(['nama_kecamatan' => 'Dukuhturi']);
        Kecamatan::create(['nama_kecamatan' => 'Jatinegara']);
        Kecamatan::create(['nama_kecamatan' => 'Kedungbanteng']);
        Kecamatan::create(['nama_kecamatan' => 'Kramat']);
        Kecamatan::create(['nama_kecamatan' => 'Lebaksiu']);
        Kecamatan::create(['nama_kecamatan' => 'Margasari']);
        Kecamatan::create(['nama_kecamatan' => 'Pagerbarang']);
        Kecamatan::create(['nama_kecamatan' => 'Pangkah']);
        Kecamatan::create(['nama_kecamatan' => 'Slawi']);
        Kecamatan::create(['nama_kecamatan' => 'Suradadi']);
        Kecamatan::create(['nama_kecamatan' => 'Talang']);
        Kecamatan::create(['nama_kecamatan' => 'Tarub']);
        Kecamatan::create(['nama_kecamatan' => 'Warureja']);
    }
}
