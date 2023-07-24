<?php
    include("header.php");

    if(isset($_POST["gonder"])){
        if(isset($_SESSION["user"])){
        if($_POST["heading"] != "" && $_POST["textarea"] != ""){
            $heading = mysqli_real_escape_string($link, $_POST["heading"]);
            $text = mysqli_real_escape_string($link, $_POST["textarea"]);

            $query = "INSERT INTO posts (heading, text) VALUES ('".$heading."', '".$text."')";

            if(mysqli_query($link, $query)){
                header("Location: index.php");
            }
        }
        else{
            echo "Lütfen gerekli alanları doldurunuz.";
        }
    }

    else{
        echo "Gönderi yayınlamak için admin girişi yapmalısınız.";
    }
    }
?>

<div class="container olustur">
    <form method="post">
        <h3>BAŞLIK</h3>
        <input type="text" class="heading" name="heading"><br>
        <h3>İÇERİK</h3>
        <textarea name="textarea" id="" class="textarea"></textarea>
        <input type="submit" value="Oluştur" class="submitButton" name="gonder">
    </form>
</div>