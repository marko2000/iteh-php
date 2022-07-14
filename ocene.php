<?php
include 'models/Ocena.php';

if (isset($_POST['ocena_kriterijum'])) {

    $ocena = new Ocena();
    $ocena->setOcena_kriterijum($_POST['ocena_kriterijum']);
    $ocena->setTelefon_ocena($_POST['telefon_ocena']);
    $ocena->setTelefon_opis($_POST['telefon_opis']);
    $ocena->setTelefon_id($_POST['telefon_id']);

    $ocena->save();
}
?>

<!DOCTYPE HTML>
<html>

<head>
    <title>Ocene</title>
    <meta charset="UTF-8">

    <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <script src="js/jquery.min.js"></script>
    <script src="js/script.js"></script>


    <script src="//cdn.ckeditor.com/4.5.5/basic/ckeditor.js"></script>

    <script>
        $.get("controller.php", {
                ocena: "show"
            })
            .done(function(data) {
                var result = '';
                var finalData = JSON.parse(data);
                result = '';
                for (var i = 0; i < finalData.length; i++) {
                    result += '<div class="blog_grid">' +
                        '<p style="font-size: 1.1rem;">' + finalData[i].ocena_kriterijum +  '</p>' +
                        '<p class="telefon-opis"">' + finalData[i].telefon_opis + '</p>' +
                        '<ul class="links">' +
                        '<li><button type="button" onclick="izbrisi(' + finalData[i].ocena_id + ')" >Obrisi</button></li>' +
                        '</ul>' +
                        '</div>';
                };
                $('#sveOcene').html(result);
            });

        // Spisak telefona
        $.get("controller.php", {
                telefon: "show"
            })
            .done(function(data) {
                var result = '';
                var finalData = JSON.parse(data);
                for (var i = 0; i < finalData.length; i++) {
                    result += '<option  value=' + finalData[i].telefon_id + '>' + finalData[i].telefon_naziv + '</option>';
                };
                $('#spisakTelefona').html(result);
            });


        function izbrisi(id) {
            $.get('controller.php', {
                    izbrisi: 'ocena',
                    id: id
                })
                .done(function(data) {
                    if (data == 'OK') {
                        location.reload();
                    } else {
                        alert('Greska');
                    }
                });
        }
    </script>

    <nav class="navbar navbar-custom">
        <ul class="nav navbar-nav navbar-custom">
            <a href="index.php" class="navbar-left"><img src="images/logo.png" class="logo"></a>
            <li><a href="index.php">Početna</a></li>
            <li><a href="ocene.php">Ocene</a></li>
            <li><a href="telefoni.php">Telefoni</a></li>
        </ul>
    </nav>

    <div class="about">
        <div class="container">
            <section class="title-section">
                <h1 class="text-center" class="title-header"> Informacije o ocenama </h1>
                <a href="index.php">
                    < Povratak</a>
            </section>
        </div>
    </div>

    <div class="container">
        <div id="content_left">
            <h1 class="text-center">Unos ocene</h1>

            <div class="box">

                <p>
                <form class="form-group" action="" method="POST" name="unos">
                    <p>Kriterijum</p>
                    <input class="form-control form-input" type="text" name="ocena_kriterijum">
                    <p>Telefon koji se ocenjuje</p>
                    <select class="form-control form-input" id="spisakTelefona" name="telefon_id">
                    </select>
                    <p style="margin-bottom: 5px;">Opis</p>
                    <textarea name="telefon_opis"></textarea>
                    <script>
                        CKEDITOR.replace('telefon_opis');
                    </script>
                    <p style="margin-top: 15px;">Ocena</p>
                    <input type="text" class="form-control form-input" name="telefon_ocena">
                    <p></p><br><br>
                    <button type="submit" class="form-control" class="btn btn-danger">Oceni</button>

                </form>
                </p>
            </div>

            <div class="row sve-ocene">
            <span>Sve ocene:</span>
                <div class="col-md-6" id="sveOcene">
                    
                </div>
            </div>
        </div>
    </div>