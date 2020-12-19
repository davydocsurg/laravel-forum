@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">{{ __('Create Discussion') }}
            <div class="float-right">
                {{-- <button class="btn btn-success">
                    <i class="fas fa-plus-square"></i> Discussion
                </button> --}}
            </div>
        </div>

        <div class="card-body">
          <form action="{{ route('discussions.store') }}" method="post">
            @csrf
            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" class="form-control" name="title" id="title" value="" placeholder="Enter Title...">
            </div>

            <div class="form-group">
              <label for="content">Content</label>
              <textarea name="content" id="content" cols="5" rows="5" class="form-control" placeholder="Enter Content..."></textarea>
            </div>

            <div class="form-group">
              <label for="channel">Channel</label>
              <select name="channel" id="channel" class="form-control">
                @foreach ($channels as $channel)
                  <option value="{{ $channel->id }}">{{ $channel->name }}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group">
              <button type="submit" class="btn btn-success">Create Discussion</button>
            </div>
          </form>
        </div>
    </div>

@endsection
