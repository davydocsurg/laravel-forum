@extends('layouts.app')

@section('content')

  @foreach ($discussions as $discussion)
    <div class="card">
      @include('partials.discussion-header')

      <div class="card-body">
          <strong>
            {{ $discussion->title }}
          </strong>
      </div>

      <div class="card-footer">
        {{-- {{ $posts->appends(['search' =>request()->query('search')])->links() }} --}}
        {{ $discussions->links() }}
      </div>
    </div>
  @endforeach

@endsection
