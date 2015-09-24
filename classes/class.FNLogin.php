<?php

require_once 'class.FnSessions.php';

  class Login
  {
    private $user;
    private $pass;
    private $id;

    public function __construct($userl, $passl, $idl)
    {
      $this->user = htmlspecialchars($userl);
      $this->pass = htmlspecialchars($passl);
      $this->id = htmlspecialchars($idl);
    }


    public function verifyData()
    {
      $db = new ConnectionClass();
      $tuser = $db->real_escape_string($this->user);
      $tpass = $db->real_escape_string($this->pass);

			$sql = $db->query("SELECT * FROM usuarios WHERE usuario='$tuser' AND contraseña='$tpass'");
      $numberRecord = $sql->num_rows;

      if ($numberRecord == 0) {
        return '';
      }else {
        $data = $sql->fetch_assoc();
        return $data['idUsuarios'];
      }
    }

    public function manageSessions()
    {
      $db = new ConnectionClass();
      $tid = $db->real_escape_string($this->id);

      $sql = $db->query("SELECT * FROM usuarios WHERE idUsuarios='$tid'");
      $data = $sql->fetch_assoc();

      $OpenSession = new SessionClass();
      $OpenSession->manageSession($data['IdTipoUsuario'], $data['usuario']);
    }

  }



?>
