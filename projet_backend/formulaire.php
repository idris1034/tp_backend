<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
        <style>
            .fo {
                display:block;
                border: 5px solid blue;
                width:500px;
                height:auto;

            }
            input{
                margin: 10px;
                padding: 10px;
                width: 300px;
                border-radius: 5px;
                border: 2px solid blue;
            }
            input[type="submit"]{
                width: 100px;
                background-color: blue;
                color: white;
                border: none;
                border-radius: 5px;
                padding: 10px;
            }
            input[type="submit"]:hover{
                background-color: yellow;
               
            }
        </style>
<body>
      <form action="formulaire.php" method="post" enctype="multipart/form-data" class="fo">
        <input type="text" name="name" placeholder="entrer votre nom">
        <input type="text" name="prenom" placeholder="entrer votre prenom">
        <input type="text" name="login" placeholder="entrer votre login">
        <input type="password" name="password" placeholder="entrer votre mot de passe">
        <input type="file" name="file">
        <input type="submit" value="envoyer">

      </form>
      <?php
            if(isset($_POST["name"],$_POST["prenom"],$_POST["login"],$_POST["password"],$_FILES["file"])){
                $nom=$_POST["name"];
                $prenom=$_POST["prenom"];
                $login=$_POST["login"];
                $password=$_POST["password"];
                $file=$_FILES["file"];
                if(empty($nom) || empty($prenom) || empty($login) || empty($password) || empty($file)){
                    echo "veuillez remplir tous les champs";
                }
                else {
                    $con=mysqli_connect("localhost","root","","backend");
                    move_uploaded_file($file["tmp_name"],"repprofile/".$file["name"]);
                    $pro="repprofile/".$file["name"];
                    $p=md5($password);
                    $req="INSERT INTO utilisateurs(nom, prenom, login, password, profile) VALUES ('$nom','$prenom','$login','$p','$pro')";
                    $res=mysqli_query($con,$req);
                    if($res){
                        header("location:admin.php");
                    }
                    else {
                        echo "echec enregistrement";
                    }
                    mysqli_close($con);
                 

                } 
                
              
            }

                
      ?>
</body>
</html>