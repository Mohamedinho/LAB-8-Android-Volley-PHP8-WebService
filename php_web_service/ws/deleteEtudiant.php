<?php
include_once '../service/EtudiantService.php';
$es = new EtudiantService();
if(isset($_POST['id'])){
    $es->delete($_POST['id']);
}
header('Content-Type: application/json');
echo json_encode($es->findAll());
?>