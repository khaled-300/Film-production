<?php
require ('login-process.php');
?>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Sign in</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='style-login.css'>
</head>
<body>

    <h1>Sign in</h1>

    <p>Fill up the form.</p>

    <form action="login-process.php" method="POST">

        <label for="email"><b>Email Address</b></label>
        <input type="email" name="email" required><br>

        <label for="Passuser"><b>Password</b></label>
        <input type="password" name="passuser" required><br>

        <input type="submit" value="Sign in" name="login" class="btn"><br>
        <?php echo "<span>$message</span>";?>
    </form>

</body>
</html>
