
  <div class="card-header">
    {{-- <div class=""> --}}
      <img src="{{ Gravatar::src('$discussion->author->email') }}" class="rounded-circle" width="23" alt="" srcset="">
      <span class="text-bold font-weight-bold">{{ $discussion->author->name }}</span>
    {{-- </div> --}}

    <div class="float-right">
      <a href="{{ route('discussions.show', $discussion->slug) }}" class="btn btn-success btn-sm ">View</a>
    </div>
  </div>
