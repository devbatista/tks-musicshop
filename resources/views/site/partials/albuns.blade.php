@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true" color="#fff">&times;</span>
        </button>
        <ul>
            <h5><i class="icon fa fa-ban"></i> Ocorreu um erro.</h5>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true" color="#fff">&times;</span>
        </button>
    </div>
@endif

<div class="row">
    <div class="col-md-12">
        <form method="GET">
            <div class="float-md-right">
                <label for="genero">Gênero: </label>
                <select name="genero" class="" onChange="this.form.submit();">
                    <option {{ (isset($generoSelect)) ? 'selected' : '' }} value='all'>Todos</option>
                    @foreach ($data['generos'] as $genero)
                        <option {{ ($generoSelect == $genero->id) ? 'selected' : '' }} value="{{ $genero->id }}">{{ $genero->nome }}</option>
                    @endforeach
                </select>
            </div>
        </form>
    </div>
</div>

<div class="album_section">
    <div class="container">
        <h1>Álbuns disponíveis</h1>
        <div class="row">
            @foreach ($data['album'] as $album)
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="box_main">
                        <h4 class="disco_text">{{ $album->titulo }}</h4>
                        <h6 class="artista_text">{{ $album->artista }}</h6>
                        <p class="price_text">preço <span style="color: #262626;">R$
                                {{ number_format($album->preco, 2) }}</span></p>
                        <div class="tshirt_img"><img src="{{ $album->capa }}"></div>
                        <div class="btn_main">
                            <div class="buy_bt"><a href="#" class="buy_now" data-id="{{ $album->id }}"
                                    data-toggle="modal" data-target="#compraModal">Comprar agora</a></div>
                            <div class="seemore_bt"><a href="#" class="album_details" data-id="{{ $album->id }}"
                                    data-toggle="modal" data-target="#detalheAlbumModal">Detalhes</a></div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{ $data['album']->links() }}

    </div>
</div>
