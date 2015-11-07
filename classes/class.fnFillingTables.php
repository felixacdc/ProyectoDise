<?php

/**
 * CLASE CON FUNCIONES DE USUARIO CATEDRATICO
 */

class FillingTables
{

  public function fnFillingReinscriptions()
  {
    $db = new ConnectionClass();

    $sql = $db->query("SELECT E.idEstudiante, E.nombreEstudiante, E.numeroCarne, E.telefonoEstudiante, U.usuario
                        FROM estudiantes AS E
                        INNER JOIN usuarios AS U ON E.idEstudiante = U.idEstudiante");

    if ($sql) {

      $content = "";
      while($data = $sql->fetch_assoc()){

        $content.='<tr">
                  <td>' . $data['nombreEstudiante'] . '</td>
                  <td>' . $data['numeroCarne'] . '</td>
                  <td>' . $data['telefonoEstudiante'] . '</td>
                  <td>' . $data['usuario'] . '</td>
                  <td style="text-align: center;">' .
                  '<button type="button" class="btn btn-primary btn-xs"' .
                  'onclick="fnReinscription(\'' . $data['idEstudiante'] . '\')">Reinscribir</button></td>
                  </tr>';

      }

      echo $content;

    }

  }

}
