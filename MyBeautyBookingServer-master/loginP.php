<?php
$con = mysqli_connect("localhost", "root", "", "BeautyBooking");

if ($_SERVER['REQUEST_METHOD']=='POST') {

    $Email=isset($_POST['Email']) ? $_POST['Email'] : "";
    $Password = isset($_POST['Password']);
echo "test". $Email;
    $sql = "SELECT * FROM professionels WHERE Email='$Email'";

    $response = mysqli_query($con, $sql);
    echo $sql;
    $result = array();
   
    $result['login'] = array();
   
    if ( mysqli_num_rows($response) == 1 ) {
        
        $row = mysqli_fetch_assoc($response);
       
        if ( password_verify($password, $row['Password'])) {
            
            $index['NomP'] = $row['NomP'];
            $index['Email'] = $row['Email'];
            //$index['id'] = $row['id'];

            array_push($result['login'], $index);

            $result['success'] = "1";
            $result['message'] = "success";
            echo json_encode($result);

            mysqli_close($con);

        } else {

            $result['success'] = "0";
            $result['message'] = "error";
            echo json_encode($result);

            mysqli_close($con);

        }

    }

}

?>