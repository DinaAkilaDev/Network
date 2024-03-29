@extends('layouts.app')

@section('content')

<section>
    <div class="feature-photo">
        <figure><img src="{{ URL::to('images/resources/timeline-1.jpg')}}" alt=""></figure>
        <div class="add-btn">
            <span>1205 followers</span>
            <a href="#" title="" data-ripple="">Add Friend</a>
        </div>
        <form class="edit-phto">
            <i class="fa fa-camera-retro"></i>
            <label class="fileContainer">
                Edit Cover Photo
                <input type="file"/>
            </label>
        </form>
        <div class="container-fluid">
            <div class="row merged">
                <div class="col-lg-2 col-sm-3">
                    <div class="user-avatar">
                        <figure>
                            <img src="{{ URL::to('images/resources/user-avatar.jpg')}}" alt="">
                            <form class="edit-phto">
                                <i class="fa fa-camera-retro"></i>
                                <label class="fileContainer">
                                    Edit Display Photo
                                    <input type="file"/>
                                </label>
                            </form>
                        </figure>
                    </div>
                </div>
                <div class="col-lg-10 col-sm-9">
                    <div class="timeline-info">
                        <ul>
                            <li class="admin-name">
                                <h5>{{$user->name}}</h5>

                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- top area -->

<section>
    <div class="gap gray-bg">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row" id="page-contents">
                        <div class="col-lg-3">
                            <aside class="sidebar static">
                                <div class="widget">
                                    <h4 class="widget-title">Recent Activity</h4>
                                    <ul class="activitiez">
                                        <li>
                                            <div class="activity-meta">
                                                <i>10 hours Ago</i>
                                                <span><a title="" href="#">Commented on Video posted </a></span>
                                                <h6>by <a href="time-line.html">black demon.</a></h6>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="activity-meta">
                                                <i>30 Days Ago</i>
                                                <span><a title="" href="#">Posted your status. “Hello guys, how are you?”</a></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="activity-meta">
                                                <i>2 Years Ago</i>
                                                <span><a title="" href="#">Share a video on her timeline.</a></span>
                                                <h6>"<a href="#">you are so funny mr.been.</a>"</h6>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="widget stick-widget">
                                    <h4 class="widget-title">Edit info</h4>
                                    <ul class="naves">
                                        <li>
                                            <i class="ti-info-alt"></i>
                                            <a href="edit-profile-basic.html" title="">Basic info</a>
                                        </li>
                                        <li>
                                            <i class="ti-mouse-alt"></i>
                                            <a href="edit-work-eductation.html" title="">Education & Work</a>
                                        </li>
                                        <li>
                                            <i class="ti-heart"></i>
                                            <a href="edit-interest.html" title="">My interests</a>
                                        </li>
                                        <li>
                                            <i class="ti-settings"></i>
                                            <a href="edit-account-setting.html" title="">account setting</a>
                                        </li>
                                        <li>
                                            <i class="ti-lock"></i>
                                            <a href="edit-password.html" title="">change password</a>
                                        </li>
                                    </ul>
                                </div><!-- settings widget -->
                            </aside>
                        </div><!-- sidebar -->
                        <div class="col-lg-6">
                            <div class="central-meta">
                                <div class="editing-info">
                                    <h5 class="f-title"><i class="ti-lock"></i>Change Your data</h5>

                                    <form method="post" action="{{url('users/'. $user->id.'/update')}}">
                                        {{ csrf_field() }}
                                        {{ method_field('patch') }}
                                        <div class="form-group">
                                            <input type="text" name="name" value="{{ $user->name }}"  id="input" required="required"/>
                                            <label class="control-label" for="input">Name</label><i class="mtrl-select"></i>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email" value="{{ $user->email }}" required="required"/>
                                            <label class="control-label" for="input">Email</label><i class="mtrl-select"></i>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password"required="required"/>
                                            <label class="control-label" for="input"> password</label><i class="mtrl-select"></i>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password_confirmation" required="required"/>
                                            <label class="control-label" for="input">Confirm password</label><i class="mtrl-select"></i>
                                        </div>
                                        <div class="submit-btns">
                                            <button type="submit" class="mtr-btn"><span>Update</span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div><!-- centerl meta -->
                        <div class="col-lg-3">
                            <aside class="sidebar static">
                                <div class="widget">
                                    <div class="banner medium-opacity bluesh">
                                        <div style="background-image: url(images/resources/baner-widgetbg.jpg)" class="bg-image"></div>
                                        <div class="baner-top">
                                            <span><img src="{{ URL::to('images/book-icon.png')}}" alt=""></span>
                                            <i class="fa fa-ellipsis-h"></i>
                                        </div>
                                        <div class="banermeta">
                                            <p>
                                                create your own favourit page.
                                            </p>
                                            <span>like them all</span>
                                            <a href="#" title="" data-ripple="">start now!</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget stick-widget">
                                    <h4 class="widget-title">Who's follownig</h4>
                                    <ul class="followers">
                                        <li>
                                            <figure><img src="{{ URL::to('images/resources/friend-avatar2.jpg')}}" alt=""></figure>
                                            <div class="friend-meta">
                                                <h4><a href="time-line.html" title="">Kelly Bill</a></h4>
                                                <a href="#" title="" class="underline">Add Friend</a>
                                            </div>
                                        </li>
                                        <li>
                                            <figure><img src="{{ URL::to('images/resources/friend-avatar4.jpg')}}" alt=""></figure>
                                            <div class="friend-meta">
                                                <h4><a href="time-line.html" title="">Issabel</a></h4>
                                                <a href="#" title="" class="underline">Add Friend</a>
                                            </div>
                                        </li>
                                        <li>
                                            <figure><img src="{{ URL::to('images/resources/friend-avatar6.jpg')}}" alt=""></figure>
                                            <div class="friend-meta">
                                                <h4><a href="time-line.html" title="">Andrew</a></h4>
                                                <a href="#" title="" class="underline">Add Friend</a>
                                            </div>
                                        </li>
                                        <li>
                                            <figure><img src="{{ URL::to('images/resources/friend-avatar8.jpg')}}" alt=""></figure>
                                            <div class="friend-meta">
                                                <h4><a href="time-line.html" title="">Sophia</a></h4>
                                                <a href="#" title="" class="underline">Add Friend</a>
                                            </div>
                                        </li>
                                        <li>
                                            <figure><img src="{{ URL::to('images/resources/friend-avatar3.jpg')}}" alt=""></figure>
                                            <div class="friend-meta">
                                                <h4><a href="time-line.html" title="">Allen</a></h4>
                                                <a href="#" title="" class="underline">Add Friend</a>
                                            </div>
                                        </li>
                                    </ul>
                                </div><!-- who's following -->
                            </aside>
                        </div><!-- sidebar -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
