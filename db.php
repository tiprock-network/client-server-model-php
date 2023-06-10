<?php
    $db_connection=mysqli_connect('','','',''); //HOST,USER,PASS,DB
    if(mysqli_connect_errno()){
        echo 'Connection failed'; //echo 'Connection failed error: '.mysqli_connect_errno();
    }

    //fetch the data from the database
    function fetchAttendees(){
        global $db_connection;
        //sql query
        $query='SELECT * FROM attendance_tbl';
        $result=mysqli_query($db_connection,$query);
        //place it in an array
        $attendees=array();
        while($attendee=mysqli_fetch_assoc($result)){
            $attendees[]=$attendee;
        }
        return $attendees;
    }

    //add data to the server database
    function addAttendee($uname,$uemail){
        global $db_connection;
        //data about attendee
        $uname=mysqli_real_escape_string($db_connection,$uname);
        $uemail=mysqli_real_escape_string($db_connection,$uemail);
        $ticket_no='EV'.date("YmdHis");
        $user_id='EV-'.date("yndGs");

        //DML query for insertion
        $sql_query="INSERT INTO attendance_tbl VALUES('$user_id','$uname','$uemail','$ticket_no')";
        mysqli_query($db_connection,$sql_query);

    }

    //delete an attendee from the database
    function removeAttendee($userId){
        global $db_connection;
        $attendee_id=mysqli_real_escape_string($db_connection,$userId);
        $del_query="DELETE FROM attendance_tbl WHERE PersonID='$userId'";
        mysqli_query($db_connection,$del_query);

    }

    // Handle client requests
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        // Fetch data and return as JSON
        $data = fetchAttendees();//attendees
        header('Content-Type: application/json');
        echo json_encode($data,JSON_UNESCAPED_UNICODE);
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Insert data from client request
        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        addAttendee($name, $email);
    } elseif($_SERVER['REQUEST_METHOD']=== 'DELETE'){
        //remove an attendee
        $attendee_id=$_GET['attendeeId'] ?? '';
        removeAttendee($attendee_id);
    }
    ?>


