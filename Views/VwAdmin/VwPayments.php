<div class="table-responsive">
    <table class="table table-striped table-bordered table-hover" id="tablePayments">
        <thead>
            <tr>
                <th>Ciclo</th>
                <th>Mes</th>
                <th>Fecha</th>
                <th>Tipo Pago</th>
            </tr>
        </thead>
        <tbody>


            <?php
              require_once '../../classes/class.fnFillingTables.php';
              require_once '../../classes/class.Connection.php';

              $fnFillingTable = new FillingTables();
              echo $fnFillingTable->fnFillingPaymentsStudent($_GET['id']);
             ?>


        </tbody>
    </table>
</div>
<!-- BOOTSTRAP SCRIPTS -->
<script src="../assets/js/bootstrap.min.js"></script>
<!-- DATA TABLE SCRIPTS -->
<script src="../assets/js/dataTables/jquery.dataTables.js"></script>
<script src="../assets/js/dataTables/dataTables.bootstrap.js"></script>
<script>
$(document).ready(function () {
    $('#tablePayments').dataTable();
});

</script>
