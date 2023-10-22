<?php require_once "templates/header.php" ?>

<ul class="p-5">
  <li>Username : <?= $data['user']['username'] ?></li>
  <li>Email : <?= $data['user']['email'] ?></li>
</ul>

<?php require_once "templates/footer.php" ?>