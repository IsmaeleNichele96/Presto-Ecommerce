<x-layout>
    <div class="container-fluid bg-login-custom ">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-lg-6 col-md-8 col-sm-10 mtCustom2">
                <div class="cardCustomCreate pt-4 mt-custom">
                    <h1 class="text-center display-2">{{ __('ui.caricaAnnuncio') }}</h1>

                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif

                    <div class="">
                        <livewire:create-announcement />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
