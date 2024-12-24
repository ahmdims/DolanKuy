<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FaqSeeder extends Seeder
{
    public function run()
    {
        $faqs = [
            [
                'question' => 'Apa itu DolanKuy?',
                'answer' => 'DolanKuy adalah platform yang menyediakan informasi lengkap tentang destinasi wisata, UMKM, dan budaya di Malang. Kami memberikan panduan lengkap untuk para pengunjung yang ingin menikmati keindahan kota Malang.'
            ],
            [
                'question' => 'Apa yang bisa ditemukan di DolanKuy?',
                'answer' => 'Di DolanKuy, Anda dapat menemukan berbagai destinasi wisata menarik, informasi tentang UMKM lokal, serta budaya khas Malang yang patut untuk dijelajahi dan dipahami.'
            ],
            [
                'question' => 'Bagaimana cara menemukan destinasi wisata di DolanKuy?',
                'answer' => 'DolanKuy memiliki fitur pencarian destinasi wisata yang memudahkan Anda menemukan tempat-tempat menarik di Malang berdasarkan kategori, lokasi, dan jenis aktivitas.'
            ],
            [
                'question' => 'Apakah DolanKuy hanya untuk wisatawan?',
                'answer' => 'Tidak hanya wisatawan, DolanKuy juga cocok untuk masyarakat lokal yang ingin mengenal lebih dalam tentang potensi UMKM dan budaya di Malang.'
            ],
            [
                'question' => 'Bagaimana cara berpartisipasi dalam mempromosikan UMKM di DolanKuy?',
                'answer' => 'Jika Anda memiliki UMKM di Malang, Anda dapat mendaftarkan usaha Anda di DolanKuy untuk mendapatkan lebih banyak pengunjung dan pelanggan potensial.'
            ],
            [
                'question' => 'Apa yang membuat DolanKuy unik dibandingkan dengan situs wisata lainnya?',
                'answer' => 'DolanKuy tidak hanya fokus pada destinasi wisata, tetapi juga mengangkat potensi budaya lokal dan mendukung UMKM di Malang, menjadikannya platform yang lebih lengkap dan beragam.'
            ],
            [
                'question' => 'Apakah saya bisa mendapatkan informasi tentang budaya lokal di DolanKuy?',
                'answer' => 'Tentu saja! DolanKuy menyediakan informasi seputar budaya, tradisi, dan kegiatan lokal yang dapat menambah wawasan Anda tentang kehidupan masyarakat Malang.'
            ],
            [
                'question' => 'Apakah DolanKuy memiliki fitur ulasan untuk destinasi wisata?',
                'answer' => 'Ya, DolanKuy memungkinkan pengunjung untuk memberikan ulasan tentang destinasi wisata yang mereka kunjungi, sehingga Anda dapat mengetahui pengalaman orang lain sebelum mengunjungi tempat tersebut.'
            ],
            [
                'question' => 'Bagaimana cara mengetahui acara budaya yang sedang berlangsung di Malang?',
                'answer' => 'DolanKuy menampilkan kalender acara budaya di Malang, sehingga Anda dapat dengan mudah mengetahui berbagai festival, pameran, dan kegiatan budaya lainnya yang sedang berlangsung.'
            ],
            [
                'question' => 'Apakah DolanKuy menawarkan aplikasi mobile?',
                'answer' => 'Saat ini, DolanKuy dapat diakses melalui website, namun kami sedang dalam pengembangan aplikasi mobile untuk memudahkan akses informasi bagi pengguna di mana saja.'
            ],
        ];

        foreach ($faqs as &$faq) {
            $faq['created_at'] = now();
            $faq['updated_at'] = now();
        }

        DB::table('faqs')->insert($faqs);
    }
}
