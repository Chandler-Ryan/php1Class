<?php
$total = 0;
$products = array(
    array( 
        'id' => '1',
        'name' => 'Drawer Pull',
        'price' => 3.99,
        'image' => 'https://farm3.staticflickr.com/2165/2246272794_7328992509_b.jpg',
        'description' => 'Antique bronze drawer pull. Adds character to your desk drawers.'),
    array(
        'id' => '2',
        'name' => 'Drawer Organizer',
        'price' => 17.99,
        'image' => 'https://images-na.ssl-images-amazon.com/images/I/91tlrCudmyL._SX679_.jpg',
        'description' => 'Bamboo wood adjustable drawer organizer with 6 removable dividers.'),
    array(
        'id' => '3',
        'name' => 'Pencil Holder',
        'price' => '9.95',
        'image' => 'https://images-na.ssl-images-amazon.com/images/I/51V2aMxGrYL._SX679_.jpg',
        'description' => ' Bamboo wood desk pen/pencil holder. Size: 3" L x 3" W x 4" H.'),
    array(
        'id' => '4',
        'name' => 'Desk Lamp',
        'price' => 24.95,
        'image' => 'https://images-na.ssl-images-amazon.com/images/I/61u9oOHCKAL._SX679_.jpg',
        'description' => 'Swing arm is easily adjustable to direct the light wherever you need it.')
    );

    function getProductArrayByID($products, $id)
    {
        foreach($products as $prod)
        {
            if ($prod['id'] == $id) return $prod;
        }
        return false;
    }
      
    // Check for items added to the cart
    if(!empty($_POST))
    {
        if(isset($_POST['clearCart']))
        {
            session_destroy();
            $host  = $_SERVER['HTTP_HOST'];
            $uri = $_SERVER['PHP_SELF'];
            header("Location: http://$host$uri");
            exit;
        }
        else if(isset($_POST['removeItem']))
        {
            unset($_SESSION['cart'][$_POST['removeID']]);
        }
        else
        {
            if(intval($_POST['quantity'])>0 && intval($_POST['quantity'])<10)
            {
                $_SESSION['cart'][$_POST['item']] = $_POST['quantity'];
                $alert = 'Thank you for your order of '.getProductArrayByID($products, $_POST['item'])['name'].'.';
            }
        }
    }

    // set the order total
    if(isset($_SESSION['cart']))
    {
        foreach ($_SESSION['cart'] as $id => $quanity)
        {
            $orderedItem = getProductArrayByID($products,$id);
            $total += $orderedItem['price'] * $quanity;
        }
    }