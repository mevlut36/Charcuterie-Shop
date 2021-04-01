<?php 

class Cart {
	
    public function createCart(){
        if(!isset($_SESSION['cart'])){
            $_SESSION['cart'] = array();
            $_SESSION['cart']['name'] = array();
            $_SESSION['cart']['quantity'] = array();
            $_SESSION['cart']['price'] = array();
            $_SESSION['cart']['lock'] = array();
        }
        return true;
    }

    public function addItem($name, $quantity, $price){
        if(createCart() && !isLock()){
            $posItem = array_search($name, $_SESSION['cart']['name']);
            if($posItem !== false){
                $_SESSION['cart']['quantity'][$posItem] += $quantity;
            }else{
                array_push($_SESSION['cart']['name'], $name);
                array_push($_SESSION['cart']['quantity'], $quantity);
                array_push($_SESSION['cart']['price'], $price);
            }
        }
        else
        echo "error";
    }

    public function removeItem($name){
        if(createCart() && !isLock()){
            $temp = array();
            $temp['name'] = array();
            $temp['quantity'] = array();
            $temp['price'] = array();
            $temp['lock'] = $_SESSION['cart']['lock'];

            for($i = 0; $i < count($_SESSION['cart']['name']); $i++){
                if($_SESSION['cart']['name'][$i] !== $name){
                    array_push($temp['name'], $_SESSION['cart']['name'][$i]);
                    array_push($temp['quantity'], $_SESSION['cart']['quantity'][$i]);
                    array_push($temp['price'], $_SESSION['cart']['price'][$i]);
                }
            }
            $_SESSION['cart'] = $temp;
            unset($temp);
        }
        else echo "error";
    }

    public function editQuantity(){
        if(createCart() && !isLock()){
            if($quantity > 0){
                $posItem = array_search($name, $_SESSION['cart']['name']);

                if($posItem !== false){
                    $_SESSION['cart']['quantity'][$posItem] = $quantity;
                }
            }
            else removeItem($name);
        }
        else echo "error";
    }

    public function total(){
        $total = 0;
        for ($i = 0; $i < count($_SESSION['cart']['name']); $i++){
            $total += $_SESSION['cart']['quantity'][$i] * $_SESSION['cart']['price'][$i];
        }
        return $total;
    }

    public function deleteCart(){
        unset($_SESSION['cart']);
    }

    public function isLock(){
        if(isset($_SESSION['cart']) && $_SESSION['cart']['lock'])
        return true;
        else
        return false;
    }
    
    public function countItems(){
        if(isset($_SESSION['cart']))
        return count($_SESSION['cart']['name']);
        else return 0;
    }

}
?>