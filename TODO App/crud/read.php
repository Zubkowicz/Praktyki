<?php
    session_start();
    require_once __DIR__.'/../config/database.php';
    
    if(!isset($_SESSION['logged_id'])){
        header('Location: ../index.php');
    }
    if(!isset($_SESSION['todoid'])){
        header('Location: ../index.php');
    }
    $id=$_GET['id'];
    $todoQuery = $pdo->query("SELECT * FROM todos WHERE id='$id'");
    $todo=$todoQuery->fetchAll();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Szczegóły zadania | TODO</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="logo">
        <img src="../logo.png" class="img">
        <div class="hello">
            Szczegóły zadania
        </div>
    </div>
    <div class="page">
        <?php
            foreach($todo as $todo){
                echo '<div class="title">'.$todo['todo']."</div>";
                echo '<div class="details">'.$todo['details']."</div>";

            }
        ?>
    </div>

    <div class="menu">
        <a href="/TODO App/index.php"><button class="b1 b1">Powrót</button></a>
    </div>
</body>
</html>
