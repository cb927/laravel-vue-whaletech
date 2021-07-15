@extends('layouts.app')

@section('meta_title')
採用情報
@endsection

@section('content')
<recruit></recruit>

<section class="entry container">
    <div class="section__title">ENTRY</div>
    <div class="section__subtitle">応募</div>
    <form action="{{route('recruit.post')}}" class="entry__form" method="post" enctype="multipart/form-data">
        @csrf
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
            <p class="form__label">履歴書（PDF）<span class="badge">必須</span></p>
            <input type="file" name="file" class="form__input-file" required>
        </div>
        <div class="form__group">
            <p class="form__label">メッセージ<span class="badge">必須</span></p>
            <textarea class="form__input textarea" name="message" rows="10" required></textarea>
        </div>
        <div class="form__group submit">
            <button class="form__submit">応募</button>
        </div>
    </form>
</section>
@endsection