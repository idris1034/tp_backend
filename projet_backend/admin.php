<?php
session_start();
if (!isset($_SESSION['logged_in'])) {
    header("Location: connection.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
     table {
        padding: 10px;
        border-collapse: collapse;
        width: 100%;
     }
     #aj
     {
        background-color: blue;
        color: white;
        text-decoration: none;
        padding: 10px;
        border-radius: 5px;
        cursor: pointer;
       
         
        
     }
     #aj:hover {
        background-color: darkblue;
     }
     td {
        padding: 10px;
        text-align: left;
     }
     #mod
        {
            background-color: yellow;
            
            border-radius: 5px;
            border:solid 1px black;
            
        }
        #sup{
            background-color: red;
            border-radius: 5px;
            border:solid 1px black;
        }
        .espace{
            padding: 5px 10px;
            display: flex;
            justify-content: space-around;
        }
        h1{
            background-color: blue;
            color: white;
            text-align: center;
            font-size: 50px;
            font-variant: small-caps;
            padding: 10px;
        }
        img {
            width:50px;
            height:50px;
        }
        
    </style>
<body>
    <h1>Liste des utilisateurs</h1>
    <a  id='aj' href="formulaire.php">Ajouter utilisateurs</a>
    <br>
    <br>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>NOM</th>
            <th>PRENOM</th>
            <th>LOGIN</th>
            <th>PASSWORD</th>
            <th>PROFILE</th>
            <th>ACTION</th>
        </tr>
        <?php
            $host="localhost";
            $dbname="backend";
            $user="root";
            $password="";
            $conn=mysqli_connect($host,$user,$password,$dbname) or die ("base de donnee non trouvee");
            $sql="SELECT id, nom, prenom, login, password, profile FROM utilisateurs";
            $r=mysqli_query($conn,$sql);
            if (isset($_GET['sup_id'])) {
            $sup_id = $_GET['sup_id'];
            $delete_sql = "DELETE FROM utilisateurs WHERE id='$sup_id'";
            if (mysqli_query($conn, $delete_sql)) {
                header("Location: admin.php");
            } else {
                echo "<p>Erreur:  utilisateur non supprimer</p>";
            }
        }
            while($row=mysqli_fetch_assoc($r))
            { 
                echo "<tr>";
                echo "<td>".$row['id']."</td><td>".$row['nom']. "</td><td>".$row['prenom']. "</td><td>".htmlspecialchars($row['login'])."</td><td>".htmlspecialchars($row['password'])."</td><td>".htmlspecialchars($row['profile'])."</td>";
                echo "<td class='espace'><a id='mod' href='modifier.php?id=".$row['id']."'><img src='icons8-edit-100.png' alt='Edit'></a> <a id='sup' href='admin.php?sup_id=".$row['id']."'><img src='icons8-delete-60.png' alt='Delete'></a></td>";
                echo "</tr>";
            }
        ?>
    </table>
</body>
</html>