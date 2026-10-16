# Dokumentasaun Instalasaun
## Sistema Informasaun Jestaun Dadus Suku Purugoa

### Rekerimentu Sistema
- XAMPP (PHP 8.0+, MariaDB/MySQL 5.7+)
- Composer
- Web Browser modernu

### Pasu Instalasaun iha XAMPP

#### 1. Prepara Pasta
Kopia pasta `sucopurugoa` ba `C:\xampp\htdocs\sucopurugoa`

#### 2. Kria Database
- Aberte XAMPP Control Panel
- Start MySQL no Apache
- Aberte http://localhost/phpmyadmin
- Kria database foun ho naran `sucopurugoa` (utf8mb4_general_ci)
- Importa ficheiru `database.sql` nebee iha pasta projeitu

Alternativa, uza terminal:
```
mysql -u root -p < database.sql
```

#### 3. Konfigurasaun Database
Edita ficheiru `app/Config/Database.php` no ajusta tuir konfigurasaun ita boot:
```php
public array $default = [
    'hostname' => 'localhost',
    'username' => 'root',        // Ita boot nia MySQL username
    'password' => '',            // Ita boot nia MySQL password
    'database' => 'sucopurugoa',
    'DBDriver' => 'MySQLi',
    // ...
];
```

#### 4. Konfigurasaun Base URL
Edita `app/Config/App.php`:
```php
public string $baseURL = 'http://localhost/sucopurugoa/';
```

#### 5. Konfigurasaun .env
Kopia ka renomeia `env` ba `.env` no ajusta:
```
CI_ENVIRONMENT = development
app.baseURL = 'http://localhost/sucopurugoa/'
app.indexPage =

database.default.hostname = localhost
database.default.database = sucopurugoa
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi
```

#### 6. Permissaun Pasta
Tasi permissaun ba pasta tuir mai ne'e (Windows normalmente la presija):
- `writable/` (maka atu hakerek)
- `uploads/` (maka atu hakerek)

#### 7. Migrasaun Database (Alternativa)
Se iha Composer, bele uza migrasaun:
```
cd C:\xampp\htdocs\sucopurugoa
composer install
php spark migrate
php spark db:seed InitialSeeder
```

### Login Default
- **URL:** http://localhost/sucopurugoa
- **Username:** `admin`
- **Password:** `admin123`

### Uzu Sistema

#### Dashboard
Hatudu kartu informasaun no grafiku kona-ba:
- Total populasaun, mane, feto
- Total uma kain, aldeia, RT
- Moris foun no mate
- Grafiku populasaun, edukasaun, servisu, relijiaun

#### Jestaun Aldeia
- Kria, lee, edita, apaga dadus aldeia
- Kódigu aldeia, naran, xefe aldeia

#### Jestaun RT
- Kria, lee, edita, apaga dadus RT
- Númeru RT, xefe RT, aldeia

#### Jestaun Uma Kain
- Kria, lee, edita, apaga dadus KK
- Númeru KK, NIK, xefe família, jéneru, foto
- Print dadus KK

#### Jestaun Sidadaun
- Kria, lee, edita, apaga dadus sidadaun
- NIK, naran, jéneru, relijiaun, edukasaun, servisu
- Tinan automátiku
- Print dadus sidadaun
- Export PDF no Excel

#### Relatóriu
- Relatóriu populasaun, uma kain, aldeia, RT
- Relatóriu edukasaun no servisu ho grafiku
- Export PDF, Excel, no Print

#### Peskiza
- Peskiza husi NIK, naran, KK, telefone

#### Konfigurasaun
- Troka profíl admin (username, password, foto)
- Konfigurasaun sistema (naran, logo)
- Backup no restore database

#### Log Aktividade
- Hare atividade hotu nebee admin halo
- Login, logout, aumenta, edita, apaga dadus

### Estrutura Pasta
```
sucopurugoa/
├── app/
│   ├── Config/          # Konfigurasaun sistema
│   ├── Controllers/     # Kontrolador
│   ├── Database/
│   │   ├── Migrations/  # Migrasaun database
│   │   └── Seeds/       # Seeder
│   ├── Filters/         # Filter (Auth)
│   ├── Helpers/         # Função ajuda
│   ├── Libraries/       # Biblioteca
│   ├── Models/          # Model dadus
│   └── Views/           # Template view
│       ├── layout/      # Header, sidebar, footer
│       └── admin/       # Pájina admin
├── public/
│   ├── assets/          # CSS, JS, Imajen
│   └── uploads/         # Upload foto, logo, backup
├── writable/            # Cache, log, session
├── database.sql         # SQL dump
└── INSTALL.md           # Dokumentasaun ida ne'e
```

### Seguransa
- Session Login
- CSRF Protection
- XSS Protection
- Prepared Query (CI4 Query Builder)
- Upload Validation (mantein seguransa)
- Password hash uza password_hash()

### Suporta
Mantis duvida ka problema, kontaktu:
- Email: su copurugoa@gmail.com
