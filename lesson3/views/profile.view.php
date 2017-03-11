<?php
$title = 'Профиль';
//print_r($app);
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
  <h1>Профиль пользователя <?=$app['user']['login']?></h1>
  <hr>

  <?php if ($app['user']['photo']) {
    echo "<img src='{$app['fullimagepath']}{$app['user']['photo']}' style='max-width:100px;max-height:100px'>";
  } ?>
  
  <hr>
  <form action="" method="post" enctype="multipart/form-data">
    <fieldset>
      <input type="text" name="name" placeholder="Имя" value="<?=$app['user']['name']?>">
      <input type="text" name="age" placeholder="Возраст" value="<?=$app['user']['age']?>">
      <textarea name="about" id="" cols="30" rows="10" placeholder="О себе" ><?=$app['user']['about']?></textarea>
      <label for="input_photo">Загрузите свою фотографию</label>
      <input type="file" name="photo" id="input_photo" accept="image/*">
      <hr>
      <button type="submit">Отправить</button>
    </fieldset>
  </form>
  
 



</div>

</body>
</html>