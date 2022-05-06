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

    if(isset($_POST['save'])){
            $todo=$_POST['todo'];
                $todo = htmlentities($todo, ENT_QUOTES, "UTF-8");
            $details=$_POST['details'];
                $details = htmlentities($details, ENT_QUOTES, "UTF-8");
    
            $todoQuery = $pdo->prepare("UPDATE todos SET todo='$todo', details = '$details', updated_at = now() WHERE id = '$id'");
            $todoQuery->execute();
            header('Location: /TODO App/index.php');   
            exit();   
    }
    
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edytuj zadanie | TODO</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="logo">
        <img src="../logo.png" class="img">
        <div class="hello">
            Edytuj zadanie
        </div>
    </div>
    <div class="page">
        <div class="logg">
            <form method="post">
                <label class="label">TODO:</label><br><br>        
                <input type="text" style="width: 700px" name="todo" class="input" value="<?php foreach($todo as $todo){echo $todo['todo']; $details=$todo['details'];}?>"><br><br>
                <label class="label">Details:</label><br><br>     
                <textarea style="width: 700px" rows="20" name="details" class="textarea"><?php echo $details;?></textarea><br><br>
                <input type="submit" value="Zapisz" name="save" class="b1 b1">
            </form>
        </div>
    </div>

    <div class="menu">
        <a href="/TODO App/index.php"><button class="b1 b1">Powrót</button></a>
    </div>
</body>
</html>