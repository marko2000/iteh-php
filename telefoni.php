<?php
    include 'models/Telefon.php';

    if (isset($_POST['telefon_naziv'])) {
        $telefon = new Telefon();
        $telefon->setTelefon_naziv($_POST['telefon_naziv']);
        $telefon->save();
    }
?>

<!DOCTYPE HTML>
<html>

<head>
    <title>Telefoni</title>
    <meta charset="UTF-8">

    <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <script src="js/jquery.min.js"></script>
    <script src="js/script.js"></script>

    <script src="//cdn.ckeditor.com/4.5.5/basic/ckeditor.js"></script>

    <script>
        $.get("controller.php", {
            telefon: "show"
        }).done(function(data) {
            var result = '';
            var finalData = JSON.parse(data);
            result = '';
            for (var i = 0; i < finalData.length; i++) {
                result += '<div class="blog_grid">' +
                '<p>' + finalData[i].telefon_naziv + '</p>' +
                '<ul class="links">' +
                '<li><button type="button" onclick="izbrisi(' + finalData[i].telefon_id + ')" >Obrisi</button></li>' +
                '</ul>' +
                '</div>';
            };

            $('#sviTelefoni').html(result);
        });

        function izbrisi(id) {
            $.get('controller.php', {
                izbrisi: 'telefon',
                id: id
            }).done(function(data) {
                if (data == 'OK') {
                    location.reload();
                } else {
                    alert('Greska');
                }
            });
        }
    </script>
</head>

<body>
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
                <h1 class="text-center" class="title-header">Informacije o telefonima</h1>
                <a href="index.php">< Povratak</a>
            </section>
        </div>
    </div>

    <div class="container">
        <div id="content_left">
            <h1 class="text-center">Unos telefona</h1>
            <div class="box">
                <form class="form-group" action="" method="POST" name="unos">
                    <p>Naziv telefona</p>
                    <input class="form-control" type="text" name="telefon_naziv"><br><br>
                    <button type="submit" class="form-control" class="btn btn-danger">Dodaj</button>
                </form>
            </div>
            <div class="row sve-ocene">
                <span>Svi telefoni:</span>
                <div class="col-md-8" id="sviTelefoni"></div>
            </div>
        </div>
    </div>
</body>