<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ContactFormRequest;
use App\Mail\FormAdminMail;
use App\Mail\FormUserMail;

class FormController extends Controller
{
    /**
     * 入力ページ
     */
    public function index()
    {
        return view('form.index');
    }

    /**
     * 完了ページ
     */
    public function complete()
    {
        return view('form.complete');
    }

    /**
     * メール送信
     */
    public function sendMail(ContactFormRequest $request)
    {
        // 
        $form_data = $request->validated();

        // 送信先メールアドレス
        $email_admin = 'admin@example.com';
        $email_user = $form_data['email'];

        // 管理者宛メール
        Mail::to($email_admin)->send(new FormAdminMail($form_data));
        // ユーザー宛メール
        Mail::to($email_user)->send(new FormUserMail($form_data));

        // ログ
        Log::debug($form_data['name']. ' さまよりお問い合わせ');

        // 
        return to_route('form.complete');
    }


}