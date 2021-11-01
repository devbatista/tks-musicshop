@extends("layouts.app")


@section('wrapper')

    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" aria-label="Close" aria-hidden=true></button>
                </div>
            @endif

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-lg-3 col-xl-2">
                                    <a href="{{ route('albuns.create') }}" class="btn btn-primary mb-3 mb-lg-0">
                                        <i class='bx bxs-plus-square'></i>Novo Álbum
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5 product-grid">
                @foreach ($albuns as $album)
                    <div class="col">
                        <div class="card">
                            <img src="{{ $album->capa }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h4 class="card-title cursor-pointer">{{ $album->titulo }}</h4>
                                <h6>{{ $album->artista }}</h6>
                                <div class="clearfix">
                                    <p class="mb-0 float-start"><strong>15</strong> Músicas</p>
                                    <p class="mb-0 float-end fw-bold"><span>R$ {{ number_format($album->preco, 2) }}</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{ $albuns->links() }}
            <!--end row-->


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
