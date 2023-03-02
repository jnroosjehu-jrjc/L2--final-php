<?php include_once('./head.php'); ?>
<?php include_once('./root.php') ?>
<?php


function selectAllc(){
    try{
        $sql = "SELECT * FROM consultation";
        $con = connexion();

        $result= $con->query($sql);

        $rs = $result->fetchAll(PDO::FETCH_ASSOC);

        return $rs;
        
    }catch(PDOException $e){
        die($e->getMessage());
    }
}

$data = selectAllc();
if (isset($_POST['bts=1'])) {
    $idmedecin = $_POST['idmedecin'];
    $codepatient = $_POST['codepatient'];
    $poids = $_POST['poids'];
    $hauteur = $_POST['hauteur'];
    $diagnostique = $_POST['diagnostique'];
    $date_consultation = $_POST['date_consultation'];
  

    $r = insertconsult($idmedecin, $codepatient, $poids, $hauteur, $diagnostique, $date_consultation);

    if($r != 0)
        $data = selectAllc();
}


$d_rch = selectAllc();
if (isset($_GET['rech_c'])) {
    $codepatient = $_GET['codecp'];

    $rch = recherchecons($codepatient);

    if($rch != 0)
        $d_rch = recherchecons($codepatient);
}



$d_rchv = selectAllc();
if (isset($_GET['vc'])) {
    $idconsultation = $_GET['ic'];

    $rch = rechercheconsid($idconsultation);

    if($rch != 0)
        $d_rchv = rechercheconsid($idconsultation);
}




?>


<p>
<h3 class="justify-content-center">MES CONSULTATIONS</h3>
<hr>
</p>
<form action="" method="get" class="row g-3">
    
    <div class="col-md-4 mb-3">
        <input type="search" name="codecp" class="form-control" placeholder="Entrez Code Patient">
    </div>

    <div class="mb-3">
        <input type="submit" value="Rechercher Mes Consultations" name="rech_c" class="btn btn-primary">
    </div>
</form>
<hr>

<table class="table table-striped">
    <thead>
        <th>#</th>
        <th>Id-Medecin</th>
        <th>Mon Code</th>
        <th>Poids</th>  
        <th>Hauteur</th>
        <th>Diagnostique</th>    
        <th>Date</th>              
    </thead>
    <tbody>
    <?php if (count($d_rch) != 0) {
            foreach ($d_rch as $l) { ?>
                <tr>
                    <?php foreach ($l as $c => $v) { ?>
                        <td>
                            <?php echo $v; ?>
                        </td>
                    <?php } ?>
                       

                    </td>
                </tr>
        <?php }
        } ?>
    </tbody>
</table>



<h3 class="justify-content-center">VERIFIER CONSULTATIONS</h3>
<form action="" method="get" class="row g-3">
    
    <div class="col-md-4 mb-3">
        <input type="search" name="ic" class="form-control" placeholder="Entrez id consultation...">
    </div>

    <div class="mb-3">
        <input type="submit" value="Rechercher Mes Consultations" name="vc" class="btn btn-primary">
    </div>
</form>

<table class="table table-striped">
    <thead>
        <th>#</th>
        <th>Id-Medecin</th>
        <th>Mon Code</th>
        <th>Poids</th>  
        <th>Hauteur</th>
        <th>Diagnostique</th>    
        <th>Date</th>              
    </thead>
    <tbody>
    <?php if (count($d_rchv) != 0) {
            foreach ($d_rchv as $l) { ?>
                <tr>
                    <?php foreach ($l as $c => $v) { ?>
                        <td>
                            <?php echo $v; ?>
                        </td>
                    <?php } ?>
                       

                    </td>
                </tr>
        <?php }
        } ?>
    </tbody>
</table>







<p>
<hr>
</p>
<h4>ENREGISTREMENT CONSULTATION</h4>
<form action="" method="post" class="row g-2">
    <div class="col-md-4 mb-3">
        <label class="form-label">Id-medecin </label>
        <input type="text" name="idmedecin" class="form-control" placeholder="id-medecin">
    </div>

    <div class="col-md-4 mb-3">
        <label class="form-label">Code-Patient </label>
        <input type="text" name="codepatient" class="form-control" placeholder="code-patient">
    </div>

    <div class="col-md-4 mb-3">
        <label class="form-label">Poids </label>
        <input type="text" name="poids" class="form-control" placeholder="Poids">
    </div>

   <div class="col-md-4 mb-3">
        <label class="form-label">Hauteur </label>
        <input type="text" name="hauteur" class="form-control" placeholder="Hauteur(cm)">
    </div>

    <div class="col-md-4 mb-3">
        <label class="form-label">Date Consultation </label>
        <input type="date" name="date_consultation" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Diagnostique </label>
        <textarea class="form-control" name="diagnostique" id="diagnostique" cols="200" rows="10"></textarea>
    </div>

    <div class="col-md-4 mb-3">
        <input type="submit" value="HDBB" name="bts=1" class="btn btn-primary">
    </div>
</form>
<hr>
<hr>
<hr>





<?php include_once('./foot.php'); ?>
