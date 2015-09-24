<?php

class SessionClass
{
  public function manageSession($paramId, $paramUser)
  {
    switch ($paramId) {
      case '1':
        session_start();
        $_SESSION['activado'] = TRUE;
        $_SESSION['id'] = $paramId;
        $_SESSION['user'] = $paramUser;
        header ('location: ../Views/VwAdmin.php');
        break;
      case '2':
        session_start();
        $_SESSION['activado'] = TRUE;
        $_SESSION['id'] = $paramId;
        $_SESSION['user'] = $paramUser;
        header ('location: ../Views/VwSecretary.php');
        break;
      case '3':
        session_start();
        $_SESSION['activado'] = TRUE;
        $_SESSION['id'] = $paramId;
        $_SESSION['user'] = $paramUser;
        header ('location: ../Views/VwTeacher.php');
        break;
      case '4':
        session_start();
        $_SESSION['activado'] = TRUE;
        $_SESSION['id'] = $paramId;
        $_SESSION['user'] = $paramUser;
        header ('location: ../Views/VwUser.php');
        break;
    }
  }

  public function addressSession($paramId, $typeUser)
  {
    if ($paramId != $typeUser) {
      switch ($paramId) {
        case '1':
          header('location: VwAdmin.php');
          break;
        case '2':
          header('location: VwSecretary.php');
          break;
        case '3':
          header('location: VwTeacher.php');
          break;
        case '4':
          header('location: VwUser.php');
          break;
      }
    }
  }

  public function verifySession($typeUser)
  {
    session_start();
    if (!$_SESSION['activado']) {
      session_destroy();
      header('location: ../Index.html');
    } else {
      $this->addressSession($_SESSION['id'], $typeUser);
    }
  }
}



 ?>
