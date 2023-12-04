<?php

namespace Modules\Post\app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return $this->onCreate();
        // if(request()->hasFile('file') && request()->has('user_id')){
        //     return $this->onCreate();
        // }else if(request()->has('user_id')){
        //     return $this->onUpdate();
        // }else{
        //     return [
        //         'title'=>'required|string|regex:/^[a-zA-Z0-9\s]*$/|min:8|unique:posts,title',
        //         'content'=>'required|string|min:12',
        //         'user_id'=>'required|exists:users,id',
        //         'file'=>'required|file'
        //     ];
        // }
    }
    protected function onCreate(){
        return [
                'title'=>'required|string|regex:/^[a-zA-Z0-9\s]*$/|min:8|unique:posts,title',
                'content'=>'required|string|min:12',
                'user_id'=>'required|exists:users,id',
                'file'=>'required|file'
            ];
        }
    //     protected function onUpdate(){
    //         return [
    //             'title'=>'required|string|regex:/^[a-zA-Z0-9\s]*$/|min:8|unique:posts,title',
    //             'content'=>'required|string|min:12',
    //             'user_id'=>'exists:users,id',
    //             'file'=>'required|file'
    //     ];
    // }
    public function attributes(){ // customize attribute name
        return [
            'title'=>'Title Attribute',
        ];
    }
    public function messages(){
        return [
            'title.required'=> "Please fill the field & it\'s required",
        ];
    }
}
