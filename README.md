<h1>Movie Web App</h1>


B1:**git clone về**

```bash
[ .\venv\Scripts\activate](https://github.com/tienvip122002/movie.git)
```


B2:**Tải database movie.sql trong thư mục về và mở mysql của xampp**

Truy cập link 
```bash
http://localhost/phpmyadmin
```
B3:chọn nhập và chọn file movie.sql để nhập

**Mở thư mục movie mới clone **
chuyển file '.env.example' thành '.env'

vào file vừa đổ tên '.evn' thay đổi DB_DATABASE=movie


B4**chuột trái vào thư mục movie vừa clone chọn git bash here hoặc open in terminal**

nhập các dòng lệnh sau
```bash
composer update --no-scripts
```
```bash
php artisan cache:clear
```
```bash
 php artisan config:clear
```
```bash
php artisan key:generate
```

 sau đó cài đặt npm
 ```bash
npm install
```
và chạy
```bash
npm run dev
```

sau đó chạy serve và xem giúp em ạ em cảm ơn anh/chị!
```bash
php artisan serve
```

***hướng dẫn***
vô đường dẫn /home để vào admin có thể thay đổi trong user để vào

