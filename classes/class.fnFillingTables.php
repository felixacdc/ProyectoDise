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

  public function fnFillingDegree()
  {
    $db = new ConnectionClass();

    $sql = $db->query("SELECT *
                        FROM grado ");

    if ($sql) {

      $content = "";
      while($data = $sql->fetch_assoc()){

        $content.='<tr id="'. $data['idGrado'] .'">
                      <td>
                        <div class="form-group">
                          <input class="form-control" type="text" placeholder="Grado" disabled="true" ' .
                          ' value="' . $data['Descripcion'] . '"/>
                        </div>
                      </td>
                      <td style="text-align: center;" class="btnActions">' .
                  '      <div class="btn-group">
                            <button class="btn btn-primary" onclick="fnModifyGeneral(\'' . $data['idGrado'] . '\')"><i class="fa fa-pencil"></i></button>
                            <button class="btn btn-success" onclick="fnAcceptGeneral(\'' . $data['idGrado'] . '\', \'Degree\')"><i class="fa fa-check"></i></button>
                            <button class="btn btn-danger" onclick="fnDeleteGeneral(\'' . $data['idGrado'] . '\', \'Degree\')"><i class="fa fa-trash-o"></i></button>
                          </div>
                      </td>
                  </tr>';

      }

      echo $content;

    }
  }

}
