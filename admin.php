<?php
/**
 * Created by PhpStorm.
 * User: Adrien Pew
 * Date: 3/20/2019
 * Time: 1:20 PM
 */
?>
<html lang="en">
<head>

    <link rel="stylesheet" href="style.css"/>


    <title>Admin</title>

<?php
    include ('db_connect.php');
    $result = mysqli_query($conn, "SELECT * FROM users ORDER BY frat");
?>

</head>

<body>


<table width='80%' border="0">
    <tr bgcolor="teal">
        <td>frat</td>
        <td>id</td>
        <td>hours</td>
        <td>date</td>
        <td>description</td>
    </tr>
    <?php
    while($res = mysqli_fetch_array($result))
    {
        echo "<tr>";
        echo "<td>".$res['frat']."</td>";
        echo "<td>".$res['id']."</td>";
        echo "<td>".$res['hours']."</td>";
        echo "<td>".$res['date']."</td>";
        echo "<td>".$res['description']."</td>";
        echo "<td>"<a href=\"edit.php?id=$$$[id]\">Edit</a> | <a href=\"delete.php?id=$$$[id]" onChlick=\"return confirm('Are you sure you want to delete?')\">Delete</a><td>";
    }
    ?>
</table>

<?php
    include('menu.php');
?>





</body>

</html>
