<?php

namespace Modules\Post\app\Http\Controllers;

use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Post\app\Http\Requests\PostRequest;
use Modules\Post\app\Models\Post;
use App\Http\Controllers\Controller;
use App\Traits\ApiCrudTrait;
use App\Traits\StoreFileTrait;
use Illuminate\Http\RedirectResponse;
use Modules\Post\app\Resources\PostResource;

class PostController extends Controller
{
    use ApiCrudTrait, StoreFileTrait;
    public function index()
    {
        return $this->indexCrud(Post::class, PostResource::class, []);
    }
    public function show($id)
    {
        return $this->showCrud(
            Post::class,
            PostResource::class,
            $id,
            ['comments', 'user']
        );
    }
    public function store(PostRequest $request)
    {
        $createPost = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => $request->user_id,
        ]);
        $request->hasFile('file') ?
            $this->storeFile($createPost, $request, 'post_files') :
            null;
        if ($createPost) {
            return $this->storeOneRecord(PostResource::make($createPost));
        }
        return $this->notFound();
    }
    public function update(Request $request, $id)
    {
        $isPostExist = Post::find($id);
        if ($isPostExist) {
            $request->user_id ?
                $isPostExist->update([
                    'title' => $request->title,
                    'content' => $request->content,
                    'user_id' => $request->user_id,
                ]) : $isPostExist->update([
                    'title' => $request->title,
                    'content' => $request->content,
                ]);
            $request->hasFile('file') ?
                $this->updateFile($isPostExist, $request, 'post_files') :
                null;
            return $this->updateOneRecord(PostResource::make($isPostExist));
        }
        return $this->notFound();
    }
    public function delete($id)
    {
        return $this->deleteCrudWithFile(Post::class,$id,'post_files');
    }
}
