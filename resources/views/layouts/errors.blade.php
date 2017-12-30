@if(count($errors) > 0)
    <ul class="alert alert-danger">
        <h5>Error(s) occurred</h5>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
    </ul>
    @endif