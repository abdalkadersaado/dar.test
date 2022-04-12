@component('mail::message')
# We are pleased to deal with Dar Al-Nuzum Company
<p>Your data has been successfully uploaded to the Dar Alnuzum website</p>
<p>We will check the data and contact you</p>

{{-- @component('mail::button', ['url' => ''])
Visit Our Site
@endcomponent --}}

Thanks<br>
{{ config('app.name') }}
@endcomponent
