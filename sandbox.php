<?php
// ternary operators

$score = 40;
//  echo $score > 50 ? 'High Score' : 'Low Score :(';

// echo $_SERVER['SERVER_NAME'] . '<br />';
// echo $_SERVER['REQUEST_METHOD'] . '<br />';
// echo $_SERVER['SCRIPT_FILENAME'] . '<br />';
// echo $_SERVER['PHP_SELF'];
if(isset($_POST['submit'])){
    session_start();
    $_SESSION['name'] = $_POST['name'];
    header("Location: index.php");

}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>SandBox</title>
</head>

<body>
    <p><?php echo $score > 50 ? 'high score' : 'low score:(' ?></p>
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
        <input type="text" name="name">
        <input type="submit" name="submit" value="send">
    </form>
</body>

</html>