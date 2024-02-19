<x-layout>
    <div class="container mt-custom6 ">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center d">{{ __('ui.annunciDi') }} {{ $announcement->user->name }}</h1>
            </div>
        </div>
    </div>

    <div class="container mt-5 ">
        <div class="row">
            <div class="col-12 col-md-6">
                @if ($announcement)
                    <div class="d-flex justify-content-center">

                        <div style="width: 100%;">
                            <div class="col-12">
                                <div id="carouselExample" class="carousel slide">
                                    @if ($announcement->images)
                                        <div class="carousel-inner">
                                            @foreach ($announcement->images as $image)
                                                <div
                                                    class="carousel-item @if ($loop->first) active @endif">
                                                    <img src="{{ $image->getUrl(400, 300) }}" alt=""
                                                        class="img-fluid rounded heightFissaGrande w100Revisor mb-2">
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                    <button class="carousel-control-prev" type="button"
                                        data-bs-target="#carouselExample" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button"
                                        data-bs-target="#carouselExample" data-bs-slide="next">
                                        <span class="carousel-control-next-icon " aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <div class="col-12 col-md-6">
                <h2>{{ $announcement->title }}</h2>
                <p>{{ $announcement->category->name }}</p>
                <p>€ {{ $announcement->price }}</p>
                <p>{{ $announcement->description }}</p>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="container mt-4 align-content-center">
                <div class="row mt-3 align-items-center">
                    <div class="col-6">
                        <h2 class=" m-0">{{ __('ui.esploraAnnunciShow') }}</h2>
                    </div>
                    <div class="col-6 d-flex justify-content-end align-items-center">
                        <a href="{{ route('index') }}" class="btn button-custom2">{{ __('ui.tuttiGliAnnunci') }}</a>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="container mt-4">
                    <div class="row">
                        @foreach ($announcements->where('category', $announcement->category) as $cardAnnouncement)
                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <div class="card card-custom mx-auto" style="width: 18rem;">
                                    <a href="{{ route('showAnnouncement', ['announcement' => $cardAnnouncement]) }}">
                                        <img src="{{ !$cardAnnouncement->images()->get()->isEmpty() ? $cardAnnouncement->images()->first()->getUrl(400, 300) : 'https://picsum.photos/400/300' }}"
                                            class="card-img-top card-c heightFissa" alt="">
                                        <div class="card-body">
                                            <h3 class="card-title">{{ Str::limit($cardAnnouncement->title, 15) }}</h3>
                                            <p class="card-text">{{ $cardAnnouncement->category->name }}</p>
                                            <p class="card-text">€ {{ $cardAnnouncement->price }}</p>
                                            <p class="card-text">{{ Str::limit($cardAnnouncement->description, 15) }}
                                            </p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                        @if ($announcements->where('category', $announcement->category)->count() === 0)
                            <p class="text-center">Non ci sono annunci per questa categoria.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
