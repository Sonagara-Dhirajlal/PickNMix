<?php

require '../../includes/init.php'; 

    $userid = $_POST['userid'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $totalAmount = $_POST['totalamount'];
    $payment = "Cash On Delivery";
    $orderDate = date('Y-m-d H:i:s'); 

    // Construct query for 'Order' table
    $queryOrder = "INSERT INTO `Order` (UserId, Name, Address, City, Country, Mobile, Email, TotalAmount, Payment, OrderDate)
                   VALUES ('$userid', '$name', '$address', '$city', '$country', '$mobile', '$email', '$totalAmount', '$payment', '$orderDate')";
    
    if (mysqli_query($conn, $queryOrder)) {
        // Get the last inserted Order ID
        $orderId = mysqli_insert_id($conn);

        // Loop through the products and insert into 'OrderDetails' table
        $products = $_POST['products'];
        foreach ($products as $product) {
            // $cartid = $product['cartid'];
            $image = $product['Pimage'];
            $productName = $product['Pname'];
            $quantity = $product['Pquantity'];
            $price = $product['Pprice'];
            $total = $product['Ptotal'];

            // Construct query for 'OrderDetails' table
            $queryOrderDetails = "INSERT INTO `OrderDetails` (OrderId, Image, ProductName, Quantity, ProductPrice, TotalPrice)
                                  VALUES ('$orderId', '$image', '$productName', '$quantity', '$price', '$total')";
            
            if (!mysqli_query($conn, $queryOrderDetails)) {
                // If any insert fails, return an error message
                echo json_encode(['status' => 'error', 'message' => 'Failed to insert order details']);
                exit;
            }
        }

        // echo json_encode(['status' => 'success', 'message' => 'Order placed successfully']);

        $queryClearCheckOut = "DELETE FROM `CheckOut` WHERE UserId = '$userid'";
        mysqli_query($conn, $queryClearCheckOut);

        $queryClearCart = "DELETE FROM `Cart` WHERE UserId = '$userid'";
        mysqli_query($conn, $queryClearCart);

        echo "<script>
        alert('Order Placed Successfully');
        window.location.href='" . urlOf('') . "';
        </script>";
        
    } else {
        
        echo "<script>
        alert('Order failed !!');
        window.location.href='" . urlOf('') . "';
        </script>";
        
        // echo json_encode(['status' => 'error', 'message' => 'Failed to place order']);
    }

    mysqli_close($conn);
?>