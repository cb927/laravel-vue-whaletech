@component('mail::message')
[FROM] {{$contact->com_name}} {{$contact->name}} 様<{{$contact->email}}> <br>
[TO]  {{env('CONTACT_MAIL_TO')}}<br>
[TITLE] お問い合わせフォーム（{{$contact->com_name}} {{$contact->name}}）<br>
[BODY]<br>
会社名：{{$contact->com_name}}<br>
お名前：{{$contact->name}} 様<br>
電話番号：{{$contact->phone}}<br>
メール：{{$contact->email}}<br>
<br>
お問い合わせ内容:<br>
{{$contact->message}}
@endcomponent