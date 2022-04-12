@component('mail::message')

<p>There is a comment from the client {{ $data['name'] }}</p>
{{-- @component('mail::button', ['url' => ''])
Visit Our Site
@endcomponent --}}

Thanks<br>
{{ config('app.name') }}
@endcomponent
