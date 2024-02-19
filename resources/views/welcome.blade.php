<x-layout>

    <div class="container-fluid mt-custom BG-custom vh-100">
        <div class="row ">
            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif

            @if (session('access.denied'))
                <div class="alert alert-danger">
                    {{ session('access.denied') }}
                </div>
            @endif
            <div class="col-12 col-md-11 d-flex justify-content-center ">
                <h1 class="text-center mt-3 mb-2 m-custom-presto fw-bold display-2 ">Presto.it</h1>
            </div>
            <div class="col-12 col-md-1 d-flex flex-column align-items-center mt-2">
                <x-_locale lang="it" />
                <x-_locale lang="en" />
                <x-_locale lang="es" />
            </div>
            <div class="row">
                <div class="col-3 BannerHeader">
                    <h3 class=" text-center mtCustomh3 mb-cutomHeader font-sizeCustom">{{ __('ui.testoRegistrati') }}
                    </h3>
                    <div class="d-flex justify-content-center mb-4 mt-4">
                        <a class="btn button-custom "
                            href="{{ route('createAnnouncement') }}">{{ __('ui.caricaAnnuncio') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>



    </div>

    <div class="container mt-4 align-content-center">
        <div class="row mt-3 align-items-center">
            <div class="col-6">
                <h2 class=" m-0">{{ __('ui.esploraAnnunci') }}</h2>
            </div>
            <div class="col-6 d-flex justify-content-end align-items-center">
                <a href="{{ route('index') }}" class="btn button-custom2">{{ __('ui.tuttiGliAnnunci') }}</a>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <div class="row">
            @foreach ($announcements as $announcement)
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card card-custom mx-auto mb-3" style="width: 18rem;">
                        <a href="{{ route('showAnnouncement', compact('announcement')) }}">
                            {{-- <img src="{{($announcement->images()->first()->getUrl(400,300)) ?? 'https://picsum.photos/400/300'}}" alt="" cla> --}}
                            <img src="{{ !$announcement->images()->get()->isEmpty()? $announcement->images()->first()->getUrl(400, 300): 'https://picsum.photos/400/300' }}"
                                class="card-img-top card-c heightFissa" alt="">
                            <div class="card-body">
                                <h3 class="card-title">{{ Str::limit($announcement->title, 15) }}</h3>
                                <p class="card-text">{{ $announcement->category->name }}</p>
                                <p class="card-text">€ {{ $announcement->price }}</p>
                                <p class="card-text">{{ Str::limit($announcement->description, 15) }}</p>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
