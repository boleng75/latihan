<?php

use Illuminate\Database\Seeder;
use App\Dosen;
use App\Mahasiswa;
use App\Wali;
use App\Hobi;

class RelasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //menghapus semua data
        DB::table('dosens')->delete();
        DB::table('mahasiswas')->delete();
        DB::table('walis')->delete();
        DB::table('hobis')->delete();
        DB::table('mahasiswa_hobi')->delete();
        //membuat data Dosen
        $dosen = Dosen::create([
            'nama' => 'Abdul Mustofa',
            'nipd' => '1234567890'
        ]);
        $this->command->info('Data Dosen Berhasil Dibuat');

        //membuat data mahasiswa
         $dadang = Mahasiswa::create([
            'nama' => 'Dadang',
            'nim' => '1234567890',
            'id_dosen' => $dosen->id
        ]);
         $dadan = Mahasiswa::create([
            'nama' => 'Dadan',
            'nim' => '56216315',
            'id_dosen' => $dosen->id
        ]);
         $sunarya = Mahasiswa::create([
            'nama' => 'Sunarya',
            'nim' => '213231213',
            'id_dosen' => $dosen->id
        ]);
         $surya = Mahasiswa::create([
            'nama' => 'Surya',
            'nim' => '6677676765',
            'id_dosen' => $dosen->id
        ]);
        $this->command->info('Data Mahasiswa Berhasil dibuat');

        //Membuat Data wali
        $ahmad = Wali::create([
            'nama' => 'Ahmad',
            'id_mahasiswa' => $dadang->id
        ]);
        $dudul = Wali::create([
            'nama' => 'Dudul',
            'id_mahasiswa' => $dadan->id
        ]);
        $aep = Wali::create([
            'nama' => 'Aep',
            'id_mahasiswa' => $sunarya->id
        ]);
        $ami = Wali::create([
            'nama' => 'Ami',
            'id_mahasiswa' => $surya->id
        ]);
        $this->command->info('Data Wali Berhasil dibuat');
        
        //membuat data hobi

        $mancing = Hobi::create([
            'hobi' => 'Mancing Keributan'
        ]);
        $gaming = Hobi::create([
            'hobi' => 'Game Mobile'
        ]);
        $mengaji = Hobi::create([
            'hobi' => 'Membaca Al-Quran'
        ]);
        $kendang = Hobi::create([
            'hobi' => 'Main Kendang'
        ]);
        
        $dadang->hobi()->attach($mancing->id);
        $dadan->hobi()->attach($gaming->id);
        $sunarya->hobi()->attach($mengaji->id);
        $surya->hobi()->attach($kendang->id);
        $this->command->info('Data hobi mahasiswa berhasil dibuat');
    }
}
