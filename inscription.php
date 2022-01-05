<?php
 $connexion = new PDO('mysql:host=localhost;dbname=sitetest;charset=utf8', 'root','toor'); 

if(isset($_POST['inscription']))
{
    if(!empty($_POST['pseudo']) AND !empty($_POST['mdp']) AND !empty($_POST['email']))
    {
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $email = htmlspecialchars($_POST['email']);
        $mdp = ($_POST['mdp']);
        $hash_mdp =password_hash($mdp, PASSWORD_DEFAULT);
        $usersins = "INSERT INTO users(email,mdp,pseudo) VALUES('$email','$hash_mdp','$pseudo')";
        $connexion->exec($usersins);
        $erreur ='Votre compte est créée !';
        echo $erreur;
        header('Location: connexion.php');

    }
    else
    {
        $erreur = "Tous les champs ne sont pas remplit !";
    }
}
if(isset($_POST['Connexion']))
{
    header('Location: connexion.php');
}
?> 

<html>    
<head>
    <meta charset="UTF-8">
    <title>Proméo</title>
    <link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>
    <div>
    <nav class="navbar">
        <a>
          <img src="logopromeo.png" width="60" height="60" alt="" class="logopromeo">
        </a>
      </nav>
    </div>
    <div class="formu">
      <h2>Inscription</h2>
<form method="POST" action="">
<table>
    <tr>
        <td class="pseudo"> 
            <input type="text" placeholder="Nom d'utilisateur" id="pseudo" name="pseudo" class="pseudo2" />
        </td>
    </tr>
    <tr>
    </br>
        <td class="email">
            <input type="email" placeholder="Email" id="email" name="email" class="email2"/>
        </td>
    </tr>
    <tr>
        </br>
        <td class="mdp">
            <input type="password" placeholder="Mot de passe" id="mdp" name="mdp" class="mdp2"/>
        </td> 
    </tr>
    <tr>
        <td class="bouton">
            </br>
            <input type="submit" value="Inscription" class="Inscription" name="inscription"/>
            <input type="submit" value="Connexion" class="Connexion" name="Connexion"/>
        </td>
    </tr>  
</form>

</table>
    </div>        
        </body>
</html>