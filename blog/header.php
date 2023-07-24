<?php
    session_start();
    $link = mysqli_connect("localhost", "root", "", "blogsitesi");
    if(mysqli_connect_errno()){
        echo "Bağlantı başarısız.";
    }

    if(isset($_POST["loginText"])){
        $sifre = mysqli_real_escape_string($link, $_POST["loginText"]);
        $query = "SELECT password FROM admin";
        if($result = mysqli_query($link, $query)){
            $row = mysqli_fetch_assoc($result);
            if($row["password"] == $sifre){
                $_SESSION["user"] = "admin";
                header("Location: index.php");
            }
            else{
                echo "Hatalı şifre.";
            }
        }
    }

    if(isset($_POST["logoutButton"])){
        session_unset();
    }
?>

<!DOCTYPE html>

<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style/style.css" type="text/css">
        <title>Blog</title>
    </head>
        
    <body>
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand logo cont" href="#">LOGO</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active cont" aria-current="page" href="index.php">Ana Sayfa</a>
                    </li>
                    <li class="nav-item cont">
                        <a class="nav-link" href="profil.php">Profilim</a>
                    </li>
                    <li class="nav-item cont">
                        <a class="nav-link" href="olustur.php">Yeni Blog</a>
                    </li>
                </ul>
                <form method="post" class="login">
                    <?php if(!isset($_SESSION["user"])){ ?>
                    
                    <input type="text" name="loginText" class="loginText" placeholder="Giriş Yap..." tabindex="0">
                    <input type="submit" value="Giriş Yap" class="loginButton" name="loginButton">
                    <?php } ?>
                    <?php
                        if(isset($_SESSION["user"])){ ?>
                    <input type="submit" class="loginButton logoutButton" name="logoutButton" value = "Çıkış Yap">
                    <?php
                        }
                    ?>
                </form>
                </div>
            </div>
        </nav>