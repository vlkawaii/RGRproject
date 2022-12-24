<!DOCTYPE html>
<?php
include 'check.php';
#include 'auth.php'
 ?>
  <html lang="en">
  <head>
    <meta charset="utf-8">
    <title>NeNetflix</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/darkly/bootstrap.min.css" integrity="sha384-nNK9n28pDUDDgIiIqZ/MiyO3F4/9vsMtReZK39klb/MtkZI3/LtjSjlmyVPS3KdN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style/video_style.css">

  </head>
  <body>
    <div class="container-mt-4">
      <?php 
      if ($_COOKIE['user'] == '' && $_COOKIE['admin'] == ''):
       ?>
        <div class="wrapper">
          <div class="wrapper2">
            <div class="col">

              <h1 align="center">Реєстрація</h1>
              <form action="" method="post">

                <input type="text" class="form-control" name="username" id="username" placeholder="Введіть ім'я">
                <?php echo $err['name'] ?>
                  <br>
                  <input type="text" class="form-control" name="phone" id="phone" placeholder="Введіть номер">
                  <?php echo $err['phone'] ?>
                    <br>
                    <input type="text" class="form-control" name="email" id="email" placeholder="Введіть пошту">
                    <?php echo $err['email'] ?>
                      <br>
                      <input type="text" class="form-control" name="login" id="login" placeholder="Введіть логін">
                      <?php echo $err['login'] ?>
                        <br>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Введіть пароль">
                        <?php echo $err['password'] ?>
                          <br>
                          <button class="btn btn-success" type="submit">
                            Реєстрація
                          </button>
                          <?php echo $err['success'] ?>
              </form>
            </div>
          </div>

          <div class="wrapper2">
            <div class="col">
              <h1 align="center">Авторизація</h1>
              <form action="auth.php" method="post">
                <input type="text" class="form-control" name="login" id="login" placeholder="Введіть логін">
                <br>
                <input type="password" class="form-control" name="password" id="password" placeholder="Введіть пароль">
                <br>
                <button class="btn btn-success" type="submit">
                  Авторизація
                </button>
              </form>
            </div>
          </div>
        </div>
        <?php else: header('Location: video.php'); ?>
          <?php endif; ?>
    </div>
  </body>

  </html>