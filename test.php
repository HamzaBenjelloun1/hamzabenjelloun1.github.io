<?php
/*
$arr=json_encode(array(
	"phone"=>"91xxxxxxxxxx",
	"body"=>"Hello Vishal"
));
$url="https://eu16.chat-api.com/instance98575/message?token=i7480emwmb3l1xzh";
447307725626
*/
$arr=json_encode(array(
	"phone"=>"447307725626",
	"body"=>"
            Detail du Commande :
            ---------------------
             Restaurant : KFC
             Commande : Mighty Zinger
             Unite : 2
             Prix : 100 MAD
             Info du Client :
            ---------------------
            Tel : 06 95 04 60 96
            Addresse : https://goo.gl/maps/7ym9bC6cF1RrkGB48
            "            
                       
));
$url="https://api.chat-api.com/instance316729/message?token=rl1rdyld0ek75vk0";
$ch=curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_POST,true);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_POSTFIELDS,$arr);
curl_setopt($ch,CURLOPT_HTTPHEADER,array(
	'Content-type:application/json',
	'Content-length:'.strlen($arr)
));
$result=curl_exec($ch);
curl_close($ch);
echo $result;
?>