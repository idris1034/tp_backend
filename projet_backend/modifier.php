<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
     form {
            margin: 20px;
            padding: 20px;
            border-radius: 10px;
            background-color: white;
            text-align: center;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            display:block;
            width: 50%;
            height: auto;
            margin-left: auto;
            margin-right: auto;
            overflow: hidden;

        }
        a {
            text-decoration: none;
            color: white;
            border:1px solid yellow;
            padding: 10px 20px;
            border-radius: 5px;
            display: inline-block;
            background-color: blue;
        }
        input {
            padding: 5px;
            margin: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
             width: calc(100% - 22px);
        }
        input[type="submit"] {
            padding: 10px 20px;
            background-color: blue;
            color: white;
            border: 1px solid blue;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: darkblue;
        }
    </style>
<body>
    <?php
    session_start();
    if (!isset($_SESSION['logged_in'])) {
        header("Location: connection.php");
        exit();
    }
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $conn = mysqli_connect("localhost", "root", "", "backend");
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "SELECT * FROM utilisateurs WHERE id='$id'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            ?>
            <form action="modifier.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <label for="nom">Nom:</label>
                <input type="text" name="nom" value="<?php echo $row['nom']; ?>">
                <br>
                <label for="prenom">Prénom:</label>
                <input type="text" name="prenom" value="<?php echo $row['prenom']; ?>">
                <br>
                <label for="login">Login:</label>
                <input type="text"  name="login" value="<?php echo $row['login']; ?>">
                <br>
                <label for="password">mot de passe</label>
                <input type="password" name="password" value="<?php echo $row['password']; ?>">
                <br>
                <label for="profile">Profile</label>
                <input type="file" name="profile">
                <br>
                <input type="submit" value="Modifier">
            </form>
            <?php
        } else {
            echo "<p>utiliateurs non trouvé</p>";
        }
        mysqli_close($conn);
    } elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id_utilisateur = $_POST['id'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $log = $_POST['login'];
        $passwd = $_POST['password'];
        $profile = $_FILES['profile'];
       
        $conn = mysqli_connect("localhost", "root", "", "backend");
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        if (!empty($profile['name'])) {
            move_uploaded_file($profile["tmp_name"], "repprofile/" . $profile["name"]);
            $pro = "repprofile/" . $profile["name"];
        } else {
           
            $sql = "SELECT profile FROM utilisateurs WHERE id='$id_utilisateur'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $pro = $row['profile'];
        }
        
        $sql = "UPDATE utilisateurs SET nom='$nom', prenom='$prenom',login='$log', password='$passwd', profile='$pro' WHERE id='$id_utilisateur'";
        if (mysqli_query($conn, $sql)) {
           
            header("location: admin.php");
        } else {
            echo "Erreur: " . mysqli_error($conn);
        }
        mysqli_close($conn);
    } else {
        echo "<p>ID utilisateurs non spécifié</p>";
    }
    ?>
    <a href="admin.php">Retour à l'admin</a>


    
</body>
</html>