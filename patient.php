<?php include_once('./head.php'); ?>
<?php include_once('./root.php') ?>
<?php
    function selectAllp(){
        try{
            $sql = "SELECT * FROM dossier_patient";
            $con = connexion();
    
            $result= $con->query($sql);
    
            $rs = $result->fetchAll(PDO::FETCH_ASSOC);
    
            return $rs;
            
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

$data = selectAllp();
if (isset($_POST['bts=1'])) {
    $p_code = $_POST['code'];
    $p_nom = $_POST['nom'];
    $p_prenom = $_POST['prenom'];
    $p_sexe = $_POST['sexe'];
    $p_tel = $_POST['tel'];
    $p_adresse = $_POST['adresse'];
    $p_date_enregistrement = $_POST['date_enregistrement'];

    $r = insertpat($p_code, $p_nom, $p_prenom, $p_sexe, $p_tel, $p_adresse, $p_date_enregistrement);
    
    if($r != 0)
        $data = selectAllp();
}
   


$d_rch = selectAllp();
if (isset($_GET['rech_p'])) {
    $code = $_GET['codear'];

    $rch = recherchep($code);

    if($rch != 0)
        $d_rch = recherchep($code);
}



?>


<p>
<h3 class="justify-content-center">RECHERCHER UN PATIENT</h3>
<hr>
</p>
<form action="" method="get" class="row g-3">
    
    <div class="col-md-4 mb-3">
        <input type="search" name="codear" class="form-control" placeholder="Entrez Code Patient">
    </div>

    <div class="mb-3">
        <input type="submit" value="Rechercher Patient" name="rech_p" class="btn btn-success">
    </div>
</form>




<table class="table table-striped">
    <thead>
        <th>Code</th>
        <th>Nom</th>
        <th>Prenom</th>  
        <th>Sexe</th>
        <th>Tel</th>
        <th>Adresse</th>  
        <th>Date Enregistrement</th>                  
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




<hr>
<hr>
<hr>
<p>
<h4>ENREGISTREMENT PATIENT</h4>
<form action="" method="post" class="row g-3">
    <div class="col-md-4 mb-3">
        <label class="form-label">Code</label>
        <input type="text" name="code" class="form-control" placeholder="Entrer Code Patient">
    </div>

    <div class="col-md-4 mb-3">
        <label class="form-label">Nom </label>
        <input type="text" name="nom" class="form-control" placeholder="Nom">
    </div>

    <div class="col-md-4 mb-3">
        <label class="form-label">Prenom </label>
        <input type="text" name="prenom" class="form-control" placeholder="Prenom">
    </div>

    <div class="col-md-4 mb-3">
        <label class="form-label">Sexe </label>
        <select class="form-select" name="sexe" aria-label="Default select example">
        <option value="F" selected>F </option>
        <option value="M">M</option>
        </select>
    </div>

    <div class="col-md-4 mb-3">
        <label class="form-label">Tel </label>
        <input type="tel" name="tel" class="form-control" placeholder="Tel">
    </div>

    <div class="col-md-4 mb-3">
        <label class="form-label">Adresse </label>
        <input type="text" name="adresse" class="form-control" placeholder="Adresse">
    </div>

    <div class="col-md-4 mb-3">
        <label class="form-label">Date Enregistrement</label>
        <input type="date" name="date_enregistrement" class="form-control">
    </div>

    <div class="col-md-4 mb-3">
        <input type="submit" value="HDBB" name="bts=1" class="btn btn-primary">
    </div>
</form>
<hr>
<hr>
<hr>




<?php include_once('./foot.php'); ?>
