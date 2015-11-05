<?php

require_once '../classes/class.fnVerifyData.php';
require_once '../classes/class.Connection.php';

if (isset($_POST['conditional'])) {

  $fnVerify = new Verify();

  switch ($_POST['conditional']) {
    case '#frmProfe':
      echo $fnVerify->fnProfessions($_POST['data']);
      break;
    case '#frmCourse':
      echo $fnVerify->fnCourses($_POST['data']);
      break;
    case '#frmAssignCourses':
        $arrayPost = $_POST['data'];
        echo $fnVerify->fnAssignCourses($arrayPost['ciclo'], $arrayPost['curso'], $arrayPost['grado']);
        break;
  }

}
