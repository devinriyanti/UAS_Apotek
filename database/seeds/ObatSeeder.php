<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('obat')->insert([
            [
                // ANALGESIK NARKOTIK (1)
                //1
                'nama_obat' => 'Fentanil',
                'formula' => 'inj 0,05 mg/mL (i.m./i.v.)',
                'restriction_formula' => '5 amp/kasus',
                'deskripsi' => 'inj Hanya untuk nyeri berat dan harus diberikan oleh tim medis yang dapat melakukan resusitasi. patch Untuk nyeri kronik pada pasien kanker yang tidak terkendali dan Tidak untuk nyeri akut.',
                'faskes_tk1' => 0,
                'faskes_tk2' => 1,
                'faskes_tk3' => 1,
                'kategori_id' => 1,
                'supplier_id' => 1,
                'gambar'=> 'Fentanil.jpg',
            ],
            //2
            [
                'nama_obat' => 'Morfin',
                'formula' => 'tab 10mg',
                'restriction_formula' => 'initial dosis 3-4 tab/hari',
                'deskripsi' => 'A. Hanya untuk pemakaian pada tindakan anestesi atau perawatan di Rumah Sakit;\n
                B. Untuk mengatasi nyeri kanker yang tidak respons terhadap analgesik non narkotik;\n
                C. Untuk nyeri pada serangan jantung.',
                'faskes_tk1' => 0,
                'faskes_tk2' => 1,
                'faskes_tk3' => 1,
                'kategori_id' => 1,
                'supplier_id' => 1,
                'gambar'=> 'Morfin.jpg',
            ],
            //3
            [
                'nama_obat' => 'Petidin',
                'formula' => 'inj 50 mg/mL (i.m./i.v.)',
                'restriction_formula' => '2 amp/hari',
                'deskripsi' => 'A. Hanya untuk nyeri sedang hingga berat pada pasien yang dirawat di Rumah Sakit.\n
                B. Tidak digunakan untuk nyeri kanker',
                'faskes_tk1' => 0,
                'faskes_tk2' => 1,
                'faskes_tk3' => 1,
                'kategori_id' => 1,
                'supplier_id' => 1,
                'gambar'=> 'Petidin.jpg',
            ],
            //ANALGESIK NON NARKOTIK(2)
            //1
            [
                'nama_obat' => 'Asam Mefenamat',
                'formula' => 'kaps 250 mg',
                'restriction_formula' => '30 kaps/bulan',
                'deskripsi' => 'Salah satu obat antiinflamasi nonsteroid golongan fenamat yang digunakan dalam pengobatan nyeri ringan hingga sedang. ',
                'faskes_tk1' => 1,
                'faskes_tk2' => 1,
                'faskes_tk3' => 1,
                'kategori_id' => 2,
                'supplier_id' => 2,
                'gambar'=> 'AsamMefenamat.jpg',
            ],
            //2
            [
                'nama_obat' => 'Ketorolac',
                'formula' => 'inj 30 mg/mL',
                'restriction_formula' => '2-3 amp/hari, maks 2 hari',
                'deskripsi' => 'Untuk nyeri sedang sampai berat pada pasien yang tidak dapat menggunakan analgesik secara oral.',
                'faskes_tk1' => 0,
                'faskes_tk2' => 1,
                'faskes_tk3' => 1,
                'kategori_id' => 2,
                'supplier_id' => 2,
                'gambar'=> 'Ketorolac.jpg',
            ],
            //3
            [
                'nama_obat' => 'Metamizol',
                'formula' => 'inj 500 mg/mL',
                'restriction_formula' => '4 amp selama dirawat.',
                'deskripsi' => 'Untuk nyeri post operatif dan hanya dalam waktu singkat.',
                'faskes_tk1' => 0,
                'faskes_tk2' => 1,
                'faskes_tk3' => 1,
                'kategori_id' => 2,
                'supplier_id' => 2,
                'gambar'=> 'Metamizol.jpg',
            ],
            //ANTIPIRAI(3)
            //1
            [
                'nama_obat' => 'Alopurinol',
                'formula' => 'tab 100 mg*',
                'restriction_formula' => '30 tab/bulan',
                'deskripsi' => 'Tidak diberikan pada saat nyeri akut.',
                'faskes_tk1' => 1,
                'faskes_tk2' => 1,
                'faskes_tk3' => 1,
                'kategori_id' => 3,
                'supplier_id' => 3,
                'gambar'=> 'Alopurinol.jpg',
            ],
            //2
            [
                'nama_obat' => 'Kolkisin',
                'formula' => 'tab 500 mcg',
                'restriction_formula' => '30 tab/bulan',
                'deskripsi' => 'Obat yang digunakan untuk meredakan gout akut',
                'faskes_tk1' => 1,
                'faskes_tk2' => 1,
                'faskes_tk3' => 1,
                'kategori_id' => 3,
                'supplier_id' => 3,
                'gambar'=> 'Kolkisin.jpg',
            ],
            //3
            [
                'nama_obat' => 'Probenesid',
                'formula' => 'tab 500 mcg',
                'restriction_formula' => '30 tab/bulan',
                'deskripsi' => 'Obat yang meningkatkan ekskresi asam urat dalam urin. Ini terutama digunakan dalam mengobati asam urat dan hiperurisemia.',
                'faskes_tk1' => 1,
                'faskes_tk2' => 1,
                'faskes_tk3' => 1,
                'kategori_id' => 3,
                'supplier_id' => 3,
                'gambar'=> 'Probenesid.jpg',
            ],
            //NYERI NEUROPATIK(4)
            //1
            [
                'nama_obat' => 'Amitriptilin',
                'formula' => 'tab 25 mg',
                'restriction_formula' => '30 tab/bulan',
                'deskripsi' => 'Obat antidepresan yang dapat digunakan masyarakat pada umumnya untuk mengatasi depresi.',
                'faskes_tk1' => 1,
                'faskes_tk2' => 1,
                'faskes_tk3' => 1,
                'kategori_id' => 4,
                'supplier_id' => 4,
                'gambar'=> 'Amitriptilin.jpg',
            ],
            //2
            [
                'nama_obat' => 'Gabapentin',
                'formula' => 'kaps 100 mg',
                'restriction_formula' => '30 kaps/bulan',
                'deskripsi' => 'Hanya untuk neuralgia pascaherpes atau nyeri neuropati diabetikum',
                'faskes_tk1' => 0,
                'faskes_tk2' => 1,
                'faskes_tk3' => 1,
                'kategori_id' => 4,
                'supplier_id' => 4,
                'gambar'=> 'Gabapentin.jpg',
            ],
            //3
            [
                'nama_obat' => 'Karbamazepin',
                'formula' => 'tab 100 mg',
                'restriction_formula' => '60 tab/bulan',
                'deskripsi' => 'Hanya untuk neuralgia trigeminal',
                'faskes_tk1' => 1,
                'faskes_tk2' => 1,
                'faskes_tk3' => 1,
                'kategori_id' => 4,
                'supplier_id' => 4,
                'gambar'=> 'Karbamazepin.png',
            ],
            //ANESTETIK LOKAL(5)
            //1
            [
                'nama_obat' => 'Bupivakain Heavy',
                'formula' => 'inj 0,5% + glukosa 8%',
                'restriction_formula' => '-',
                'deskripsi' => 'Khusus untuk analgesia spinal',
                'faskes_tk1' => 0,
                'faskes_tk2' => 1,
                'faskes_tk3' => 1,
                'kategori_id' => 5,
                'supplier_id' => 5,
                'gambar'=> 'BupivakainHeavy.jpg',
            ],
            //2
            [
                'nama_obat' => 'Etil Klorida',
                'formula' => 'spray 100 mL',
                'restriction_formula' => '-',
                'deskripsi' => 'Obat untuk mengatasi nyeri akibat operasi, cedera olahraga, dan nyeri otot mendalam.',
                'faskes_tk1' => 1,
                'faskes_tk2' => 1,
                'faskes_tk3' => 1,
                'kategori_id' => 5,
                'supplier_id' => 5,
                'gambar'=> 'EtilKlorida.jpg',
            ],
            //3
            [
                'nama_obat' => 'Ropivakain',
                'formula' => 'inj 7,5 mg/mL',
                'restriction_formula' => 'ANALGESIK NARKOTIK',
                'deskripsi' => 'Anestesi (obat bius) yang menghambat impuls saraf yang mengirim sinyal nyeri ke otak',
                'faskes_tk1' => 0,
                'faskes_tk2' => 1,
                'faskes_tk3' => 1,
                'kategori_id' => 5,
                'supplier_id' => 5,
                'gambar'=> 'Ropivakain.jpg',
            ],
            //ANESTETIK UMUM dan OKSIGEN(6)
            //1
            [
                'nama_obat' => 'Deksmedetomidin',
                'formula' => 'inj 100 mcg/mL',
                'restriction_formula' => '-',
                'deskripsi' => 'Untuk sedasi pada pasien di ICU, kraniotomi, bedah jantung dan operasi yang memerlukan waktu pembedahan yang lama.',
                'faskes_tk1' => 0,
                'faskes_tk2' => 1,
                'faskes_tk3' => 1,
                'kategori_id' => 6,
                'supplier_id' => 1,
                'gambar'=> 'Deksmedetomidin.jpg',
            ],
            //2
            [
                'nama_obat' => 'Halotan',
                'formula' => 'ih',
                'restriction_formula' => '-',
                'deskripsi' => 'Tidak boleh digunakan berulang dan Tidak untuk pasien dengan gangguan fungsi hati.',
                'faskes_tk1' => 0,
                'faskes_tk2' => 1,
                'faskes_tk3' => 1,
                'kategori_id' => 6,
                'supplier_id' => 1,
                'gambar'=> 'Halotan.jpg',
            ],
            //3
            [
                'nama_obat' => 'Ketamin',
                'formula' => 'inj 50 mg/mL (i.v.)',
                'restriction_formula' => '-',
                'deskripsi' => 'Obat yang terutama digunakan untuk memulai dan mempertahankan anestesi',
                'faskes_tk1' => 0,
                'faskes_tk2' => 1,
                'faskes_tk3' => 1,
                'kategori_id' => 6,
                'supplier_id' => 1,
                'gambar'=> 'Ketamin.jpg',
            ],
            // OBAT untuk PROSEDUR PRE OPERATIF(7)
            //1
            [
                'nama_obat' => 'Atropin',
                'formula' => 'inj 0,25 mg/mL (i.v./s.k.)',
                'restriction_formula' => '-',
                'deskripsi' => '-',
                'faskes_tk1' => 1,
                'faskes_tk2' => 1,
                'faskes_tk3' => 1,
                'kategori_id' => 7,
                'supplier_id' => 2,
                'gambar'=> 'Atropin.jpg',
            ],
            //2
            [
                'nama_obat' => 'Diazepam',
                'formula' => 'inj 5 mg/mL',
                'restriction_formula' => '-',
                'deskripsi' => '-',
                'faskes_tk1' => 1,
                'faskes_tk2' => 1,
                'faskes_tk3' => 1,
                'kategori_id' => 7,
                'supplier_id' => 2,
                'gambar'=> 'Diazepam.jpg',
            ],
            //3
            [
                'nama_obat' => 'Midazolam',
                'formula' => 'inj 1 mg/mL (i.v.)',
                'restriction_formula' => 'Dosis rumatan 1 mg/jam (24 mg/hari) dan Dosis premedikasi: 8 vial/kasus.',
                'deskripsi' => 'Dapat digunakan untuk premedikasi sebelum induksi anestesi dan rumatan selama anestesi umum',
                'faskes_tk1' => 0,
                'faskes_tk2' => 1,
                'faskes_tk3' => 1,
                'kategori_id' => 7,
                'supplier_id' => 2,
                'gambar'=> 'Midazolam.jpg',
            ],
            // ANTIALERGI dan OBAT untuk ANAFILAKSIS(8)
            //1
            [
                'nama_obat' => 'Deksametason',
                'formula' => 'inj 5 mg/mL',
                'restriction_formula' => '20 mg/hari',
                'deskripsi' => 'Obat yang efektif untuk menangani berbagai jenis penyakit yang berkaitan dengan peradangan',
                'faskes_tk1' => 1,
                'faskes_tk2' => 1,
                'faskes_tk3' => 1,
                'kategori_id' => 8,
                'supplier_id' => 3,
                'gambar'=> 'Deksametason.jpg',
            ],
            //2
            [
                'nama_obat' => 'Difenhidramin',
                'formula' => 'inj 10 mg/mL (i.v./i.m.)',
                'restriction_formula' => '30 mg/hari',
                'deskripsi' => 'Obat untuk mengendalikan tanda-tanda alergi',
                'faskes_tk1' => 1,
                'faskes_tk2' => 1,
                'faskes_tk3' => 1,
                'kategori_id' => 8,
                'supplier_id' => 3,
                'gambar'=> 'Difenhidramin.jpg',
            ],
            //3
            [
                'nama_obat' => 'Klorfeniramin',
                'formula' => 'tab 4 mg',
                'restriction_formula' => '3 tab/hari, maks 5 hari',
                'deskripsi' => 'Obat golongan antihistamin yang berguna untuk mengatasi reaksi alergi',
                'faskes_tk1' => 1,
                'faskes_tk2' => 1,
                'faskes_tk3' => 1,
                'kategori_id' => 8,
                'supplier_id' => 3,
                'gambar'=> 'Klorfeniramin.jpg',
            ],
            //ANTIDOT dan OBAT LAIN untuk KERACUNAN(KHUSUS) (9)
            //1
            [
                'nama_obat' => 'Efedrin',
                'formula' => 'inj 50 mg/mL',
                'restriction_formula' => '-',
                'deskripsi' => 'Obat ini sering digunakan untuk mencegah tekanan darah rendah selama prosedur anestesi spinal',
                'faskes_tk1' => 0,
                'faskes_tk2' => 1,
                'faskes_tk3' => 1,
                'kategori_id' => 9,
                'supplier_id' => 4,
                'gambar'=> 'Efedrin.jpg',
            ],
            //2
            [
                'nama_obat' => 'Kalsium Glukonat',
                'formula' => 'inj 10%',
                'restriction_formula' => '-',
                'deskripsi' => 'Suplemen kalsium untuk mencegah atau mengatasi rendahnya kadar kalsium dalam darah (hipokalsemia)',
                'faskes_tk1' => 1,
                'faskes_tk2' => 1,
                'faskes_tk3' => 1,
                'kategori_id' => 9,
                'supplier_id' => 4,
                'gambar'=> 'KalsiumGlukonat.jpg',
            ],
            //3
            [
                'nama_obat' => 'Nalokson',
                'formula' => 'inj 0,4 mg/mL',
                'restriction_formula' => '-',
                'deskripsi' => 'Hanya untuk mengatasi depresi pernapasan akibat morfin atau opioid',
                'faskes_tk1' => 0,
                'faskes_tk2' => 1,
                'faskes_tk3' => 1,
                'kategori_id' => 9,
                'supplier_id' => 4,
                'gambar'=> 'Nalokson.jpg',
            ],
            //ANTIEPILEPSI - ANTIKONVULSI (10)
            //1
            [
                'nama_obat' => 'Diazepam',
                'formula' => 'inj 5 mg/mL',
                'restriction_formula' => '10 amp/kasus',
                'deskripsi' => 'kecuali untuk kasus di ICU.',
                'faskes_tk1' => 1,
                'faskes_tk2' => 1,
                'faskes_tk3' => 1,
                'kategori_id' => 10,
                'supplier_id' => 5,
                'gambar'=> 'Diazepam.jpg',
            ],
            //2
            [
                'nama_obat' => 'Fenitoin',
                'formula' => 'kaps 30 mg',
                'restriction_formula' => '90 kaps/bulan',
                'deskripsi' => '-',
                'faskes_tk1' => 1,
                'faskes_tk2' => 1,
                'faskes_tk3' => 1,
                'kategori_id' => 10,
                'supplier_id' => 5,
                'gambar'=> 'Fenitoin.jpg',
            ],
            //3
            [
                'nama_obat' => 'Klonazepam',
                'formula' => 'tab 2 mg',
                'restriction_formula' => '30 tab/bulan',
                'deskripsi' => '-',
                'faskes_tk1' => 0,
                'faskes_tk2' => 1,
                'faskes_tk3' => 1,
                'kategori_id' => 10,
                'supplier_id' => 5,
                'gambar'=> 'Klonazepam.jpg',
            ],
        ]);
    }
}
