<?php
$title = 'Пользователи';
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
  <h1>Список пользователей</h1>
  <hr>
  
  <table>
    <thead>
      <tr>
        <th>Photo</th>
        <th>Login</th>
        <th>Name</th>
        <th>Age</th>
        <th>About</th>
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
          <td><?=$user['login']?></td>
          <td><?=$user['name']?></td>
          <td><?=$user['age']?></td>
          <td><?=nl2br($user['about'])?></td>
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