@extends('layouts.main')

@section('content')

  @foreach ($discussions as $discussion)
    <div class="card mb-4">
      @include('partials.discussion-header')

      <div class="card-body">
          <strong>
            {{ $discussion->title }}
          </strong>
      </div>

    </div>
    @endforeach
          <div class="card-footer">
            {{-- {{ $posts->appends(['search' =>request()->query('search')])->links() }} --}}
            {{ $discussions->appends(['channel' => request()->query('channel')])->links() }}
          </div>

@endsection
