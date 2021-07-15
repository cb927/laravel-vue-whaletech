@extends('layouts.app')

@section('meta_title')
お問い合わせ
@endsection

@section('content')
<a href="/recruit" class="fixed-link">採用情報</a>
<banner title="CONTACT" subtitle="お問い合わせ"></banner>
<breadcrumb container="container-800" name="お問い合わせ"></breadcrumb>

<section class="contact-form container-800">
    <div class="title-underline">お問い合わせ</div>
    <p class="contact__detail">
        当社へのお問い合わせは、こちらのフォームよりお問い合わせください。<br>
        お問い合わせ内容を確認のうえ、担当者より折り返しご連絡致します。
    </p>
    <form action="{{route('contact.post')}}" class="contact__form" method="post">
        @csrf
        <div class="form__group">
            <p class="form__label">会社名<span class="badge">必須</span></p>
            <input type="text" name="com_name" class="form__input" required>
        </div>
        <div class="form__group">
            <p class="form__label">お名前<span class="badge">必須</span></p>
            <input type="text" name="name" class="form__input" required>
        </div>
        <div class="form__group">
            <p class="form__label">電話番号<span class="badge">必須</span></p>
            <input type="text" name="phone" class="form__input" required>
        </div>
        <div class="form__group">
            <p class="form__label">メールアドレス<span class="badge">必須</span></p>
            <input type="email" name="email" class="form__input" required>
        </div>
        <div class="form__group">
            <p class="form__label">お問合せ内容<span class="badge">必須</span></p>
            <textarea class="form__input textarea" name="message" rows="10" required></textarea>
        </div>
        <div class="form__group submit">
            <button class="form__submit">送信</button>
        </div>
    </form>
</section>

<contact-section></contact-section>
@endsection