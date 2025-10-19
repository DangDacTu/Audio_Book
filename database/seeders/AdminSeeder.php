<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // Xóa tài khoản admin cũ (nếu có) để tránh trùng lặp
        DB::table('admin')->where('admin_email', 'admin@gmail.com')->delete();

        // Thêm admin mới
        DB::table('admin')->insert([
            'admin_name' => 'Admin',
            'admin_email' => 'admin@gmail.com',
            'admin_password' => md5('11111111'), 
            'admin_phone'    => '0123456789',
        ]);
    }
}
