
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

## ⚙️ Memodifikasi Controller: `Artikel`

Untuk menampilkan data artikel bersamaan dengan data kategorinya, kita perlu memodifikasi controller `Artikel.php` agar menggunakan method relasi dari `ArticleModel`.
![image](https://github.com/user-attachments/assets/849528c0-c673-48d1-9804-223251e92610)
![image](https://github.com/user-attachments/assets/bfee20d9-2ef8-4eb5-8733-36aa54916e16)
![image](https://github.com/user-attachments/assets/ed53f2a7-4264-4516-bcc2-d81b00c40c9d)
![image](https://github.com/user-attachments/assets/8d8efeda-34c2-4e87-93d5-f7178cbee70f)

## 🖼️ Memodifikasi View: `view/artikel/index.php`

Setelah kita menambahkan relasi artikel ↔ kategori di model dan controller, kita perlu menampilkan nama kategori di tampilan `index.php`.
![image](https://github.com/user-attachments/assets/ae46d133-70b2-45dc-a542-7486706d9cee)

## 🖥️ Memodifikasi View: `view/artikel/admin_index.php`

Setelah menghubungkan tabel artikel dengan kategori, kita juga perlu menyesuaikan tampilan admin (`admin_index.php`) agar menampilkan kategori pada daftar artikel.
![image](https://github.com/user-attachments/assets/9441f98b-280c-4c6e-855f-58d601c4b5b3)
![image](https://github.com/user-attachments/assets/ee082b04-eaf9-4ee3-a775-620cb8f74291)
![image](https://github.com/user-attachments/assets/591efb1c-24cf-47fa-8964-640720c65b30)

## ➕ Memodifikasi View: `view/artikel/form_add.php`

Form ini digunakan untuk **menambahkan artikel baru**. Kita akan memodifikasi form agar admin dapat memilih **kategori** artikel dari dropdown yang terhubung dengan tabel `kategori`.
![image](https://github.com/user-attachments/assets/a75d52d4-2f53-4b4a-a758-df70d18953f5)

## ✏️ Memodifikasi View: `view/artikel/form_edit.php`

Form ini digunakan untuk **mengedit artikel**. Kita akan menambahkan dropdown kategori dan menampilkan kategori yang sudah dipilih oleh artikel saat ini.
![image](https://github.com/user-attachments/assets/61913828-f5aa-4843-8472-609bcab4ba13)

## ✅ Testing Fitur Relasi Artikel dan Kategori

Setelah seluruh konfigurasi selesai (tabel, model, controller, dan view), saatnya melakukan **pengujian** untuk memastikan bahwa relasi artikel ↔ kategori berjalan sebagaimana mestinya.
![image](https://github.com/user-attachments/assets/b33239bf-32ef-4c8e-a8b2-22ba2a8103aa)

## 🧪 Testing: Menambah Artikel Baru dengan Memilih Kategori

Fitur ini menguji apakah proses input artikel baru berhasil menyimpan data **termasuk kategori yang dipilih**, serta apakah relasi artikel ↔ kategori bekerja sesuai harapan.
![image](https://github.com/user-attachments/assets/4f4c8e5c-2afb-4766-b84e-cc8c763a0e78)

## 🧪 Testing: Mengedit Artikel dan Mengubah Kategorinya

Fitur ini menguji apakah admin dapat mengubah data artikel **termasuk mengganti kategori** yang telah dipilih sebelumnya.
![image](https://github.com/user-attachments/assets/64f4658d-d993-41f5-9453-d390a948b927)

## 🗑️ Testing: Menghapus Artikel

Fitur ini menguji apakah admin dapat **menghapus artikel** yang sudah ada, dan memastikan data benar-benar terhapus dari database.
## Sebelum
![image](https://github.com/user-attachments/assets/2ce937dd-3260-47db-b737-92ca7cb4fbc8)
## Sesudah
![image](https://github.com/user-attachments/assets/02e9b806-8a64-46b3-b6dc-aa7235386b8a)
