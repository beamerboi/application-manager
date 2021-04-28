<?php

  include('config/db_connect.php');

    // write query for all pizzas
    $sql = 'SELECT name, ingredients, id FROM club_members ORDER BY created_at';

    // get the result set (set of rows)
    $result = mysqli_query($conn, $sql);

    // fetch the resulting rows as an array
    $members = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // free the $result from memory (good practise)
    mysqli_free_result($result);

    // close connection
    mysqli_close($conn);



?>

<!DOCTYPE html>
<html>
    <?php include('templates/header.php'); ?>

    <h4 class="center grey-text">Applications</h4>

    <div class="container">
        <div class="row">

            <?php foreach($members as $member): ?>

                <div class="col s6 md3">
                    <div class="card z-depth-0">
                        <div class="card-content center">
                            <h6><?php echo htmlspecialchars($member['name']); ?></h6>
                            <ul class="grey-text">
                                <?php foreach(explode(',', $member['ingredients']) as $ing): ?>
                                    <li><?php echo htmlspecialchars($ing); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="card-action right-align">
                            <a class="brand-text" href="details.php?id=<?php echo $member['id'] ?>">more info</a>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>

        </div>
    </div>

    <?php include('templates/footer.php'); ?>

</html>
