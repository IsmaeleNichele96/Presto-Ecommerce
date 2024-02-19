<x-layout>
    <div class="container-fluid mt-custom bg-login-custom vh-100">
        <div class="row text-center">

            <div class="col-12">
                <h1 class="mb-5 fw-bold display-2 mt-4">{{ $category->name }}</h1>
            </div>
            @forelse($category->announcements as $announcement)
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="card card-custom mx-auto" style="width: 26rem;">
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
            @empty
                <div class="col-12 mt-5">
                    <p class=" h2">{{ __('ui.noAnnuncioCategoria') }}</p>
                            <p class="h3">{{ __('ui.pubblica') }} <a class="btn btn-info" href="{{ route('createAnnouncement') }}">{{ __('ui.caricaAnnuncio') }}</a></p>
                </div>
            @endforelse
        </div>
    </div>          
</x-layout>
