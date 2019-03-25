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
        if(isset($_SESSION["id"]))
        {
            echo "<a href=\"input_form.php\">Hour Logger</a>";
            echo "<a href=\".html\">View Hours</a>";
        }
        else
            echo "<a href=\"home.php\">Home</a>";
        ?>

        <a href=".html">Help</a>

    </div>
</nav>