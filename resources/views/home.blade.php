@extends('layouts.app')

@section('content')
    @include('includes.leftsidebar')

    <div class="col-lg-6">
        <div class="central-meta">
            <div class="new-postbox">
                <figure>
                    <img src="images/resources/admin2.jpg" alt="">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </figure>
                <div class="newpst-input">
                    <form method="post" action="{{ route('createpost') }}">
                        @csrf
                        <textarea rows="2" name="text" placeholder="write something"></textarea>
                        <div class="attachments">
                            <ul>
                                <li>
                                    <i class="fa fa-music"></i>

                                </li>
                                <li>
                                    <i class="fa fa-image"></i>

                                </li>
                                <li>
                                    <i class="fa fa-video-camera"></i>

                                </li>
                                <li>
                                    <i class="fa fa-camera"></i>

                                </li>
                                <li>
                                    <button type="submit">Post</button>
                                </li>
                            </ul>
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- add post new box -->
        <div >
            @foreach($posts as $post)
            <div class="central-meta item">
                <div class="user-post">
                    <div class="friend-info">
                        <figure>
                            <img src="images/resources/friend-avatar10.jpg" alt="">
                        </figure>

                        <div class="friend-name">
                            <ins><a href="{{url('api/users/'.$post->user->id)}}" title=""> {{ $post->user->name }}</a></ins>
                            <span>{{ $post->created_at->toDayDateTimeString() }}</span>
                        </div>
                        <div class="post-meta">
                            <div class="description">

                                <a href="{{url('api/post/'.$post->id)}}">
                                    {{ $post->text }}
                                </a>
                            </div>
{{--                            <img src="images/resources/user-post.jpg" alt="">--}}


                        </div>
                    </div>

                </div>
            </div>
            @endforeach
                {{$posts->links()}}
        </div>
    </div><!-- centerl meta -->
    @include('includes.rightsidebar')
@endsection
