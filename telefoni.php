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
            })
            .done(function(data) {
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

    <div class="about">
        <div class="container">
            <section class="title-section">
                <h1 class="text-center" class="title-header"> Informacije o telefonima </h1>
                <a href="index.php">
                    < Povratak</a>
            </section>
        </div>
    </div>

    <div class="container">
        <div id="content_left">
            <h1 class="text-center">Unos telefona</h1>

            <div class="box">

                <p>







                <form class="form-group" action="" method="POST" name="unos">
                    <p>Naziv telefona</p>
                    <input class="form-control" type="text" name="telefon_naziv">
                    <p></p><br><br>
                    <button type="submit" class="form-control" class="btn btn-danger">Zapamti</button>
                </form>





                </p>
            </div>
            <div class="row sve-ocene">
                <span>Svi telefoni:</span>
                <div class="col-md-8" id="sviTelefoni">
                </div>
            </div>
        </div>
    </div>