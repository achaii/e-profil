<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('users')->insert([
            'nama' => 'Administrator',
            'email' => 'admin@gmail.com',
            'nip_baru' => '1234',
            'password' => bcrypt('admin123'),
            'password_look' => 'admin123',
            'unit_kerja' => '1',
            'sub_unit_kerja' => '2',
            'access' => 'admin'
        ]);

        DB::table('users')->insert([
            'nama' => 'Pegawai',
            'email' => 'pegawai@gmail.com',
            'nip_baru' => '5678',
            'password' => bcrypt('pegawai123'),
            'password_look' => 'pegawai123',
            'unit_kerja' => '1',
            'sub_unit_kerja' => '2',
            'access' => 'user'
        ]);

        DB::table('jabatan')->insert([
            'nama_jabatan' => 'Kepala',
        ]);

        DB::table('unit_kerja')->insert([
            'unit_kerja' => 'unit kerja',
            'kategori_unit_kerja' => 'unit',
            'id_unit_kerja' => null,
            'id_sort' => 100,
        ]);

        DB::table('unit_kerja')->insert([
            'unit_kerja' => 'sub unit kerja',
            'kategori_unit_kerja' => 'sub unit',
            'id_unit_kerja' => 1,
            'id_sort' => 101,
        ]);

        DB::table('riwayat_jabatan')->insert([
            'nip_baru' => '1234',
            'nama_jabatan' => 'kepala',
            'nomor_surat_jabatan' => 'KP.01.01/TEST/001/2021',
            'tanggal_surat_jabatan' => '2021-01-01',
            'created_at' => Carbon\carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('riwayat_keluarga')->insert([
            'nip_baru' => '1234',
            'nama_keluarga' => 'Hinata',
            'tempat_lahir_keluarga' => 'Jepang',
            'tanggal_lahir_keluarga' => '2020-01-01',
            'status_keluarga' => 'Istri',
            'nomor_ktp_keluarga' => '4321',
            'pendidikan_keluarga' => 'D3',
            'created_at' => Carbon\carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('riwayat_pangkat_golongan')
        ->insert([
            'nip_baru' => '1234',
            'pangkat_golongan' => strtoupper('JURU, I/C'),
            'tanggal_surat_pangkat_golongan' => '2021-01-01',
            'nomor_surat_pangkat_golongan' => 'KP.01.01/TEST/001/2021',
            'created_at' => Carbon\carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('riwayat_pendidikan_formal')
        ->insert([
            'nip_baru' => '1234',  
            'nama_sekolah' => 'Standfold',
            'tingkat' => 'S3',
            'tahun_lulus' => '2021',
            'jurusan' => 'Computer',
            'created_at' => Carbon\carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('riwayat_pendidikan_non_formal')
        ->insert([
            'nip_baru' => '1234',
            'nama_diklat' => 'TIK',
            'tanggal_diklat_awal' => '2021-01-01',
            'tanggal_diklat_akhir' => '2021-01-02',
            'kategori' => 'Seminar/Workshop',
            'nomor_surat_diklat' => 'KP.01.01/TEST/001/2021',
            'created_at' => Carbon\carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
