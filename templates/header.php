<?php
session_start();

if($_SERVER['QUERY_STRING'] == "noname"){
  unset($_SESSION['name']);
}

$namee = $_SESSION['name'] ?? "Guest";


?>

  <head>
    <title>MyUni</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style type="text/css">
      .brand{
        background: #F1945A !important;
      }
      .brand-text{
        color: #F1945A !important;
      }
      .member{
        width: 100px;
        margin: 40px auto -30px;
        display: block;
        position: relative;
        top: -30px;
      }
      form{
        max-width: 400px;
        margin : 20px auto;
        padding: 20px;
      }
    </style>
  </head>
  <body class="grey lighten-4">
    <nav class="white z-depth-0">
      <div class="container">
          <a href="index.php" class="brand-logo brand-text">MyUni</a>
          <ul id="nav-mobile" class="right hide-on-small-and-down">
            <li> <a href="add.php" class="btn brand z-depth-0">Add a Member</a> </li>
            <li><?php echo htmlspecialchars($namee)?></li>
          </ul>
      </div>
    </nav>
