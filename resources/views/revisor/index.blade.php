<x-layout>
    <div class=" container-fluid p-5 bg-gradient bg-login-custom p-5 shadow mb-4 mt-custom text-center ">
        <div class="row">
            <div class="col-12">
                <h1 class="display-2">
                    {{ $announcement_to_check ? __('ui.revAnnuncio') : __('ui.noRevAnnuncio') }}
                </h1>
            </div>
        </div>
    </div>
    <div class=" vh-Custom">
        @if ($announcement_to_check)
        <div class="d-flex justify-content-center">
            <!-- Carousel Section -->
            <div class="card" style="width: 45rem;">
                <div class="col-12">
                    <div id="carouselExample" class="carousel slide">
                        @if ($announcement_to_check->images)
                        <div class="carousel-inner">
                            @foreach ($announcement_to_check->images as $image)
                            <div class="carousel-item @if ($loop->first) active @endif">
                                <img src="{{ $image->getUrl(400,300) }}" alt=""
                                class="img-fluid rounded heightFissaGrande w100Revisor mb-2">
                                <!-- Image Labels and Tags Section -->
                                <div class="col-md-3 border-end image-details">
                                    <h5 class="tc-accent mt-3">Tags</h5>
                                    <div class="p-2">
                                        @if ($image->labels)
                                        @foreach ($image->labels as $label)
                                        <p class="d-inline">{{ $label }}, </p>
                                        @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3 image-details">
                                    <div class="card-body">
                                        <h5 class="tc-accent">Revisione Immagini</h5>
                                        <p>Adulti: <span class="{{ $image->adult }}"></span></p>
                                        <p>Satira: <span class="{{ $image->spoof }}"></span></p>
                                        <p>Medicina: <span class="{{ $image->medical }}"></span></p>
                                        <p>Violenza: <span class="{{ $image->violence }}"></span></p>
                                        <p>Contenuto Ammiccante: <span class="{{ $image->racy }}"></span></p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endif
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon " aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            
            <h2 class=" card-title text-center">{{ $announcement_to_check->title }}</h2>
            <h5 class=" card-text text-center">{{ $announcement_to_check->description }}</h5>
            <p class=" card-text text-center"> € {{ $announcement_to_check->price }}</p>
            <p class=" card-footer text-center">{{__('ui.pub') }}
                {{ $announcement_to_check->created_at->format('d/m/Y') }}</p>
                <div class=" d-flex justify-content-between mx-3 my-3">
                    
                    <form method="POST"
                    action="{{ route('rejectAnnouncement', ['announcement' => $announcement_to_check]) }}">
                    @method('PATCH')
                    @csrf
                    <button type="submit" class="btn btn-danger">Rifiuta</button>
                </form>
                
                <form method="POST"
                action="{{ route('acceptAnnouncement', ['announcement' => $announcement_to_check]) }}">
                @method('PATCH')
                @csrf
                <button type="submit" class="btn btn-success">Accetta</button>
            </form>
            @endif
        </div>
    </div>
</div>
</div>

<div class="mt-4">
    <form method="POST" action="{{ route('undoAnnouncement') }}">
        @method('patch')
        @csrf
        <div class=" d-flex justify-content-center">
            <button class="btn btn-dark">{{ __('ui.annulla') }}</button>
        </div>
    </form>
</div>
</div>
</x-layout>
