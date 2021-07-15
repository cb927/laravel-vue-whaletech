@component('mail::message')
[FROM] {{$entry->name}} 様<{{$entry->email}}> <br>
[TO] {{ env('ENTRY_MAIL_TO')}}<br>
[TITLE] ENTRYフォーム（{{$entry->name}} 様）<br>
[BODY]<br>
お名前：{{$entry->name}} 様<br>
電話番号：{{$entry->phone}}<br>
メール：{{$entry->email}}<br>
履歴書：<a href="http://conts.jbms-tech.com{{$entry->fileLink}}">{{$entry->fileName}}</a><br>
<br>
メッセージ:<br>
{{$entry->email}}
@endcomponent