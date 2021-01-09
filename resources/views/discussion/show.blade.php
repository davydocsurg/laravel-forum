@extends('layouts.main')

@section('content')

    {{-- @foreach ($discussions as $discussion)
        --}}
        <div class="card">
            @include('partials.discussion-header')

            <div class="card-body">
                <h4 class="">{{ $discussion->title }}</h4>
                <hr>
                {!! $discussion->content !!}
            </div>
            <div class="card-footer">
                @if ($discussion->bestReply)
                    <div class="card bg-dark text-white">
                        <div class="card-header">
                            <strong>Best Reply</strong>
                            <div class="float-right">
                                <img src="{{ Gravatar::src('$discussion->bestReply->owner->email') }}"
                                    class="rounded-circle" width="23" alt="" srcset="">

                                <span class="text-bold font-weight-bold">{{ $discussion->bestReply->owner->name }}</span>

                            </div>
                        </div>

                        <div class="card-body">
                            {!! $discussion->bestReply->content !!}
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <h2 class="mt-5">Replies <i class="fas fa-reply"></i></h2>
        @foreach ($discussion->replies()->paginate(3) as $reply)
            <div class="card mb-5 mt-3">
                <div class="card-header">
                    <img src="{{ Gravatar::src($reply->owner->email) }}" class="rounded-circle" width="23" alt="" srcset="">
                    <span class="font-weight-bold">{{ $reply->owner->name }}</span>
                    <div class="float-right">
                        @auth
                            @if (auth()->user()->id === $discussion->user_id)

                                <form
                                    {{-- id="best-reply-form-form" --}}
                                    action="{{ route('discussions.best-reply', ['discussion' => $discussion->slug, 'reply' => $reply->id]) }}"
                                    method="POST"
                                    style="display: none;">
                                    {{-- @method('PUT') --}}
                                    @csrf
                                    <button class="btn btn-secondary btn-sm" type="submit"
                                    {{-- onclick="event.preventDefault();
                                    document.getElementById('best-reply-form-form').submit();" --}}
                                    >Mark as best Reply <i
                                            class="fas fa-reply"></i></button>
                                </form>
                            @endif
                        @endauth
                    </div>
                </div>

                <div class="card-body">
                    {!! $reply->content !!}
                </div>
            </div>

            {{-- <div class="media btn-reveal-trigger"><img class="img-fluid"
                    src="../assets/img/gallery/2.jpg" alt="" width="50" />
                <div class="media-body position-relative pl-3">
                    <h6 class="fs-0 mb-0"><a href="#!">{{ $reply->owner->name }}</a></h6>
                    <p>{!! $reply->content !!}</p>
                    <div class="media btn-reveal-trigger"><img class="img-fluid" src="../assets/img/gallery/3.jpg" alt=""
                            width="50" />
                        <div class="media-body position-relative pl-3">
                            <h6 class="fs-0 mb-0"><a href="#!">{{ $reply->owner->name }}</a></h6>
                            <p>{!! $reply->content !!}</p>
                        </div>
                    </div>
                </div>
            </div> --}}
        @endforeach
        <div class="card-footer">
            {{ $discussion->replies()->paginate(3)->links() }}
        </div>

        @auth
            <div class="card my-5 ">
                <div class="card-header bg-success text-white">
                    Add a Reply
                </div>

                <div class="card-body">
                    <form action="{{ route('replies.store', $discussion->slug) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="reply">Reply</label>
                            <textarea name="content" id="content" cols="5" rows="5" class="form-control"
                                placeholder="Write a reply..."></textarea>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-sm btn-success" type="submit">Add Reply</button>
                        </div>
                    </form>
                </div>


            </div>
        @else
            <div class="card my-5">
                <div class="card-header">Add a Reply</div>
                <div class="card-body">
                    <a href="{{ route('login') }}" class="btn btn-secondary">Sign to Add a Reply</a>
                </div>
            </div>

        @endauth
        {{--
    @endforeach --}}

@endsection
