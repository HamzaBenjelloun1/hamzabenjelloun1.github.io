<?php 
// $text = "";
// for ($i=0; $i<count($name);$i++){
    //   $text=$text."    
    //   Detail du Commande --> Restaurant : ".$name[$i]." / Commande : ".$plat[$i]." / Unite : ".$count[$i]." / Prix : ".$prixplat[$i]." MAD";          
    // }
    // $text = $text."// Info du Client --> Tel : ".$user["tel"]." / Addresse : ".$user["adresse_url"]."";
$text="Hello";
$phone='+212695046096';
$url = 'https://api.callmebot.com/whatsapp.php?phone='.$phone.'&text='.$text.'&apikey=748869';
$result = file_get_contents($url);
if ($result === FALSE) { /* Handle error */ }
var_dump($result);
?>