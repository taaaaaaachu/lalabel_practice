<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ContactFormRequest;
use App\Mail\FormAdminMail;
use App\Mail\FormUserMail;
use App\Models\Form;

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
     * 確認ページ
     */
    public function confirm()
    {
        return view('form.confirm');
    }

    /**
     * メール送信
     */
    public function sendMail(ContactFormRequest $request)
    {
        // 
        $form_data = $request->validated();

        // submitボタンの値により分岐させる
        $submitBtnVal = $request->input('submitBtnVal');
        switch ($submitBtnVal) {
            case 'confirm':
                // 値を持たせた状態で確認画面へリダイレクト
                return to_route('form.confirm')->withInput();
                break;
            case 'back':
                // 値を持たせた状態で入力画面へリダイレクト
                return to_route('form')->withInput();
                break;
            case 'complete':
                // 送信先メールアドレス
                $email_admin = 'admin@example.com';
                $email_user = $form_data['email'];

                // 管理者宛メール
                Mail::to($email_admin)->send(new FormAdminMail($form_data));
                // ユーザー宛メール
                Mail::to($email_user)->send(new FormUserMail($form_data));

                // ログ
                Log::debug($form_data['name']. ' さまよりお問い合わせ');

                // 送信内容をデータベースへ保存する
                $form = new Form();
                $form->company   = $form_data['company'];
                $form->name      = $form_data['name'];
                $form->name_kana = $form_data['name_kana'];
                $form->phone     = $form_data['phone'];
                $form->email     = $form_data['email'];
                $form->body      = $form_data['body'];
                $form->save();

                // 
                return to_route('form.complete');
                break;
            default:
            // エラー
        }

    }


}