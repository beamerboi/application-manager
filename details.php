<?php
include('config/db_connect.php');
include('templates/header.php');

if (isset($_POST['delete'])) {
  $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

  $sql = "DELETE FROM club_members WHERE id ='$id_to_delete' ";
  if (mysqli_query($conn, $sql)) {
    header("Location: index.php");
  }
}

if (isset($_GET['id'])) {
  $id = mysqli_real_escape_string($conn, $_GET['id']);
  $sql = "SELECT * FROM club_members WHERE id = '$id'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);

  mysqli_free_result($result);
  mysqli_close($conn);
}


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<div class="container center black-text">
  <?php if ($row) : ?>
    <h4 class="brand-text"><?php echo htmlspecialchars($row['name']) ?></h4>
    <p>Email: <?php echo htmlspecialchars($row['email']) ?></p>
    <p>Applied at: <?php echo date($row['created_at']) ?></p>
    <p>Details: <?php echo htmlspecialchars($row['ingredients']) ?></p>
  <?php else : ?>

  <?php endif; ?>
  <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">

    <input type="hidden" name="id_to_delete" value="<?php echo $row['id'] ?>">
    <input type="submit" name="delete" value="Delete" class="btn brand z-depth-0">
    <a target="_blank" href="http://meet.google.com/new"><input type="button" name="interview" value="Interview" class="btn brand z-depth-0"></a>

  </form>


</div>
<?php
include('templates/footer.php');
?>

</html>