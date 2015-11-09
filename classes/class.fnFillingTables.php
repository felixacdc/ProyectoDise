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

      $content = "";
      while($data = $sql->fetch_assoc()){

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

}
