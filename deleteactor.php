<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>NeNetflix</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/darkly/bootstrap.min.css" integrity="sha384-nNK9n28pDUDDgIiIqZ/MiyO3F4/9vsMtReZK39klb/MtkZI3/LtjSjlmyVPS3KdN" crossorigin="anonymous">

</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">NeNetflix</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor03">
          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <a class="nav-link " href="main.php">Головна сторінка</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="video.php">Фільми</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="actor.php">Актори</a>
        </div>

        <ul class="navbar-nav ">
          <li class="nav-item" id="1">
            <a class="nav-link">
              <?= $_COOKIE['user'] ?>
            </a>

          </li>

          <li class="nav-item" id="1">

            <a class="nav-link">
              <?=  $_COOKIE['admin'] ?>
            </a>
          </li>

          <li class="nav-item" id="1">
            <a class="nav-link" href="exit.php"> Вийти</a>
          </li>
        </ul>
      </div>
      </div>
    </nav>
  </header>
  <div id="content">
    <div class="container-fluid">
      <?php include 'connect.php';
              include 'api.php';
    $id_actors = $_GET['actor_id'];
        ?>
        <form action="" method="post" role="form" style="margin-top: 15px;">
          <div class="form-group">
            <input type='hidden' name="id" id="id" value="<?php print_r($id_actors);?>">
          </div>
          <div class="form-group">
            <label for="">Точно видалити?</label>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-danger">Видалити</button>
          </div>
        </form>
    </div>
  </div>
  <?php
      if (isset($_POST['id']) != '') {
      $id_actor = $_POST['id'];
      DELETEactor($db, $id_actor);
      header('Location: actor.php');
    }
      ?>
    </div>
    <footer>

    </footer>

    <script>
    </script>
</body>

</html>