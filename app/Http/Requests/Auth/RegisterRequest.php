<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'username' => 'required|min:2|max:12',
            'email' => 'required|email|min:5|max:40|unique:users',
            'password' => 'required|alpha_num|min:8|max:20|confirmed',
        ];
    }
    public function messages(): array
    {
        return [
            'username.required' => 'ユーザーネームは必須です',
            'username.min' => '２文字以上入力してください',
            'username.max' => '12文字以内で入力してください',
            'email.required' => 'メールは必須です',
            'email.min' => '５文字以上入力してください',
            'email.max' => '40文字以上で入力してください',
            'email.unique' => 'このメールアドレスはすでに使われています',
            'password.required' => 'パスワードは必須です',
            'password.alpha_num' => 'パスワードは英数字のみ使用できます。',
            'password.min' => 'パスワードは8文字以上で入力してください',
            'password.max' => 'パスワードは20文字以内で入力してください',
            'password.confirmed' => 'パスワードが一致しません',
        ];
    }
}
