<?php
include_once('db.php');
// Use isset $_POST['']
if(isset($_POST['SubmitData'])) {
    // use addslashes() to accept strings with slashes
    // use strip_tags() to avoid html/script tags
    $username = strip_tags(trim(addslashes($_POST['SubmitData'])));
    $f_name = strip_tags(trim(addslashes($_POST['f_name'])));
    $l_name =  strip_tags(trim(addslashes($_POST['l_name'])));
    $email = strip_tags(trim(addslashes($_POST['email'])));
    // Check the fields to make sure they are not empty
    // If one field has no string, it won't be saved into database
    if ($username == '' || $f_name == '' || $l_name == '' || $email == '') {
       $res = [
            'status' => 422,
            'message' => 'All fields are required!'
        ];
        echo json_encode($res);
        return;
    }
    else {
        // Prepare to insert into table
        $mySQL = "INSERT INTO `tbl_user` (`username`, `f_name`, `l_name`, `email`) VALUES ('$username', '$f_name', '$l_name', '$email')";
        $sql_query = mysqli_query($mysqli, $mySQL);
        // Query if mySQL is true or false
        if ($sql_query == TRUE) {
           $res = [
                'status' => 200,
                'message' => 'Data saved!'
            ];
            echo json_encode($res);
            return;
        }
        else {
            $res = [
                'status' => 500,
                'message' => 'Data not saved!'
            ];
            echo json_encode($res);
            return;
        }
    }
}
?>
