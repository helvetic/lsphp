<?php
$title = 'Авторизация';
?>

<!doctype html>
<html lang="ru">
<?php include 'partials/head.php';?>
<body>

<div class="container">


  <div class="row">
    <? include 'partials/menu.php';?>
  </div>

  <hr>
  <h1>Авторизация</h1>
  <hr>


  <form action="" method="post">
    <fieldset>
      <input type="text" name="login" placeholder="Логин"  value="<?=$_POST['login']?>">
      <input type="password" name="password" placeholder="Пароль">
      <div class="g-recaptcha" data-sitekey="6LfgoRoUAAAAAL5h5Pd4bZlsfllELmZZ1s4zRbAK"></div>
      <hr>
      <button type="submit">Отправить</button>
    </fieldset>
  </form>


</div>

</body>
</html>
