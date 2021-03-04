
<$php
    $fullname= $_POST['fullname'];
    $email= $_POST['emailaddress'];
    $phone= $_POST['phone'];
    $message= $_POST['message'];

if (!empty ($fullname) || !empty($email) || !empty($phone) || !empty($message)){


    //database connection
    $host= "contactdb.clobk8crbr7g.us-east-1.rds.amazonaws.com";
    $user= "admin";
    $password="anjan123456";
    $db_name="CONTACT";
    
    $conn= new mysqli($host,$user,$password,$db_name);
    if($conn -> connect_error){
        die('Connection Failed: '.$conn->connect_error);
    }else{
        $stmt=$conn->prepare("insert into CONTACTINFO(FULL_NAME, EMAIL, PHONE_NUMBER,MESSAGE)
        values(?,?,?,?)");
        $stmt->bind_param("ssis",$fullname,$email,$phone,$message);
        $stmt->execute();
        echo "Thank you for contacting me, I will get back to you asap.";
        $stmt->close();
        $conn->close();

    }
}else{
    echo "All field are required";
    die();

}
    ?>
