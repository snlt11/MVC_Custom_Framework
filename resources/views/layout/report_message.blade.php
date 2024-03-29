@if(isset($errors))
    @foreach($errors as $error)
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>{{$error}}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endforeach
@endif

@if(isset($success))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{$success}}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

