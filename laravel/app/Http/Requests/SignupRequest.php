<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class SignupRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'display_id' => ['required', 'alpha_num', 'unique:users,display_id'],
            'password' => ['required', Password::min(12)->letters()->numbers()],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'ユーザーネームが入力されていません',
            'display_id.required' => 'IDが入力されていません',
            'display_id.alpha_num' => 'IDは半角英数字で入力してください',
            'display_id.unique' => 'このIDは既に使われています',
            'password.required' => 'パスワードが入力されていません',
            'password.min' => 'パスワードは12文字以上で入力してください',
            'password.letters' => 'パスワードには英字を1文字以上含んでください',
            'password.numbers' => 'パスワードには数字を1文字以上含んでください',
        ];
    }
}
