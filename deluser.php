<form method="POST" action="delete.php">
    <select name="users">
        <?php
        if (!$conn) {
            die('Could not connect: ' . mysql_error());
        }
        else{
        $sql="select firstname , email from users";
        $result=$conn-> query($sql);
        if ($result-> num_rows >0) {
            echo " Name and Email selected from database. ";
        while ($row = $result->fetch_assoc()){
            echo "<option value='" . "'>"  . $row['firstname'] . " ( " . $row['email'] ." ) ". "</option>";
        }
        }else {
            echo "could not connect successfully";
            exit();
        }
        }
    ?>
    </select>
    <input type="submit" value="Delete user" name="delete">
</form>
<?php
    if (isset($_GET['deleted']) && $_GET['deleted'] == 'true'){
        echo "<div>
        User deleted successfully
    </div>";
    }
?>
<form action="create.php" method="POST">
    <label for="firstname"><b>First Name</b></label>
    <input type="text" name="firstname" required><br>

    <label for="lastname"><b>Last Name</b></label>
    <input type="text" name="lastname" required><br>

    <label for="email"><b>Email Address</b></label>
    <input type="email" name="email" required><br>

    <label for="phonenum"><b>Phone Number</b></label>
    <input type="text" name="phonenum" required><br>

    <label for="Pass-user"><b>Password</b></label>
    <input type="password" name="passuser" required><br>

    <input type="submit" value="Sign Up" name="create" class="btn"><br>
</form>
<?php
    if (isset($_GET['added']) && $_GET['added'] == 'true'){
        echo "<div>
        User added successfully
    </div>";
    }
?>
