<x-layout>
    <div class="container-fluid bg-login-custom vh-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-lg-6 col-md-8 col-sm-10">
                <div class="cardCustomCreate p-4">
                    <h1 class="text-center display-2 mb-4Cutom">{{ __('ui.login') }}</h1>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="/login">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('ui.email') }}</label>
                            <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('ui.password') }}</label>
                            <div class="input-group">
                                <input name="password" type="password" class="form-control" id="password" required>
                                <span class="input-group-text spanEye" id="eyeicon" onclick="togglePassword()">
                                    <i class="fa-regular fa-eye"></i> 
                                </span>
                            </div>
                        </div>
                        
                        <div class="d-grid d-flex justify-content-center">
                            <button type="submit" class="btn btn-info btnCustomInvia">{{ __('ui.submit') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
