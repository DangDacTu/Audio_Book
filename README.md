Group_4-Thiết kế web nâng cao-1-1-1-25(COUR01.TH1)
# XÂY DỰNG WEBSITE AUDIO BOOKS
## Giới Thiệu Dự Án

Website Sách Nói là một nền tảng thương mại điện tử hiện đại, cho phép người dùng mua, nghe và quản lý sách nói trực tuyến.
Hệ thống hỗ trợ thanh toán VNPAY, quản lý doanh thu cho admin, và mang lại trải nghiệm đọc - nghe sách tiện lợi cho người dùng.
## Thành Viên Nhóm
- **Đặng Đắc Tú**: Phát triển phần mềm toàn diện.
- **Vũ Thị Khánh Vân**: Phát triển phần mềm toàn diện.
## 1.Các chức năng chính
### Admin
#### 1.1 Chức năng quản lý sản phẩm

- Thêm sản phẩm (sách nói).

- Sửa thông tin sản phẩm.

- Xóa sản phẩm.

### 1.2 Quản lý tài khoản người dùng

- Xóa người dùng khỏi hệ thống.

### 1.3 Quản lý doanh thu

- Thống kê, xem báo cáo doanh thu.

- Xuất báo cáo PDF.

### User 
#### 1.4 Chức năng giỏ hàng

- Thêm sản phẩm vào giỏ hàng.

- Xóa sản phẩm khỏi giỏ hàng.

- Thanh toán đơn hàng.

#### 1.5 Thanh toán & Thư viện sách nói

- Khi thanh toán thành công qua VNPAY, hệ thống tự động thêm sách vào thư viện cá nhân.

####Trong thư viện, người dùng có thể:

- Nghe sách nói trực tiếp trên website.

- Xóa sách khỏi thư viện nếu không muốn lưu nữa.

### Công Nghệ 

- Ngôn ngữ & Framework: PHP (Laravel) / Node.js / Express

- Cơ sở dữ liệu: MySQL

- Thanh toán: VNPAY Sandbox API

- Giao diện: HTML, CSS, JavaScript, Bootstrap

- Xuất báo cáo: barryvdh/laravel-dompdf
## UML Dự Án
### 2.1 Mô hình quan hệ
![database](https://github.com/DangDacTu/Audio_Book/blob/master/public/images/download.jpg)
### 2.2 Sơ đồ Use case
#### Admin
![admin](https://github.com/DangDacTu/Audio_Book/blob/master/public/images/admin.jpg)
#### User
![user](https://github.com/DangDacTu/Audio_Book/blob/master/public/images/dangkinhap.jpg)
### 2.3 Lưu đồ thuật toán
### Sơ đồ hoạt động các chức năng
#### Chức năng đăng kí & đăng nhập
![image](https://github.com/user-attachments/assets/719df947-5ddb-40a1-9a04-4345fd48c74b)
![image](https://github.com/user-attachments/assets/0b56c5d5-e562-4694-9d68-fafdf1645d4f)
### Chức năng thêm sản phẩm vào giở hàng
![image](https://github.com/DangDacTu/Audio_Book/blob/master/public/images/giohangthanhtoan.jpg)
### Chức năng tìm kiếm
![image](https://github.com/user-attachments/assets/50afbff1-181f-4ed3-b1ab-671ae9b82eae)
### Chức năng thư viện
![image](https://github.com/DangDacTu/Audio_Book/blob/master/public/images/thuvien.jpg)
### Biểu đồ tuần tự các chức năng
#### đăng nhập & đăng kí
![signin](https://github.com/DangDacTu/Audio_Book/blob/master/public/images/dangki.png)
![signup](https://github.com/DangDacTu/Audio_Book/blob/master/public/images/dangnhappp.png)
#### tìm kiếm
![search](https://github.com/DangDacTu/Audio_Book/blob/master/public/images/timkiem.png)
### Mua Sách
![đặthàng](https://github.com/DangDacTu/Audio_Book/blob/master/public/images/muahangthanhtoan.png)
### Thư viện
![payment](https://github.com/DangDacTu/Audio_Book/blob/master/public/images/thuvien.png)
## GitHub Pages Dự Án
[Truy cập dự án tại đây](https://github.com/DangDacTu/Audio_Book)
