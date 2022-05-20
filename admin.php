<?php

//require_once('database/connection.php');
if(isset($_SESSION['username'])):?>

<html>

<h1>This is real this is me im exactly where im supposed to be</h1>
<a class="button" href="login/logout.php">Log Out</a>
</html>

<?php else: ?>

<?php header("Location:login/login.php");
echo "hellos";
?>


<?php endif; ?>
