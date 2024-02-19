<div class="container mt-custom ">

    @if (session('message'))
        <div class="alert alert-success mt-3">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="store" class="mt-4">
        @csrf

        <div class="mb-3">
            <label for="textAnnoncement" class="form-label">{{ __('ui.nomeAnnuncio') }}</label>
            <input wire:model.live="title" type="text" class="form-control @error('title') is-invalid @enderror"
                id="textAnnoncement">
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="images" class="form-label">{{ __('ui.inserisciFoto') }}</label>
            <input wire:model.live="temporary_images" multiple type="file"
                class="form-control @error('temporary_images.*') is-invalid @enderror">
            @error('temporary_images.*')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        @if (!empty($images))
            <div class="row mt-3">
                <div class="col-12">
                    <p>{{ __('ui.anteprimaFoto') }}</p>
                    <div class="row border border-4 border-Custom rounded shadow py-4">
                        @foreach ($images as $key => $image)
                            <div class="col my-3">
                                <div class="img-preview mx-auto shadow rounded"
                                    style="background-image: url({{ $image->temporaryUrl() }});">
                                    <button type="button" wire:click="removeImage({{ $key }})"
                                        class="btn btn-danger shadow d-block text-center mt-2 mx-auto">
                                        {{ __('ui.cancella') }}
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        <div class="mb-3">
            <label for="priceAnnoncement" class="form-label"> {{ __('ui.prezzo') }}</label>
            <input wire:model.live="price" type="number" class="form-control @error('price') is-invalid @enderror"
                id="priceAnnoncement">
            @error('price')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="descriptionAnnoncement" class="form-label">{{ __('ui.descrizione') }}</label>
            <input wire:model.live="description" type="text"
                class="form-control @error('description') is-invalid @enderror" id="descriptionAnnoncement">
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">{{ __('ui.selezioneCategoria') }}</label>
            <select wire:model.defer="category" id="category"
                class="form-select @error('category') is-invalid @enderror" aria-label="Default select example">
                <option disabled value="null">{{ __('ui.selezioneCategoria') }} </option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class=" pb-4 d-flex justify-content-center">
            <button type="submit" class="btn btn-info btnCustomInvia">{{ __('ui.submit') }}</button>
        </div>
    </form>
</div>
