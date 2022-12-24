<!DOCTYPE html>

<?php include 'connect.php'; ?>
  <?php include 'api.php'; ?>
    <?php  $name=$_GET['search']; 
   $videos = getSomeVideo($db, $name);
   $videolist = getAllvideo($db);
   ?>
      <html lang="en">
      <head>
        <link rel="stylesheet" type="text/css" href="style/video_style.css">
        <meta charset="utf-8">
        <title>Фільми</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/darkly/bootstrap.min.css" integrity="sha384-nNK9n28pDUDDgIiIqZ/MiyO3F4/9vsMtReZK39klb/MtkZI3/LtjSjlmyVPS3KdN" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
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
                <ul class="navbar-nav ">
                  <li class="nav-item">
                    <a class="nav-link" href="main.php">Головна сторінка</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" href="video.php">Фільми</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="actor.php">Актори</a>
                  </li>
                  <form class="d-flex">
                    <input class="form-control me-sm-2" type="search" id="search" name="search" placeholder="Search" list="vlist">
                    <datalist id="vlist">
                      <?php foreach ($videolist as $videoo) { ?>
                        <option value="<?php echo $videoo['fname']; ?>"></option>
                        <?php }  ?>
                    </datalist>
                    <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
                  </form>
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
            <?php }  ?>
        </div>
        <?php if (!$_COOKIE['admin'] == ''){ ?>
          <div class="add">
            <button id="addbutton" class="btn btn-success">Додати фільм</button>
            <form role="form" style="display: none; margin-top: 15px;" method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <label for="">Назва</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Введіть назву">
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
                <input type="float" class="form-control" id="mark" name="mark" placeholder="Введіть оцінку">
              </div>
              <div class="form-group">
                <label for="">Дата виходу</label>
                <input type="date" class="form-control" id="data" name="data" placeholder="Введіть дату виходу">
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
                <input type="text" class="form-control" id="trail" name="trail" placeholder="Введіть назву">
              </div>
    
    <div class="form-group">
      <label>Опис</label>
      <textarea type="text" class="form-control" id="discr" name="discr" placeholder="Введіть опис" rows="5"></textarea>
    </div>
              <div class="form-group">
                <label for="">Фото</label>
                <input type="file" name="file">
              </div>
              <button type="submit" class="btn btn-success">Додати</button>
              <button id="closebutton" class="btn btn-danger">Сховати</button>
            </form>
            <button id="showtable" class="btn btn-success" style="margin: 10px 0px;">Показати таблицю</button>
            <form1 role="ontable" style="display: none; margin-top: 15px;" method="POST" enctype="multipart/form-data">
              <table class="table table-bordered" align="center">
                <tr align="center">
                  <th>Назва</th>
                  <th>Жанр</th>
                  <th>Оцінка</th>
                  <th>Дата виходу</th>
                  <th>Країна</th>
                  <th>Продюсер</th>
                </tr>
                <?php foreach ($videos as $video) { ?>
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
                    <td align="center"><a href="updatevideo.php?video_id=<?php echo $video['id_video'];?>">Обновити</a></td>
                    <td align="center"><a href="deletevideo.php?video_id=<?php echo $video['id_video'];?>">Видалити</a></td>
                  </tr>
                  <?php }  ?>
              </table>
              <button id="close" class="btn btn-danger">Сховати</button>
            </form1>
          </div>
          <?php
      if (isset($_POST['name']) != '') {
        $videoname = $_POST['name'];
        $videogenre = $_POST['genre'];
        $videomark = $_POST['mark'];
        $videodata = $_POST['data'];
        $videocountry = $_POST['country'];
        $videoproducer = $_POST['producer'];
        $videotrail = $_POST['trail'];
        $videodiscr = $_POST['discr'];        
        
      ADDvideo($db, $videoname, $videogenre, $videomark, $videodata, $videocountry, $videoproducer, $videotrail, $videodiscr);

    } 
       ?>
            </div>
            <?php } ?>
              <footer>
              </footer>
        
              <script>
                $("#addbutton").click(function() {
                  $("form").slideDown();
                });
              </script>
              <script>
                $("#closebutton").click(function() {
                  $("form").slideUp();
                });
              </script>

              <script>
                $("#showtable").click(function() {
                  $("form1").slideDown();
                });
              </script>
              <script>
                $("#close").click(function() {
                  $("form1").slideUp();
                });
              </script>

      </body>

      </html>