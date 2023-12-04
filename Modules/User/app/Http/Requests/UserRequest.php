<?php

namespace Modules\User\app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return $this->onCreate();
        // return request()->hasFile('image') ? $this->onUpdate() : $this->onCreate();
    }
    protected function onCreate(){
        return [
            'name'=>'required|string|regex:/^[a-zA-Z0-9\s]*$/|min:8|unique:users,name',
            'email'=>'required|string|email|unique:users,email',
            ];
        }
    //     protected function onUpdate(){
    //         return [
    //             'name'=>'required|string|regex:/^[a-zA-Z0-9\s]*$/|min:8|unique:users,name',
    //             'email'=>'required|string|email|unique:users,email',
    //     ];
    // }
}
