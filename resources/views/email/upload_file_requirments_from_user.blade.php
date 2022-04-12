@component('mail::message')

<p>The requirements file has been uploaded from the client ***{{ $data['name'] }} </p>
{{-- @component('mail::button', ['url' => ''])
Visit Our Site
@endcomponent --}}

Thanks<br>
{{ config('app.name') }}
@endcomponent
