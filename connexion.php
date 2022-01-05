<?php  

    $connexion = new PDO('mysql:host=localhost;dbname=sitetest;charset=utf8', 'root','toor');
            
        if (isset($_POST['email']) AND isset($_POST['mdp']))
            {
                if (!empty($_POST['email']) AND !empty($_POST['mdp']))
                {
                    $email = $_POST['email'];
                    $req = $connexion->prepare('SELECT * FROM users WHERE email = :email');
                    $req-> execute(array(
                        'email' => $email));
 
                    $resultat = $req->fetch();
 
                     
                    if (!$resultat OR !password_verify($_POST['mdp'], $resultat['mdp']))
                    {
                        echo 'Email ou Mot De Passe incorrect.<br/>';
                    }
                    else
                    {
                        header('Location: dashboard.php');
                    }
                    $req->closeCursor();
                }
                else
                {
                    echo 'Renseignez un Email et un Mot De Passe.<br/>';
                }
            }
?>
<html>    
<head>
    <meta charset="UTF-8">
    <title>ETIS</title>
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
      <h2>Connexion</h2>
      <form method="POST" action="">
            <input type="email" placeholder="Email" id="email" name="email" class="email2" />
            </br></br>
            <input type="password" placeholder="Mot de passe" id="mdp" name="mdp" class="mdp2" />
            </br></br>
            <input type="submit" value="Inscription" class="Inscription" name="inscription" />
            <input type="submit" value="Connexion" class="Connexion" name="Connexion" />
</form>
    </div>        
        </body>
</html>

