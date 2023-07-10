<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * バリデーションルール
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        // 
        $rules = [
            'company' => ['required', 'string', 'max:30'],
            'name' => ['required', 'string', 'max:30'],
            'name_kana' => ['required', 'string', 'max:30', 'regex:/^[ァ-ロワンヴー]*$/u'],
            'phone' => ['nullable', 'regex:/^0(\d-?\d{4}|\d{2}-?\d{3}|\d{3}-?\d{2}|\d{4}-?\d|\d0-?\d{4})-?\d{4}$/'],
            'email' => ['required', 'email'],
            'body' => ['required', 'string', 'max:1000'],
        ];

        // 
        return $rules;
    }

    /**
     * 属性名
     * /lang/ja/validation.php で指定した内容を変更する場合に設定
     */
    public function attributes()
    {
        // 
        return [
            // 'company' => '会社・組織名',
            // 'name'      => '氏名',
            // 'name_kana' => 'フリガナ',
            // 'phone'     => '電話番号',
            // 'email'     => 'メールアドレス',
            // 'body' => 'お問い合わせ内容'
        ];
    }

    /**
     * エラーメッセージ
     */
    public function messages()
    {
        // 
        return [
            'name.required' => ':attributeは必須項目です。',
            'phone.regex' => ':attributeが正しくありません。'
        ];
    }
}