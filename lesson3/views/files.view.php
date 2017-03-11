<?php
$title = 'Файлы';
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
  <h1>Список фотографий</h1>
  <hr>


  <table>
    <thead>
    <tr>
      <th>Photo</th>
      <th>Src</th>
      <th></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user) : ?>
      <tr>
        <td>
          <?php if ($user['photo']) {
            echo "<img src='{$app['fullimagepath']}{$user['photo']}' style='max-width:50px;max-height:50px'>";
          }  ?>

        </td>
        <td><?=$user['photo']?></td>
        <td>
          <form action="" method="post">
            <input type="hidden" name="id" value="<?=$user['id']?>">
            <button>X</button>
          </form>
        </td>
      </tr>
    <?php endforeach; ?>
    </tbody>

  </table>



</div>

</body>
</html>