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
        DB::table('users')->where('email', 'admin@gmail.com')->delete();

        // Thêm admin mới
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => md5('123'), // Sử dụng mã hoá an toàn thay vì md5
        ]);
    }
}
