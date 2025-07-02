
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
# 📘 Daftar Isi Praktikum Web Programming (CI4 + VueJS)

| No  | Praktikum                | Link Repository                                                   |
|-----|--------------------------|-------------------------------------------------------------------|
| 1   | Praktikum 1 - 3          | [🔗 Lab 1 - 3 (CodeIgniter 4)](https://github.com/Daffasp/Lab7Websiteee) |
| 2   | Praktikum 4 - 6          | [🔗 Lab 4 - 6 (CodeIgniter 4)](https://github.com/Daffasp/Lab11_ci4)     |
| 3   | Praktikum 8 - VueJS Final| [🔗 VueJS + CI4 Final Project](https://github.com/Daffasp/Lab_vuejs)     |

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

## ⚙️ Membuat AJAX Controller

AJAX Controller digunakan untuk menangani permintaan data secara dinamis dari **frontend** (seperti Vue.js atau jQuery), **tanpa perlu me-refresh halaman**. Umumnya digunakan untuk proses **CRUD** melalui RESTful API.
![image](https://github.com/user-attachments/assets/fe9064bb-c3f8-4125-97ed-c9748ea6fcf6)

## 🖼️ Membuat View

Dalam arsitektur MVC CodeIgniter 4, **View** bertanggung jawab untuk menampilkan data yang dikirim oleh Controller ke pengguna. View dapat berupa HTML, dengan sedikit PHP untuk menampilkan variabel atau melakukan loop.
![image](https://github.com/user-attachments/assets/48412ce1-fa43-44c1-afa3-2d6f3d577cb1)
![image](https://github.com/user-attachments/assets/5d15782b-73ab-4385-b64b-9c535a8e5c09)
## 🔧 Persiapan

- Pastikan MySQL Server sudah berjalan.  
- Buka database `sukses`.  
- Pastikan tabel `artikel` dan `kategori` sudah ada dan terisi data.  
- Pastikan library jQuery sudah terpasang atau dapat diakses melalui CDN.

## 🛠️ Modifikasi Controller Artikel

Ubah method `admin_index()` di `Artikel.php` untuk mengembalikan data dalam format JSON jika request adalah AJAX. (Sama seperti modul sebelumnya)

Contoh kode:

```php
public function admin_index()
{
    $model = new \App\Models\ArticleModel();
    $data['artikel'] = $model->getArtikelWithKategori()->findAll();

    if ($this->request->isAJAX()) {
        return $this->response->setJSON($data['artikel']);
    }

    return view('artikel/admin_index', $data);
}
```
## 🛠️ Modifikasi Controller Artikel

Penjelasan:
• `$page = $this->request->getVar('page') ?? 1;`: Mendapatkan nomor halaman dari request. Jika tidak ada, default ke halaman 1.  
• `$builder->paginate(10, 'default', $page);`: Menerapkan pagination dengan nomor halaman yang diberikan.  
• `$this->request->isAJAX()`: Memeriksa apakah request yang datang adalah AJAX.  
• Jika AJAX, kembalikan data artikel dan pager dalam format JSON.  
• Jika bukan AJAX, tampilkan view seperti biasa.

---

## 🧾 Modifikasi View (admin_index.php)

• Ubah view `admin_index.php` untuk menggunakan jQuery.  
• Hapus kode yang menampilkan tabel artikel dan pagination secara langsung.  
• Tambahkan elemen untuk menampilkan data artikel dan pagination dari AJAX.  
• Tambahkan kode jQuery untuk melakukan request AJAX.
```php
<?= $this->include('template/admin_header'); ?>

<div class="row mb-3">
  <div class="col-md-6">
    <form id="search-form" class="form-inline">
      <input type="text" name="q" id="search-box" value="<?= $q ?? '' ?>" 
        placeholder="Cari judul artikel" class="form-control mr-2"/>
      <select name="kategori_id" id="category-filter" class="form-control mr-2">
        <option value="">Semua kategori</option>
        <?php foreach ($kategori as $k): ?>
        <option value="<?= $k['id_kategori']; ?>" 
          <?= ($kategori_id == $k['id_kategori']) ? 'selected' : ''; ?>>
          <?= $k['nama_kategori']; ?>
        </option>
        <?php endforeach; ?>
      </select>
      <input type="submit" value="Cari" class="btn btn-primary"/>
    </form>
  </div>
</div>

<div id="article-container"></div>
<div id="pagination-container"></div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
$(document).ready(function() {
  const articleContainer = $('#article-container');
  const paginationContainer = $('#pagination-container');
  const searchForm = $('#search-form');
  const searchBox = $('#search-box');

  const categoryFilter = $('#category-filter');

  const fetchData = (url = '') => {
    $.ajax({
      url: url || '<?= base_url("admin/artikel/search") ?>',
      type: 'GET',
      data: {
        q: searchBox.val(),
        kategori_id: categoryFilter.val(),
      },
      dataType: 'json',
      beforeSend: function() {
        articleContainer.html('<p>Loading...</p>');
      },
      success: function(data) {
        renderArticles(data.data, data.pagination, data.kategori_id);
      }
    });
  };

  const renderArticles = (articles, pagination, kategori_id) => {
    let html = '';
    articles.forEach(article => {
      html += `<div class="card mb-3">
        <div class="card-body">
          <h5>${article.judul}</h5>
          <p>${article.isi.substring(0, 150)}...</p>
        </div>
      </div>`;
    });
    articleContainer.html(html);
    paginationContainer.html(pagination);
  };

  fetchData();

  searchForm.on('submit', function(e) {
    e.preventDefault();
    fetchData();
  });

  categoryFilter.on('change', function() {
    fetchData();
  });
});
</script>
```
# Pertanyaan dan Tugas

Selesaikan semua langkah praktikum di atas.  
Modifikasi tampilan data artikel dan pagination sesuai kebutuhan desain.
![image](https://github.com/user-attachments/assets/36504d12-aaac-4cc4-9c49-f963fd8babdc)

# Implementasikan fitur sorting (mengurutkan artikel berdasarkan judul, dll.) dengan AJAX.  
Berdasarkan ID:
![image](https://github.com/user-attachments/assets/45f1a116-ae72-452c-a662-995255884053)

# Berdasarkan Judul:
![image](https://github.com/user-attachments/assets/d587a15f-6380-405f-8e96-3de430ee4369)

# Berdasaekan Kategori
![image](https://github.com/user-attachments/assets/ed8287ef-bb6f-4178-b994-e7ad77f28a43)

# Praktikum: REST API dengan CodeIgniter 4

## 🛠️ Persiapan

Periapan awal adalah mengunduh aplikasi **REST Client**.  
Ada banyak aplikasi yang dapat digunakan untuk keperluan tersebut, salah satunya adalah **Postman**.

🔹 **Postman** merupakan aplikasi yang berfungsi sebagai REST Client dan digunakan untuk melakukan testing REST API.  
🔗 Unduh aplikasi Postman melalui tautan berikut:  
[https://www.postman.com/downloads/](https://www.postman.com/downloads/)

---

## 🧩 Membuat Model

Pada modul sebelumnya sudah dibuat `ArtikelModel`.  
Pada modul ini, kita akan **memanfaatkan model tersebut** agar dapat diakses melalui API.

---

## 📁 Membuat REST Controller

Pada tahap ini, kita akan membuat file **REST Controller** yang berisi fungsi-fungsi untuk:
- Menampilkan data
- Menambah data
- Mengubah data
- Menghapus data

📌 Masuk ke direktori `app\Controllers` dan buat file baru bernama:
![image](https://github.com/user-attachments/assets/5c84e01d-6056-4dd9-a7b8-6373a70c4f25)
![image](https://github.com/user-attachments/assets/cd32cbd6-f705-4686-aa78-d409ee1b4dcc)
## ⚙️ Penjelasan Method dalam REST Controller

Kode di atas berisi **5 method**, yaitu:

- **`index()`**  
  Berfungsi untuk menampilkan seluruh data dari database.

- **`create()`**  
  Berfungsi untuk menambahkan data baru ke dalam database.

- **`show($id)`**  
  Berfungsi untuk menampilkan satu data spesifik berdasarkan ID.

- **`update($id)`**  
  Berfungsi untuk mengubah data yang sudah ada berdasarkan ID.

- **`delete($id)`**  
  Berfungsi untuk menghapus data dari database berdasarkan ID.

## 🛣️ Membuat Routing REST API

Untuk mengakses REST API di CodeIgniter 4, kita perlu **mendefinisikan route** terlebih dahulu.
![image](https://github.com/user-attachments/assets/0c623406-a66e-4a2a-8ca8-45377e9ce42d)

## Testing REST API CodeIgniter

Buka aplikasi postman dan pilih create new → HTTP Request
![image](https://github.com/user-attachments/assets/c5ca3df7-c5ea-48fe-935a-e14db24c3b2a)

## Menampilkan Data Spesifik

Masih menggunakan method GET, hanya perlu menambahkan ID artikel di belakang URL seperti ini:  
http://localhost:8080/post/2

Selanjutnya, klik Send. Request tersebut akan menampilkan data artikel yang memiliki ID nomor 2 di database.
![image](https://github.com/user-attachments/assets/7b399a7b-4a93-4198-9cae-fe11fda65615)

# 🧪 PRAKTIKUM 11 – Pengenalan Vue.js dan Axios (Manual dengan CDN)

## 📌 Persiapan

Untuk memulai penggunaan framework **Vue.js**, terdapat dua cara yang umum dilakukan:
- Menggunakan **npm** (Node Package Manager)
- Menggunakan cara **manual** dengan CDN

🛠️ **Untuk praktikum kali ini, kita akan menggunakan cara manual.**  
Cara ini cukup praktis dan cocok untuk pemula yang belum menggunakan build tool seperti Webpack atau Vite.

📦 Yang diperlukan:
- **Vue.js** → Untuk membuat komponen dan reactive UI.
- **Axios** → Untuk melakukan komunikasi dengan REST API.

🔗 Keduanya akan digunakan melalui **CDN** langsung di dalam file HTML.
# Library VueJS
![image](https://github.com/user-attachments/assets/aa98036a-b181-40ac-818a-83ebc76a5135)
# Library Axios
![image](https://github.com/user-attachments/assets/c151b3ad-af92-4ddf-a874-c4df99e5514e)

## Menampilkan Data

File: `index.html`
![image](https://github.com/user-attachments/assets/5c885ab8-7f3a-4735-aa05-259b16dfbe93)
![image](https://github.com/user-attachments/assets/1861ded4-3c53-4151-8b61-e6622e413f59)
![image](https://github.com/user-attachments/assets/a5726b91-3a60-47ee-bcc2-4d183153ddcb)

## File `apps.js`
![image](https://github.com/user-attachments/assets/68a7d8e4-0630-4fe8-b32b-16dc7f4bd96d)

## File `style.css`
![image](https://github.com/user-attachments/assets/6bebdd94-2216-4571-bb9a-984c01b7d93e)
![image](https://github.com/user-attachments/assets/5e2b5100-84fe-455d-9c76-647a11751742)

## Hasil Outputnya
![image](https://github.com/user-attachments/assets/1b307b9c-27e5-463d-b4be-0ae3b2c6dea8)
