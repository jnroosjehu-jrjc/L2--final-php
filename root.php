<?php

use LDAP\Result;

    include_once('connect.php');

    function insertmed($nom, $prenom, $sexe, $tel, $adresse, $email, $specialite){
        try{
            $sql ="INSERT INTO medecin(nom, prenom, sexe, tel, adresse, email, specialite)
            VALUES(:nom, :prenom, :sexe, :tel, :adresse, :email, :specialite)";
            $con = connexion();
            $stmt = $con->prepare($sql);
            $stmt->execute([
                'nom' => $nom, 
                'prenom' => $prenom,
                'sexe'=> $sexe,
                'tel'=> $tel,
                'adresse'=> $adresse, 
                'email'=> $email,
                'specialite'=> $specialite,
            ]);
        }catch(PDOException $e){
            die($e->getMessage());
        }

    }

    function insertpat($p_code, $p_nom, $p_prenom, $p_sexe, $p_tel, $p_adresse, $p_date_enregistrement){
        try{
            $sql ="INSERT INTO dossier_patient(code, nom, prenom, sexe, tel, adresse, date_enregistrement) 
            VALUES(:code, :nom, :prenom, :sexe, :tel, :adresse, :date_enregistrement)";
            $con = connexion();
            $stmt = $con->prepare($sql);
            $stmt->execute([
                'code' => $p_code, 
                'nom' => $p_nom, 
                'prenom' => $p_prenom,
                'sexe'=> $p_sexe,
                'tel'=> $p_tel,
                'adresse'=> $p_adresse,
                'date_enregistrement'=> $p_date_enregistrement,
            ]);
        }
        catch(PDOException $e){
            // En cas ou le code du patient est repete
            echo 'PATIENT DEJA SUR LE SYSTEME';
        }

    }

    function insertconsult($idmedecin, $codepatient, $poids, $hauteur, $diagnostique, $date_consultation){
        try{
            $sql ="INSERT INTO consultation(idmedecin, codepatient, poids, hauteur, diagnostique, date_consultation) 
            VALUES(:idmedecin, :codepatient, :poids, :hauteur, :diagnostique, :date_consultation)";
            $con = connexion();  
            $stmt = $con->prepare($sql);
            $stmt->execute([
                'idmedecin' => $idmedecin, 
                'codepatient' => $codepatient, 
                'poids' => $poids,
                'hauteur'=> $hauteur,
                'diagnostique'=> $diagnostique,
                'date_consultation'=> $date_consultation,
            ]);
        }catch(PDOException $e){
            die($e->getMessage());
        }

    }

    function insertpresc($idconsultation, $prescription){
        try{
            $sql ="INSERT INTO prescription(idconsultation, prescription) 
            VALUES(:idconsultation, :prescription)";
            $con = connexion();
            $stmt = $con->prepare($sql);
            $stmt->execute([
                  'idconsultation' => $idconsultation, 
                  'prescription' => $prescription, 
                ]);
        }catch(PDOException $e){
            die($e->getMessage());
        }

    }

    function selectAllm(){
        try{
            $sql = "SELECT * FROM medecin";
            $con = connexion();
            $result= $con->query($sql);
            $rs = $result->fetchAll(PDO::FETCH_ASSOC);
    
            return $rs;
            
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

    
    function selectBySp($sp){
        try{
            $sql = "SELECT * FROM medecin WHERE specialite=:specialite";
            $con = connexion();
            $stmt = $con->prepare($sql);
            $stmt->execute(['specialite' => $sp]);
            $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $rs;
            
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }
    $data = selectAllm();    

    function recherchep($code){
        try{
            $sql = "SELECT * FROM dossier_patient WHERE code=:code";
            $con = connexion();
            $stmt = $con->prepare($sql);
            $stmt->execute(['code' => $code]);
            $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $rs;
            
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }
       

    function recherchecons($codepatient){
        try{
            $sql = "SELECT * FROM consultation WHERE codepatient=:codepatient";
            $con = connexion();
            $stmt = $con->prepare($sql);
            $stmt->execute(['codepatient' => $codepatient]);
            $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $rs;
            
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

    function rechercheconsid($idconsultation){
        try{
            $sql = "SELECT * FROM consultation WHERE id=:idconsultation";
            $con = connexion();
            $stmt = $con->prepare($sql);
            $stmt->execute(['idconsultation' => $idconsultation]);
            $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $rs;
            
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }







?>