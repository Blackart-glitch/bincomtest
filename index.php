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
            
            <h1>individual polling unit result checker</h1>
            <form method="post" action="">
                <span style="color: red; font-family: inherit;">  <?php echo $error_msg; ?></span>
                <input type="number" placeholder="Enter polling unit ID" name="ID" class="inputs" required>
                <!-- <input type="number" placeholder="Password here" name="p_word" class="inputs" required> -->
                <input type="submit" name ="check" value="CHECK">
                <div class="top-card">
                    <?php
                    echo $headman;
                    echo $extra;

                    for ($i=0; $i < count($joiner)-1; $i++){
                    echo "<p>" .  $joiner[$i] . "</p>";
                    }

                    ?>
                </div>
            </form>
            <a href="sumtot.php">go to next page</a>
        </div>
    </body>
    <footer>

    </footer>
</html>