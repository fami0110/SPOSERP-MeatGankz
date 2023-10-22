<?php require_once "templates/header.php" ?>

<div class="p-3">
  <h1>Ini Halaman Home</h1>
  <?php if ($data['user']) : ?>
    <p>Anda telah login</p>
    <p>Klik <a href="<?= BASEURL ?>/logout">disini</a> untuk logout.</p>
  <?php else : ?>
    <p>Anda belum login</p>
    <p>Klik <a href="<?= BASEURL ?>/login">disini</a> untuk login.</p>
  <?php endif; ?>
</div>

<?php require_once "templates/footer.php" ?>