<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Manipulation of order submitted"/>
    <meta name="author" content="102347754"/>
    <meta name="keywords" content="order, fix"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Processing Orders... --> Exotic Customs</title>
    <link href= "styles/style.css" rel="stylesheet" />
    <script src= "scripts/part2.js"></script>
</head>
<body>
    <?php
require_once "settings.php";

$conn = @mysqli_connect(
    $host, $user, $pwd, $sql_db
);

if (!$conn) {
    echo "<p>Invalid login details!";
}
else {
    $sql_table = "Order_Table";
    $sql = "INSERT INTO $sql_table ( 
                customer_firstname 
                ,customer_lastname 
                ,customer_email 
                ,customer_mobile 
                ,customer_contactpref 
                ,customer_address 
                ,customer_postcode 
                ,customer_state 
                ,customer_suburb 
                ,customer_AMERICAN 
                ,customer_JDM 
                ,customer_addon 
                ,customer_quantity 
                ,order_cost 
                ,order_date 
                ,order_status 
                ,customer_cardtype 
                ,customer_cardnumber 
                ,customer_cardexpiry 
                ,customer_cvv)
            VALUES ('hello' 
                ,'goodbye' 
                ,'kjhgjkjg' 
                ,'12343' 
                ,'asdasdas' 
                ,'123asdasd' 
                ,'1232' 
                ,'sadasd' 
                ,'asdasd' 
                ,'asdasd'
                ,'asdasd' 
                ,'asdad' 
                ,'2' 
                ,'3' 
                ,'20/2/1' 
                ,'asdsad' 
                ,'sadada' 
                ,'213879' 
                ,'21/10' 
                ,'500')";
            // VALUES ('$givenname' 
            //     ,'$familyname' 
            //     ,'$email' 
            //     ,'$phone' 
            //     ,'$contactpref' 
            //     ,'$street_address' 
            //     ,'$postcode' 
            //     ,'$state' 
            //     ,'$suburb' 
            //     ,'$Selection_A'
            //     ,'$Selection_J' 
            //     ,'$requests' 
            //     ,'$quantity' 
            //     ,'$cost' 
            //     ,'$date' 
            //     ,'$status' 
            //     ,'$Card_Type' 
            //     ,'$cardnumber' 
            //     ,'$cardexpiry' 
            //     ,'$cvv')";
    $result = mysqli_query($conn, $sql);

    if ($conn -> query($sql) === true){
        echo "New Record Created";
    } else {
        echo "NO record" . $sql . "<br />" . $conn -> error;
    }

    $conn -> close();
}
?>
</body>
</html>