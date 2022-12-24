<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>NeNetflix</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/darkly/bootstrap.min.css" integrity="sha384-nNK9n28pDUDDgIiIqZ/MiyO3F4/9vsMtReZK39klb/MtkZI3/LtjSjlmyVPS3KdN" crossorigin="anonymous">
          <link rel="stylesheet" type="text/css" href="style/video_style.css">
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
  <div id="content">
    <div class="container-fluid">
      <?php
        include 'connect.php';
        include 'api.php';
        $id_videos = $_GET['video_id'];
        $videoss = getAlltrailer($db, $id_videos);
?>
<div class="add">
        <?php foreach ($videoss as $video) { ?>
          <form action="" method="post" role="form" style="margin-top: 15px;">
            <input type='hidden' name="id" id="id" value="<?php print_r($id_videos);?>">
            <div class="form-group">
              <label for="">Назва</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Введіть назву" value="<?php echo $video['fname']; ?>">
            </div>
            <div class="form-group">
              <label for="">Жанр</label>
              <select name="genre" class="form-control" id="genre">
                <?php
        $genre = getAllgenre($db);
        foreach ($genre as $key => $value) {
          echo "<option value=".$value['id_genre'].">".$value['genre']."</option>";
        }
        ?>
              </select>
            </div>
            <div class="form-group">
              <label for="">Оцінка</label>
              <input type="float" class="form-control" id="mark" name="mark" placeholder="Введіть оцінку" value="<?php echo $video['mark']; ?>">
            </div>
            <div class="form-group">
              <label for="">Дата виходу</label>
              <input type="date" class="form-control" id="data" name="data" placeholder="Введіть дату виходу" value="<?php echo $video['releas']; ?>">
            </div>
            <div class="form-group">
              <label for="">Країна</label>
              <select name="country" class="form-control" id="country">
                <?php
          $country = getAllcountry($db);
          foreach ($country as $key => $value) {
            echo "<option value=".$value['id_country'].">".$value['country']."</option>";
          }
          ?>
              </select>
            </div>
            <div class="form-group">
              <label for="">Продюсер</label>
              <select name="producer" class="form-control" id="producer">
                <?php
          $producer = getAllproducer($db);
          foreach ($producer as $key => $value) {
            echo "<option value=".$value['id_producer'].">".$value['secName_prod']."</option>";
          }
          ?>
              </select>
            </div>

            <div class="form-group">
              <label for="">Трейлер</label>
              <input type="text" class="form-control" id="trail" name="trail" placeholder="Введіть назву" value="<?php echo $video['trailer']; ?>">
            </div>
            <div class="form-group">
              <label for="">Опис</label>
              <input type="text" class="form-control" id="discr" name="discr" placeholder="Введіть опис" value="<?php echo $video['discr']; ?>">
            </div>
            <div class="form-group">
              <label for="">Фото</label>
              <input type="file" name="file">
            </div>
            <?php } ?>
              <button type="submit" class="btn btn-success">Обновити</button>
          </form>
          </div>
    </div>
  </div>
  <?php
      if (isset($_POST['name']) != '') {
        $videoname = $_POST['name'];
        $id_video = $_POST['id'];
        $videogenre = $_POST['genre'];
        $videomark = $_POST['mark'];
        $videodata = $_POST['data'];
        $videocountry = $_POST['country'];
        $videoproducer = $_POST['producer'];
        $videotrail = $_POST['trail'];
        $videodiscr = $_POST['discr'];
        
      UPDATEvideo($db, $id_video, $videoname, $videogenre, $videomark, $videodata, $videocountry, $videoproducer, $videotrail, $videodiscr);
      
    }
       ?>
    <footer>
    </footer>

</body>

</html>