<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'username' => 'required|min:2|max:12',
            'email' => 'required|email|min:5|max:40|unique:users,email,' . Auth::id(),
            'password' => 'nullable|alpha_num|min:8|max:20|confirmed',
            'bio' => 'nullable|string|max:150',
            'icon_image' => 'nullable|image|mimes:jpeg, png, bmp, gif, svg'
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'ユーザー名を入力してください',
            'username.min' => 'ユーザー名は2文字以上で入力してください',
            'username.max' => 'ユーザー名は12文字以内で入力してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => '有効なメールアドレスを入力してください',
            'email.unique' => 'このメールアドレスはすでに使用されています',
            'password.alpha_num' => 'パスワードは英数字のみ使用できます',
            'password.min' => 'パスワードは8文字以上で入力してください',
            'password.max' => 'パスワードは20文字以内で入力してください',
            'password.confirmed' => 'パスワードが一致しません',
            'bio.max' => '自己紹介は150文字以内で入力してください',
            'icon_image.image' => 'アイコン画像は画像ファイルを選択してください',
            'icon_image.mimes' => 'アイコン画像はJPEG, PNG, BMP, GIF, SVG のいずれかの形式でアップロードしてください',
        ];
    }
}
