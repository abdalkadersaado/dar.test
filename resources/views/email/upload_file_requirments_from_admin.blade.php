@component('mail::message')

<p>The requirements file has been uploaded, please review your profile and then fill in the file and upload it within the requirements form</p>

{{-- @component('mail::button', ['url' => ''])
Visit Our Site
@endcomponent --}}

Thanks<br>
{{ config('app.name') }}
@endcomponent
