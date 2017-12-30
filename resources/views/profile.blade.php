@extends('layouts.app')
@section('title')
    {{ ucfirst(Auth::user()->name)}}
    @endsection
@section('content')
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Welcome <b>{{strtoupper(Auth::user()->name)}}</b>. This is your personal page</div>

                    <div class="panel-body">
                       @include('layouts.status')
                       @include('layouts.errors')

                        <form method="post" id="messageform" action="#">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <textarea name="message" id="message_box" class="form-control" rows="7" style="resize: none;" placeholder="What's on your mind?">{{old('post')}}</textarea>
                            </div>

                            <button class="btn btn-primary pull-right" type="submit">Post</button>
                        </form>
                    </div>
                </div>


<div class="post-content">
                @foreach($posts->all() as $post)
                <div class="panel panel-success">
                    <div class="panel-body">
                     <img src="" class=" pull-left img-responsive img-rounded" alt="">  {{$post->message}} <small class="pull-right">{{$post->created_at}}</small>
                    </div>
                </div>
                    @endforeach
</div>
            </div>
        </div>
        <script>

            $(function(){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $('#messageform').submit(function(e){
                    e.preventDefault();
                    var message =  $('#message_box').val();
                    $.ajax({
                        type:'POST',
                        url:'/send-post',
                        data: {message :message},
                        success: function(data){
                            $('.post-content').append("<div class='panel panel-success'>\
                      <div class='panel-body'><img src='' class=' pull-left img-responsive img-rounded' alt=''>" +
                                             data.message
                                    + " <small class='pull-right'>" +
                                    data.created_at
                                    + "</small></div></div>")
                        }

                    })
                    $('#message_box').val('');
                })
            })


        </script>
        <script>


        </script>
@endsection
