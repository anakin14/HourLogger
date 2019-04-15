<?php
/**
 * Created by PhpStorm.
 * User: Anakin  Kinsey
 * Date: 3/20/2019
 * Time: 1:14 PM
 */
session_start();
?>
<nav>
    <div class ="navbar">

        <?php
        if(isset($_SESSION["id"]) && isset($_SESSION["admin"]))
        {
            echo "<a href='edit_frat.php'>Edit Frats</a>";
            echo "<a href=\"edit_student.php\">Edit Students</a>";
            echo "<a href=\"view_hours_stats.php\">View Hour Statistics</a>";
            echo "<a href=\"logout.php\">Logout</a>";
        }
        else if(isset($_SESSION["id"]))
        {
            echo "<a href=\"input_form.php\">Hour Logger</a>";
            echo "<a href=\"view_hours.php\">View Hours</a>";
            echo "<a href=\"logout.php\">Logout</a>";
        }
        else
            echo "<a href=\"home.php\">Home</a>";
        ?>

        <a href="help.php">Help</a>

    </div>
</nav>