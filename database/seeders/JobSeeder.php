<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jobs')->insert([
            'CompanyName' => 'PT Global sindo solusi',
            'JobCategory' => 'programmer',
            'Description' => 'Minimal lulusan S1 Teknik Informatika.Bahasa pemrograman yang wajib di kuasai:HTML,CSS,PYTHON,C++',
            'image' => 'Global_sindo_solusi.png',
            'Age' => '18 thn',
            'Gender' => 'F / M',
            'region_id' => 15,
            'user_id' => 1
        ]);
        DB::table('jobs')->insert([
            'CompanyName' => 'PT. FTF Globalindo',
            'JobCategory' => 'programmer',
            'Description' => 'PT. FTF Globalindo membutuhkan Programmer Android untuk wilayah Jakarta, dapat membuat program berbasis android, sudah berpengalaman dalam membuat program lebih diutamakan berdomisili di Bekasi, setidaknya 2 tahun pengalaman sebagai programmer
             mobile atau 2 tahun di aplikasi android dengan fungsional yang cukup memadai',
            'image' => 'Global_sindo_solusi.png',
            'Age' => '18 thn',
            'Gender' => 'F / M',
            'region_id' => 15,
            'user_id' => 1
        ]);
        DB::table('jobs')->insert([
            'CompanyName' => 'PT. REIKEN QUALITY TOOLS',
            'JobCategory' => 'programmer',
            'Description' => 'PT. Reiken Quality Tools adalah Perusahaan yang

            bergerak dibidang “HASIL INDUSTRI BARANG-BARANG
            
            DARI LOGAM” seperti Die Casting Mould, Plastic injection
            
            Mold, Shop Floor Gauge, Precision Part, JIG dan Fixture.',
            'image' => 'REIKEN.jpg',
            'Age' => '18 thn',
            'Gender' => 'F / M',
            'region_id' => 16,
            'user_id' => 1
        ]);
        DB::table('jobs')->insert([
            'CompanyName' => 'PT Sinergi Jaya Optima',
            'JobCategory' => 'Web programmer',
            'Description' => 'Selamat Datang di Situs Lowongan Kerja Indonesia Terbaru 2022 dan Saat ini kami ingin memberitahukan Info Terbaru Mengenai Informasi Loker dari Perusahaan PT Sinergi Jaya Optima dengan posisi Junior Web Programmer. Untuk selengkapnya silahkan baca deskripsi lowongan kerja di bawah ini dengan seksama dan teliti, beserta persyaratan minimal lowongan kerja di yang telah tertera dan dijelaskan di bawah ini.

            PT Sinergi Jaya Optima melalui program rekrutmennya saat ini sedang membuka lowongan kerja untuk posisi Junior Web Programmer di Bekasi yang bertujuan untuk meningkatkan kinerja operasional di dalam maupun luar kantor PT Sinergi Jaya Optima. Perusahaan Tersebut sedang mencari calon tenaga kerja yang siap diterjunkan ke setiap divisi bagian perusahaan yang sesuai dengan posisi, kemampuan dan keahlian para pencari kerja tersebut. Berikut ini adalah detail lengkap persyaratan untuk posisi Junior Web Programmer di Bekasi Perusahaan PT Sinergi Jaya Optima:',
            'image' => 'SinergiJaya.png',
            'Age' => '18 thn',
            'Gender' => 'F / M',
            'region_id' => 16,
            'user_id' => 1
        ]);
        DB::table('jobs')->insert([
            'CompanyName' => 'PT. FTF Globalindo',
            'JobCategory' => 'programmer',
            'Description' => 'PT. FTF Globalindo membutuhkan Programmer C/C++ untuk wilayah Bekasi Kota dan sekitarnya, dapat membuat program berbasis C/C++, sudah berpengalaman dalam membuat program lebih diutamakan.',
            'image' => 'Ftf_GlobalIndo.png',
            'Age' => '18 thn',
            'Gender' => 'F / M',
            'region_id' => 18,
            'user_id' => 1
        ]);
        DB::table('jobs')->insert([
            'CompanyName' => 'PT Pitjarus Teknologi',
            'JobCategory' => 'Web developer',
            'Description' => 'Requirements:
            -Male/Female, 22-32 years old
            -Minimum Diploma Degree in Information Technology
            -Having good skills in HTML, CSS, Javascript Framework (jQuery, AJAX, Angular JS) is a must
            -At least 1 year of experience in software development
            -Experience using CodeIgniter and Node.js
            -Experience using MySQL or PostgreSQL
            -Good knowledge on developing API and familiar with REST,JSON, etc.
            -Experience with GIT and Agile (SCRUM) software development is a plus
            -Willing to work in Bekasi and Fulltime
            
            Job Desc
            -Design, develop, test, and maintain highly scalable data infrastructure
            -Discuss and solve problem with the team
            -Adding features to existing applications
            -Collaborates with other developer team
            -Work on bug fixing and improving application performance',
            'image' => 'Pitjarus.png',
            'Age' => '18 thn',
            'Gender' => 'F / M',
            'region_id' => 15,
            'user_id' => 1
        ]);
        DB::table('jobs')->insert([
            'CompanyName' => 'supir mobil box',
            'JobCategory' => 'Supir',
            'Description' => 'Lowongan kerja supir mobil box di Bekasi

            dibutuhkan sopir untuk antar barang
            
            max usia 35 tahun
            
            jujur
            
            niat bekerja
            
            pekerja keras
            
            bertanggung jawab
            
            Jika anda berminat dengan Lowongan kerja supir mobil box di Bekasi ini silahkan langsung menghubungi kami.
            
            Kata kunci : lowongan kerja sopir di bekasi, lowongan kerja driver di jawa barat, loker supir di bekasi, lowongan kerja tanpa ijazah di bekasi, lowongan kerja di bekasi.',
            'image' => 'Lowongan-Kerja-Sopir-Mobil-BOX.jpg',
            'Age' => '18 thn',
            'Gender' => 'F / M',
            'region_id' => 15,
            'user_id' => 1
        ]);
        DB::table('jobs')->insert([
            'CompanyName' => 'PT Mitra Express Motor',
            'JobCategory' => 'Supir',
            'Description' => 'NFO LOWONGAN KERJA TERBARU | LOKER HARI INI | BISA LANGSUNG KERJA

            Terima lulusan SD, SMP, SMA, SMK, D3, Segala Jurusan Untuk Penempatan Kerja di Kantor Pusat, Pabrik dan Kantor Cabang Sesuai Domisili Wilayah Jakarta, Bogor, Depok, Tangerang, Bekasi, Cikarang, Karawang, dan Sekitarnya.
            
            Perusahaan bergerak dalam bidang Jasa Distributor Sparepart Motor dan Mobil, Pendistribusian besar Dealer atau kecil Pertokoan kami lakukan sehingga kami menjadi suplier sparepart kendaraan bermotor baik roda dua dan roda empat cabang yang tersebar di seluruh wilayah indonesia.
            
            Dengan visi agar dapat lebih mendekatkan diri kepada pelanggan serta dengan misi mempermudah memberikan pelayanan yang terbaik bagi para pengguna/pemakai kendaraan Otomotif di seluruh wilayah Indonesia
            
            Berdasarkan keahlian sebagai pemasok global terkemuka bagi seluruh perusahaan manufaktur kendaraan bermotor besar, kami menyediakan layanan suku cadang otomotif yang turut meningkatkan keselamatan berkendara dan efisiensi bahan...',
            'image' => 'mitra-Express-PT.png',
            'Age' => '18 thn',
            'Gender' => 'F / M',
            'region_id' => 15,
            'user_id' => 1
        ]);
        DB::table('jobs')->insert([
            'CompanyName' => 'PT. YASMINA PILAR UTAMA',
            'JobCategory' => 'Supir pribadi',
            'Description' => '• Melakukan pengecekan mobil sebelum mobil dipakai
            • Menjaga kebersihan mobil
            • Taat pada peraturan lalu lintas
            • Bertanggung jawab terhadap keselamatan penumpang dan juga mobil yang dikendarai',
            'image' => 'Pilar_utama.png',
            'Age' => '18 thn',
            'Gender' => 'F / M',
            'region_id' => 18,
            'user_id' => 1
        ]);
        DB::table('jobs')->insert([
            'CompanyName' => 'PT. CATUR PRIMA PERKASA',
            'JobCategory' => 'Supir pribadi',
            'Description' => 'PT. Catur Prima Perkasa merupakan perusahaan yang bergerak di industri perdagangan umum dan distribusi. Kami saat ini membutuhkan Personal Driver / Supir pribadi yang berhubungan langsung dengan pemilik / pimpinan perusahaan dimana sangat dibutuhkan pengalaman yang cukup di bidang ini dan integritas tinggi dikarenakan oleh mobilitas pimpinan yang padat dan sangat diperlukan ketepatan waktu.',
            'image' => 'Cpt.jpg',
            'Age' => '18 thn',
            'Gender' => 'F / M',
            'region_id' => 15,
            'user_id' => 1
        ]);
        DB::table('jobs')->insert([
            'CompanyName' => 'driver logistik',
            'JobCategory' => 'Supir',
            'Description' => 'Lowongan kerja driver logistik di Bekasi

            Dicari karyawan untuk posisi driver / supir penempatan Bekasi
            
            Berpenampilan baik, jujur, sopan, dan bertanggung jawab
            
            Syarat:
            
            – Memiliki SIM B1/B2
            
            – Dapat mengendarai colt diesel dan fuso
            
            – Usia maks. 35 th
            
            – Memiliki integritas tinggi
            
            – Loyal
            
            – Berkomunikasi dengan baik
            
            – Siap bekerja di bawah tekanan
            
            – Siap support tim
            
            – Siap mengikuti peraturan yang berlaku di perusahaan
            
            – Diutamakan Domisili Bekasi, Tambun
            
            Job desk:
            
            – Memenuhi permintaan pengiriman barang dari customer
            
            – Menjaga dan memelihara unit
            
            – Membuat laporan pengiriman
            
            Jika anda berminat dengan Lowongan kerja driver logistik di Bekasi ini silahkan langsung Kirim CV dengan jelas dan lengkap via WA
            
            Kata kunci : lowongan kerja supir di bekasi, lowongan kerja sopir di bekasi, loker driver di bekasi, lowongan kerja sim b1 di bekasi, lowongan kerja di bekasi.',
            'image' => 'driver-logistik.jpg',
            'Age' => '18 thn',
            'Gender' => 'F / M',
            'region_id' => 15,
            'user_id' => 1
        ]);
        DB::table('jobs')->insert([
            'CompanyName' => 'Gedung Grand Karunia Function Hall',
            'JobCategory' => 'Pembantu rumah tangga',
            'Description' => 'Dicari pembantu / Asisten Rumah Tangga yang rajin dan bisa masak.',
            'image' => 'GK.png',
            'Age' => '18 thn',
            'Gender' => 'F / M',
            'region_id' => 15,
            'user_id' => 1
        ]);
        DB::table('jobs')->insert([
            'CompanyName' => 'CV Cahaya Mu',
            'JobCategory' => 'pembantu rumah tangga',
            'Description' => 'Kualifikasi:
                • Laki-laki & Perempuan
                • Fresh Graduate
                • Usia minim 18thn dan maks 42th
                • Pendidikan SMP atau Sederajat
                • Sudah & Belum Menikah
                
                Benefit:
                • Gaji ART 2 sd 4 juta/Bulan
                • Uang Cuti 300rb / Bulan
                • Uang Seragam 150rb / 3 Bulan
                
                Tentang Perusahaan:
                
                LPK CAHAYA MU adalah perusahaan penyedia jasa asisten rumah tangga yang diprakarsai oleh profesional yang berpengalaman dan memiliki jaringan luas didalam industri pelayanan rumah tangga. Menghadapi isu kenyamanan dapat menjadi variabel yang kompleks didalam jalan hidup usaha ataupun indvidu, maka dari itu dalam mengatasinya tidaklah cukup untuk hanya sekedar menawarkan paket layanan rumah tangga, akan tetapi ada kebutuhan untuk lebih merujuk kepada sistem dan solusi yang tersedia yang dikhususkan untuk memenuhi kebutuhan klien secara perorangan.
                • VISI:
                
                Mencetak sumber daya manusia, yang beragam suku dan budaya, trampil dan siap kerja
                • MISI:
                
                Mengayomi SDM, Pengguna Jasa, Para Sponsor, Staf kantor dan membuka lapangan kerja...',
            'image' => 'cahaya.png',
            'Age' => '18 thn',
            'Gender' => 'F / M',
            'region_id' => 15,
            'user_id' => 1
        ]);
        DB::table('jobs')->insert([
            'CompanyName' => 'PT Elok Xantena Ekonomi Maju',
            'JobCategory' => 'Pembantu rumah tangga',
            'Description' => 'Pt. Elok sedang mencari seorang asisten rumah tangga yang berpengalaman dibidang utnuk penempatan The peak sudirman.',
            'image' => 'Ex.png',
            'Age' => '18 thn',
            'Gender' => 'F / M',
            'region_id' => 17,
            'user_id' => 1
        ]);
        DB::table('jobs')->insert([
            'CompanyName' => 'PT. RAHMAN MAKMUR SEJAHTERA',
            'JobCategory' => 'Pembantu rumah tangga',
            'Description' => 'Dibutuhkan pekerja untuk menginap di rumah kami :

            ASISTEN RUMAH TANGGA
            
            Persyaratan :
            • Wanita maksimal 40 tahun
            • Sehat jasmani dan rohani
            • Beragama kristen
            • Pendidikan minimal SMA Sederajat
            • Bisa memasak lebih diutamakan
            • Jujur, Rajin dan Sopan
            • Sabar, telaten, bisa bekerja dibawah tekanan
            • Niat bekerja sungguh-sungguh, tidak untuk coba-coba
            
            Fasilitas : kamar tidur, gaji, makan
            
            Lokasi kerja : Jl. Cempaka Putih Tengah, Jakarta Pusat',
            'image' => 'RMSA.png',
            'Age' => '18 thn',
            'Gender' => 'F / M',
            'region_id' => 16,
            'user_id' => 1
        ]);
    }
}



