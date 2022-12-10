<?php
include "./models/DB.php";

class Present {
    public $price;
    public $presentTitle;
    public $wrapped;


    public function __construct($id = null, $price = null, $presentTitle = null, $wrapped = null)
    {
        $this->id = $id;
        $this->price = $price;
        $this->presentTitle = $presentTitle;
        $this->wrapped = $wrapped;
    }

    public static function all(){
        $presents = [];
        $db = new DB();
        $query = "SELECT * FROM `presents`";
        $result = $db->conn->query($query);

        while($row = $result->fetch_assoc()){
            $presents[] = new Present( $row['id'], $row['price'], $row['present_title'], $row['wrapped']);
        }
        $db->conn->close();
        return $presents;
    }

    public static function find($id){
        $present = new Present();
        $db = new DB();
        $stmt = $db->conn->prepare( "SELECT * FROM `presents` where `id` = ?");
        $stmt->bind_param("i",$id );
        $stmt->execute();
        $result = $stmt->get_result();

        while($row = $result->fetch_assoc()){
            $present = new Present( $row['id'], $row['price'], $row['present_title'], $row['wrapped']);
        }
        $stmt->close();
        $db->conn->close();
        return $present;
    }

    public static function create()
    {
        $db = new DB();
        $stmt = $db->conn->prepare("INSERT INTO `presents`(`id`, `price`, `present_title`, `wrapped`) VALUES (null,?,?,?)");
        $isPacked = (isset($_POST['isPacked'])) ? "1" : "0";
        $stmt->bind_param("dsi",$_POST['price'],$_POST['title'], $isPacked  );
        $stmt->execute();

        $stmt->close();
        $db->conn->close();
    }
    
    public function update()
    {
        $db = new DB();
        $stmt = $db->conn->prepare("UPDATE `presents` SET `price`=?,`present_title`=?,`wrapped`= ? WHERE `id` = ?");
        $stmt->bind_param("dsii",$this->price, $this->presentTitle, $this->wrapped, $this->id );
        $stmt->execute();

        $stmt->close();
        $db->conn->close();
    }

    public static function destroy()
    {
        $db = new DB();
        $stmt = $db->conn->prepare("DELETE FROM `presents` WHERE `id` = ?");
        $stmt->bind_param("i",$_POST['id'] );
        $stmt->execute();

        $stmt->close();
        $db->conn->close();
    }

}
?>
