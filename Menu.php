<?php
  session_start();
  include("connexion.php");
  if(isset($_SESSION["id"])){    
    $sql = "SELECT * FROM user WHERE id='".$_SESSION["id"]."'";
    $result = mysqli_query($link, $sql);
    $user = mysqli_fetch_assoc($result);
    $sql = "SELECT DISTINCT(command.plat),`prix-plat`,`image-plat`,restaurant.name FROM command,restaurant,user WHERE `client`=".$_SESSION["id"]." AND etat='En cours' AND restaurant.plat=command.plat;";
    $rescommande = mysqli_query($link, $sql); 
    $sql = "SELECT DISTINCT(command.plat),`prix-plat`,`image-plat`,restaurant.name,`date` FROM command,restaurant,user WHERE `client`=".$_SESSION["id"]." AND etat='Valide' AND restaurant.plat=command.plat  GROUP BY date;";
    $vcommande = mysqli_query($link, $sql);    
  }
  else{
    session_destroy();
  }
  
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.87.0">
    <title>Menu</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/headers/">

    
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="js/sidebars.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>  

    <style>           
      .learn{
        border-radius: 30px;
        font-size: small;
      }
      a{
        text-decoration:none;
      }
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }
      .image{
          border-radius: 20px;
      }
      .icon{
        color:rgb(238,238,246,0.9);
      }
      .icon:hover{
          color: rgb(238,238,246,1);
      }
      .icon1{
        color:rgb(5, 218, 5);
      }
      .icon1:hover{
          color: green;
      }
      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      .card{
        border-radius: 20px;
        cursor: pointer;
      }
      .card:hover .resto{
        opacity:0.5;
      }
      .voir{
        position: absolute;
        top: 30%;
        right:35%;
        opacity:0;
      }
      .card:hover .voir{
        opacity: 1;
      }      
      .rounded{
        color:white;        
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="css/sidebars.css" rel="stylesheet">
    <link href="css/headers.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color:rgba(223, 39, 39, 0.7)">
      <div class="container-fluid">                
        <div style="height:10px;" class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#" style="font-size:small;">Commander Sur Whatsapp <b>+212 6-95-04-60-96</b></a>
            </li>                    
          </ul>
        </div>
      </div>
    </nav>
    <div class="container">
      <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between mb-2">
        <img src="images/logo.png" alt="" width="60px">
  
        <ul class="nav col-12 col-md-auto justify-content-center mb-md-0">
          <li><a href="index.php" class="nav-link px-2 link-secondary">Accueil</a></li>
          <li><a href="index.php#Restaurants" class="nav-link px-2 link-dark">Restaurants</a></li>
          <li><a href="#" class="nav-link px-2 link-dark">Contact</a></li>
          <li><a href="#" class="nav-link px-2 link-dark">A Propos</a></li>
        </ul>
  
        <div class="col-md-3 text-end">
          <?php
          if(isset($_SESSION["id"])){
            echo '                                    
            <button data-bs-toggle="modal" data-bs-target="#shop" class="btn btn-outline-danger">
            <i class="fas fa-shopping-basket"></i>
            </button>
            <button data-bs-toggle="modal" data-bs-target="#history" class="btn btn-outline-danger">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock-history" viewBox="0 0 16 16">
              <path d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z"/>
              <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z"/>
              <path d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z"/>
            </svg>
            </button>
            <button data-bs-toggle="modal" data-bs-target="#config" class="btn btn-outline-danger">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
              <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
            </svg>
            </button>
            <button data-bs-toggle="modal" data-bs-target="#sure" class="btn btn-danger">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
              <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
            </svg>
            </button>
            ';
          }
          else{
            echo '
            <button type="button" class="btn learn btn-outline-danger me-2" data-bs-toggle="modal" data-bs-target="#login">Login</button>
            <button type="button" class="btn learn btn-danger" data-bs-toggle="modal" data-bs-target="#signup" >Sign up</button>
            ';
          }
          ?>                    
        </div>
      </header>      
    </div>
    <div class="row">
        <div class="flex-shrink-0 p-3 col-2" style="background-color:#e9ad2b;width: 280px;height:100%;">
        <a href="/" class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
          <svg class="bi me-2" width="30" height="24"><use xlink:href="#bootstrap"/></svg>
          <span class="fs-5 fw-semibold" style="color:white;">Menu KFC</span>
        </a>
        <ul class="list-unstyled ps-0">
          <li class="mb-1">
            <?php                           
              $sql = "SELECT DISTINCT(`menu`) FROM restaurant WHERE name='".$_COOKIE["menu"]."'";
              $result = mysqli_query($link, $sql);
              while($menu = mysqli_fetch_assoc($result)){
              echo '
              <button style="color:white" class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
                '.$menu["menu"].'
              </button>';
              // <div class="collapse show" id="home-collapse">
              //     <ul class="btn-toggle-nav list-styled fw-normal pb-1 small" >
              // ';
              // $sql = "SELECT DISTINCT(`sous-menu`) FROM restaurant WHERE `menu`=".$menu["menu"].";";
              // $sousMenu = mysqli_query($link, $sql);
              // while($sMenu = mysqli_fetch_assoc($sousMenu)){
              //   echo '                
              //       <li><a href="#" class="link-dark rounded">'.$sMenu['sous-menu'].'</a></li>                                      
              //   ';
              // }
              // echo "</ul>
              // </div>";
              }
            ?>                              
          </li>          
          <li class="border-top my-3"></li>
        </ul>
      </div>
      <div class="col">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">
            <?php
              $sql = "SELECT DISTINCT(`plat`),`image-plat`,`prix-plat`,`menu`,`sous-menu` FROM restaurant WHERE name='".$_COOKIE["menu"]."' AND `plat` != '' ";
              $result = mysqli_query($link, $sql);
              while($menu = mysqli_fetch_assoc($result)){
                echo '<div class="col '.$menu["menu"].' '.$menu['sous-menu'].'">
                  <div class="card shadow-sm">  
                      <div style="text-align: center;">
                        <img src="images/'.$menu["image-plat"].'.png" style="border-top-left-radius: 20px;border-top-right-radius: 20px;" width="80%" alt="">
                      </div>                              
                    <div class="card-body" style="border-radius: 20px;">                  
                      <div class="d-flex justify-content-between align-items-middle">                                
                        <h6 class="card-text text">'.$menu["plat"].'</h6> 
                        ';                        
                        if(isset($_SESSION["id"])){
                            echo '<form action="traitement.php" method="POST" ><button id="'.$menu['plat'].'" style="background-color:Transparent;border: none;" type="submit" name="add" value="'.$menu["plat"].'" ><i class="fa fa-plus-circle icon1" data-bs-toggle="modal" data-bs-target="#add" aria-hidden="true" style=" font-size: larger;"></i></button></form>';
                          }
                          else{
                            echo '<i class="fa fa-plus-circle icon1" data-bs-toggle="modal" data-bs-target="#signup" aria-hidden="true" style=" font-size: larger;"></i>';
                          }
                    echo '
                      </div>
                      <div class="d-flex justify-content-between align-items-center">                                
                        <small class="text-muted">
                            '.$menu['prix-plat'].' MAD                       
                        </small>                   
                      </div>
                    </div>
                  </div>
                </div>            
                ';
              }
            ?>
        </div>
      </div>
    </div>
    
      <div class="container">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
          <p class="col-md-4 mb-0 text-muted">&copy; 2021 Company, Inc</p>
      
          <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
            <img class="image" src="images/logo.png" alt="" width="60px">
          </a>
      
          <ul class="nav col-md-4 justify-content-end">
            <li><a href="index.php" class="nav-link px-2 link-secondary">Accueil</a></li>
            <li><a href="index.php#Restaurants" class="nav-link px-2 link-dark">Restaurants</a></li>
            <li><a href="#" class="nav-link px-2 link-dark">Contact</a></li>
            <li><a href="#" class="nav-link px-2 link-dark">A Propos</a></li>
          </ul>
        </footer>
      </div>
      <!-- Modal login -->
      <div class="modal fade" id="login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" style="width:400px;">
      <div class="modal-content">
        <form action="traitement.php" method="POST">
        <div class="modal-header">
          <h3 class="modal-title col-12 text-center" id="exampleModalLabel" style="color: #dc3545;">Login</h3>
        </div>
        <div class="modal-body">                  
            <div class="input-group mb-3">          
              <span class="input-group-text learn" id="basic-addon1">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                  <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                </svg>
              </span>
              <input type="text" required name="username" class="learn form-control" placeholder="Nom d'utilisateur" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">          
              <span class="input-group-text learn" id="basic-addon1">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-shield-lock-fill" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M8 0c-.69 0-1.843.265-2.928.56-1.11.3-2.229.655-2.887.87a1.54 1.54 0 0 0-1.044 1.262c-.596 4.477.787 7.795 2.465 9.99a11.777 11.777 0 0 0 2.517 2.453c.386.273.744.482 1.048.625.28.132.581.24.829.24s.548-.108.829-.24a7.159 7.159 0 0 0 1.048-.625 11.775 11.775 0 0 0 2.517-2.453c1.678-2.195 3.061-5.513 2.465-9.99a1.541 1.541 0 0 0-1.044-1.263 62.467 62.467 0 0 0-2.887-.87C9.843.266 8.69 0 8 0zm0 5a1.5 1.5 0 0 1 .5 2.915l.385 1.99a.5.5 0 0 1-.491.595h-.788a.5.5 0 0 1-.49-.595l.384-1.99A1.5 1.5 0 0 1 8 5z"/>
                </svg>
              </span>
              <input type="password" required name="pass" class="learn form-control" placeholder="Mot de passe" aria-label="pass" aria-describedby="basic-addon1">
            </div>
          </div>
          <div class="modal-footer justify-content-center">
            <button type="submit" name="connexion" class="btn btn-danger learn">Se connecter</button>
            <button type="button" class="btn btn-outline-dark learn" data-bs-dismiss="modal">Close</button>
          </div>
        </form>
      </div>
      </div>
      </div>
      <!-- Modal sign up -->
      <div class="modal fade" id="signup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="width:400px;">
        <div class="modal-content">
          <form action="traitement.php" method="POST">
          <div class="modal-header">
            <h3 class="modal-title col-12 text-center" id="exampleModalLabel" style="color: #dc3545;">Inscription</h3>
          </div>
          <div class="modal-body">                  
              <div class="input-group mb-3">          
                <span class="input-group-text learn" id="basic-addon1">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                  </svg>
                </span>
                <input type="text" required name="username" class="learn form-control" placeholder="Nom d'utilisateur" aria-label="Username" aria-describedby="basic-addon1">
              </div>
              <div class="input-group mb-3">          
                <span class="input-group-text learn" id="basic-addon1">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-shield-lock-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 0c-.69 0-1.843.265-2.928.56-1.11.3-2.229.655-2.887.87a1.54 1.54 0 0 0-1.044 1.262c-.596 4.477.787 7.795 2.465 9.99a11.777 11.777 0 0 0 2.517 2.453c.386.273.744.482 1.048.625.28.132.581.24.829.24s.548-.108.829-.24a7.159 7.159 0 0 0 1.048-.625 11.775 11.775 0 0 0 2.517-2.453c1.678-2.195 3.061-5.513 2.465-9.99a1.541 1.541 0 0 0-1.044-1.263 62.467 62.467 0 0 0-2.887-.87C9.843.266 8.69 0 8 0zm0 5a1.5 1.5 0 0 1 .5 2.915l.385 1.99a.5.5 0 0 1-.491.595h-.788a.5.5 0 0 1-.49-.595l.384-1.99A1.5 1.5 0 0 1 8 5z"/>
                  </svg>
                </span>
                <input type="password" required name="pass" class="learn form-control" placeholder="Mot de passe" aria-label="pass" aria-describedby="basic-addon1">
              </div>
              <div class="input-group mb-3">          
                <span class="input-group-text learn" id="basic-addon1">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-shield-lock-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 0c-.69 0-1.843.265-2.928.56-1.11.3-2.229.655-2.887.87a1.54 1.54 0 0 0-1.044 1.262c-.596 4.477.787 7.795 2.465 9.99a11.777 11.777 0 0 0 2.517 2.453c.386.273.744.482 1.048.625.28.132.581.24.829.24s.548-.108.829-.24a7.159 7.159 0 0 0 1.048-.625 11.775 11.775 0 0 0 2.517-2.453c1.678-2.195 3.061-5.513 2.465-9.99a1.541 1.541 0 0 0-1.044-1.263 62.467 62.467 0 0 0-2.887-.87C9.843.266 8.69 0 8 0zm0 5a1.5 1.5 0 0 1 .5 2.915l.385 1.99a.5.5 0 0 1-.491.595h-.788a.5.5 0 0 1-.49-.595l.384-1.99A1.5 1.5 0 0 1 8 5z"/>
                  </svg>
                </span>
                <input type="password" required name="conf_pass" class="learn form-control" placeholder="Confirmer le mot de passe" aria-label="pass" aria-describedby="basic-addon1">
              </div>
              <?php if(isset($_COOKIE["notmatch"])){ echo "<h6 style='font-size:small;' align='center'><span style='color:red;'>Les mots de passe ne correspondent pas</span></h6>";} elseif(isset($_COOKIE["notunique"])){echo "<h6 style='font-size:small;' align='center'><span style='color:red;'>Nom d'utilisateur existe déjà</h6>";}?>
            </div>
            <div class="modal-footer justify-content-center">
              <button type="submit" name="inscription" class="btn btn-danger learn">S'inscrire</button>
              <button type="button" class="btn btn-outline-dark learn" data-bs-dismiss="modal">Close</button>
            </div>
          </form>
        </div>
        </div>
        </div>
        <!-- Config -->
    <div class="modal fade" id="config" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" style="width:400px;">
      <div class="modal-content">
        <form action="#" method="POST">
        <div class="modal-header">
          <h3 class="modal-title col-12 text-center" id="exampleModalLabel" style="color: #dc3545;">Configuration</h3>
        </div>
        <div class="modal-body">                              
            <div class="input-group mb-3">          
              <span class="input-group-text learn" id="basic-addon1">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-shield-lock-fill" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M8 0c-.69 0-1.843.265-2.928.56-1.11.3-2.229.655-2.887.87a1.54 1.54 0 0 0-1.044 1.262c-.596 4.477.787 7.795 2.465 9.99a11.777 11.777 0 0 0 2.517 2.453c.386.273.744.482 1.048.625.28.132.581.24.829.24s.548-.108.829-.24a7.159 7.159 0 0 0 1.048-.625 11.775 11.775 0 0 0 2.517-2.453c1.678-2.195 3.061-5.513 2.465-9.99a1.541 1.541 0 0 0-1.044-1.263 62.467 62.467 0 0 0-2.887-.87C9.843.266 8.69 0 8 0zm0 5a1.5 1.5 0 0 1 .5 2.915l.385 1.99a.5.5 0 0 1-.491.595h-.788a.5.5 0 0 1-.49-.595l.384-1.99A1.5 1.5 0 0 1 8 5z"/>
              </svg>
              </span>
              <input type="password" required name="pass" class="learn form-control" placeholder="Mot de passe" aria-label="pass" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">          
              <span class="input-group-text learn" id="basic-addon1">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-shield-lock-fill" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M8 0c-.69 0-1.843.265-2.928.56-1.11.3-2.229.655-2.887.87a1.54 1.54 0 0 0-1.044 1.262c-.596 4.477.787 7.795 2.465 9.99a11.777 11.777 0 0 0 2.517 2.453c.386.273.744.482 1.048.625.28.132.581.24.829.24s.548-.108.829-.24a7.159 7.159 0 0 0 1.048-.625 11.775 11.775 0 0 0 2.517-2.453c1.678-2.195 3.061-5.513 2.465-9.99a1.541 1.541 0 0 0-1.044-1.263 62.467 62.467 0 0 0-2.887-.87C9.843.266 8.69 0 8 0zm0 5a1.5 1.5 0 0 1 .5 2.915l.385 1.99a.5.5 0 0 1-.491.595h-.788a.5.5 0 0 1-.49-.595l.384-1.99A1.5 1.5 0 0 1 8 5z"/>
              </svg>
              </span>
              <input type="password" required name="conf_pass" class="learn form-control" placeholder="Confirmer le mot de passe" aria-label="pass" aria-describedby="basic-addon1">
            </div>
            <?php if(isset($_COOKIE["notmatch"])){ echo "<h6 style='font-size:small;' align='center'><span style='color:red;'>Les mots de passe ne correspondent pas</span></h6>";} elseif(isset($_COOKIE["notunique"])){echo "<h6 style='font-size:small;' align='center'><span style='color:red;'>Nom d'utilisateur existe déjà</h6>";}?>
          </div>
          <div class="modal-footer justify-content-center">
            <button type="submit" name="edit" class="btn btn-danger learn">Editer</button>
            <button type="button" class="btn btn-outline-dark learn" data-bs-dismiss="modal">Close</button>
          </div>
        </form>
      </div>
      </div>
      </div>
      <!-- logout -->
    <div class="modal fade" id="sure" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" style="width:400px;">
      <div class="modal-content">
        <form action="traitement.php" method="POST">
        <div class="modal-header">
          <h3 class="modal-title col-12 text-center" id="exampleModalLabel" style="color: #dc3545;">Confirmation</h3>
        </div>
          <div class="modal-body">            
            <h6 align="center">Are you sure ?</h6>
          </div>
          <div class="modal-footer justify-content-center">
            <button type="submit" name="logout" class="btn btn-danger learn">Logout</button>
            <button type="button" class="btn btn-outline-dark learn" data-bs-dismiss="modal">Close</button>
          </div>
        </form>
      </div>
      </div>
      </div>
      <!-- history -->
      <div class="modal fade" id="history" tabindex="-1" aria-labelledby="exampleModalCenteredScrollableTitle" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalCenteredScrollableTitle">Historique des commandes</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <div class="list-group list-group-flush border-bottom scrollarea">
              <?php
              while($vcmd = mysqli_fetch_assoc($vcommande)){
                $sq = "SELECT COUNT(command.plat) as cnt FROM command WHERE command.plat='".$vcmd["plat"]."' AND client=".$_SESSION['id']." AND etat='Valide'";
                $counts = mysqli_query($link,$sq);
                while($count = mysqli_fetch_assoc($counts)){
                echo '
                <a href="#" class="list-group-item list-group-item-action py-1 lh-tight" style="background-color:#b4c8e5; color:white;" aria-current="true">
                  <h1 align="center">'.$vcmd['name'].'</h1>
                  <div class="row">                
                  <div class="d-flex col-6">
                    <img src="images/'.$vcmd["image-plat"].'.png" alt="" width=100%>
                  </div>
                  <div class="col-4 my-5">
                    <h7 align="right">               
                      <div class="col-12 mb-1 small">
                        <strong class="mb-1 pd-1">'.$vcmd["plat"].'</strong>                      
                      </div>                    
                      <div class="col-12 mb-1 small">
                        <small>'.$vcmd["prix-plat"].' MAD</small>
                      </div>
                      <div class="col-12 mb-1 small">
                        <small>x'.$count["cnt"].'</small>
                      </div>
                      <div class="col-12 mb-1 small">
                        '.$vcmd["date"].'
                      </div>                                       
                    </h7>
                  </div>                      
                  </div>
                </a> ';
                }
              }
              ?>             
            </div>
            </div>
            <div class="modal-footer">
              <button type="button" name="valider" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      <!-- Cart -->
      <div class="modal fade" id="shop" tabindex="-1" aria-labelledby="exampleModalCenteredScrollableTitle" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalCenteredScrollableTitle">Mes Commandes</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <div class="list-group list-group-flush border-bottom scrollarea">
              <?php
              
              $name= array();
              $plat = array();
              $cnt = array();
              $prixplat= array();              
              while($commande = mysqli_fetch_assoc($rescommande)){              
                $sq = "SELECT COUNT(command.plat) as cnt FROM command WHERE command.plat='".$commande["plat"]."' AND client=".$_SESSION['id']." AND etat='En cours'";
                $counts = mysqli_query($link,$sq);
                $count = mysqli_fetch_assoc($counts);
                array_push($name,$commande["name"]);
                array_push($plat,$commande["plat"]);
                array_push($cnt,$count["cnt"]);
                array_push($prixplat,$commande["prix-plat"]);
                echo '
                    <a href="#" class="list-group-item list-group-item-action py-1 lh-tight" style="background-color:#b4c8e5; color:white;" aria-current="true">
                    <h1 align="center">'.$commande["name"].'</h1>
                    <div class="row">                
                    <div class="d-flex col-6">
                      <img src="images/'.$commande["image-plat"].'.png" alt="" width=100%>
                    </div>                
                    <div class="col-4 my-5">
                      <h7 align="right">               
                        <div class="col-12 mb-1 small">
                          <strong class="mb-1">'.$commande["plat"].'</strong>
                          <small>'.$commande["prix-plat"].' MAD</small>
                        </div>                         
                        <div class="col-12 mb-1 small">
                          <form action="traitement.php" method="POST" ><button style="background-color:Transparent;border: none;" type="submit" name="add" value="'.$commande["plat"].'" ><i class="fa fa-plus-circle icon" data-bs-toggle="modal" data-bs-target="#add" aria-hidden="true" style=" font-size: larger;"></i></button></form>
                          &nbsp;
                          '.$count["cnt"].'
                          &nbsp;
                          <form action="traitement.php" method="POST" ><button style="background-color:Transparent;border: none;" type="submit" name="delete" value="'.$commande["plat"].'" ><i class="fa fa-minus-circle icon" data-bs-toggle="modal" data-bs-target="#minus" aria-hidden="true" style=" font-size: larger;"></i></button></form>
                        </div>                  
                      </h7>
                    </div>      
                    </div>
                    <h5 align="center">En cours</h5>
                  </a> 
                ';                
              }                
              $_SESSION['name']=$name;
              $_SESSION['plat']=$plat;
              $_SESSION['prix-plat']=$prixplat;
              $_SESSION['count']=$cnt;
              ?>                           
            </div>
            </div>
            <form action="traitement.php" method="POST">
            <div class="modal-footer">     
                       
              <button type="submit" name="valider" value="<?php echo $_SESSION["id"]; ?>" class="btn btn-danger">Valider la commande</button>
            </div>
            </form>
          </div>
        </div>
      </div>  
      <!-- Done     -->
      <div class="modal fade" id="done"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered"  role="document">
          <div class="modal-content w-100 align-items-center justify-content-center" style="background-color:transparent; border:none">
          <div class="card text-white bg-danger mb-3 align-items-center justify-content-center" style="max-width: 18rem;">
            <div class="card-body ">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16" style="float:left;padding:10px;">
                  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                  <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
                </svg>
                <h5>L'opération a été effectuée</h5>
            </div>
          </div>
          </div>
        </div>
      </div>      
      
    <?php
      if(isset($_COOKIE["notmatch"]) | isset($_COOKIE["notunique"])){
        echo "<script type='text/javascript'>
        $(document).ready(function(){
        $('#signup').modal('show');
        });
        </script>";
      }
      if(isset($_COOKIE["cmd"])){
        echo "<script type='text/javascript'>
        $(document).ready(function(){
        $('#shop').modal('show');
        });
        </script>";
      }
      if(isset($_COOKIE["done"])){
        echo "<script type='text/javascript'>
        $(document).ready(function(){
        $('#done').modal('show');
        });
        </script>";
      }      
      if(isset($_POST["edit"])){
        if($_POST["pass"]==$_POST["conf_pass"]){
          echo $user["id"];
          $sql = "UPDATE `user` SET `password`='".$_POST["pass"]."' WHERE `id`='".$_SESSION["id"]."'";
          $result = mysqli_query($link, $sql);
        }
      }      
      ?>
  </body>
</html>
