<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Pengadaan;
use App\Gedung;
use App\Fakultas;
use App\Ruangan;
use App\Inventaris;
use App\Peminjaman;
use App\Pemindahan;
use App\Pemusnahan;
use App\Infus;
use App\TroubleTicket;
use App\Maintenance;
use App\Kendaraan;
use App\ShopingList;

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

        // $this->call(UsersTableSeeder::class);
    }
}
