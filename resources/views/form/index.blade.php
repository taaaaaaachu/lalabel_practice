@extends('layouts.default')
@section('title', 'お問い合わせ')

@section('content')

<section>

{{-- ▼▼ エラーメッセージ　--}}
@if($errors->any())
<div>
  <ul>
    @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif
{{-- ▲▲ エラーメッセージ　--}}

{{-- ▼▼ フォーム --}}
<form action="{{ route('form.confirm') }}" method="POST">
  @csrf

  {{-- ▼ 会社名 --}}
  <div>
    <label for="company">会社名(必須)</label>
    <input id="company" type="text" name="company" value="{{ old('company') }}">
    @if($errors->has('company'))
    <p>{{ $errors->first('company') }}</p>
    @endif
  </div>

  {{-- ▼ お名前 --}}
  <div>
    <label for="name">お名前(必須)</label>
    <input id="name" type="text" name="name" value="{{ old('name') }}">
    @if($errors->has('name'))
    <p>{{ $errors->first('name') }}</p>
    @endif
  </div>

  {{-- ▼ フリガナ --}}
  <div>
    <label for=name_kana>フリガナ(必須)</label>
    <input id="name_kana" type="text" name="name_kana" value="{{ old('name_kana') }}">
    @error('name_kana')
    <p>{{ $message }}</p>
    @enderror
  </div>

  {{-- ▼ 電話番号 --}}
  <div>
    <label for="phone">電話番号</label>
    <input id="phone" type="text" name="phone" value="{{ old('phone') }}">
    @error('phone')
    <p>{{ $message }}</p>
    @enderror
  </div>

  {{-- ▼ メールアドレス --}}
  <div>
    <label for="email">メールアドレス(必須)</label>
    <input id="email" type="email" name="email" value="{{ old('email') }}">
    @if($errors->has('email'))
    <p>{{ $errors->first('email') }}</p>
    @endif
  </div>

  {{-- ▼ お問い合わせ内容 --}}
  <div>
    <label for="body">お問い合わせ内容(必須)</label>
    <textarea id="body" type="text" name="body">{{ old('body') }}</textarea>
    @if($errors->has('body'))
    <p>{{ $errors->first('body') }}</p>
    @endif
  </div>

  {{-- ▼ 送信ボタン --}}
  <div>
    <button type="submit" name="submitBtnVal" value="confirm">確認画面へ</button>
  </div>

</form>
{{-- ▲▲ フォーム --}}

</section>
@endsection