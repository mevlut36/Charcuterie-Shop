<?php

class Buy {

    private $item;
    private $user;

    public function __construct($con){
        $this->con = $con;
        $items_details_query = mysqli_query($con, "SELECT * FROM meat");
        $this->item = mysqli_fetch_array($items_details_query);
        $users_details_query = mysqli_query($con, "SELECT * FROM users");
        $this->user = mysqli_fetch_array($users_details_query);
    }

    public function getPrice(){
        $name = $this->item('name');
        $query = mysqli_query($this->con, "SELECT price FROM meat WHERE name='$name'");
        $row = mysqli_fetch_array($query);
        return $row['price'];
    }

    public function getMoney(){
        $name = $this->user('username');
        $query = mysqli_query($this->con, "SELECT money FROM users WHERE username='$name'");
        $row = mysqli_fetch_array($query);
        return $row['money'];
    }

    public function buy(){
        $item_name = $this->item['name'];
        $item_query = mysqli_query($this->con, "SELECT price FROM meat WHERE name='$name'");
        $row_item = mysqli_fetch_array($item_query);

        $user_name = $this->user['username'];
        $user_query = mysqli_query($this->con, "SELECT money FROM users WHERE username='$name'");
        $row_user = mysqli_fetch_array($user_query);

        if($this->item['price'] < $this->user['money']){
            $this->setMoney($this->user["username"], $this->user["money"] - $this->item["price"]);
            return true;
        } else {
            header("Location: index.php");
        }
    }

}
?>
