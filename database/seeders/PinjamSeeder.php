<?php

namespace Database\Seeders;

use App\Models\Pinjam;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PinjamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $faker = Factory::create('id_ID');
         for($i = 0; $i <10; $i++){
            Pinjam::create([
                'nama_pinjam'=>$faker->name,
                'tanggal_pinjam'=>$faker->date,
                'jam_mulai'=>$faker->time,
                'jam_selesai'=>$faker->time,
                'ruang' => $faker->randomElement(['GKM LANTAI 4', 'GKM LANTAI 3', 'Auditorium G2', 'Lab Komputer G1', 'Lapangan Basket', 'Gedung F2.14', 'Gedung F3.14']),
                'tanggal_pengajuan'=>$faker->dateTime,
                'kontak_peminjam'=>$faker->randomNumber
            ]);
         }
    }
}
