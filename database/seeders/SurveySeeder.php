<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SurveySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('survey_questionaires')->insert([
            ['survey_text' => 'Prosedur permintaan layanan diinformasikan dengan jelas dan mudah diterapkan', 'created_at' => now(), 'updated_at' => now()],
            ['survey_text' => 'Kecepatan merespon permintaan layanan yang diajukan', 'created_at' => now(), 'updated_at' => now()],
            ['survey_text' => 'Pemberian layanan tidak dipungut biaya atas pelayanan yang diberikan', 'created_at' => now(), 'updated_at' => now()],
            ['survey_text' => 'Prosedur dan tahapan pemberian layanan telah diatur dengan jelas melalui regulasi atau SOP (tidak berbelit-belit)', 'created_at' => now(), 'updated_at' => now()],
            ['survey_text' => 'Mekanisme layanan telah sesuai regulasi dan/atau SOP', 'created_at' => now(), 'updated_at' => now()],
            ['survey_text' => 'Layanan diselesaikan tepat waktu sesuai SOP', 'created_at' => now(), 'updated_at' => now()],
            ['survey_text' => 'SDM memiliki keahlian yang memadai dalam memberikan layanan PNBP', 'created_at' => now(), 'updated_at' => now()],
            ['survey_text' => 'SDM menguasai SOP pemberian layanan', 'created_at' => now(), 'updated_at' => now()],
            ['survey_text' => 'SDM tanggap dalam memberikan layanan', 'created_at' => now(), 'updated_at' => now()],
            ['survey_text' => 'Kualitas sarana dan prasarana pemberian pelayanan telah memadai', 'created_at' => now(), 'updated_at' => now()],
            ['survey_text' => 'Tanggap dalam menangani pengaduan pengguna layanan', 'created_at' => now(), 'updated_at' => now()],
            ['survey_text' => 'Mekanisme layanan mempermudah pengajuan sewa', 'created_at' => now(), 'updated_at' => now()],
            ['survey_text' => 'Mekanisme pengajuan sewa mudah dipahami', 'created_at' => now(), 'updated_at' => now()],
            ['survey_text' => 'Tampilan dan fitur dashboard aplikasi menarik dan mudah dipahami', 'created_at' => now(), 'updated_at' => now()],
            ['survey_text' => 'Pejabat/Pegawai pemberi layanan sewa pada BPTD Kelas II Bali tidak melakukan diskriminasi dalam pemberian pelayanan', 'created_at' => now(), 'updated_at' => now()],
            ['survey_text' => 'Pejabat/Pegawai pemberi layanan sewa pada BPTD Kelas II Bali tidak memberikan pelayanan di luar regulasi atau prosedur yang telah ditetapkan yang mengindikasikan adanya kecurangan', 'created_at' => now(), 'updated_at' => now()],
            ['survey_text' => 'Pejabat/Pegawai pemberi layanan sewa pada BPTD Kelas II Bali tidak pernah menerima segala bentuk imbalan uang/barang/fasilitas di luar ketentuan yang berlaku', 'created_at' => now(), 'updated_at' => now()],
            ['survey_text' => 'Pejabat/Pegawai pemberi layanan sewa pada BPTD Kelas II Bali tidak pernah menarik pungutan di luar regulasi atau prosedur yang telah ditetapkan kepada pengguna layanan', 'created_at' => now(), 'updated_at' => now()],
            ['survey_text' => 'Tidak terdapat praktik pencaloan/perantara tidak resmi dalam pemberian layanan pada BPTD Kelas II Bali', 'created_at' => now(), 'updated_at' => now()]
        ]);
    }
}
