
<?php


if(isset($_POST['total_price']))
{
    if($_POST['total_price'] > 0){
        //print_r($_POST);
         //receive values
        $qty = explode(",", $_POST['allqty']);
        $medId= explode(",", $_POST['medid']);
        $km=$_POST['km'];
        $location=$_POST['location'];
        $pid=$_POST['Pid'];
        $orderId=$_POST['Oid'];
        $delivery=$_POST['delivery'];
        $total_price = $_POST['total_price'];
        $price = $_POST['allprices'];
        
        //connect to the database
$connection = mysqli_connect ('localhost','root','','malutipharmacy');
if ($connection->connect_error)
 die(connection_error);      

    for($i = 0; $i < count($qty); $i++)
    {

        if($qty[$i] != 0){
            $query="INSERT INTO orders (Order_Id,Medication_id,Quantity,Delivery_type,Location,Kilometers,
            Total_Price,Patient_Id)
            VALUES ('$orderId','$medId[$i]','$qty[$i]','$delivery','$location','$km','$total_price','$pid')";
            }
            $result= $connection->query($query);
        }
    }



    }
 //build the query

?> 


