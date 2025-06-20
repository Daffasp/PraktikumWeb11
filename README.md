<div align="center">
   <img src="https://upload.wikimedia.org/wikipedia/commons/2/27/PHP-logo.svg" width="100" alt="PHP Logo">
   <img src="https://www.svgrepo.com/show/353579/codeigniter.svg" width="100" alt="CodeIgniter 4 Logo">
 </div>
 
 # 📌 Laporan Praktikum 1: PHP Framework (CodeIgniter 4)
 
 ## 👤 Profil Mahasiswa
 
 | Atribut         | Keterangan            |
 | --------------- | --------------------- |
 | **Nama**        | Daffa Sadewa Putra    |
 | **NIM**         | 312310463           |
 | **Kelas**       | TI.23.A.5             |
 | **Mata Kuliah** | Pemrograman Website 2 |
 
 ---
 
 ## 🎯 Tujuan Praktikum
 
 Dalam praktikum ini, tujuan utama yang ingin dicapai adalah sebagai berikut:
 
 - Memahami konsep dasar dari penggunaan Framework dalam pengembangan aplikasi web.
 - Memahami konsep Model-View-Controller (MVC) yang menjadi dasar dalam framework CodeIgniter 4.
 - Mempelajari cara menginstal dan mengonfigurasi CodeIgniter 4 pada server lokal.
 - Membuat program sederhana menggunakan CodeIgniter 4.
 - Mengimplementasikan routing dan controller untuk mengatur akses ke berbagai halaman.
 - Menggunakan View dan Layout untuk membuat tampilan yang lebih terstruktur dan dinamis.
 
 ---
 
 ## ⚙️ Langkah-Langkah Praktikum
 
 ### 📌 1. Persiapan Awal
 
 Sebelum memulai pengembangan dengan CodeIgniter 4, beberapa persiapan harus dilakukan:
 
 1. Mengaktifkan ekstensi PHP yang dibutuhkan melalui `php.ini`.
 2. Melakukan restart Apache melalui XAMPP Control Panel agar perubahan diterapkan.
 3. Memastikan bahwa Composer telah terinstal untuk mempermudah pengelolaan dependency CodeIgniter 4.
 
 📷 **Screenshot Konfigurasi PHP.ini:**
 
 ![alt text](image.png)
 
 ---
 
 ### 📌 2. Instalasi CodeIgniter 4
 
 Untuk memulai, kita perlu mengunduh dan menyiapkan CodeIgniter 4 pada server lokal:
 
 1. Download CodeIgniter 4 dari [🔗 Situs Resmi CodeIgniter](https://codeigniter.com/download).
 2. Ekstrak file yang telah diunduh ke dalam folder `htdocs/lab11_ci/`.
 3. Ubah nama folder hasil ekstraksi menjadi `ci4` agar lebih mudah diakses.
 4. Jalankan aplikasi dengan mengakses `http://localhost/lab11_ci/ci4/public/`.
 
 📷 **Screenshot Tampilan Awal CodeIgniter 4:**
 
 ![alt text](image-1.png)
 ---
 
 ### 📌 3. Menjalankan Command Line Interface (CLI)
 
 CodeIgniter memiliki CLI yang mempermudah pengembangan aplikasi. Untuk menjalankan CLI:
 
 ```bash
 cd xampp/htdocs/lab11_ci/ci4/
 php spark
 ```
 
 📷 **Screenshot Hasil Perintah CLI:**
 
 ![alt text](image-2.png)
 
 ---
 
 ### 📌 4. Mengaktifkan Mode Debugging
 
 Untuk mempermudah debugging, aktifkan mode development dengan mengubah file `.env`:
 
 ```bash
 # Buka file .env dan ubah:
 CI_ENVIRONMENT = development
 ```
 
 📷 **Screenshot Konfigurasi Debugging:**
 
![alt text](image-3.png)
 
 ---
 
 ### 📌 5. Menambahkan Routing Baru
 
 Routing digunakan untuk mengatur alamat URL yang akan diproses oleh aplikasi. Tambahkan kode berikut di `app/Config/Routes.php`:
 
 ```php
 $routes->get('/about', 'Page::about');
 $routes->get('/contact', 'Page::contact');
 $routes->get('/faqs', 'Page::faqs');
 ```
 
 Jalankan perintah berikut untuk melihat daftar routing yang telah dibuat:
 
 ```bash
 php spark routes
 ```
 
 📷 **Screenshot CLI & Error Page:**
 
 ![alt text](image-4.png)
![alt text](image-5.png)
 ---
 
 ### 📌 6. Membuat Controller Page
 
 Buat file `Page.php` di `app/Controllers/` dengan isi sebagai berikut:
 
 ```php
 <?php
 namespace App\Controllers;
 class Page extends BaseController {
     public function about() { echo "Ini halaman About"; }
     public function contact() { echo "Ini halaman Contact"; }
     public function faqs() { echo "Ini halaman FAQ"; }
 }
 ```
 
 📷 **Screenshot Tampilan About Page:**
 
 ![alt text](image-6.png)
 
 ---
 
 ### 📌 7. Membuat View untuk Halaman About
 
 Buat file `app/Views/about.php` dengan kode berikut:
 
 ```php
 <!DOCTYPE html>
 <html>
 <head>
     <title><?= $title; ?></title>
 </head>
 <body>
     <h1><?= $title; ?></h1>
     <p><?= $content; ?></p>
 </body>
 </html>
 ```
 
 📷 **Screenshot Tampilan View About Page:**
 
![alt text](image-6.png)
 
 ---
 
 ### 📌 8. Menambahkan Layout Web dengan CSS
 
 Untuk meningkatkan tampilan website, kita akan menggunakan template header dan footer:
 
 1. Simpan file `style.css` di `public/`
 2. Buat file `header.php` dan `footer.php` di `app/Views/template/`
 3. Ubah `about.php` agar menggunakan `include`:
 
 ```php
 <?= $this->include('template/header'); ?>
 <h1><?= $title; ?></h1>
 <p><?= $content; ?></p>
 <?= $this->include('template/footer'); ?>
 ```
 
 📷 **Screenshot Tampilan dengan Template:**
 
![alt text](image-7.png)
 
 ---
 
 ## ✅ Kesimpulan
 
 Dari praktikum ini, kita telah memahami dasar-dasar penggunaan framework CodeIgniter 4. Beberapa hal yang telah kita pelajari antara lain:
 
 - Instalasi dan konfigurasi awal CodeIgniter 4.
 - Menjalankan CodeIgniter melalui CLI.
 - Membuat dan mengelola routing untuk berbagai halaman dalam website.
 - Membuat Controller dan View untuk menampilkan konten dinamis.
 - Menerapkan layout dengan template header dan footer.
 - Menggunakan CSS untuk mempercantik tampilan website.
 
 Dengan menyelesaikan praktikum ini, kita mendapatkan pemahaman yang lebih baik tentang bagaimana CodeIgniter 4 mempermudah pengembangan aplikasi berbasis web dengan struktur yang lebih terorganisir dan efisien. 🚀🔥
 
 # Praktikum 2: Framework Lanjutan (CRUD)
 
 ## Tujuan
 
 1. Mahasiswa mampu memahami konsep dasar Model.
 2. Mahasiswa mampu memahami konsep dasar CRUD.
 3. Mahasaswa mampu membuat program sederhana menggunakan Framework Codeigniter4.
 
 ## Persiapan
 
 1. Persiapkan text editor misalnya VSCode.
 2. Buka kembali folder dengan nama lab7_php_ci pada docroot webserver (htdocs)
 3. Pastikan MySQL Server sudah dapat dijalankan melalui XAMPP.
 
 ## Pertanyaan dan Tugas
 
 Selesaikan programnya sesuai Langkah-langkah yang ada. Anda boleh melakukan improvisasi.
 
 ## Laporan Praktikum
 
 1. Melanjutkan praktikum sebelumnya pada repository dengan nama Lab7Web.
 2. Kerjakan semua latihan yang diberikan sesuai urutannya.
 3. Screenshot setiap perubahannya.
 4. Update file README.md dan tuliskan penjelasan dari setiap langkah praktikum beserta screenshotnya.
 5. Commit hasilnya pada repository masing-masing.
 6. Kirim URL repository pada e-learning ecampus
 
 ## Langkah-langkah Praktikum
 
 ### 1. Membuat Database: Studi Kasus Data Artikel
 
 ```sql
 CREATE DATABASE lab_ci4;
 ```
 
 ### 2. Membuat Tabel
 
 ```sql
 CREATE TABLE artikel (
     id INT(11) auto_increment,
     judul VARCHAR(200) NOT NULL,
     isi TEXT,
     gambar VARCHAR(200),
     status TINYINT(1) DEFAULT 0,
     slug VARCHAR(200),
     PRIMARY KEY(id)
 );
 ```
 
 ![alt text](image-1.png)
 
 ### 3. Konfigurasi koneksi database
 
 Konfigurasi dapat dilakukan dengan du acara, yaitu pada file app/config/database.php atau menggunakan file .env. Pada praktikum ini kita gunakan konfigurasi pada file .env.
 
 ![alt text](image-2.png)
 
 ### 4. Membuat Model
 
 Buat file baru pada direktori app/Models dengan nama ArtikelModel.php
 
 ```php
 <?php
 namespace App\Models;
 use CodeIgniter\Model;
 
 class ArtikelModel extends Model
 {
     protected $table = 'artikel';
     protected $primaryKey = 'id';
     protected $useAutoIncrement = true;
     protected $allowedFields = ['judul', 'isi', 'status', 'slug', 'gambar'];
 }
 ```
 
 ![alt text](image-3.png)
 
 ### 5. Membuat Controller
 
 Buat Controller baru dengan nama Artikel.php pada direktori app/Controllers.
 
 ```php
 <?php
 namespace App\Controllers;
 use App\Models\ArtikelModel;
 
 class Artikel extends BaseController
 {
     public function index()
     {
         $title = 'Daftar Artikel';
         $model = new ArtikelModel();
         $artikel = $model->findAll();
         return view('artikel/index', compact('artikel', 'title'));
     }
 }
 ```
 
 ![alt text](image-4.png)
 
 ### 6. Membuat View
 
 Buat direktori baru dengan nama artikel pada direktori app/views, kemudian buat file baru dengan nama index.php.
 
 ```php
 <?= $this->include('template/header'); ?>
 
 <?php if($artikel): foreach($artikel as $row): ?>
 <article class="entry">
     <h2><a href="<?= base_url('/artikel/' . $row['slug']);?>"><?= $row['judul']; ?></a></h2>
     <img src="<?= base_url('/gambar/' . $row['gambar']);?>" alt="<?= $row['judul']; ?>">
     <p><?= substr($row['isi'], 0, 200); ?></p>
 </article>
 <hr class="divider" />
 <?php endforeach; else: ?>
 <article class="entry">
     <h2>Belum ada data.</h2>
 </article>
 <?php endif; ?>
 
 <?= $this->include('template/footer'); ?>
 ```
 
 ![alt text](image-5.png)
 
 ### 7. Akses dengan browser
 
 Selanjutnya buka browser kembali, dengan mengakses url http://localhost:8080/artikel
 
 ![alt text](image-6.png)
 
 ### 8. Menambahkan Data Artikel
 
 Belum ada data yang ditampilkan. Kemudian coba tambahkan beberapa data pada database agar dapat ditampilkan datanya.
 
 ```sql
 INSERT INTO artikel (judul, isi, slug) VALUE
 ('Artikel pertama', 'Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku contoh huruf.', 'artikel-pertama'),
 ('Artikel kedua', 'Tidak seperti anggapan banyak orang, Lorem Ipsum bukanlah teks-teks yang diacak. Ia berakar dari sebuah naskah sastra latin klasik dari era 45 sebelum masehi, hingga bisa dipastikan usianya telah mencapai lebih dari 2000 tahun.', 'artikel-kedua');
 ```
 
 ![alt text](image-7.png)
 
 ### 9. Membuat Tampilan Detail Artikel
 
 Tambahkan fungsi baru pada Controller Artikel dengan nama view().
 
 ```php
 public function view($slug)
 {
     $model = new ArtikelModel();
     $artikel = $model->where([
         'slug' => $slug
     ])->first();
 
     // Menampilkan error apabila data tidak ada.
     if (!$artikel)
     {
         throw PageNotFoundException::forPageNotFound();
     }
 
     $title = $artikel['judul'];
     return view('artikel/detail', compact('artikel', 'title'));
 }
 ```
 
 ### 10. Membuat View Detail
 
 Buat view baru untuk halaman detail dengan nama app/views/artikel/detail.php.
 
 ```php
 <?= $this->include('template/header'); ?>
 
 <article class="entry">
     <h2><?= $artikel['judul']; ?></h2>
     <img src="<?= base_url('/gambar/' . $artikel['gambar']);?>" alt="<?= $artikel['judul']; ?>">
     <p><?= $row['isi']; ?></p>
 </article>
 
 <?= $this->include('template/footer'); ?>
 ```
 
 ### 11. Membuat Routing untuk artikel detail
 
 Buka Kembali file app/config/Routes.php, kemudian tambahkan routing untuk artikel detail.
 
 ```php
 $routes->get('/artikel/(:any)', 'Artikel::view/$1');
 ```
 
 ![alt text](image-8.png)
 
 ### 12. Membuat Menu Admin
 
 Menu admin adalah untuk proses CRUD data artikel. Buat method baru pada Controller Artikel dengan nama admin_index().
 
 ```php
 public function admin_index()
 {
     $title = 'Daftar Artikel';
     $model = new ArtikelModel();
     $artikel = $model->findAll();
     return view('artikel/admin_index', compact('artikel', 'title'));
 }
 ```
 
 ### 13. Membuat View Admin
 
 Selanjutnya buat view untuk tampilan admin dengan nama admin_index.php
 
 ```php
 <?= $this->include('template/admin_header'); ?>
 
 <table class="table">
     <thead>
         <tr>
             <th>ID</th>
             <th>Judul</th>
             <th>Status</th>
             <th>AKsi</th>
         </tr>
     </thead>
     <tbody>
         <?php if($artikel): foreach($artikel as $row): ?>
         <tr>
             <td><?= $row['id']; ?></td>
             <td>
                 <b><?= $row['judul']; ?></b>
                 <p><small><?= substr($row['isi'], 0, 50); ?></small></p>
             </td>
             <td><?= $row['status']; ?></td>
             <td>
                 <a class="btn" href="<?= base_url('/admin/artikel/edit/' . $row['id']);?>">Ubah</a>
                 <a class="btn btn-danger" onclick="return confirm('Yakin menghapus data?');" href="<?= base_url('/admin/artikel/delete/' . $row['id']);?>">Hapus</a>
             </td>
         </tr>
         <?php endforeach; else: ?>
         <tr>
             <td colspan="4">Belum ada data.</td>
         </tr>
         <?php endif; ?>
     </tbody>
     <tfoot>
         <tr>
             <th>ID</th>
             <th>Judul</th>
             <th>Status</th>
             <th>AKsi</th>
         </tr>
     </tfoot>
 </table>
 
 <?= $this->include('template/admin_footer'); ?>
 ```
 
 ### 14. Menambahkan Routing untuk Menu Admin
 
 Tambahkan routing untuk menu admin seperti berikut:
 
 ```php
 $routes->group('admin', function($routes) {
     $routes->get('artikel', 'Artikel::admin_index');
     $routes->add('artikel/add', 'Artikel::add');
     $routes->add('artikel/edit/(:any)', 'Artikel::edit/$1');
     $routes->get('artikel/delete/(:any)', 'Artikel::delete/$1');
 });
 ```
 
 Akses menu admin dengan url http://localhost:8080/admin/article
 
 ![alt text](image-8.png)
 
 ### 15. Menambah Data Artikel
 
 Tambahkan fungsi/method baru pada Controller Artikel dengan nama add().
 
 ```php
 public function add()
 {
     // validasi data.
     $validation = \Config\Services::validation();
     $validation->setRules(['judul' => 'required']);
     $isDataValid = $validation->withRequest($this->request)->run();
 
     if ($isDataValid)
     {
         $artikel = new ArtikelModel();
         $artikel->insert([
             'judul' => $this->request->getPost('judul'),
             'isi' => $this->request->getPost('isi'),
             'slug' => url_title($this->request->getPost('judul')),
         ]);
         return redirect('admin/artikel');
     }
 
     $title = "Tambah Artikel";
     return view('artikel/form_add', compact('title'));
 }
 ```
 
 ### 16. Membuat View Form Tambah
 
 Kemudian buat view untuk form tambah dengan nama form_add.php
 
 ```php
 <?= $this->include('template/admin_header'); ?>
 
 <h2><?= $title; ?></h2>
 <form action="" method="post">
     <p>
         <input type="text" name="judul">
     </p>
     <p>
         <textarea name="isi" cols="50" rows="10"></textarea>
     </p>
     <p><input type="submit" value="Kirim" class="btn btn-large"></p>
 </form>
 
 <?= $this->include('template/admin_footer'); ?>
 ```
 
 ![alt text](image-10.png)
 
 ### 17. Mengubah Data
 
 Tambahkan fungsi/method baru pada Controller Artikel dengan nama edit().
 
 ```php
 public function edit($id)
 {
     $artikel = new ArtikelModel();
     // validasi data.
     $validation = \Config\Services::validation();
     $validation->setRules(['judul' => 'required']);
     $isDataValid = $validation->withRequest($this->request)->run();
 
     if ($isDataValid)
     {
         $artikel->update($id, [
             'judul' => $this->request->getPost('judul'),
             'isi' => $this->request->getPost('isi'),
         ]);
         return redirect('admin/artikel');
     }
 
     // ambil data lama
     $data = $artikel->where('id', $id)->first();
     $title = "Edit Artikel";
     return view('artikel/form_edit', compact('title', 'data'));
 }
 ```
 
 ### 18. Membuat View Form Edit
 
 Kemudian buat view untuk form tambah dengan nama form_edit.php
 
 ```php
 <?= $this->include('template/admin_header'); ?>
 
 <h2><?= $title; ?></h2>
 <form action="" method="post">
     <p>
         <input type="text" name="judul" value="<?= $data['judul'];?>" >
     </p>
     <p>
         <textarea name="isi" cols="50" rows="10"><?= $data['isi'];?></textarea>
     </p>
     <p><input type="submit" value="Kirim" class="btn btn-large"></p>
 </form>
 
 <?= $this->include('template/admin_footer'); ?>
 ```
 
 ![alt text](image-9.png)
 
 ### 19. Menghapus Data
 
 Tambahkan fungsi/method baru pada Controller Artikel dengan nama delete().
 
 ```php
 public function delete($id)
 {
     $artikel = new ArtikelModel();
     $artikel->delete($id);
     return redirect('admin/artikel');
 }
 ```