<?php
setcookie('user', $userr['userName'], time()-3600*24, "/");
setcookie('admin', "Admenn", time()-3600*24, "/");
header('Location: index.php');
 ?>