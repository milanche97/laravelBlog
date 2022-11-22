@extends ('layouts.master')

@section('title', $post->title)

@section('content')
      
        <div class="blog-post">
            <h2 class="blog-post-title">{{$post->title}}</h2>
            <p class="blog-post-meta">December 14, 2013 by <a href="#">Chris</a></p>

            <p> {{$post->body}}</p>
         </div><!-- /.blog-post -->
         <div>
         <h4>Leave a comment:</h4>
    <form method="POST" action="/posts/{{$post->id}}/comments">
         @csrf

        <div class="mb-3">
            <textarea name="body" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            @error('body')
            @include('partials.error')
            @enderror
        </div>
        <button type="submit">Send comment</button>
    </form>
         </div>

    <div>
    <h4>Comments</h4>
        <ul>
        @foreach ( $post ->comments as $comment)
            <li>
            {{ $comment->body }}
            </li>
        @endforeach
        </ul>
    </div>
@endsection