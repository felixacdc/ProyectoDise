<?php

/**
 * CLASE CON FUNCIONES DE USUARIO CATEDRATICO
 */

class FillingTables
{

  public function fnFillingReinscriptions()
  {
    $db = new ConnectionClass();

    $sql = $db->query("SELECT ES.tipoEstado, E.idEstudiante, E.nombreEstudiante, E.numeroCarne, E.telefonoEstudiante, U.usuario
                        FROM estudiantes AS E
                        INNER JOIN usuarios AS U ON E.idEstudiante = U.idEstudiante
                        INNER JOIN estados AS ES ON ES.idestado = E.idestado");

    if ($sql) {

      $content = "";
      while($data = $sql->fetch_assoc()){

        $content.='<tr">
                  <td>' . $data['nombreEstudiante'] . '</td>
                  <td>' . $data['numeroCarne'] . '</td>
                  <td>' . $data['telefonoEstudiante'] . '</td>
                  <td>' . $data['usuario'] . '</td>
                  <td>' . $data['tipoEstado'] . '</td>
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
                        <div class="form-group" style="color: transparent;">
                          <input class="form-control" type="text" placeholder="Grado" disabled="true" ' . ' value="' . $data['Descripcion'] . '"/>
                          <p style="display: none">' . $data['Descripcion'] . '</p>
                        </div>
                      </td>
                      <td style="text-align: center;" class="btnActions">' .
                  '      <div class="btn-group">
                            <button class="btn btn-primary" onclick="fnModifyGeneral(\'' . $data['idGrado'] . '\',
                            \'tableDegree\')"><i class="fa fa-pencil"></i></button>
                            <button class="btn btn-success" onclick="fnAcceptGeneral(\'' . $data['idGrado'] . '\', \'tableDegree\', \'Degree\')"><i class="fa fa-check"></i></button>
                            <button class="btn btn-danger" onclick="fnDeleteGeneral(\'' . $data['idGrado'] . '\', \'Degree\')"><i class="fa fa-trash-o"></i></button>
                          </div>
                      </td>
                  </tr>';

      }

      echo $content;

    }
  }

  public function fnFillingSection()
  {
    $db = new ConnectionClass();

    $sql = $db->query("SELECT *
                        FROM Seccion ");

    if ($sql) {

      $content = "";
      while($data = $sql->fetch_assoc()){

        $content.='<tr id="'. $data['idSeccion'] .'">
                      <td>
                        <div class="form-group" style="color: transparent">
                          <input class="form-control" type="text" placeholder="Grado" disabled="true" ' .
                          ' value="' . $data['Descripcion'] . '"/>
                          <p style="display: none">' . $data['Descripcion'] . '</p>
                        </div>
                      </td>
                      <td style="text-align: center;" class="btnActions">' .
                  '      <div class="btn-group">
                            <button class="btn btn-primary" onclick="fnModifyGeneral(\'' . $data['idSeccion'] . '\',
                            \'tableSection\')"><i class="fa fa-pencil"></i></button>
                            <button class="btn btn-success" onclick="fnAcceptGeneral(\'' . $data['idSeccion'] . '\', \'tableSection\', \'Section\')"><i class="fa fa-check"></i></button>
                            <button class="btn btn-danger" onclick="fnDeleteGeneral(\'' . $data['idSeccion'] . '\', \'Section\')"><i class="fa fa-trash-o"></i></button>
                          </div>
                      </td>
                  </tr>';

      }

      echo $content;

    }
  }

  public function fnFillingAssignSection()
  {
    $db = new ConnectionClass();

    $sql = $db->query("SELECT S.idSeccion, G.idGrado, AG.idAsignacionSeccion, G.descripcion as GDesc, S.Descripcion
                        FROM AsignacionSeccion as AG
                        inner join grado as G on AG.idGrado = G.idGrado
                        inner join Seccion as S on S.idSeccion = AG.idSeccion");

    if ($sql) {

      $dataArray = array();
      $i = 0;

      $content = "";
      while($data = $sql->fetch_assoc()){
      //
      //   $dataArray[$i] = array("idAsignacionSeccion" => $data['idAsignacionSeccion'], "idGrado" => $data['idGrado'],
      //                           "idSeccion" => $data['idSeccion'], "Grado" => $data['GDesc'],
      //                           "Seccion" => $data['Descripcion']);
      //   $i++;

        $content.='<tr id="'. $data['idAsignacionSeccion'] .'">
                      <td>
                        <div class="form-group" style="color: transparent">
                          <input type="hidden" name="cbos" value="' . $data['idGrado'] . '"/>
                          <SELECT NAME="cbo1" class="form-control cboGrado" SIZE=0 disabled="true"></SELECT>
                          <p style="display: none">' . $data['GDesc'] . '</p>
                        </div>
                      </td>
                      <td>
                        <div class="form-group" style="color: transparent">
                          <input type="hidden" name="cbos" value="' . $data['idSeccion'] . '"/>
                          <SELECT NAME="cbo2" class="form-control cboseccion" SIZE=0 disabled="true"></SELECT>
                          <p style="display: none">' . $data['Descripcion'] . '</p>
                        </div>
                      </td>
                      <td style="text-align: center;" class="btnActions">' .
                  '      <div class="btn-group">
                            <button class="btn btn-primary" onclick="fnModifyGeneral(\'' . $data['idAsignacionSeccion'] . '\',
                            \'tableAssignSection\')"><i class="fa fa-pencil"></i></button>
                            <button class="btn btn-success" onclick="fnAcceptGeneral(\'' . $data['idAsignacionSeccion'] . '\', \'tableAssignSection\', \'AssignSection\')"><i class="fa fa-check"></i></button>
                            <button class="btn btn-danger" onclick="fnDeleteGeneral(\'' . $data['idAsignacionSeccion'] . '\', \'AssignSection\')"><i class="fa fa-trash-o"></i></button>
                          </div>
                      </td>
                  </tr>';

      }

      echo $content;
      // header("Content-type: application/json");
      // return json_encode($dataArray);

    }
  }

  public function fnFillingCourses()
  {
    $db = new ConnectionClass();

    $sql = $db->query("SELECT *
                        FROM cursos ");

    if ($sql) {

      $content = "";
      while($data = $sql->fetch_assoc()){

        $content.='<tr id="'. $data['idCurso'] .'">
                      <td>
                        <div class="form-group">
                          <input class="form-control" type="text" placeholder="Curso" disabled="true" ' .
                          ' value="' . $data['nombreCurso'] . '"/><p style="display: none">' . $data['nombreCurso'] . '</p>
                        </div>
                      </td>
                      <td style="text-align: center;" class="btnActions">' .
                  '      <div class="btn-group">
                            <button class="btn btn-primary" onclick="fnModifyGeneral(\'' . $data['idCurso'] . '\',
                            \'tableCourses\')"><i class="fa fa-pencil"></i></button>
                            <button class="btn btn-success" onclick="fnAcceptGeneral(\'' . $data['idCurso'] . '\', \'tableCourses\', \'Course\')"><i class="fa fa-check"></i></button>
                            <button class="btn btn-danger" onclick="fnDeleteGeneral(\'' . $data['idCurso'] . '\', \'Course\')"><i class="fa fa-trash-o"></i></button>
                          </div>
                      </td>
                  </tr>';

      }

      echo $content;

    }
  }

  public function fnFillingAssignCourses()
  {
    $db = new ConnectionClass();

    $sql = $db->query("SELECT AGC.idAsignacionCursos, C.idCurso, G.idGrado, CA.IdCatedratico, CL.idCicloEscolar,
                        C.nombreCurso, G.Descripcion, CA.nombreCatedratico, CL.Año
                        FROM asignacioncursos as AGC
                        INNER JOIN grado as G on AGC.idGrado = G.idGrado
                        INNER JOIN cursos AS C ON AGC.idCurso = C.idCurso
                        INNER JOIN catedraticos as CA on AGC.IdCatedratico = CA.IdCatedratico
                        INNER JOIN cicloescolar as CL on AGC.idCicloEscolar = CL.idCicloEscolar");

    if ($sql) {

      $content = "";
      while($data = $sql->fetch_assoc()){

        $content.='<tr id="'. $data['idAsignacionCursos'] .'">
                      <td>
                        <div class="form-group" style="color: transparent">
                          <input type="hidden" name="cbos" value="' . $data['IdCatedratico'] . '"/>
                          <SELECT NAME="cbo1" class="form-control CboTeacher" SIZE=0 disabled="true"></SELECT>
                          <p style="display: none">' . $data['nombreCatedratico'] . '</p>
                        </div>
                      </td>
                      <td>
                        <div class="form-group" style="color: transparent">
                          <input type="hidden" name="cbos" value="' . $data['idCurso'] . '"/>
                          <SELECT NAME="cbo2" class="form-control CboCourse" SIZE=0 disabled="true"></SELECT>
                          <p style="display: none">' . $data['nombreCurso'] . '</p>
                        </div>
                      </td>
                      <td>
                        <div class="form-group" style="color: transparent">
                          <input type="hidden" name="cbos" value="' . $data['idGrado'] . '"/>
                          <SELECT NAME="cbo1" class="form-control cboGrado" SIZE=0 disabled="true"></SELECT>
                          <p style="display: none">' . $data['Descripcion'] . '</p>
                        </div>
                      </td>
                      <td>
                        <div class="form-group" style="color: transparent">
                          <input type="hidden" name="cbos" value="' . $data['idCicloEscolar'] . '"/>
                          <SELECT NAME="cbo2" class="form-control cboCE" SIZE=0 disabled="true"></SELECT>
                          <p style="display: none">' . $data['Año'] . '</p>
                        </div>
                      </td>
                      <td style="text-align: center;" class="btnActions">' .
                  '      <div class="btn-group">
                            <button class="btn btn-primary" onclick="fnModifyGeneral(\'' . $data['idAsignacionCursos'] . '\',
                            \'tableAssignCourses\')"><i class="fa fa-pencil"></i></button>
                            <button class="btn btn-success" onclick="fnAcceptGeneral(\'' . $data['idAsignacionCursos'] . '\', \'tableAssignCourses\', \'AssignCourse\')"><i class="fa fa-check"></i></button>
                            <button class="btn btn-danger" onclick="fnDeleteGeneral(\'' . $data['idAsignacionCursos'] . '\', \'AssignCourse\')"><i class="fa fa-trash-o"></i></button>
                          </div>
                      </td>
                  </tr>';

      }

      echo $content;

    }
  }

  public function fnFillingSearchPayments()
  {
    $db = new ConnectionClass();

    $sql = $db->query("SELECT ES.tipoEstado, E.idEstudiante, E.nombreEstudiante, E.numeroCarne, E.telefonoEstudiante, U.usuario
                        FROM estudiantes AS E
                        INNER JOIN usuarios AS U ON E.idEstudiante = U.idEstudiante
                        INNER JOIN estados AS ES ON ES.idestado = E.idestado");

    if ($sql) {

      $content = "";
      while($data = $sql->fetch_assoc()){

        $content.='<tr">
                  <td>' . $data['nombreEstudiante'] . '</td>
                  <td>' . $data['numeroCarne'] . '</td>
                  <td>' . $data['telefonoEstudiante'] . '</td>
                  <td>' . $data['usuario'] . '</td>
                  <td>' . $data['tipoEstado'] . '</td>
                  <td style="text-align: center;">' .
                  '<button type="button" class="btn btn-primary btn-xs"' .
                  'onclick="fnViewPayments(\'' . $data['idEstudiante'] . '\')">Ver Pagos</button></td>
                  </tr>';

      }

      echo $content;

    }

  }

  public function fnFillingPaymentsStudent($id)
  {
    $db = new ConnectionClass();

    $sql = $db->query("SELECT M.idMes , M.Descripcion, T.fechaTransaccion, CL.año, TP.Descripcion as TpDescripcion
                        FROM detalletransacciones as D
                        inner join mes as M on D.idMes = M.idMes
                        inner join cicloescolar as CL on CL.idCicloEscolar = D.idCicloEscolar
                        INNER JOIN transacciones as T on D.idTransaccion = T.idTransaccion
                        INNER JOIN tipopago as TP on TP.IdTipoPago = T.IdTipoPago
                        WHERE T.IdEstudiante = '$id'");

    if ($sql) {

      $content = "";
      while($data = $sql->fetch_assoc()){

        $content.='<tr">
                  <td>' . $data['año'] . '</td>
                  <td>' . $data['Descripcion'] . '</td>
                  <td>' . $data['fechaTransaccion'] . '</td>
                  <td>' . $data['TpDescripcion'] . '</td>
                  </tr>';

      }

      echo $content;

    }

  }

  public function fnFillingViewRatings()
  {
    $db = new ConnectionClass();

    $sql = $db->query("SELECT ES.tipoEstado, E.idEstudiante, E.nombreEstudiante, E.numeroCarne, E.telefonoEstudiante, U.usuario
                        FROM estudiantes AS E
                        INNER JOIN usuarios AS U ON E.idEstudiante = U.idEstudiante
                        INNER JOIN estados AS ES ON ES.idestado = E.idestado");

    if ($sql) {

      $content = "";
      while($data = $sql->fetch_assoc()){

        $content.='<tr">
                  <td>' . $data['nombreEstudiante'] . '</td>
                  <td>' . $data['numeroCarne'] . '</td>
                  <td>' . $data['telefonoEstudiante'] . '</td>
                  <td>' . $data['usuario'] . '</td>
                  <td>' . $data['tipoEstado'] . '</td>
                  <td style="text-align: center;">' .
                  '<button type="button" class="btn btn-primary btn-xs"' .
                  'onclick="fnViewRatings(\'' . $data['idEstudiante'] . '\')">Ver Notas</button></td>
                  </tr>';

      }

      echo $content;

    }

  }

  public function fnFillingViewManStudents()
  {
    $db = new ConnectionClass();

    $sql = $db->query("SELECT ES.tipoEstado, E.idEstudiante, E.nombreEstudiante, E.numeroCarne, E.telefonoEstudiante, U.usuario, E.idEstudiante
                        FROM estudiantes AS E
                        INNER JOIN usuarios AS U ON E.idEstudiante = U.idEstudiante
                        INNER JOIN estados AS ES ON ES.idestado = E.idestado");

    if ($sql) {

      $content = "";
      while($data = $sql->fetch_assoc()){

        $content.='<tr">
                  <td>' . $data['nombreEstudiante'] . '</td>
                  <td>' . $data['numeroCarne'] . '</td>
                  <td>' . $data['telefonoEstudiante'] . '</td>
                  <td>' . $data['usuario'] . '</td>
                  <td>' . $data['tipoEstado'] . '</td>
                  <td style="text-align: center;" class="btnActions">' .
                  ' <div class="btn-group">
                        <button class="btn btn-primary" onclick="fnViewManStudents(\'' . $data['idEstudiante'] . '\')">
                        <i class="fa fa-pencil"></i></button>
                        <button class="btn btn-danger" onclick="fnDeleteGeneral(\'' . $data['idEstudiante'] . '\', \'ManStudents\')"><i class="fa fa-trash-o"></i></button>
                      </div>
                  </td></tr>';

      }

      echo $content;

    }

  }

  public function fnFillingProfessions()
  {
    $db = new ConnectionClass();

    $sql = $db->query("SELECT *
                        FROM profesiones ");

    if ($sql) {

      $content = "";
      while($data = $sql->fetch_assoc()){

        $content.='<tr id="'. $data['idProfesion'] .'">
                      <td>
                        <div class="form-group" style="color: transparent;">
                          <input class="form-control" type="text" placeholder="Grado" disabled="true" ' . ' value="' . $data['Profesion'] . '"/>
                          <p style="display: none">' . $data['Profesion'] . '</p>
                        </div>
                      </td>
                      <td style="text-align: center;" class="btnActions">' .
                  '      <div class="btn-group">
                            <button class="btn btn-primary" onclick="fnModifyGeneral(\'' . $data['idProfesion'] . '\',
                            \'tableProfession\')"><i class="fa fa-pencil"></i></button>
                            <button class="btn btn-success" onclick="fnAcceptGeneral(\'' . $data['idProfesion'] . '\', \'tableProfession\', \'Profession\')"><i class="fa fa-check"></i></button>
                            <button class="btn btn-danger" onclick="fnDeleteGeneral(\'' . $data['idProfesion'] . '\', \'Profession\')"><i class="fa fa-trash-o"></i></button>
                          </div>
                      </td>
                  </tr>';

      }

      echo $content;

    }
  }

  public function fnFillingParents()
  {
    $db = new ConnectionClass();

    $sql = $db->query("SELECT *
                        FROM encargados ");

    if ($sql) {

      $content = "";
      while($data = $sql->fetch_assoc()){

        $content.='<tr id="'. $data['idEncargado'] .'">
                      <td>
                        <div class="form-group" style="color: transparent;">
                          <input class="form-control" type="text" placeholder="Grado" disabled="true" ' . ' value="' . $data['nombreEncargado'] . '"/>
                          <p style="display: none">' . $data['nombreEncargado'] . '</p>
                        </div>
                      </td>
                      <td>
                        <div class="form-group" style="color: transparent;">
                          <input class="form-control" type="text" placeholder="Grado" disabled="true" ' . ' value="' . $data['domicilioEncargado'] . '"/>
                          <p style="display: none">' . $data['domicilioEncargado'] . '</p>
                        </div>
                      </td>
                      <td>
                        <div class="form-group" style="color: transparent;">
                          <input class="form-control" type="text" placeholder="Grado" disabled="true" ' . ' value="' . $data['numeroContacto'] . '"/>
                          <p style="display: none">' . $data['numeroContacto'] . '</p>
                        </div>
                      </td>
                      <td>
                        <div class="form-group" style="color: transparent;">
                          <input class="form-control" type="text" placeholder="Grado" disabled="true" ' . ' value="' . $data['emailContacto'] . '"/>
                          <p style="display: none">' . $data['emailContacto'] . '</p>
                        </div>
                      </td>
                      <td style="text-align: center;" class="btnActions">' .
                  '      <div class="btn-group">
                            <button class="btn btn-primary" onclick="fnModifyGeneral(\'' . $data['idEncargado'] . '\',
                            \'tableParent\')"><i class="fa fa-pencil"></i></button>
                            <button class="btn btn-success" onclick="fnAcceptGeneral(\'' . $data['idEncargado'] . '\', \'tableParent\', \'Parent\')"><i class="fa fa-check"></i></button>
                            <button class="btn btn-danger" onclick="fnDeleteGeneral(\'' . $data['idEncargado'] . '\', \'Parent\')"><i class="fa fa-trash-o"></i></button>
                          </div>
                      </td>
                  </tr>';

      }

      echo $content;

    }
  }

  public function fnFillingTeachers()
  {
    $db = new ConnectionClass();

    $sql = $db->query("SELECT *
                        FROM catedraticos AS C
                        INNER JOIN profesiones AS P ON C.Profesiones_idProfesion = P.idProfesion");

    if ($sql) {

      $content = "";
      while($data = $sql->fetch_assoc()){

        $content.='<tr id="'. $data['idCatedratico'] .'">
                      <td>
                        <div class="form-group" style="color: transparent;">
                          <input class="form-control" type="text" placeholder="Grado" disabled="true" ' . ' value="' . $data['nombreCatedratico'] . '"/>
                          <p style="display: none">' . $data['nombreCatedratico'] . '</p>
                        </div>
                      </td>
                      <td>
                        <div class="form-group" style="color: transparent;">
                          <input class="form-control" type="text" placeholder="Grado" disabled="true" ' . ' value="' . $data['domicilioCatedratico'] . '"/>
                          <p style="display: none">' . $data['domicilioCatedratico'] . '</p>
                        </div>
                      </td>
                      <td>
                        <div class="form-group" style="color: transparent;">
                          <input class="form-control" type="text" placeholder="Grado" disabled="true" ' . ' value="' . $data['telefonoCatedratico'] . '"/>
                          <p style="display: none">' . $data['telefonoCatedratico'] . '</p>
                        </div>
                      </td>
                      <td>
                        <div class="form-group" style="color: transparent;">
                          <input class="form-control" type="text" placeholder="Grado" disabled="true" ' . ' value="' . $data['emailCatedratico'] . '"/>
                          <p style="display: none">' . $data['emailCatedratico'] . '</p>
                        </div>
                      </td>
                      <td>
                        <div class="form-group" style="color: transparent">
                          <input type="hidden" name="cbos" class="hid" value="' . $data['Profesiones_idProfesion'] . '"/>
                          <SELECT NAME="cbo1" class="form-control cbopro" SIZE=0 disabled="true"></SELECT>
                          <p style="display: none">' . $data['Profesion'] . '</p>
                        </div>
                      </td>
                      <td style="text-align: center;" class="btnActions">' .
                  '      <div class="btn-group">
                            <button class="btn btn-primary" onclick="fnModifyGeneral(\'' . $data['idCatedratico'] . '\',
                            \'tableTeacher\')"><i class="fa fa-pencil"></i></button>
                            <button class="btn btn-success" onclick="fnAcceptGeneral(\'' . $data['idCatedratico'] . '\', \'tableTeacher\', \'Teacher\')"><i class="fa fa-check"></i></button>
                            <button class="btn btn-danger" onclick="fnDeleteGeneral(\'' . $data['idCatedratico'] . '\', \'Teacher\')"><i class="fa fa-trash-o"></i></button>
                          </div>
                      </td>
                  </tr>';

      }

      echo $content;

    }
  }
}
