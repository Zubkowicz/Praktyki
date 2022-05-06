<?php
    session_start();
    require_once 'config/database.php';

    if(isset($_SESSION['logged_id'])){
        $userid=$_SESSION['logged_id'];
       
        $todosQuery=$pdo->query("SELECT * FROM todos WHERE created_by='$userid'");
        $todos=$todosQuery->fetchAll(); 
    }
    
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODO App</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="logo">
        <img src="logo.png" class="img">
        <?php
            if(isset($_SESSION['logged_id'])){
                echo '<div class="hello">';
                echo 'Hello '.$_SESSION['login'].'!';
                echo '</div>';
            }
        ?>
    </div>

    
        <?php
            if(!isset($_SESSION['logged_id'])){
                echo '  
                <div class="page1">
                    <div class="logg">
                        <div class="text1">
                            <b>Nie masz jeszcze konta?</b><br>
                            <p class="p">Zarejestruj się za darmo i korzystaj już dziś</p>
                        </div>
                        <a href="register.php"><button class="b12 b1">Zarejestruj się</button></a>
                    </div>

                    <div class="logg">
                        <div class="text2">
                            <b>Logowanie</b><br>
                            <p class="p">Jeżeli posiadasz już u nas konto zaloguj się do aplikacji</p>
                        </div>
                        <a href="login.php"><button class="b1 b1">Zaloguj się</button></a>
                    </div>
                </div>
                ';
                exit();
            }
        ?>
        <div class="new">
            <a href="crud/create.php"><button class="b3 b3">+ dodaj nowe zadanie</button></a>
        </div>
        
            <form action="crud/delete.php"class="todos">
                <?php
                    foreach ($todos as $todo) {
                        $todoid=$todo['id'];
                        $_SESSION['todoid']=$todo['id'];

                        echo '<div class="todo">';
                            echo '<h3>'.$todo['todo'].'</h3><br>';
                            echo '<a href="crud/read.php?id='.$todoid.'" class="more"> Szczegóły &#8641</a><br>';
                            echo '<div class="buttons">';
                                echo '<a href="crud/update.php?id='.$todoid.'" class="b4 b4">Edytuj</a>';
                                echo '<a href="crud/delete.php?id='.$todoid.'" class="b4 b4">Usuń</a>';
                            echo '</div>';
                        echo '</div>';
                        
                    }
                ?>
                
                </form>

        <div class="menu">
            <a href="logout.php" class="b1 b1">Wyloguj się</a> 
        </div> 
        
</body>
</html>