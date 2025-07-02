<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= esc($title ?? 'Judul') ?></title>
  <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>
  <div id="container">
    
    <?= $this->include('template/header') ?>

    <div id="content-wrapper">
      <section id="main" style="width: 100%; max-width: none;">
        <?= $this->renderSection('content') ?>
      </section>
    </div>

    <footer>
      <p>&copy; Universitas Pelita Bangsa - 2025.</p>
    </footer>

  </div>
</body>
</html>
