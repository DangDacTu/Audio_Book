<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $assetsBase = __DIR__ . '/assets/'; // mong là database/seeders/assets
        $assetsImages = $assetsBase . 'images/';
        $assetsAudio  = $assetsBase . 'audio/';

        $publicImages = public_path('images');
        $publicAudio  = public_path('audio');

        // Tạo thư mục public nếu chưa có
        if (!File::exists($publicImages)) {
            File::makeDirectory($publicImages, 0755, true);
        }
        if (!File::exists($publicAudio)) {
            File::makeDirectory($publicAudio, 0755, true);
        }

        $products = [
            [
                'category_name' => 'Hai số phận',
                'category_price' => 50000,
                'category_image' => '2sophan.jpg',
                'category_audio' => 'Số Đỏ - Vũ Trọng Phụng - Vũ Trọng Phụng - VoizFM.mp3',
            ],
            [
                'category_name' => 'Việc làng',
                'category_price' => 70000,
                'category_image' => 'vieclang.jpg',
                'category_audio' => 'Số Đỏ - Vũ Trọng Phụng - Vũ Trọng Phụng - VoizFM.mp3',
            ],
            [
                'category_name' => 'Giồng tố',
                'category_price' => 70000,
                'category_image' => 'giongto.jpg',
                'category_audio' => 'Số Đỏ - Vũ Trọng Phụng - Vũ Trọng Phụng - VoizFM.mp3',
            ],
            [
                'category_name' => 'Đồi gió hú',
                'category_price' => 70000,
                'category_image' => 'doigiohu.jpg',
                'category_audio' => 'Số Đỏ - Vũ Trọng Phụng - Vũ Trọng Phụng - VoizFM.mp3',
            ],
            [
                'category_name' => 'Thiên nga đen',
                'category_price' => 70000,
                'category_image' => 'thiennga.jpg',
                'category_audio' => 'Số Đỏ - Vũ Trọng Phụng - Vũ Trọng Phụng - VoizFM.mp3',
            ],
            [
                'category_name' => 'Việt Nam sử lược',
                'category_price' => 70000,
                'category_image' => 'vieSu.jpg',
                'category_audio' => 'Số Đỏ - Vũ Trọng Phụng - Vũ Trọng Phụng - VoizFM.mp3',
            ],
            [
                'category_name' => 'Tam quốc diễn nghĩa',
                'category_price' => 70000,
                'category_image' => 'tamquoc.jpg',
                'category_audio' => 'Số Đỏ - Vũ Trọng Phụng - Vũ Trọng Phụng - VoizFM.mp3',
            ],
            [
                'category_name' => 'Đồi cát',
                'category_price' => 70000,
                'category_image' => 'doicat.jpg',
                'category_audio' => 'Số Đỏ - Vũ Trọng Phụng - Vũ Trọng Phụng - VoizFM.mp3',
              ],
             // Thêm các sản phẩm khác nếu muốn
        ];

        foreach ($products as $p) {
            // nếu đã có sản phẩm trùng tên, bỏ qua
            if (DB::table('tbl_product')->where('category_name', $p['category_name'])->exists()) {
                $this->command->info("Skip exists: {$p['category_name']}");
                continue;
            }

            $assetImagePath = $assetsImages . $p['category_image'];
            $assetAudioPath = $assetsAudio . $p['category_audio'];

            // Yêu cầu cả 2 file phải tồn tại
            if (!File::exists($assetImagePath) || !File::exists($assetAudioPath)) {
                $this->command->error("Missing media for '{$p['category_name']}'. Required: {$assetImagePath} and {$assetAudioPath}");
                continue;
            }

            // Sinh tên file unique và copy
            $savedImage = time() . '_' . Str::random(6) . '_' . $p['category_image'];
            $savedAudio = time() . '_' . Str::random(6) . '_' . $p['category_audio'];

            File::copy($assetImagePath, $publicImages . '/' . $savedImage);
            File::copy($assetAudioPath, $publicAudio . '/' . $savedAudio);

            DB::table('tbl_product')->insert([
                'category_name' => $p['category_name'],
                'category_price' => $p['category_price'],
                'category_image' => $savedImage,
                'category_audio' => $savedAudio,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $this->command->info("Inserted: {$p['category_name']}");
        }
    }
}
