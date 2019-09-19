
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>User Registration</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='style-reg.css'>
</head>

<body>

<h1>signup</h1>
<p>Fill up the form.</p>

    <form action="adduser.php" method="POST">

        <label for="username"><b>User Name</b></label>
        <input type="text" name="username" required><br>

        <label for="email"><b>Email Address</b></label>
        <input type="email" name="email" required><br>

        <label for="Passuser"><b>Password</b></label>
        <input type="password" name="passuser" required><br>

        <label for="Passuser-repeat"><b>Password</b></label>
        <input type="password" name="Passuser-repeat" required><br>


        <input type="submit" value="Sign Up" name="addUser" class="btn"><br>
    </form>
</body>

</html>
