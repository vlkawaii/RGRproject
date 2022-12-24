<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" type="text/css" href="style/shablon_style.css">
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
            <li class="nav-item   active">
              <a class="nav-link" href="video.php">Фільми</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="actor.php">Актори</a>
            </li>
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
        $id_videos = $_GET['video_id'];
        $videoss = getAlltrailer($db, $id_videos);
        $actorss = getActorByVid($db, $id_videos);
?>

  </header>
  <body>
    <?php foreach ($videoss as $video) { ?>
      <div class="wrapper">
        <div class="discr">
          <div class="d1">
            <div class="image">
              <img class="banner" src="/img/<?= $video['photo'] ?>">
            </div>
            <div class="info">
              <h1><?php echo $video['fname']; ?></h1>
              <h3>Жанр: <?php echo $video['genre']; ?></h3>
              <h3>Оцінка: <?php echo $video['mark']; ?></h3>
              <h3>Дата: <?php echo $video['releas']; ?></h3>
              <h3>Країна: <?php echo $video['country']; ?></h3>
              <h3>Продюсер: <?php echo $video['name_prod']; ?>
                  <?php echo $video['secName_prod']; ?></h3>
              <h3>Актори: </h3>
              <?php foreach ($actorss as $actor) {?>
                <a href="shablon1.php?actor_id=<?php echo $actor['id_actors'];?>">
                  <?php echo $actor['name'];?>
                    <?php echo $actor['secName'];?>
                </a><a>; </a>
                <?php } ?>
            </div>
          </div>
          <div class="d2">
            <label class="dtext">
              <?php echo $video['discr']; ?>
            </label>
          </div>
        </div>
        <div class="video">
          <?php $trail=$video['trailer'];?>
            <iframe id="trail" src="<?php echo $trail ?>" title="" frameborder="0" 
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
              </iframe>
            <?php  }?>
        </div>
      </div>
  </body>
  <footer>

  </footer>
</body>

</html>