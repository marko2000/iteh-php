<!DOCTYPE HTML>
<html>

<head>
    <title>Telefon</title>
    <meta charset="UTF-8">

    <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <script src="js/jquery.min.js"></script>
    <script src="js/script.js"></script>

    <script>
        $.get("controller.php", {
            ocena: "show"
        }).done(function(data) {
            var result = '';
            var finalData = JSON.parse(data);
            for (var i = 0; i < finalData.length; i++) {
                result += '<div class="blog_grid">' +
                '<h2 class="post_title">' + finalData[i].ocena_kriterijum + '</h2>' +
                '<ul class="links">' +
                '<li class="ocena-id"><i class="fa fa-calendar calendar-icon"></i>' + finalData[i].telefon_id + '</li>' +
                '<li class="opis">' + finalData[i].telefon_opis + '</li>' +
                '<li class="telefon-ocena"><i class="fa fa-star star-icon"></i>' + finalData[i].telefon_ocena+ '</li>' +
                '</ul>' +
                '</div>';
            };

            $('#ocena').html(result);
        });

        $.get("controller.php", {
            telefon: "show"
        }).done(function(data) {
            var result = '';
            var finalData = JSON.parse(data);
            for (var i = 0; i < finalData.length; i++) {
                result += '<li value=' + finalData[i].telefon_id + '>' + finalData[i].telefon_naziv + '</li>';
            }
            
            result += '<a style="color:red" href="telefoni.php">+ Dodaj novi telefon</a>';
            $('#telefon').html(result);
        });

        // function sortAsc() {
        //     $.get("controller.php", {
        //             ocena: "sortAsc"
        //         })
        //         .done(function(data) {
        //             var result = '';
        //             var finalData = JSON.parse(data);
        //             for (var i = 0; i < finalData.length; i++) {
        //                 result += '<div class="blog_grid">' +
        //                     '<h2 class="post_title">' + finalData[i].ocena_kriterijum + '</h2>' +
        //                     '<ul class="links">' +
        //                     '<li><i class="fa fa-calendar"></i>' + finalData[i].telefon_id + '</li>' +
        //                     '<li><i class="fa fa-globe"></i> ' + finalData[i].telefon_opis + '</li>' +
        //                     '<li><i class="fa fa-star"></i>' + finalData[i].telefon_ocena + '</li>' +
        //                     '</ul>' +
        //                     '</div>';
        //             };
        //             $('#ocena').html(result);
        //         });
        // }

        // function sortDesc() {
        //     $.get("controller.php", {
        //             ocena: "sortDesc"
        //         })
        //         .done(function(data) {
        //             var result = '';
        //             var finalData = JSON.parse(data);
        //             for (var i = 0; i < finalData.length; i++) {
        //                 result += '<div class="blog_grid">' +
        //                     '<h2 class="post_title">' + finalData[i].ocena_kriterijum + '</h2>' +
        //                     '<ul class="links">' +
        //                     '<li><i class="fa fa-calendar"></i>' + finalData[i].telefon_id + '</li>' +
        //                     '<li><i class="fa fa-globe"></i> ' + finalData[i].telefon_opis + '</li>' +
        //                     '<li><i class="fa fa-star"></i>' + finalData[i].telefon_ocena + '</li>' +
        //                     '</ul>' +
        //                     '</div>';
        //             };
        //             $('#ocena').html(result);
        //         });
        // }

        function search() {
            $.get("controller.php", {
                ocena: 'search',
                text: $('#search').val()
            }).done(function(data) {
                var result = '';
                var finalData = JSON.parse(data);
                for (var i = 0; i < finalData.length; i++) {
                    result += '<div class="blog_grid">' +
                    '<h2 class="post_title">' + finalData[i].ocena_kriterijum + '</h2>' +
                    '<ul class="links">' +
                    '<li><i class="fa fa-calendar"></i>' + finalData[i].telefon_id + '</li>' +
                    '<li><i class="fa fa-globe"></i> ' + finalData[i].telefon_opis + '</li>' +
                    '<li><i class="fa fa-star"></i>' + finalData[i].telefon_ocena + '</li>' +
                    '</ul>' +
                    '</div>';
                };

                $('#ocena').html(result);
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
                <h1 class="title-header text-center"> Ocene telefona </h1>
            </section>
            <!-- <div class="col-md-6 sort" style="padding:0">
                <span class="sort-text">Sortiraj prema oceni:</span>
                <button class="btn fa fa-arrow-down" onclick="sortDesc()"></button>
                <button class="btn btn-primary pull-right fa fa-arrow-up" onclick="sortAsc()"></button>
            </div> -->

            <div class="col-md-6">
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <input style="margin-bottom: 15px;" id="pretraga" type="search" onsearch="search()" class="form-control" placeholder="Pretraga..." onkeyup="search()" size="30">
                <div id="ocena"></div>
            </div>

            <div class="col-md-6 svi-telefoni">
                <h3>Spisak svih telefona:</h3>
                <ul class="sidebar" id="telefon"></ul>
            </div>
        </div>
    </div>
</body>