@extends('layouts.default')
@section('title', 'お問い合わせ確認')

@section('content')

<section>

{{-- ▼▼ フォーム --}}
<form action="{{ route('form.confirm') }}" method="POST">
  @csrf

  {{-- ▼ 会社名 --}}
  <div>
    <label for="company">会社名(必須)</label>
    {{ old('company') }}
    <input id="company" type="hidden" name="company" value="{{ old('company') }}">
  </div>

  {{-- ▼ お名前 --}}
  <div>
    <label for="name">お名前(必須)</label>
    {{ old('name') }}
    <input id="name" type="hidden" name="name" value="{{ old('name') }}">
  </div>

  {{-- ▼ フリガナ --}}
  <div>
    <label for=name_kana>フリガナ(必須)</label>
    {{ old('name_kana') }}
    <input id="name_kana" type="hidden" name="name_kana" value="{{ old('name_kana') }}">
  </div>

  {{-- ▼ 電話番号 --}}
  <div>
    <label for="phone">電話番号</label>
    {{ old('phone') }}
    <input id="phone" type="hidden" name="phone" value="{{ old('phone') }}">
  </div>

  {{-- ▼ メールアドレス --}}
  <div>
    <label for="email">メールアドレス(必須)</label>
    {{ old('email') }}
    <input id="email" type="hidden" name="email" value="{{ old('email') }}">
  </div>

  {{-- ▼ お問い合わせ内容 --}}
  <div>
    <label for="body">お問い合わせ内容(必須)</label>
    {{ old('body') }}
    <input id="body" type="hidden" name="body" value="{{ old('body') }}">
  </div>

  {{-- ▼ 戻る・送信ボタン --}}
  <div>
    <button type="submit" name="submitBtnVal" value="back">戻る</button>
    <button type="submit" name="submitBtnVal" value="complete">送信</button>
  </div>

</form>
{{-- ▲▲ フォーム --}}

</section>
@endsection