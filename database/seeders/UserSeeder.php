<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Xóa tài khoản admin cũ (nếu có) để tránh trùng lặp
        DB::table('users')->where('email', 'user@gmail.com')->delete();

        // Thêm admin mới
        DB::table('users')->insert([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => md5('12345678'), // Sử dụng mã hoá an toàn thay vì md5
        ]);
    }
}
