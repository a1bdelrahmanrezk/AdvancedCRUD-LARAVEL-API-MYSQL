<?php

namespace Modules\Comment\app\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Traits\ApiCrudTrait;
use Modules\Comment\app\Http\Requests\CommentRequest;
use Modules\Comment\app\Models\Comment;
use Modules\Comment\app\Resources\CommentResource;

class CommentController extends Controller
{
    use ApiCrudTrait;
    public function index()
    {
        return $this->indexCrud(Comment::class, CommentResource::class, []);
    }
    public function show($id)
    {
        return $this->showCrud(
            Comment::class,
            CommentResource::class,
            $id,
            ['post', 'user'],
        );
    }


    public function store(CommentRequest $request)
    {
        $createComment = Comment::create([
            'comment' => $request->comment,
            'user_id' => $request->user_id,
            'post_id' => $request->post_id,
        ]);
        if ($createComment) {
            return $this->storeOneRecord(CommentResource::make($createComment));
        }
        return $this->notFound();
    }
    public function update(CommentRequest $request, $id)
    {
        $isCommentExist = Comment::find($id);
        if ($isCommentExist) {
            $request->has('user_id') ?
                $isCommentExist->update([
                    'comment' => $request->comment,
                    'user_id' => $request->user_id,
                    'post_id' => $request->post_id,
                ]) : $isCommentExist->update([
                    'comment' => $request->comment,
                ]);
            return $this->updateOneRecord(CommentResource::make($isCommentExist));
        }
        return $this->notFound();
    }
    public function delete($id)
    {
        return $this->deleteCrudWithoutFile(Comment::class, $id);
    }
}
