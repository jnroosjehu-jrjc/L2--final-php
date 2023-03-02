<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HDBB SYSTEM | Home</title>
    <!-- <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"/> -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
</head>

<style>
    body{
    margin: 0;
    padding: 0;
    font-family: sans-serif; 
    background:linear-gradient(#38598b,rgba(16, 28, 40, 0.755)),url(assets/h.jpg); 
    background-attachment: fixed;
    height: 800px;
    -webkit-background-size:cover;
    background-size: cover;
    background-position: center center;
    position: relative; line-height: 1.5;
}

.text-principal{
    position: absolute;
    width: 600px;
    height: 300px;
    text-align: center;
    margin: 10% 30%;
    padding-bottom: 50px;

}

.text-principal a{
    text-decoration: none;
    font-weight: bolder;
    background-color: #38598b;
    color: #fff;;
    padding: 15px 50px 15px 50px;
    margin: 30px;
    border: 1px solid;
    border-radius: 5px;

}

li{
    display: block;
    padding: 10px;
    margin : 30px;
   
}

.text-principal h1{
    text-align: center;
    color: rgb(255, 255, 255);
    font-family: Verdana, sans-serif;
    font-size: 60px;


}

#footer p{
    text-align: center;
    font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    font-weight: bold;
    font-style: italic;
    font-size: x-small;
    color:#940b3f99;
    padding-top: 100px;

}
</style>

<body>
        <div class="text-principal">
        <h1>HOPITAL HDBB SYSTEM</h1>
          
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="col-md-4 mb-3" href="med.php">MEDECIN</a></li>
            </li>
            <li class="nav-item">
                <a class="col-md-4 mb-3" href="list_med.php">LISTE MEDECINS</a>
            </li>
            <li class="nav-item">
                <a class="col-md-4 mb-3" href="patient.php">ENREGISTREMENT PATIENT</a></li>
            </li>
            <li class="nav-item">
                <a class="col-md-4 mb-3" href="consult.php">CONSULTATIONS</a></li>
            </li>
            <li class="nav-item">
                <a class="col-md-4 mb-3" href="presc.php">PRESCRIPTIONS</a></li>
            </li>
        
        </ul>

        </div>

        <div>
            <hr>
            <hr>
            <hr>
        </div>


        
      
       
        
    
       
</body>
</html>