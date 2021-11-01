@extends("layouts.app")

@section('style')
    <link href="{{ asset('assets/plugins/Drag-And-Drop/dist/imageuploadify.min.css') }}" rel="stylesheet" />
@endsection

@section('wrapper')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Álbuns</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ route('albuns.index') }}"><i
                                        class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Novo Álbum</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->

            <div class="card">
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" aria-label="Close" aria-hidden=true></button>
                        <ul>
                            <h5><i class="icon fas fa-ban"></i> Ocorreu um erro.</h5>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card-body p-4">
                    <form action="{{ route('albuns.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <h5 class="card-title">Adicionar novo álbum</h5>
                        <hr />
                        <div class="form-body mt-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="border border-3 p-4 rounded">
                                        <div class="mb-3">
                                            <label for="titulo" class="form-label">Título do álbum *</label>
                                            <input type="text" class="form-control" id="titulo" placeholder="Título"
                                                name="titulo">
                                        </div>
                                        <div class="mb-3">
                                            <label for="musicas" class="form-label">Músicas * <span style="font-size: 12px;color:#999">Coloque uma música em baixo da outra</span></label>
                                            <textarea class="form-control" id="musicas" rows="5"
                                                name="musicas"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="capa" class="form-label">Capa</label>
                                            <input class="form-control" type="file" id="formFile" name="capa">
                                        </div>
                                        <div class="mb-3">
                                            <label for="artista">Artista *</label>
                                            <div class="input-group mt-2">
                                                <input type="text" class="form-control"
                                                    aria-label="Text input with segmented dropdown button" name="artista"
                                                    id="artista" list="artistas">
                                                <datalist id="artistas">
                                                    <option>teste</option>
                                                </datalist>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="genero">Gênero *</label>
                                            <div class="input-group mt-2">
                                                <input type="text" class="form-control" name="genero" id="genero"
                                                    list="generos">
                                                <datalist id="generos">
                                                    <option>teste</option>
                                                </datalist>
                                            </div>
                                        </div>
                                        <div class="input-group mb-3">
                                            <label for="preco">Preço *</label>
                                            <div class="input-group mt-2">
                                                <span class="input-group-text">R$</span>
                                                <input type="text" class="form-control" name="preco" id="preco">
                                            </div>
                                        </div>
                                        <div class="input-group mb-3 mt-5">
                                            <button type="submit" class="btn btn-primary px-5">Salvar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end row-->
                        </div>
                    </form>
                </div>
            </div>


        </div>
    </div>
    <!--end page wrapper -->
@endsection

@section('script')
    <script>
        $('.btn-close').click(function() {
            $('.alert').remove()
        });
    </script>
@endsection
