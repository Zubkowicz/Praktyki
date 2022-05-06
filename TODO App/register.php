<?php
    session_start();
    require_once 'config/database.php';
    
    if(isset($_POST['login'])){
        $login=$_POST['login'];
        $password1=$_POST['password1'];
        $password2=$_POST['password2'];
        $OK=true;
        
        /////////////////////////////////
        if((strlen($login)<3)||(strlen($login)>25)){
            $OK=false;
            $_SESSION['err_login']="Login musi mieć od 3 do 25 znaków";
        }

        if(ctype_alnum($login)==false){
            $OK=false;
            $_SESSION['err_login']="Login może składać się tylko z liter i cyfr (bez polskich znaków)";
        }

        //////////////////////////////////
        if((strlen($password1)<8)){
            $OK=false;
            $_SESSION['err_pass']="Hasło musi zawierać co najmniej 8 znaków";
        }

        if($password1!=$password2){
            $OK=false;
            $_SESSION['err_pass']="Podane hasła nie są identyczne";
        }

        $password_hash=password_hash($password1, PASSWORD_DEFAULT);

        ////////////////////////////////
        if(!isset($_POST['regulamin'])){
			$OK=false;
			$_SESSION['err_reg']="Potwierdź akceptacje regulaminu";
		}

        
        $istnieje=$pdo->prepare('SELECT login FROM users WHERE login=:login');
        $istnieje->execute(['login'=>$login]);
        
        
        if($istnieje->rowCount()>0){
            $OK=false;
            $_SESSION['err_login']="Login zajęty";
            
        }

        if($OK==true){
            if($pdo->query("INSERT INTO users VALUES (NULL, '$login','$password_hash')")){
                $_SESSION['register']==true;
                header('Location: index.php');
            }
            else{
                throw new Exception($pdo->error);
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
    <title>Rejestracja | TODO</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="logo">
        <img src="logo.png" class="img">
        <div class="hello">
            Rejestracja
        </div>
    </div>
    <div class="page">
        <div class="logg">
            <form method="post">
                <label class="label">Login</label><br><br>  <input type="text" name="login" size="35" class="input" <?=isset($_POST['login']) ? 'value="'.$_POST['login'].'"' : ''?> >
                    <?php
                        if(isset($_SESSION['err_login'])){
                            echo'<div class="error">'.$_SESSION['err_login'].'</div>';
                            unset($_SESSION['err_login']);
                        }
                    ?>
                <br><br><br><label class="label">Hasło:</label><br><br>  <input type="password" name="password1" size="35" class="input">
                    <?php
                        if(isset($_SESSION['err_pass'])){
                            echo'<div class="error">'.$_SESSION['err_pass'].'</div>';
                            unset($_SESSION['err_pass']);
                        }
                    ?>
                <br><br><br><label class="label">Powtórz hasło:</label><br><br>  <input type="password" name="password2" size="35" class="input">
                <br><br><br>
                <label class="container">
                    <input type="checkbox" name="regulamin"> Akceptuję regulamin<br><br>
                </label>
                    <?php
                        if(isset($_SESSION['err_reg'])){
                            echo'<div class="error">'.$_SESSION['err_reg'].'</div>';
                            unset($_SESSION['err_reg']);
                        }
                    ?>
                <input type="submit" value="Zarejestruj się" class="b2 b2">
                
            </form>
            
        </div>
    </div>
    <div class="menu">
            <a href="index.php" class="b1 b1">Strona Główna</a> 
    </div>
</body>
</html>