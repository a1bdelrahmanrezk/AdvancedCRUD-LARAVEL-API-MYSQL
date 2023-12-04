<?php

namespace Modules\Role\app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
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
                'name'=>'required|string|regex:/^[a-zA-Z0-9\s]*$/|unique:roles,name|min:2'
            ];
        }
        protected function onUpdate(){
            return [
                'name'=>'required|string|regex:/^[a-zA-Z0-9\s]*$/|unique:roles,name|min:2'
        ];
    }
    public function authorize(): bool
    {
        return true;
    }
}
