@extends('layouts.app')

@section('content')

    @include('includes.leftsidebar')
    <div class="col-lg-6">
        <div class="loadMore">
                <div class="central-meta item">
                    <div class="user-post">
                        <div class="friend-info">
                            <figure>
                                <img  src="{{asset('images/resources/friend-avatar10.jpg')}}" alt="">
                            </figure>

                            <div class="friend-name">
                                <ins>{{$post->user->name}}</ins>
                                <span>{{ $post->created_at }}</span>
                            </div>
                            <div class="description">

                                <p>
                                    {{$post->text}}
                                </p>
                            </div>
                            <div class="post-meta">
                                <img src="{{asset('images/resources/user-post.jpg')}}" alt="">
                                <div class="we-video-info">
                                    <ul>
                                        <li>
															<span class="comment" data-toggle="tooltip" title="Comments">
																<i class="fa fa-comments-o"></i>
																<ins>{{$comments->count()}}</ins>
															</span>
{{--                                        </li>--}}
{{--                                        @php--}}
{{--                                            $like_count=0;--}}
{{--                                            $dislike_count=0;--}}
{{--                                            $like_status='btn-secondary';--}}
{{--                                            $dislike_status='btn-secondary';--}}

{{--                                        if ($like->type_id ==1){--}}
{{--                                        $like_count++;--}}
{{--                                        }--}}
{{--                                        if ($like->type_id ==0){--}}
{{--                                        $dislike_count++;}--}}
{{--                                        if($like->type_id==1 && $like->user_id==\Illuminate\Support\Facades\Auth::user()->id){--}}
{{--                                            $like_status='btn-success';--}}
{{--                                        }--}}
{{--                                        if($like->type_id==0 && $like->user_id==\Illuminate\Support\Facades\Auth::user()->id){--}}
{{--                                            $dislike_status='btn-danger';--}}
{{--                                        }--}}
{{--                                            @endphp--}}
{{--                                        <li>--}}
{{--															<button data-postid="{{$post->id}}_l" data-like="{{$like_status}}" class="btn  {{$like_status}} like" data-toggle="tooltip" title="like">--}}
{{--																<i class="ti-heart"></i>--}}
{{--																<ins><span class="like_count">{{$like_count}}</span></ins>--}}
{{--															</button>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--															<button data-postid="{{$post->id}}_d"   class="btn  {{$dislike_status}} dislike" data-toggle="tooltip" title="dislike">--}}
{{--																<i class="ti-heart-broken"></i>--}}
{{--																<ins><span class="dislike_count">{{$dislike_count}}</span></ins>--}}
{{--															</button>--}}
{{--                                        </li>--}}

                                    </ul>
                                </div>

                            </div>
                        </div>
                        <div class="coment-area">
                            <ul class="we-comet">
                                @foreach($comments as $comment)
                                <li>

                                    <div class="comet-avatar">
                                        <img src="{{asset('images/resources/comet-1.jpg')}}" alt="">
                                    </div>
                                    <div class="we-comment">
                                        <div class="coment-head">
                                            <h5>{{$comment->user->name}}</h5>
                                            <span>{{$comment->created_at}}</span>
                                            <a class="we-reply" href="#" title="Reply"><i class="fa fa-reply"></i></a>
                                        </div>
                                        <p>{{$comment->text}}</p>
                                    </div>


                                </li>
                                @endforeach
                                <li class="post-comment">
                                    <div class="comet-avatar">
                                        <img src="{{asset('images/resources/comet-1.jpg')}}" alt="">
                                    </div>
                                    <div class="post-comt-box">
                                        <form method="post" action="{{route('createcomment')}}">
                                            @csrf
                                            <textarea placeholder="Post your comment" name="text"></textarea>
                                            <input type="hidden" name="post_id" value="{{$post->id}}">
                                            <button type="submit" class="btn btn-primary">Add Comment</button>
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>


        </div>
    </div><!-- centerl meta -->
    @include('includes.rightsidebar')
@endsection
