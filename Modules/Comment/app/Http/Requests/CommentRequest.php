<?php

namespace Modules\Comment\app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        // request()->has('');
        // request()->input('');
        return request()->isMethod('put') || request()->isMethod('patch') ? $this->onUpdate() : $this->onCreate();
    }
    protected function onCreate(){
        return [
                'comment'=>'required|string|regex:/^[a-zA-Z0-9\s]*$/|min:8',
                'user_id'=>'required|exists:users,id',
                'post_id'=>'required|exists:posts,id',
            ];
        }
        protected function onUpdate(){
            return [
                'comment'=>'required|string|regex:/^[a-zA-Z0-9\s]*$/|min:8'
        ];
    }
}
