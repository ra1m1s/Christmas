<?php 
include " ./models/Present.php";

class PresentController{

    public static function index()
{
    $presents = Present::all();
    return $presents;
}

public static function show()
{
    $present = Present::fing($_GET['id']);
    return $present;
}
public static function store()
{
    Present::create();
}

public static function update()
{
    $isPacked = (isset($_POST['isPacked'])) ? "1" : "0";
    $present = new Present();
    $present->id = $_POST['id'];
    $present->presentTilte = $_POST['title'];
    $present->price = $_POST['price'];
    $present->wrapped = $isPacked;
    $present->update();
}

public static function destroy()
{
    Present::destroy($$_POST['id']);
}
}

?>