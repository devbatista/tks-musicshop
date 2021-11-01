<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>MusicShop</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('site/css/bootstrap.min.css') }}">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('site/css/style.css') }}">
    <!-- Responsive-->
    <link rel="stylesheet" href="{{ asset('site/css/responsive.css') }}">
    <!-- fevicon -->
    <link rel="icon" href="images/fevicon.png" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="{{ asset('site/css/jquery.mCustomScrollbar.min.css') }}">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <!-- font awesome -->
    <link rel="stylesheet" type="text/css"
        href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--  -->
    <!-- owl stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Poppins:400,700&display=swap&subset=latin-ext"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('site/css/owl.carousel.min.css') }}">
    <link rel="stylesoeet" href="{{ asset('site/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
        media="screen">
</head>

<body>
    <!-- albuns section start -->
    @yield('content')
    <!-- albuns section end -->
    <!-- Javascript files-->
    <script src="{{ asset('site/js/jquery.min.js') }}"></script>
    <script src="{{ asset('site/js/popper.min.js') }}"></script>
    <script src="{{ asset('site/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('site/js/jquery-3.0.0.min.js') }}"></script>
    <script src="{{ asset('site/js/plugin.js') }}"></script>
    <!-- sidebar -->
    <script src="{{ asset('site/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('site/js/custom.js') }}"></script>
    <script>
        let musicas = {};
        let albuns = {};

        $(document).ready(function() {
            $.ajax({
                url: window.origin + '/get-musicas-albuns',
                dataType: 'json',
                type: 'get',
                success: (e) => {
                    musicas = e.musicas;
                    albuns = e.albuns
                }
            });
        });

        $('.album_details').click(function(e) {
            let id = $(this).data('id');
            let data = {};
            let dataAlbuns = {};

            albuns.forEach(function(v, i) {
                if (v.id == id) {
                    dataAlbuns = v;
                }
            });

            $('#detalheAlbumModal .modal-body').html(function() {
                let musicasHTML = '';
                musicas.forEach(function(v, i) {
                    if (v.album == id) {
                        musicasHTML += '<li>' + v.nome + '</li>';
                    }
                });

                html = '<b>Titulo: </b>' + dataAlbuns.titulo + '<br>' +
                    '<b>Artista: </b>' + dataAlbuns.artista + '<br>' +
                    '<b>Preço: </b>R$ ' + dataAlbuns.preco + '<br>' +
                    '<b>Genero: </b>' + dataAlbuns.genero + '<br><br>' +
                    '<b>Músicas</b>' +
                    '<ul>' +
                    musicasHTML +
                    '</ul>';
                return html;
            });
        });


        $('.buy_now').click(function() {
            let id = $(this).data('id');
            $('input[name=album]').val(id);
            let data = {};
            albuns.forEach(function(v, i) {
                if (v.id == id) {
                    data = v;
                }
            });
        });
    </script>
</body>

</html>
