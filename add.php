<?php

include('config/db_connect.php');

$errors = array('email' => '', 'name' => '', 'ingredients' => '');
$email = $name = $ingredit = '';

if (isset($_POST['submit'])) {
  // echo htmlspecialchars($_POST['email']);
  //check Email
  if (empty($_POST['email'])) {
    $errors['email'] = 'email is required';
  } else {
    $email = $_POST['email'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors['email'] = 'email must be a valid email address';
    }
  }
  //check Name
  if (empty($_POST['name'])) {
    $errors['name'] = 'Name is required';
  } else {
    $name = $_POST['name'];
    if (!preg_match('/^[a-zA-Z\sî]+$/', $name)) {
      $errors['name'] = 'Name should be alphabetics';
    }
  }
  //check ingredients
  if (empty($_POST['ingredients'])) {
    $errors['ingredients'] = 'ingredients is required';
  } else {
    $ingredit = $_POST['ingredients'];
    if (!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)(\s*[1-9\s]*)*$/', $ingredit)) {
      $errors['ingredients'] = 'Ingedients should alphabetics and should also be comma separted';
    }
  }



  if (!array_filter($errors)) {

    $email = mysqli_real_escape_string($conn, $email);
    $name = mysqli_real_escape_string($conn, $name);
    $ingredit = mysqli_real_escape_string($conn, $ingredit);



    $sql = "INSERT INTO club_members (name, email, ingredients) VALUES ('$name', '$email', '$ingredit');";

    if(mysqli_query($conn, $sql)){
      header('Location:index.php');
    }
    else{
      echo 'There was an error: '. mysqli_error($conn);
    }
  }
}



//end of the POST check
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php
include 'templates/header.php';
?>
<section class="container grey-text">
  <h4 class="center">Add a Member</h4>
  <form class="white" action="add.php" method="POST">
    <label>Email</label>
    <input type="text" name="email" value="<?php echo htmlspecialchars($email); ?>">
    <div class="red-text"><?php echo htmlspecialchars($errors['email']); ?></div>
    <label>Name</label>
    <input type="text" name="name" value="<?php echo htmlspecialchars($name); ?>">
    <div class="red-text"><?php echo htmlspecialchars($errors['name']); ?></div>
    <label>Ingedients (comma separted)</label>
    <input type="text" name="ingredients" value="<?php echo htmlspecialchars($ingredit); ?>">
    <div class="red-text"><?php echo htmlspecialchars($errors['ingredients']); ?></div>
    <div class="center">
      <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
    </div>
  </form>
</section>
<?php
include 'templates/footer.php';
?>
</body>

</html>
