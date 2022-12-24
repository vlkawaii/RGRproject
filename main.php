<!DOCTYPE html>

<?php include 'connect.php'; ?>
  <?php include 'api.php'; ?>
    <?php  $name=$_GET['search']; 
   $videos = getTopFilm($db);
  $actors = getTopActor($db);
   ?>

      <html lang="en">
      <head>
        <meta charset="utf-8">
        <title>NeNetflix</title>
        <link rel="stylesheet" type="text/css" href="style/video_style.css">
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
                    <a class="nav-link active" href="main.php">Головна сторінка</a>
                  </li>
                  <li class="nav-item">
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
        </header>
        <div class="wrapper">
          <div class="wrapper2">
            <h2 align="center">Фільми з найбільшим рейтингом</h2>
          </div>
          <?php foreach ($videos as $video) { ?>
            <div class="discr">
              <div class="image">

                <a href="shablon.php?video_id=<?php echo $video['id_video'];?>"><img class="banner" src="/img/<?= $video['photo']?>" ></a>
              </div>
              <td align="center">
                <a href="shablon.php?video_id=<?php echo $video['id_video'];?>">
                  <?php echo $video['fname']; ?>
                </a>
              </td>
            </div>
            <?php } ?>
        </div>
        <div class="wrapper">
          <div class="wrapper2">
            <h2 align="center">Найпопулярніші актори</h2>
          </div>
          <?php foreach ($actors as $actor){?>
            <div class="discr">
              <div class="image">
                <a href="shablon1.php?actor_id=<?php echo $actor['id_actors'];?>"><img class="banner" src="/img/<?= $actor['actor_photo']?>" ></a>
              </div>
              <td align="center">
                <a href="shablon1.php?actor_id=<?php echo $actor['id_actors'];?>">
                  <?php echo $actor['name']; ?>
                    <?php echo $actor['secName']; ?>
                </a>
              </td>
            </div>
            <?php } ?>
              <div id="">
              </div>
              <footer>
              </footer>
      </body>

      </html>