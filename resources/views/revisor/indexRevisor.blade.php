<x-layout>
    
    <div class="container mt-custom vh-100 ">
        <div class="row">
            <div class="col-12">
                
                <h1 class="mt-custom display-1 text-center">Diventa un revisore!</h1>
                <div class=" d-flex justify-content-center text-center">
                    <form action="{{ route('becomeRevisor') }}" method="POST">
                        @csrf
                        <div class="form-floating  justify-content-center">
                            <textarea name="mexRevisor" id="mexRevisor" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="width: 500px; height: 309px;"></textarea>
                            <label for="mexRevisor" >Perchè vuoi diventare revisore</label>
                        </div>
                        <div class=" d-flex justify-content-center mt-4">
                            {{-- <a href="{{ route('becomeRevisor') }}" class=" btn btn-danger text-center">Diventa revisore</a> --}}
                            <button type="submit" class=" btn btn-danger text-center">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</x-layout>