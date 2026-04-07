<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'username' =>'required',
            'useremail' => 'required|email',
            'userpass'  => 'required|alpha_num|min:6',
            'userage' => 'required|numeric|between:18,25',
            'usercity' => 'required',
        ];
    }
    // public function messages(){
    //     return [
    //         "username.required" => ':attribute  is required!',   ///:attribute ye jo hai username le lega
    //         "useremail.required" => 'user Email is required!',
    //         "useremail.email" => 'Enter the correct email address',
    //         "userage.numeric" =>'user age is required',
    //         "user.min:18" => 'user age Should not less than 18 year old',
    //         "usercity.required" => 'User is required.',
    //     ];
    // }

    public function attributes(){
        return [
            'username' =>'User name',
            'useremail' => 'User Email',
            'userpass'  => 'User password',
            'userage' => 'User Age',
            'usercity' => 'User City',

        ];
    }

    protected function prepareForValidation():void{
        $this -> merge([
            // 'username' => strtoupper($this -> username),
            'username' => Str::slug($this -> username),
        ]);
    }

    protected $stopOnFirstFailure = true;    ///ye ek par me ek error dikhayega
}
