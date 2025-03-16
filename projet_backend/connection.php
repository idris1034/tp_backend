<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body {
        background-image:url('robot.avif');
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center;
    }
    .fo {
        display:block;
        border: 5px solid blue;
        width: 200px;
        height: 200px;
        border-color:while;
        background-color: blue;
        animation: anim 2s linear alternate infinite;
        border-radius: 5px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
        text-align: center;
    }
    
    @keyframes anim {
        0% {border-color: blue;}
        50% {border-color: white;}
        100% {border-color: blue;}
    }
    input:focus {
         background-color:rgba(199, 223, 12, 0.86);



    }
    #in1 {
        margin-top: 20px;
        margin-left: 20px;
        margin-right: 20px;
        margin-bottom: 20px;
        width: 150px;
        height: 30px;
        border-radius: 5px;
        border: 2px solid white;
        background-color: blue;
        color: white;
    }
    #in2 {
        margin-top: 20px;
        margin-left: 20px;
        margin-right: 20px;
        margin-bottom: 20px;
        width: 150px;
        height: 30px;
        border-radius: 5px;
        border: 2px solid white;
        background-color: blue;
        color: white;
    }
    #in3 {
        margin-top: 20px;
        margin-left: 20px;
        margin-right: 20px;
        margin-bottom: 20px;
        width: 150px;
        height: 30px;
        border-radius: 5px;
        border: 2px solid white;
        background-color: blue;
        color: white;
    }
    #in3:hover {
        background-color:rgba(199, 223, 12, 0.86);
    }
    #in3:active {
        background-color:rgba(199, 223, 12, 0.86);
    }
    p{
        color: red;
        font-size: 20px;
        text-align: center;
    }
</style>
<body>
    <form action="connection.php" method="post" class="fo">
        <input type="text" name="login" id="in1" placeholder="login">
        <input type="password" name="password" id="in2" placeholder="password">
        <input type="submit" value="Connexion" id="in3">
    </form>
    <?php
        session_start();
        if(isset($_POST["login"],$_POST["password"])){
            $login=$_POST["login"];
            $password=$_POST["password"];
            if(empty($login) || empty($password)){
                echo "veuillez remplir tous les champs";
            }
            elseif($login=="admin" && $password=="admin"){
                $_SESSION['logged_in'] = true;
                header("location:admin.php");
            }
            else{
                echo "login ou mot de passe incorrect";
                
            }
        }
    ?>
</body>
</html>