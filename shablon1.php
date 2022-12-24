<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" type="text/css" href="style/shablon_style1.css">
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
              <a class="nav-link" href="main.php">Головна сторінка</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="video.php">Фільми</a>
            </li>
            <li class="nav-item">
              <a class="nav-link  active" href="actor.php">Актори</a>
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
    <?php
        include 'connect.php';
        include 'api.php';
        $id_actors = $_GET['actor_id'];
        $actorss = getActor($db, $id_actors);
        $videoss = getVideoByAct($db, $id_actors);
?>
  </header>
  
  <body>
    <?php foreach ($actorss as $actor) { ?>
      <div class="wrapper">
        <div class="discr">
          <div class="d1">
            <div class="image">
              <img class="banner" src="/img/<?= $actor['actor_photo'] ?>">
            </div>
            <div class="info">
              <h1><?php echo $actor['name']; ?> <?php echo $actor['secName']; ?></h1>
              <h3>Дата народження: </h3>
              <h3><?php echo $actor['act_birth']; ?></h3>
              <h3>Країна: <?php echo $actor['country']; ?></h3>
            </div>
          </div>
        </div>
        </div>
        <div class="wrapper">
        <div class="video">
          <div class="films">
            <h3 align="center">Фільмографія</h3>
            <table class="table" align="center">
              <tr align="center">
                <th>Назва</th>
                <th>Жанр</th>
                <th>Оцінка</th>
                <th>Дата виходу</th>
                <th>Країна</th>
                <th>Продюсер</th>
              </tr>
              <?php foreach ($videoss as $video) { ?>
                <tr>
                  <td align="center">
                    <a href="shablon.php?video_id=<?php echo $video['id_video'];?>">
                      <?php echo $video['fname']; ?>
                    </a>
                  </td>
                  <td align="center">
                    <?php echo $video['genre']; ?>
                  </td>
                  <td align="center">
                    <?php echo $video['mark']; ?>
                  </td>
                  <td align="center">
                    <?php echo $video['releas']; ?>
                  </td>
                  <td align="center">
                    <?php echo $video['country']; ?>
                  </td>
                  <td align="center">
                    <?php echo $video['name_prod']; ?>
                      <?php echo $video['secName_prod']; ?>
                  </td>
                </tr>
                <?php }  ?>
                  <?php  }?>
          </div>
        </div>
        </div>
  </body>
  <footer>
  </footer>
</body>

</html>