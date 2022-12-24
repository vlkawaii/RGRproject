<!DOCTYPE html>
<html lang="en">
      <?php
        include 'connect.php';
        include 'api.php';
        $id_actors = $_GET['actor_id'];
        $actors = getActor($db, $id_actors);
?>
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

<div class="add">
        <?php foreach ($actors as $actor) { ?>

          <form action="" method="post" role="form" style="margin-top: 15px;">
            <input type='hidden' name="id" id="id" value="<?php print_r($id_actors);?>">
            <div class="form-group">
              <label for="">Ім'я</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Введіть назву" value="<?php echo $actor['name'] ?>">
            </div>
            <div class="form-group">
              <label for="">Прізвище</label>
              <input type="text" class="form-control" id="Sname" name="Sname" placeholder="Введіть назву" value="<?php echo $actor['secName'] ?>">
            </div>
            
            <div class="form-group">
              <label for="">Дата народження</label>
              <input type="date" class="form-control" id="data" name="data" placeholder="Введіть дату виходу" value="<?php echo $actor['act_birth'] ?>">
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
        $actorname = $_POST['name'];
        $id_actor = $_POST['id'];
        $actorsname = $_POST['Sname'];
        $actordate = $_POST['data'];
        $actorcountry = $_POST['country'];
        
      UPDATEactor($db, $actorname,$id_actor , $actorsname, $actordate, $actorcountry);
    }
       ?>

    <footer>
    </footer>

</body>

</html>