<!DOCTYPE html>

<?php include 'connect.php'; ?>
  <?php include 'api.php'; ?>
    <?php
        $name=$_GET['search'];
          $actors = getSomeActors($db, $name);
          $actorslist = getAllactors($db);
        ?>
      <html lang="en">

      <head>
        <meta charset="utf-8">
        <title>Актори</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/darkly/bootstrap.min.css" integrity="sha384-nNK9n28pDUDDgIiIqZ/MiyO3F4/9vsMtReZK39klb/MtkZI3/LtjSjlmyVPS3KdN" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="style/video_style.css">

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
                <ul class="navbar-nav me-auto">
                  <li class="nav-item">
                    <a class="nav-link" href="main.php">Головна сторінка</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link " href="video.php">Фільми</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link  active" href="actor.php">Актори</a>
                  </li>

                  <form class="d-flex">
                    <input class="form-control me-sm-2" type="search" id="search" name="search" placeholder="Search" list="vlist">
                    <datalist id="vlist">
                      <?php foreach ($actorslist as $actorss) { ?>
                        <option value="<?php echo $actorss['name']; echo " "; echo $actorss['secName']; ?>"></option>
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
          <?php foreach ($actors as $actor) { ?>

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

            <?php }  ?>
        </div>

        <?php if (!$_COOKIE['admin'] == ''){ ?>
          <div class="add">
            <button id="addbutton" class="btn btn-success">Додати актора</button>
            <button id="showtable" class="btn btn-success" style="margin: 10px 0px;">Показати таблицю</button>

            <form role="form" style="display: none; margin-top: 15px;" method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <label for="">Ім'я</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Введіть назву">
              </div>
              <div class="form-group">
                <label for="">Прізвище</label>
                <input type="text" class="form-control" id="Sname" name="Sname" placeholder="Введіть назву">
              </div>

              <div class="form-group">
                <label for="">Дата народження</label>
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
                <label for="">Фото</label>

                <input type="file" name="file">

              </div>

              <button type="submit" class="btn btn-success">Додати</button>
              <button id="closebutton" class="btn btn-danger">Сховати</button>

            </form>

            <form1 role="ontable" style="display: none; margin-top: 15px;" method="POST" enctype="multipart/form-data">
              <table class="table table-bordered" align="center">
                <tr>
                  <th align="center">Актор</th>

                  <th align="center">Дата народження</th>
                  <th align="center">Країна</th>
                </tr>
                <?php foreach ($actors as $actor) { ?>
                  <tr>
                    <td align="center">
                      <a href="shablon1.php?actor_id=<?php echo $actor['id_actors'];?>">
                        <?php echo $actor['name']; ?>
                          <?php echo $actor['secName']; ?>
                      </a>
                    </td>

                    <td align="center">
                      <?php echo $actor['act_birth']; ?>
                    </td>

                    <td align="center">
                      <?php echo $actor['country']; ?>
                    </td>

                    </td>
                    <td align="center"><a href="updateactor.php?actor_id=<?php echo $actor['id_actors'];?>">Обновити</a></td>
                    <td align="center"><a href="deleteactor.php?actor_id=<?php echo $actor['id_actors'];?>">Видалити</a></td>
                  </tr>
                  <?php }  ?>
              </table>
              <button id="close" class="btn btn-danger">Сховати</button>
            </form1>

          </div>
          <?php
      if (isset($_POST['name']) != '') {
        $actorname = $_POST['name'];
        $actorsname = $_POST['Sname'];
        $actordate = $_POST['data'];
        $actorcountry = $_POST['country'];
        
      ADDactor($db, $actorname, $actorsname, $actordate, $actorcountry);
    }
       ?>
            </div>
            <?php }?>
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