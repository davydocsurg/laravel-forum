@extends('layouts.main')

@section('content')

    <div class="card bg-warning">
        <div class="card-header">
          <b>Notifications</b>
          <i class="fas fa-bell text-white"></i>
        </div>

        <div class="card-body">

            <ul class="list-group list-group-flush">
                @foreach ($notifications as $notification)
                    <li class="list-group-item">
                      @if ($notification->type === 'App\Notifications\NewReplyAdded')
                        A new Reply was added to your discussion
                        <strong>{{ $notification->data['discussion']['title'] }}</strong>

                        <div class="float-right">
                          <a href="{{ route('discussions.show', $notification->data['discussion']['slug']) }}" class="btn btn-primary btn-sm">
                            View Reply
                          </a>
                        </div>
                      @endif

                      @if ($notification->type === 'App\Notifications\ReplyMarkedAsBest')
                        Your reply to the discussion <strong class="font-weight-bold">
                          <b>{{ $notification->data['discussion']['title'] }}</b></strong>
                        was marked as the best Reply.

                        <div class="float-right">
                          <a href="{{ route('discussions.show', $notification->data['discussion']['slug']) }}" class="btn btn-primary btn-sm">
                            View Reply
                          </a>
                        </div>
                      @endif
                    </li>
                @endforeach
            </ul>

        </div>
    </div>

@endsection
