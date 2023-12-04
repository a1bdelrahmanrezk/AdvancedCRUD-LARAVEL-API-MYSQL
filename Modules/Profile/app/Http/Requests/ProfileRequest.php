<?php

namespace Modules\Profile\app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return request()->isMethod('put') || request()->isMethod('patch') ? $this->onUpdate() : $this->onCreate();
    }

    protected function onCreate(){
        return [
                'bio'=>'required|string|regex:/^[a-zA-Z0-9\s]*$/|min:8',
                'address'=>'required|string|regex:/^[a-zA-Z0-9\s,]*$/|min:5',
                'user_id'=>'required|exists:users,id',
            ];
        }
        protected function onUpdate(){
            return [
                'bio'=>'required|string|regex:/^[a-zA-Z0-9\s]*$/|min:8',
                'address'=>'required|string|regex:/^[a-zA-Z0-9\s,]*$/|min:5',
                'user_id'=>'',
        ];
    }
    public function authorize(): bool
    {
        return true;
    }
}
