@component('mail::message')
# Introduction
Welcome {{$data['data']->first_name}}

The body of your message.

@component('mail::button', ['url' => url('reset/password/'.$data['token'])])
Check Here To Reset Password
@endcomponent
Or <br>
<a href="{{url('reset/password/'.$data['token'])}}">{{url('reset/password/'.$data['token'])}}</a>
Thanks,<br>
{{ config('app.name') }}
@endcomponent
