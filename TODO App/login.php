<?php
    session_start();
    require_once 'config/database.php';

    if(!isset($_SESSION['logged_id'])){
        if(isset($_POST['login'])){
            $login=$_POST['login'];
            $password=$_POST['password'];

            $userQuery=$pdo->prepare('SELECT id, password FROM users WHERE login=:login');
            $userQuery->bindValue(':login', $login, PDO::PARAM_STR);
            $userQuery->execute();
    
            $user=$userQuery->fetch();
        
            if($user && password_verify($password, $user['password'])){
                $_SESSION['logged_id']=$user['id'];
                $_SESSION['login']=$login;
                unset($_SESSION['bad_attempt']);
                header('Location: index.php');
                exit();
            }
            else{
                $_SESSION['bad_attempt']=true;
            }
        }     
    }

?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logowanie | TODO</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="logo">
        <img src="logo.png" class="img">
        <div class="hello">
            Logowanie
        </div>
    </div>
    <div class="page">
        <div class="logg">
            <form method="post">
                <label class="label">Login</label><br><br>  <input type="text" name="login" placeholder="login" size="35" class="input" <?=isset($_POST['login']) ? 'value="'.$_POST['login'].'"' : ''?>><br><br><br>
                <label class="label">Hasło</label><br><br>  <input type="password" name="password" placeholder="password" size="35" class="input"><br><br><br>
                <input type="submit" value="Zaloguj się" class="b2 b2">
                <?php
                    if(isset($_SESSION['bad_attempt'])){
                        echo '<p>Niepoprawny login lub hasło!</p>';
                        unset($_SESSION['bad_attempt']);
                    }
                ?>
            </form>
            
        </div>
    </div>
    <div class="menu">
            <a href="index.php" class="b1 b1">Strona Główna</a> 
    </div> 
</body>
</html>