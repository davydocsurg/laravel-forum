<?php

namespace App\Http\Controllers;

use App\Reply;
use App\Discussion;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\CreateDiscussionRequest;

class DiscussionsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only(['create', 'store']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('discussion.index')
            ->with('discussions', Discussion::filterByChannels()->paginate(3));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('discussion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateDiscussionRequest $request)
    {

        $slug = Str::slug($request->title, '-');

        auth()->user()->discussions()->create([
            'title' => $request->title,
            'content' => $request->content,
            // 'slug' => str_slug($request->title, '-'),
            'slug' => $slug,
            'channel_id' => $request->channel,
        ]);
        // Illuminate\Support\

        \session()->flash('success', 'Discussion created');

        return redirect()->route('discussions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Discussion $discussion)
    {
        // return view('discussion.show', [
        //     'discussion', $discussion
        // ]);
        return view('discussion.show')
            ->with('discussion', $discussion);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function reply(Discussion $discussion, Reply $reply)
    {
        $discussion->markAsBestReply($reply);

        \session()->flash('success', 'Marked as best Reply');

        return redirect()->back();
    }
}
