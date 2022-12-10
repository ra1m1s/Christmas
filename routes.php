<?php include "./controllers/PresentController.php";

if($_SERVER ['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['save'])){
        PresentController::store();
        header("Location: ./index.php");
        die;
    }

 if(isset($_POST['update'])){
    PresentController::update();
    header("Location: ./index.php");
    die;
}

 if(isset($_PORST['update'])){
    PresentController::update();
    header("Location ./index.php");
    die;
 }

}

$checked = '';
if($_SERVER['REQUEST_METHOD']=='GET'){
    if(isset($_GET['edit'])){
        $present = PresentController::show();
        if($present->wrapped){
            $checked = 'checked';
        }
    }
}

$present = PresentController::index();