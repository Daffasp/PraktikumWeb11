# Praktikum 7–11 - Pemrograman Website 2

## 👤 Profil Mahasiswa

| Atribut       | Keterangan                 |
|---------------|----------------------------|
| Nama          | Daffa Sadewa Putra         |
| NIM           | 312310463                  |
| Kelas         | TI.23.A.5                  |
| Mata Kuliah   | Pemrograman Website 2      |
| Praktikum     | 7 s/d 11                   |

---

## 📁 Pembuatan dan Relasi Tabel Kategori

### 1. 🧱 Membuat Tabel `kategori`

Tabel `kategori` digunakan untuk mengelompokkan artikel berdasarkan kategori tertentu.

#### Struktur Tabel

| Kolom      | Tipe Data         | Keterangan                                |
|------------|-------------------|-------------------------------------------|
| id         | INT (auto increment) | Primary Key                            |
| nama       | VARCHAR(100)      | Nama kategori                             |
| slug       | VARCHAR(100)      | Slug URL kategori, harus unik             |
| created_at | DATETIME          | Waktu dibuat otomatis                     |
| updated_at | DATETIME          | Waktu diperbarui otomatis jika ada update |

#### 💻 Query SQL

```sql
CREATE TABLE kategori (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    slug VARCHAR(100) NOT NULL UNIQUE,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
```
## 🛠️ Membuat Model: `KategoriModel`

Setelah membuat tabel `kategori` pada database, langkah selanjutnya adalah membuat model untuk mengelola data kategori melalui CodeIgniter 4.
![image](https://github.com/user-attachments/assets/036b9a6e-8008-40f0-b07c-f4993118d2e6)

## 🔄 Memodifikasi Model: `ArticleModel`

Setelah membuat `KategoriModel`, langkah selanjutnya adalah memodifikasi model `ArticleModel` agar mendukung relasi dengan tabel `kategori`.
![image](https://github.com/user-attachments/assets/63948ec8-4efa-4012-89d1-3a18bc53981c)


