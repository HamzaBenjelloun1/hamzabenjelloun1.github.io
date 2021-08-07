<?php
  session_start();
  include("connexion.php");
  if(isset($_SESSION["id"])){    
    $sql = "SELECT * FROM user WHERE id='".$_SESSION["id"]."'";
    $result = mysqli_query($link, $sql);
    $user = mysqli_fetch_assoc($result);
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
    <title>Page d'accueil</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/headers/">

    
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
      h1{
        font-size:170%;
      }
      .icon{
        color:rgb(238,238,246,0.9);
      }
      .icon:hover{
          color: rgb(238,238,246,1);
      }
      .text {
        vertical-align: middle;
        display: inline-block;
        font-size:100%;
      }
      .learn{
        border-radius: 30px;
        font-size: small;
      }
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      .resto{
        border-top-left-radius: 20px;
        border-top-right-radius: 20px;
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
    </style>

    
    <!-- Custom styles for this template -->
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
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner" style="height: 50%;">
        <div class="carousel-item active">
          <img src="images/carousel2.jpg" class="d-block w-100" alt="...">
          <div class="px-3 carousel-caption d-none d-md-block" style="margin-bottom: 20%; color: white;">
            <h1>Manger est un vrai bonheur</h1>
            <p class="lead">home pages. Download, edit the text, and add your own fullscreen background photo to make it your own.</p>
            <p class="lead">
              <a href="#" class="btn learn btn-lg btn-light">VOIR NOS RESTAURANTS</a>
            </p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="images/carousel2.jpg" class="d-block w-100" alt="...">
          <div class="px-3 carousel-caption d-none d-md-block" style="margin-bottom: 20%; color: white;">
            <h1>Manger est un vrai bonheur</h1>
            <p class="lead">home pages. Download, edit the text, and add your own fullscreen background photo to make it your own.</p>
            <p class="lead">
              <a href="#" class="btn learn btn-lg btn-light">VOIR NOS RESTAURANTS</a>
            </p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="images/carousel2.jpg" class="d-block w-100" alt="...">
          <div class="px-3 carousel-caption d-none d-md-block" style="margin-bottom: 20%; color: white;">
            <h1>Manger est un vrai bonheur</h1>
            <p class="lead">home pages. Download, edit the text, and add your own fullscreen background photo to make it your own.</p>
            <p class="lead">
              <a href="#" class="btn learn btn-lg btn-light">VOIR NOS RESTAURANTS</a>
            </p>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>   
    <div class="container">
      <div class="row my-4 py-4">
        <h1 align=center style="color: #ff3a3abd;" id="Restaurants">RESTAURANTS</h1><br>
        <hr style="width: 50%;margin: 0 auto;"><br>
      </div>      
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <?php
          $sql = "SELECT DISTINCT(`name`), `rate`, `estimation`, `image`, `livraison` FROM restaurant;";
          $result = mysqli_query($link, $sql);
          while($restaurant = mysqli_fetch_assoc($result)){
          echo '
          <div class="col">
          <div class="card shadow-sm">            
              <img class="resto" src="images/'.$restaurant["image"].'.png" alt="">
              <i class="fas fa-star" style="color: #e9ad2b; position: absolute;right: 5%;top: 5%;font-size: larger;">'.$restaurant["rate"].'</i>            
              <form action="traitement.php" method="POST"><button value="'.$restaurant["name"].'" name="voir" type="submit" class="btn btn-danger voir">Voir Menu</button></form>
              <div class="card-body" style="border-radius: 20%;">
                
                <div class="d-flex justify-content-between align-items-center">                                
                  <h1 class="card-text">'.$restaurant["name"].'</h1>                
                  <small class="text-muted">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-stopwatch-fill mb-1" viewBox="0 0 16 16">
                      <path d="M6.5 0a.5.5 0 0 0 0 1H7v1.07A7.001 7.001 0 0 0 8 16a7 7 0 0 0 5.29-11.584.531.531 0 0 0 .013-.012l.354-.354.353.354a.5.5 0 1 0 .707-.707l-1.414-1.415a.5.5 0 1 0-.707.707l.354.354-.354.354a.717.717 0 0 0-.012.012A6.973 6.973 0 0 0 9 2.071V1h.5a.5.5 0 0 0 0-1h-3zm2 5.6V9a.5.5 0 0 1-.5.5H4.5a.5.5 0 0 1 0-1h3V5.6a.5.5 0 1 1 1 0z"/>
                  </svg>
                  <div class="text mb-3">'.$restaurant["estimation"].' MINS</div>
                  &nbsp;
                  <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-bicycle" viewBox="0 0 16 16">
                    <path d="M4 4.5a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1v.5h4.14l.386-1.158A.5.5 0 0 1 11 4h1a.5.5 0 0 1 0 1h-.64l-.311.935.807 1.29a3 3 0 1 1-.848.53l-.508-.812-2.076 3.322A.5.5 0 0 1 8 10.5H5.959a3 3 0 1 1-1.815-3.274L5 5.856V5h-.5a.5.5 0 0 1-.5-.5zm1.5 2.443-.508.814c.5.444.85 1.054.967 1.743h1.139L5.5 6.943zM8 9.057 9.598 6.5H6.402L8 9.057zM4.937 9.5a1.997 1.997 0 0 0-.487-.877l-.548.877h1.035zM3.603 8.092A2 2 0 1 0 4.937 10.5H3a.5.5 0 0 1-.424-.765l1.027-1.643zm7.947.53a2 2 0 1 0 .848-.53l1.026 1.643a.5.5 0 1 1-.848.53L11.55 8.623z"/>
                  </svg>
                  <div class="text mb-3">'.$restaurant["livraison"].' MAD</div>                
                  </small>
                </div>
              </div>
            </div>
          </div> 
          ';
          }
        ?>            
    </div>
    <div class="container">
      <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <p class="col-md-4 mb-0 text-muted">&copy; 2021 Company, Inc</p>
    
        <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
          <img src="images/logo.png" alt="" width="60px">
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
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
            </svg>
            </span>
            <input type="text" name="username" required class="learn form-control" placeholder="Nom d'utilisateur" aria-label="Username" aria-describedby="basic-addon1">
          </div>
          <div class="input-group mb-3">          
            <span class="input-group-text learn" id="basic-addon1">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-shield-lock-fill" viewBox="0 0 16 16">
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
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                  <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
              </svg>
              </span>
              <input type="text" name="username" required class="learn form-control" placeholder="Nom d'utilisateur" aria-label="Username" aria-describedby="basic-addon1">
            </div>
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
            <button type="submit" name="inscription" class="btn btn-danger learn">S'inscrire</button>
            <button type="button" class="btn btn-outline-dark learn" data-bs-dismiss="modal">Close</button>
          </div>
        </form>
      </div>
      </div>
      </div>
      <!-- Config -->
      <!-- Modal sign up -->
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
              <a href="#" class="list-group-item list-group-item-action py-1 lh-tight" style="background-color:#b4c8e5; color:white;" aria-current="true">
                <h1 align="center">KFC</h1>
                <div class="row">                
                <div class="d-flex col-6">
                  <img src="images/KFC1.png" alt="" width=100%>
                </div>
                <div class="col-4 my-5">
                  <h7 align="right">               
                    <div class="col-12 mb-1 small">
                      <strong class="mb-1 pd-1">MIGHTY ZINGER BOX</strong>                      
                    </div>                    
                    <div class="col-12 mb-1 small">
                      <small>100 MAD</small>
                    </div>
                    <div class="col-12 mb-1 small">
                      <small>x2</small>
                    </div>
                    <div class="col-12 mb-1 small">
                      06-08-2021
                    </div>                                       
                  </h7>
                </div>                      
                </div>
              </a>              
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
              <a href="#" class="list-group-item list-group-item-action py-1 lh-tight" style="background-color:#b4c8e5; color:white;" aria-current="true">
                <h1 align="center">KFC</h1>
                <div class="row">                
                <div class="d-flex col-6">
                  <img src="images/KFC1.png" alt="" width=100%>
                </div>
                <div class="col-4 my-5">
                  <h7 align="right">               
                    <div class="col-12 mb-1 small">
                      <strong class="mb-1">MIGHTY ZINGER</strong>
                      <small>100 MAD</small>
                    </div>                                        
                    <div class="col-12 mb-1 small">
                      06-08-2021
                    </div>  
                    <div class="col-12 mb-1 small">
                      <i class="fa fa-minus-circle icon" aria-hidden="true" ></i>
                      &nbsp;
                      2
                      &nbsp;
                      <i class="fa fa-plus-circle icon" aria-hidden="true" ></i>
                    </div>                  
                  </h7>
                </div>      
                </div>
                <h5 align="center">En cours</h5>
              </a>              
            </div>
            </div>
            <div class="modal-footer">
              <button type="button" name="valider" class="btn btn-danger" data-bs-dismiss="modal">Valider la commande</button>
            </div>
          </div>
        </div>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <?php
      if(isset($_COOKIE["notmatch"]) | isset($_COOKIE["notunique"])){
        echo "<script type='text/javascript'>
        $(document).ready(function(){
        $('#signup').modal('show');
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
