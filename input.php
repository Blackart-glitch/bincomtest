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
            
            <h1>LGA party result register</h1>
            <form method="post" action="">
                <span style="color: green; font-family: inherit;">  <?php echo $error_msg; ?></span><br>
                <select name='LGA'>
                    <option value="">select LGA</option>
                    <?php
                    for ($i=0; $i < count($lga_id); $i++){
                    echo "<option value=". $lga_id[$i] . ">" .  $lga_name[$i] . "</option>";
                    }
                    ?>
                    </select>
                <input type="number" placeholder="Enter polling unit ID" name="PID" class="inputs" required>
                <select name='PTY'>
                    <option value="">select party</option>
                    <?php
                    for ($i=0; $i < count($pty_id); $i++){
                    echo "<option value=". $pty_id[$i] . ">" .  $pty_name[$i] . "</option>";
                    }
                    ?>
                    </select>
                <input type="number" placeholder="Enter result" name="RES" class="inputs" required>
                <input type="text" placeholder="Your name" name="name" class="inputs" required>
                <input type="email" placeholder="your Email" name="EID" class="inputs" required>
                <input type="submit" name ="input" value="SUBMIT">

            </form>
        </div>
    </body>
    <a href="sumtot.php">go to previous page</a>
    <a href="index.php">go to next page</a>
    <footer>

    </footer>
</html>