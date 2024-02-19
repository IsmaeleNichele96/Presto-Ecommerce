<x-layout>
    <div class="container mt-customIndex vh-100">
        <div class="row">
            @forelse ($announcements as $announcement)
                <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                    <div class="card card-custom mx-auto h-100">
                        <a href="{{ route('showAnnouncement', compact('announcement')) }}">
                            <img src="{{ !$announcement->images()->get()->isEmpty()? $announcement->images()->first()->getUrl(400, 300): 'https://picsum.photos/400/300' }}"
                                class="card-img-top card-c heightFissa" alt="">
                            <div class="card-body">
                                <h3 class="card-title">{{ Str::limit($announcement->title, 15) }}</h3>
                                <p class="card-text">{{ $announcement->category->name }}</p>
                                <p class="card-text"> € {{ $announcement->price }}</p>
                                <p class="card-text">{{ Str::limit($announcement->description, 15) }}</p>
                            </div>
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-warning">
                        <p class="lead">{{ __('ui.noAnnunci') }}</p>
                    </div>
                </div>
            @endforelse
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $announcements->links() }}
        </div>
    </div>
</x-layout>

{{-- <a href="{{ route('showAnnouncement', compact('announcement')) }}"
class="btn btn-primary">{{ __('ui.btnVisualizza') }}</a>
<a href="{{ route('categoryShow', ['category' => $announcement->category]) }}"
    class="btn btn-warning ">{{ __('ui.categoria') }}
    {{ $announcement->category->name }}</a>
    <p class="card-footer">{{ __('ui.pub') }}
        {{ $announcement->created_at->format('d/m/Y') }} </p> --}}
