<?php

  class Login
  {
    private $user;
    private $pass;

    public function __construct($userl, $passl)
    {
      $this->user = htmlspecialchars($userl);
      $this->pass = htmlspecialchars($passl);
    }

    public function verifyData()
    {
      $db = new ConnectionClass();
      $tuser = $db->real_escape_string($this->user);
      $tpass = $db->real_escape_string($this->pass);

			$sql = $db->query("SELECT * FROM usuarios WHERE usuario='$tuser' AND contraseña='$tpass'");
      $numberRecord = $sql->num_rows;

      if ($numberRecord == 0) {
        return 'Usuario o Contraseña incorrectos';
      }else {
        $array = mysqli_fetch_array($sql);
        $string = $array['usuario']. '---'. $array['contraseña'];
        return $string;
      }
    }

  }



?>
