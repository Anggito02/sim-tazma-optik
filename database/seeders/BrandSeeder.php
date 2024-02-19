<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    public function run(): void
    {
        Brand::create([
            'nama_brand' => 'Rayban',
            'deskripsi' => 'Ray-Ban adalah merek kacamata matahari dan kacamata yang didirikan pada tahun 1937 oleh perusahaan Amerika Bausch & Lomb. Merek ini terkenal karena kacamata Aviator dan Wayfarer, yang awalnya dirancang untuk Angkatan Udara Amerika Serikat.',
        ]);

        Brand::create([
            'nama_brand' => 'Oakley',
            'deskripsi' => 'Oakley, Inc., berbasis di Lake Forest, California, dan anak perusahaan dari perusahaan Italia Luxottica, merancang, mengembangkan, dan memproduksi peralatan olahraga dan gaya hidup termasuk kacamata, pakaian, sepatu, kacamata, helm dan aksesoris lainnya.',
        ]);

        Brand::create([
            'nama_brand' => 'Gucci',
            'deskripsi' => 'Gucci adalah merek barang mewah asal Italia yang dimiliki oleh perusahaan Prancis Kering. Didirikan oleh Guccio Gucci di Firenze pada tahun 1921, Gucci adalah merek terkemuka di industri mode dan pakaian mewah, menawarkan barang-barang seperti pakaian, tas, sepatu, dan aksesoris, serta barang-barang dekoratif, barang-barang rumah tangga, dan perhiasan.',
        ]);

        Brand::create([
            'nama_brand' => 'Prada',
            'deskripsi' => 'Prada S.p.A. adalah perusahaan mode asal Italia yang didirikan pada tahun 1913 oleh Mario Prada. Perusahaan ini mengkhususkan diri dalam barang-barang kulit seperti tas sepatu, barang-barang perjalanan, barang-barang aksesori, dan barang-barang siap pakai untuk pria dan wanita.',
        ]);

        Brand::create([
            'nama_brand' => 'Burberry',
            'deskripsi' => 'Burberry Group PLC adalah perusahaan mode asal Inggris yang didirikan pada tahun 1856 oleh Thomas Burberry. Merek ini terkenal karena motif kotak-kotaknya yang khas, yang diperkenalkan sebagai pola garis pada tahun 1924, sebelum menjadi merek dagang terdaftar pada tahun 1967.',
        ]);

        Brand::create([
            'nama_brand' => 'Tom Ford',
            'deskripsi' => 'Thomas Carlyle Ford adalah desainer mode dan sutradara film Amerika. Dia meluncurkan merek mode eponimnya pada tahun 2006, setelah menjabat sebagai direktur kreatif di Gucci dan Yves Saint Laurent. Ford mendirikan rumah mode Tom Ford pada tahun 2005, dengan Tom Ford sebagai CEO dan kepala desain dan Domenico De Sole sebagai ketua.',
        ]);

        Brand::create([
            'nama_brand' => 'Dior',
            'deskripsi' => 'Christian Dior SE, umumnya dikenal sebagai Dior, adalah perusahaan mewah Prancis yang mengendalikan merek-merek seperti Christian Dior, Dior Homme, dan Dior Beauty, yang merupakan perusahaan induk dari LVMH, grup barang mewah terbesar di dunia.',
        ]);

        Brand::create([
            'nama_brand' => 'Chanel',
            'deskripsi' => 'Chanel S.A. adalah perusahaan swasta yang dimiliki oleh Alain Wertheimer dan Gérard Wertheimer, cucu dari Pierre Wertheimer, yang awalnya mendirikan bisnis parfum bersama Gabrielle Bonheur Chanel. Chanel adalah merek mewah yang mengkhususkan diri dalam barang-barang mewah yang dirancang untuk wanita seperti pakaian siap pakai, barang-barang kulit, aksesori, sepatu, dan perhiasan.',
        ]);
    }
}
