@component('mail::message')
# Welcome To {{ config('app.name') }}.

The {{ config('app.name') }} Community welcomes you
 and would like to inform you that we love
 that you have joined us.

@component('mail::button', ['url' => ''])
Verify Account
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
