<?php

namespace App\Http\Controllers\Admin\Market;

use Illuminate\Http\Request;
use App\Models\Content\Comment;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Content\CommentRequest;
use Carbon\Carbon;

class CommentController extends Controller
{
 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::where('commentable_type', 'App\Models\Market\Product')
            ->orderBy('seen', 'asc')
            ->orderBy('approved', 'asc')
            ->orderBy('answer', 'asc')
            ->orderBy('created_at', 'desc')
            ->paginate(15);
        return view('admin.market.comment.index', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {

        if( $comment->seen == 0){
            // update seen comment when comment showed with admin
            Comment::where('id', $comment->id)->update(['seen' => 1]);
        }


        return view('admin.market.comment.show', compact('comment'));
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
    public function update(CommentRequest $request, Comment $comment)
    {
        $inputs = $request->all();
        $inputs['responder_id'] = 1;
        $inputs['answer_date'] = Carbon::now();

        $comment->update($inputs);
        return to_route('admin.market.comment.index')
            ->with('alert-section-success', 'پاسخ نظر با شناسه ' . $comment['id'] . 'با موفقیت ثبت شد ');
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


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status(Comment $comment)
    {
        $comment->status = $comment->status == 0 ? 1 : 0;
        $result = $comment->save();

        if ($result) {
            if ($comment->status == 0) {
                return response()->json(['status' => true, 'checked' => false, 'id' => $comment->id]);
            } else {
                return response()->json(['status' => true, 'checked' => true, 'id' => $comment->id]);
            }
        } else {
            return response()->json(['status' => false]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function approved(Comment $comment)
    {
        $comment->approved = $comment->approved == 0 ? 1 : 0;
        $result = $comment->save();

        if ($result) {
            if ($comment->approved == 0) {
                return response()->json(['approved' => true, 'checked' => false, 'id' => $comment->id]);
            } else {
                return response()->json(['approved' => true, 'checked' => true, 'id' => $comment->id]);
            }
        } else {
            return response()->json(['approved' => false]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function answershow(Comment $comment)
    {
        $comment->answershow = $comment->answershow == 0 ? 1 : 0;
        $result = $comment->save();

        if ($result) {
            if ($comment->answershow == 0) {
                return response()->json(['answershow' => true, 'checked' => false, 'id' => $comment->id]);
            } else {
                return response()->json(['answershow' => true, 'checked' => true, 'id' => $comment->id]);
            }
        } else {
            return response()->json(['answershow' => false]);
        }
    }

}
