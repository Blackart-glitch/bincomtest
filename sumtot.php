<?php 
include'processor.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Lobbyx</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="styler.css">
    </head>
    <body class="body">
        <div class="blocker">
            
            <h1>LGA polling unit results calculator</h1>
            <form method="post" action="">
                <span style="color: red; font-family: inherit;">  <?php echo $error_msg; ?></span><br>
                <select name='LGA'>
                    <?php
                    for ($i=0; $i < count($lga_id); $i++){
                    echo "<option value=". $lga_id[$i] . ">" .  $lga_name[$i] . "</option>";
                    }
                    ?>
                    </select>
                <input type="submit" name ="check2" value="CHECK">
                <div class="top-card">
                <?php
                    echo $headman;
                    echo $extra;

                    for ($i=0; $i < count($p_abbrv)-1; $i++){
                    echo "<p>" .  $p_abbrv[$i] ." has a total of ".$p_score[$i]. "</p>";

                    }

                    ?>
                </div>
            </form>
        </div>
    </body>
    <a href="index.php">go to previous page</a>
    <a href="input.php">go to next page</a>
    <footer>

    </footer>
</html>