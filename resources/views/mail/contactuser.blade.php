@component('mail::message')
[FROM] ホエールテック株式会社<{{ env('CONTACT_MAIL_FROM')}}> <br>
[TO] {{$contact->com_name}} {{$contact->name}} 様<{{$contact->email}}><br>
[TITLE] ホエールテック株式会社：お問い合わせありがとうございます<br>
[BODY]<br>
{{$contact->com_name}}<br>
{{$contact->name}} 様<br>
<br>
お問い合わせありがとうございます。<br>
お問い合わせ内容を確認の上、担当者より折り返しご連絡致します。<br>
---<br>
会社名：{{$contact->com_name}}<br>
お名前：{{$contact->name}} 様<br>
電話番号：{{$contact->phone}}<br>
メール：{{$contact->email}}<br>
<br>
お問い合わせ内容:<br>
{{$contact->message}}<br>
---<br>
ホエールテック株式会社<br>
〒186-0002 東京都国立市東1-8-18 信和第一ビル2F<br>
TEL: 042-511-3444<br>
E-mail: info@whaletech.co.jp<br>
URL: https://www.whaletech.co.jp
@endcomponent