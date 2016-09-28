@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                    You are logged in as {{ $user->profile->getFullName() }}!
                    <a href="/createProfile">Create new profile</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Post</div>
                <div class="panel-body">
                    {!! Form::open(['url' => 'createPost', 'method' => 'post']) !!}
                        {{ Form::text('post',  '', ['class' => 'form-control', 'placeholder' => 'Post...', 'title' => 'Post']) }}<br>
                        <button type='submit'  class='btn btn-primary'>Post</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

    @foreach($profiles as $profile)
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ $profile->getFullName() }}
                </div>
                <div class="panel-body">
                    <small>
                        <a href="/set_active_profile/{{ $profile->id }}">Set as active profile</a>
                    </small>
                    <hr>
                    @foreach($profile->posts->sortByDesc('created_at') as $post)
                        <small>{{ $post->created_at  }}</small>
                        <p>{{ $post->content }}</p>

                        @foreach($post->comments->where('parent_id', '==', 0) as $comment)
                            <hr>
                            <small>{{ $comment->profile->getFullName() . ' - ' . $comment->created_at  }}</small>
                            <h6><b>{{ $comment->content }}</b></h6>


                            <small>Replies:</small>
                            <div class="row">
                                <div class="col-md-11 col-md-offset-1">
                                    @foreach($post->comments->where('parent_id', '==', $comment->id) as $reply)
                                        <small>{{ $reply->profile->getFullName() . ' - ' . $reply->created_at  }}</small>
                                        <h6><b>{{ $reply->content }}</b></h6>
                                    @endforeach

                                    {!! Form::open(['url' => 'createComment', 'method' => 'post']) !!}

                                    {{ Form::hidden('commentable_id', $post->id) }}
                                    {{ Form::hidden('parent_id', $comment->id) }}
                                    {{ Form::text('comment',  '', ['class' => 'form-control', 'placeholder' => 'Reply...', 'title' => 'Reply']) }}<br>

                                    <button type='submit'  class='btn btn-primary'>Reply</button>

                                    {!! Form::close() !!}
                                </div>
                            </div>
                        @endforeach

                        {!! Form::open(['url' => 'createComment', 'method' => 'post']) !!}

                        {{ Form::hidden('commentable_id', $post->id) }}
                        {{ Form::text('comment',  '', ['class' => 'form-control', 'placeholder' => 'Comment...', 'title' => 'Comment']) }}<br>

                        <button type='submit'  class='btn btn-primary'>Comment</button>

                        {!! Form::close() !!}
                    @endforeach
                    <hr>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
