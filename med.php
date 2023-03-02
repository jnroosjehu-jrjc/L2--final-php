<?php include_once('./head.php'); ?>
<?php include_once('./root.php') ?>
<?php


$data = selectAllm();
if (isset($_POST['bts=1'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $sexe = $_POST['sexe'];
    $tel = $_POST['tel'];
    $adresse = $_POST['adresse'];
    $email = $_POST['email'];
    $specialite = $_POST['specialite'];


    $r = insertmed($nom, $prenom, $sexe, $tel, $adresse, $email, $specialite);

    if($r != 0)
        $data = selectAllm();
}


$data_rch = selectAllm();
if (isset($_GET['bts=11'])) {
    $sp = $_GET['sp'];

    $rch = selectBySp($sp);

    if($rch != 0)
        $data_rch = selectBySp($sp);
}



?>



<p>
<h3 class="justify-content-center">RECHERCHE MEDECIN PAR SPECIALITE</h3>
<hr>
</p>
<form action="" method="get" class="row g-3">
    
    <div class="col-md-4 mb-3">
        <input type="search" name="sp" class="form-control" placeholder="Rechercher par Specialite...">
    </div>

    <div class="mb-3">
        <input type="submit" value="Recherche" name="bts=11" class="btn btn-success">
    </div>
</form>


<table class="table table-bordered table-striped">
    <thead>
    <th>#</th>
    <th>Nom</th>
    <th>Prenom</th>
    <th>Sexe</th>
    <th>Contact</th>
    <th>Adresse</th>
    <th>Email</th>
    <th>Specialite</th>
    </thead>
    <tbody>
        <?php if (count($data_rch) != 0) {
            foreach ($data_rch as $l) { ?>
                <tr>
                    <?php foreach ($l as $c => $v) { ?>
                        <td>
                            <?php echo $v; ?>
                        </td>
                    <?php } ?>
                </tr>
                <caption>
                    <button  class="center btn btn-success">
                        <a class="nav-link text-white" href="list_med.php">LISTE COMPLETE DES MEDECINS ICI</a>
                    </button>
                </caption>
                       
        <?php }
        } ?>
    </tbody>
</table>



<hr><hr><hr>
<h4 >NOUVEAU MEDECIN</h4>
<form  action="" method="post" class="row g-3">
    <div class="col-md-4 mb-3">
        <label class="form-label">Nom </label>
        <input type="text" name="nom" class="form-control" placeholder="Nom">
    </div>

    <div class="col-md-4 mb-3">
        <label class="form-label">Prenom </label>
        <input type="text" name="prenom" class="form-control" placeholder="Prenom">
    </div>


    <div class="col-md-1 mb-3">
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
        <label class="form-label">Email </label>
        <input type="email" name="email" class="form-control" placeholder="Email">
    </div>

    <div class="col-md-4 mb-3">
        <label class="form-label">Specialit&eacute </label>
        <input type="text" name="specialite" class="form-control" placeholder="Specialite">
    </div><br>

    <div class="col-md-6 mb-3">
        <input type="submit" value="HDBB" name="bts=1" class="btn btn-success">
    </div>
</form>
<hr>
<hr>
<hr>



<?php include_once('./foot.php'); ?>
