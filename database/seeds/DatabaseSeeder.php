<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Pengadaan;
use App\Gedung;
use App\Ruang;
use App\Pemindahan;
use App\Pemusnahan;
use App\ShopingList;
use App\Vendor;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nama' => 'Dicky',
            'nik' => '1902837465',
            'no_telp' => '8115919454',
            'alamat' => 'Jl. Pupuk Baru',
            'role' => 'Kabiro sarana & prasarana(P3)',
            'username' => 'dicky',
            'password' => bcrypt('1')
        ]);
        
        Vendor::create([
            'nama' => 'Toko Komputer',
            'alamat' => 'Jl. Pupuk Baru',
            'bidang_pekerjaan' => 'Elektronik',
            'no_hp' => '8115919454',
            'kontak' => 'tokokomputer@gmail.com',
            'pic_vendor' => 'Alif',
            'npwp' => '123128',
        ]);

        Ruang::create([
            'nama' => 'Kantor 1',
            'kode' => 'K-01',
            'jenis' => 'Kantor',
        ]);

        // $this->call(UsersTableSeeder::class);
    }
}
