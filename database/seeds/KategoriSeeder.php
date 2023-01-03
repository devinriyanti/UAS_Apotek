<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategori')->insert([
            [
                'name' => 'ANALGESIK NARKOTIK'
            ],
            [
                'name' => 'ANALGESIK NON NARKOTIK'
            ],
            [
                'name' => 'ANTIPIRAI'
            ],
            [
                'name' => 'NYERI NEUROPATIK'
            ],
            [
                'name' => 'ANESTETIK LOKAL'
            ],
            [
                'name' => 'ANESTETIK UMUM dan OKSIGEN'
            ],
            [
                'name' => 'OBAT untuk PROSEDUR PRE OPERATIF'
            ],
            [
                'name' => 'ANTIALERGI dan OBAT untuk ANAFILAKSIS'
            ],
            [
                'name' => 'ANTIDOT dan OBAT LAIN untuk KERACUNAN (KHUSUS)'
            ],
            [
                'name' => 'ANTIEPILEPSI - ANTIKONVULSI'
            ],
        ]);
    }
}
