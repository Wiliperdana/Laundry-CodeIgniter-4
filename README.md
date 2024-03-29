# Laundry CodeIgniter 4

Aplikasi Sederhana Pengelolaan Laundry Menggunakan CodeIgniter 4. 

![Alt text](/public/img/ss-login.png "Login Page")
![Alt text](/public/img/ss-outlet.png "Outlet Page")
![Alt text](/public/img/ss-transaksi.png "Transaksi Page")

# Installation
### Clone the repository:
```
git clone https://github.com/Wiliperdana/Laundry-CodeIgniter-4.git
```

### Pindah ke directory Laundry-CodeIgniter-4:
```
cd Laundry-CodeIgniter-4
```

### Install dependency:
```
composer install
```

### Copy file .env.example
```
cp .env.example .env
```

### Buat database baru dan konfigurasi file .env:
```
database.default.hostname = localhost
database.default.database = db_laundry
database.default.username = root
database.default.password = 
database.default.DBDriver = MySQLi
```

### Migrasi database:
```
php spark migrate
```

### Jalankan aplikasi dengan perintah:
```
php spark serve
``` 

Sekarang buka browser dengan alamat address http://localhost:8080/

### Credentials
```
administrator
username : admin
password : admin123

kasir
username : kasirmalang1
password : kasir123

owner
username : ownermalang
password : ownermalang
``` 