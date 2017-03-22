<?php
class Query
{
  
  
  protected $pdo;
  
  
  
  public function __construct($pdo)
  {
    $this->pdo = $pdo;
  }
  
  
  
  public function getId($field, $value)
  {
    $sql = "SELECT id
      FROM Users
      WHERE $field = '$value'
    ";
    $sth = $this->pdo->prepare($sql);
    $sth->execute();
  
    return $sth->fetch(PDO::FETCH_ASSOC)['id'];
  }
  
  public function getField($field, $id)
  {
    $sql = "SELECT $field
      FROM Users
      WHERE id = $id
    ";
    $sth = $this->pdo->prepare($sql);
    $sth->execute();
    
    return $sth->fetch(PDO::FETCH_ASSOC)[$field];
  }

  
  public function checkPass($field, $value, $pass)
  {
    $sql = "SELECT password, salt
      FROM Users
      WHERE $field = '$value'
    ";
    $sth = $this->pdo->prepare($sql);
    $sth->execute();
  
    $user = $sth->fetch(PDO::FETCH_ASSOC);
    
    return hash_equals(generateCrypt($pass, $user['salt']), $user['password']);
  }
  
  public function checkLogin($login)
  {
    $sql = "SELECT id
      FROM Users
      WHERE login = '{$login}'
    ";
    $sth = $this->pdo->prepare($sql);
    $sth->execute();
    
    if($sth->fetch()){
      return true;
    } else {
      return false;
    }
  }
  
  public function addUser($user)
  {
    $sql = "INSERT INTO Users (login, password, salt)
      VALUES(
        '{$user['login']}',
        '{$user['password']}',
        '{$user['salt']}'
      )
    ";
    $sth = $this->pdo->prepare($sql);
    $sth->execute();
    return $this->pdo->lastInsertId();
  }
  
  public function addSession($id, $sessid)
  {
    $sql = "INSERT INTO Sessions (id, sessid)
      VALUES(
        $id,
        '$sessid'
      )
    ";
    $sth = $this->pdo->prepare($sql);
    $sth->execute();
    return $this->pdo->lastInsertId();
  }
  
  public function checkSession($id, $sessid)
  {
    $sql = "SELECT id
      FROM Sessions
      WHERE id = $id
      AND sessid = '$sessid'
    ";
    $sth = $this->pdo->prepare($sql);
    $sth->execute();
  
    if($sth->fetch()){
      return true;
    } else {
      return false;
    }
  }
  
  public function deleteSession($id)
  {
    $sql = "DELETE FROM Sessions
      WHERE id = $id;
    ";
    $sth = $this->pdo->prepare($sql);
    $sth->execute();
  }
  
  
  public function getUserData($id)
  {
    $sql = "SELECT login, name, age, about, photo
      FROM Users
      WHERE id = $id
    ";
    $sth = $this->pdo->prepare($sql);
    $sth->execute();
    
    return $sth->fetch(PDO::FETCH_ASSOC);
  }
  
  public function setUserData($id,$data)
  {
    $sql = "UPDATE Users
      SET
        name = '{$data['name']}',
        age = '{$data['age']}',
        about = '{$data['about']}',
        photo = '{$data['photo']}'
      WHERE id = $id;
    ";
    $sth = $this->pdo->prepare($sql);
    $sth->execute();
  }
  
  public function getUsers($order = 'id')
  {
    $sql = "SELECT id, login, name, age, about, photo
      FROM Users
      ORDER BY $order
    ";
    $sth = $this->pdo->prepare($sql);
    $sth->execute();
  
    return $sth->fetchAll(PDO::FETCH_ASSOC);
  }
  
  public function deleteUser($id)
  {
    $sql = "DELETE FROM Users
      WHERE id = $id;
    ";
    $sth = $this->pdo->prepare($sql);
    $sth->execute();
  }
  
  public function getPhotos()
  {
    $sql = "SELECT id, photo
      FROM Users
      WHERE
        photo != ''
    ";
    $sth = $this->pdo->prepare($sql);
    $sth->execute();
    
    return $sth->fetchAll(PDO::FETCH_ASSOC);
  }
  
  public function deletePhoto($id)
  {
    $sql = "UPDATE Users
      SET
        photo = ''
      WHERE id = $id;
    ";
    $sth = $this->pdo->prepare($sql);
    $sth->execute();
  }
  
}