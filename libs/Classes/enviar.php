<?php
/**
 * Created by PhpStorm.
 * User: Joao
 * Date: 13/02/2015
 * Time: 19:39
 */

$pesq = $_GET["q"];
if($pesq == ""){
	$pesq = "null-nothing";
}
$id = $_GET["id"];
$perfil = $_GET["name"];
header("Location: /".$id."/".$perfil."/".$pesq."/");