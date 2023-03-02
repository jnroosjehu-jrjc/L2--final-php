<?php include_once('./head.php'); ?>
<?php include_once('./root.php') ?>
<?php

function selectAllr(){
    try{
        $sql = "SELECT * FROM prescription";
        $con = connexion();

        $result= $con->query($sql);

        $rs = $result->fetchAll(PDO::FETCH_ASSOC);

        return $rs;
        
    }catch(PDOException $e){
        die($e->getMessage());
    }
}



$data = selectAllr();
if (isset($_POST['bts=1'])) {
    $idconsultation = $_POST['idconsultation'];
    $prescription = $_POST['prescription'];
   
  

    $r = insertpresc($idconsultation, $prescription);

    if($r != 0)
        $data = selectAllr();
}

?>

<p>
<hr>
</p>
<h4>ENREGISTREMENT PRESCRIPTION</h4>
<form action="" method="post" class="row g-2">
    <div class="col-md-4 mb-3">
        <label class="form-label">Id-consultation </label>
        <input type="text" name="idconsultation" class="form-control" placeholder="id-consultation">
    </div>

    <div class="mb-3">
        <label class="form-label">Prescription </label>
        <textarea class="form-control" name="prescription" id="prescription" cols="200" rows="10"></textarea>
    </div>

    <div class="col-md-4 mb-3">
        <input type="submit" value="HDBB" name="bts=1" class="btn btn-primary">
    </div>
</form>


<!-- <table class="table table-striped">
    <thead>
        <th>#</th>
        <th>Prescription</th>
        <th></th>
    </thead>
    <tbody>
        <?php if (count($data) != 0) {
            foreach ($data as $l) { ?>
                <tr>
                    <?php foreach ($l as $c => $v) { ?>
                        <td>
                            <?php echo $v; ?>
                        </td>
                    <?php } ?>
                    <td>
                    </td>
                </tr>
        <?php }
        } ?>
    </tbody>
</table> -->

<?php include_once('./foot.php'); ?>
