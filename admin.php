<?php
require  'database.php';
$query = "SELECT * FROM users";
$result = mysqli_query($conn,$query);
?>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Admin page</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/admin-style.css'>
</head>

<body>
            <img src="photos/admin-logo.jpg" class="avatar" alt="admin-logo">
    <table>
      <tr>
        <th><h2>Users</h2></th>
      </tr>
      <tr>
        <t>
          <th>ID</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Email</th>
          <th>Phone Number</th>
          <th>Password</th>
        </t>
      </tr>
      <?php
      while ($rows = mysqli_fetch_assoc($result))
       {
         ?>
        <tr>
          <td><?php echo $rows['id']; ?></td>
          <td><?php echo $rows['firstname']; ?></td>
          <td><?php echo $rows['lastname']; ?></td>
          <td><?php echo $rows['email']; ?></td>
          <td><?php echo $rows['phonenumber']; ?></td>
          <td><?php echo $rows['password']; ?></td>
        </tr>
        <?php
        }
        ?>
    </table>


</body>

</html>
