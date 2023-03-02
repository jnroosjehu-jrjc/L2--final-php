<?php include_once('./head.php'); ?>
<?php include_once('./root.php') ?>




<p>
<h3 class="justify-content-center">LISTE DES MEDECINS ET CONTACTS</h3>
<hr>  
</p>
<hr>
<table class="table table-striped">
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
</table>




<?php include_once('./foot.php'); ?>
