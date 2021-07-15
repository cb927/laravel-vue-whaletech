@component('mail::message')
[FROM] ホエールテック株式会社<{{env('ENTRY_MAIL_FROM')}}> <br>
[TO] {{$entry->name}} 様<{{$entry->email}}><br>
[TITLE] ホエールテック株式会社：ご応募ありがとうございます<br>
[BODY]<br>
{{$entry->name}} 様<br>
<br>
この度は、当社エントリーフォームより、ご応募いただきまして、誠にありがとうございます。<br>
エントリー内容を確認の上、採用担当者より折り返しご連絡致します。<br>
---<br>
お名前：{{$entry->name}} 様<br>
電話番号：{{$entry->phone}}<br>
メール：{{$entry->email}}<br>
履歴書：<a href="http://conts.jbms-tech.com{{$entry->fileLink}}">{{$entry->fileName}}</a><br>
<br>
メッセージ:<br>
{{$entry->message}}<br>
---<br>
ホエールテック株式会社<br>
〒186-0002 東京都国立市東1-8-18 信和第一ビル2F<br>
TEL: 042-511-3444<br>
E-mail: recruit@whaletech.co.jp<br>
URL: https://www.whaletech.co.jp
@endcomponent