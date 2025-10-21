Group_4-Thiết kế web nâng cao-1-1-1-25(COUR01.TH1)
# XÂY DỰNG WEBSITE AUDIO BOOKS
## Giới Thiệu Dự Án

Website Sách Nói là một nền tảng thương mại điện tử hiện đại, cho phép người dùng mua, nghe và quản lý sách nói trực tuyến.
Hệ thống hỗ trợ thanh toán VNPAY, quản lý doanh thu cho admin, và mang lại trải nghiệm đọc - nghe sách tiện lợi cho người dùng.
## Thành Viên Nhóm
- **Nguyễn Tuấn Thành**: Phát triển phần mềm toàn diện.
- **Nguyễn Huy Hoàng**: Phát triển phần mềm toàn diện.
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
![database](https://github.com/user-attachments/assets/9059466e-84f8-47a5-a5fa-a5b3301837cd)
### 2.2 Sơ đồ Use case
#### Admin
![admin](https://github.com/user-attachments/assets/8e633632-44cf-43a4-8516-b64c3a22bd07)
#### User
![user](https://github.com/user-attachments/assets/a5c841bb-1e3b-4042-bf25-fdfe00e263f7)
### 2.3 Lưu đồ thuật toán
### Sơ đồ hoạt động các chức năng
#### Chức năng đăng kí & đăng nhập
![image](https://github.com/user-attachments/assets/719df947-5ddb-40a1-9a04-4345fd48c74b)
![image](https://github.com/user-attachments/assets/0b56c5d5-e562-4694-9d68-fafdf1645d4f)
#### Chức năng quản lý dơn hàng
![image](https://github.com/user-attachments/assets/75b1c56f-cd6a-4611-8e62-2e4e42f077ed)
### Chức năng thêm sản phẩm vào giở hàng
![image](https://github.com/user-attachments/assets/7b50d271-9394-46f4-b4fd-c0c47a2bdc19)
### Chức năng tìm kiếm & xem chi tiết sản phẩm
![image](https://github.com/user-attachments/assets/50afbff1-181f-4ed3-b1ab-671ae9b82eae)
### Chức năng thanh toán
![image](https://github.com/user-attachments/assets/8e573c58-bf38-4840-965b-5b0a8ce3f78e)
### Biểu đồ tuần tự các chức năng
#### đăng nhập & đăng kí
![signin](https://github.com/user-attachments/assets/2ba80e95-4b4b-49f5-b57e-bd3bf81e3d79)
![signup](https://github.com/user-attachments/assets/31d49f10-f346-438c-b13a-33aa16cc2646)
#### tìm kiếm
![search](https://github.com/user-attachments/assets/272ecafe-6756-4880-a82e-4dc99112403d)
### Mua Sách
![đặthàng](https://github.com/user-attachments/assets/dd8e7158-eacf-4e6b-bea8-4d75a77fa5c6)
### Thư viện
![payment](https://github.com/user-attachments/assets/30159407-8544-4e85-bd86-224502dbbede)
## GitHub Pages Dự Án
[Truy cập dự án tại đây](https://github.com/ngtthanh365/WEBNC-GROUP7-CSE702051-1-3-24-COUR01.TH2)
