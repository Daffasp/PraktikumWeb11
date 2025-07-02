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

## 📁 Pembuatan Tabel Kategori

Untuk mengelompokkan artikel berdasarkan kategori, kita akan membuat tabel baru bernama `kategori`.

### 🧱 Struktur Tabel `kategori`

Berikut adalah struktur tabel `kategori`:

| Kolom     | Tipe Data        | Keterangan                       |
|-----------|------------------|----------------------------------|
| id        | INT (auto increment) | Primary Key                    |
| nama      | VARCHAR(100)     | Nama kategori                    |
| slug      | VARCHAR(100)     | Slug URL kategori (unik)        |
| created_at| DATETIME         | Waktu dibuat                     |
| updated_at| DATETIME         | Waktu diperbarui                 |

---

### 💻 Query SQL untuk Membuat Tabel

```sql
CREATE TABLE kategori (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    slug VARCHAR(100) NOT NULL UNIQUE,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
