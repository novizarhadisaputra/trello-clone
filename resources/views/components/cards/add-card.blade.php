<div class="col-lg-4 offset-4">
    <div class="card">
        <div class="card-body">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Warning!</strong> {{ $error }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endforeach
            @endif

            <form action="{{ route('card.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="card" class="form-label">Card Title</label>
                    <input type="text" class="form-control" name="title" id="card" placeholder="Title....."
                        value="">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary float-end">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
