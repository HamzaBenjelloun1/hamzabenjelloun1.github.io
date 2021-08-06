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
        session_start();
        $_SESSION["menu"]=$_POST["voir"];
        header("location:Menu.php");
    }
?>