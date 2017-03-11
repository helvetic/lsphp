<?php
$title = 'Регистрация';
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
  <h1>Регистрация</h1>
  <hr>

  <form action="" method="post">
    <fieldset>
      <input type="text" name="login" placeholder="Логин"  value="<?=$_POST['login']?>">
      <input type="password" name="password" placeholder="Пароль">
      <hr>
      <button type="submit">Отправить</button>
    </fieldset>
  </form>


</div>

</body>
</html>