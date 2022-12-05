<?php 
$servername = "localhost";
$username = "root";
$password = "";
$db = "bincomphptest";

$conn = new mysqli($servername, $username, $password, $db);
$check = "";
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$extra = $error_msg = $headman =  "";
$joiner= [];

// this gets info from the lga table so nit can be used wherever like the `select` inputs
$lga_name = $lga_id = [];
$check = "SELECT `lga_id`, `lga_name` FROM `lga` ";
$check = mysqli_query($conn, $check);
$i = 0;
while ($rowg = mysqli_fetch_assoc($check)) {
    array_push($lga_name, $rowg['lga_name']);
    array_push($lga_id, $rowg['lga_id']);
    $i++;
}

mysqli_free_result($check);

// this gets info from the party table so it can be used wherever like the `select` inputs
$pty_name = $pty_id = [];
$check = "SELECT `partyid`, `partyname` FROM `party` ";
$check = mysqli_query($conn, $check);
$i = 0;
while ($rowg = mysqli_fetch_assoc($check)) {
    array_push($pty_name, $rowg['partyname']);
    array_push($pty_id, $rowg['partyid']);
    $i++;
}

//this block performs action from inputs gotten from the `index.php` page
if (isset($_POST['check'])) {
    $ID = $_POST['ID'];
$i=0;

        $check = "SELECT * FROM `announced_pu_results` WHERE `polling_unit_uniqueid` = $ID";
        $check = mysqli_query($conn, $check);
        
        while($array = mysqli_fetch_assoc($check)){
             array_push($joiner, $array['party_abbreviation'] . " has accrued " . $array['party_score'] . " votes");
            $i++;
        }
        $headman = '  <h1>Okay, we have ' . mysqli_num_rows($check) . ' results </h1>';
        if (mysqli_num_rows($check) === 0){
            $extra = "<p>try another unique ID</p>";
        }


}
//this block performs action from inputs gotten from the `sumtot.php` page
$P_id = $p_abbrv = $p_score = [];
if (isset($_POST['check2'])) {
    $lga = $_POST['LGA'];
    $check = "SELECT `polling_unit_id` FROM `polling_unit` WHERE `lga_id` = $lga";
    $check = mysqli_query($conn, $check);

    if (mysqli_num_rows($check) > 0 || mysqli_num_rows($check) === 0){
        while ($res = mysqli_fetch_assoc($check)){
            array_push($P_id, $res['polling_unit_id']);
            $i++;
        }
        array_unique($P_id);
        mysqli_free_result($check);

        for ($i = 0; $i <= count($P_id)-1; $i++){
            $check = "SELECT * FROM `announced_pu_results` WHERE `polling_unit_uniqueid` = $P_id[$i]";
            $check = mysqli_query($conn, $check);
            while ($rows = mysqli_fetch_assoc($check)){
                
                array_push($p_score, $rows['party_score']);
                array_push($p_abbrv, $rows['party_abbreviation']);
                $i++;
            }
        }

        $headman = '  <h1>Okay, we have ' . count($p_score) . ' results </h1>';
        if (count($p_score) == 0){
            $extra = "<p>try another LGA</p>"; 
        }
    }

}

if (isset($_POST['input'])){
    $lga = $_POST['LGA'];
    $pid = $_POST['PID'];
    $PTY = $_POST['PTY'];
    $RES = $_POST['RES'];
    $name = $_POST['name'];
    $email = $_POST['EID'];

    if ($lga !== 0 && $PTY !== 0){
        $check = "INSERT INTO `party result` (`lga_id`, `polling_unit_id`, `party_id`, `result`, `name`, `email`) VALUES ('$lga', '$pid', '$PTY', '$RES', '$name', '$email')";
        if ($check = mysqli_query($conn, $check)){
            $error_msg = 'successfully added';
        } else {
            $error_msg = 'server error';
        }
    }else{
        $error_msg = "please select an option between lga and party";
    }
}



?>