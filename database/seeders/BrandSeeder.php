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
            'deskripsi' => 'Ray-Ban is a brand of sunglasses and eyeglasses founded in 1937 by the American company Bausch & Lomb. The brand is known for its Wayfarer and Aviator lines of sunglasses.',
        ]);

        Brand::create([
            'nama_brand' => 'Oakley',
            'deskripsi' => 'Oakley, Inc., based in Lake Forest, California, and a subsidiary of Italian corporate giant Luxottica based in Milan, designs, develops and manufactures sports performance equipment and lifestyle pieces including sunglasses, sports visors, ski/snowboard goggles, watches, apparel, backpacks, shoes, optical frames, and other accessories.',
        ]);

        Brand::create([
            'nama_brand' => 'Gucci',
            'deskripsi' => 'Gucci is a luxury fashion house based in Florence, Italy. Its product lines include handbags, ready-to-wear, shoes and accessories, makeup, fragrances, and home decoration.',
        ]);

        Brand::create([
            'nama_brand' => 'Prada',
            'deskripsi' => 'Prada S.p.A. is an Italian luxury fashion house that was founded in 1913 by Mario Prada. It specializes in leather handbags, travel accessories, shoes, ready-to-wear, perfumes and other accessories.',
        ]);

        Brand::create([
            'nama_brand' => 'Burberry',
            'deskripsi' => 'Burberry Group PLC is a British luxury fashion house headquartered in London, England. It currently designs and distributes ready to wear including trench coats, leather goods, footwear, fashion accessories, eyewear, fragrances, and cosmetics.',
        ]);

        Brand::create([
            'nama_brand' => 'Tom Ford',
            'deskripsi' => 'Thomas Carlyle Ford is an American fashion designer and filmmaker. He launched his eponymous luxury brand in 2006, having previously served as the creative director at Gucci and Yves Saint Laurent.',
        ]);

        Brand::create([
            'nama_brand' => 'Dior',
            'deskripsi' => 'Christian Dior SE, commonly known as Dior, is a French luxury goods company controlled and chaired by French businessman Bernard Arnault, who also heads LVMH, the world\'s largest luxury group.',
        ]);

        Brand::create([
            'nama_brand' => 'Chanel',
            'deskripsi' => 'Chanel S.A. is a French privately held company owned by Alain Wertheimer and Gérard Wertheimer, grandsons of Pierre Wertheimer, who was an early business partner of the couturière Coco Chanel.',
        ]);
    }
}
