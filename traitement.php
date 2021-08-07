<?php
    include("connexion.php");
    if(isset($_POST['connexion'])){
        $username = $_POST["Username"];
        $password = $_POST["Password"];
        $sql = "SELECT * FROM user";
        $result = mysqli_query($link, $sql);
        $id = 0;
        while($user = mysqli_fetch_assoc($result)){
            if(($user['Username']== $username )&& ($user['Password'] == $password)){
                $id = $user['id'];
            }
        }
        if($id == 0){
            setcookie("loginWrong", 1, time() + 5);
        }
        else{
            session_start();
            $_SESSION["id"] = $id;
        }
        header("location:index.php");
    }
    if(isset($_POST['inscription'])){
        if($_POST["pass"]!=$_POST["conf_pass"] | $_POST["pass"]==NULL | $_POST["conf_pass"]==NULL | $_POST["username"] == NULL){
            setcookie("notmatch", 1, time() + 5);
            header("location:index.php#inscription");
        }
        $sql = "SELECT * FROM user";
        $result = mysqli_query($link, $sql);
        $found = FALSE;
        while($user = mysqli_fetch_assoc($result)){
            if(($user['username']== $_POST["username"] )){
                $found = TRUE;
            }
        }
        if($found == TRUE){
            setcookie("notunique", 1, time() + 5);
            header("location:index.php");
        }
        else{
            $sql = "INSERT INTO `user`(`username`, `password`) VALUES ('".$_POST["username"]."','".$_POST["pass"]."')";
            $result = mysqli_query($link, $sql);
            session_start();
            $id = mysqli_insert_id();
            $_SESSION["id"] = $id;
            
        }
    }
    if(isset($_POST["logout"])){
        session_start();
        session_destroy();
        header("location:index.php");
    }
    if(isset($_POST["voir"])){
        setcookie("menu", $_POST["voir"], time()+60*60*24*30);
        header("location:Menu.php");
    }
    if(isset($_POST["add"])){
        session_start();     
        $sql = "INSERT INTO `command`(`plat`,`client`) VALUES ('".$_POST['add']."','".$_SESSION['id']."')";        
        $result = mysqli_query($link, $sql);
        setcookie("cmd", 1, time() + 5);
        header("location:Menu.php");
    }
    if(isset($_POST["delete"])){
        session_start();     
        $sql =  "DELETE FROM `command` WHERE `client`=".$_SESSION["id"]." AND `plat`='".$_POST['delete']."' order by id desc limit 1";       
        $result = mysqli_query($link, $sql);
        setcookie("done", 1, time() + 5);
        header("location:Menu.php");
    }
    if(isset($_POST["valider"])){
        session_start();   
        $sql = "SELECT * FROM user WHERE id='".$_SESSION["id"]."'";
        $result = mysqli_query($link, $sql);
        $user = mysqli_fetch_assoc($result);  
        $sql =  "UPDATE `command` SET `date`='".date("Y-m-d h:i:sa")."',`etat`='Valide' WHERE etat='En cours' AND client='".$_SESSION["id"]."'";       
        $result = mysqli_query($link, $sql);        
        setcookie("done", 1, time() + 5);
        $url = 'https://api.callmebot.com/whatsapp.php';
        $text = "";
        $name=$_SESSION['name'];
        $plat=$_SESSION['plat'];
        $prixplat=$_SESSION['prix-plat'];
        $count=$_SESSION['count'];
        for ($i=0; $i<count($name);$i++){      
          $text=$text."    
          Detail du Commande --> Restaurant : ".$name[$i]." / Commande : ".$plat[$i]." / Unite : ".$count[$i]." / Prix : ".$prixplat[$i]." MAD";          
        }
        $text = urlencode($text."// Info du Client --> Tel : ".$user["tel"]." / Addresse : ".$user["adresse_url"]."");
        $phone=urlencode('212695046096');
        $apikey=urlencode('748869');
        $url = 'https://api.callmebot.com/whatsapp.php?phone=+'.$phone.'&text='.$text.'&apikey='.$apikey.'';
        $result = file_get_contents($url);
        if ($result === FALSE) { /* Handle error */ }
        var_dump($result);  
        header("location:Menu.php");
    }
?>