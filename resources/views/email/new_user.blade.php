@component('mail::message')
# We are pleased to deal with Dar Al-Nazm Company
## We have created an account for you on the Dar Alnuzum website


{{-- @component('mail::button', ['url' => ''])
Visit Our Site
@endcomponent --}}

Thanks<br>
{{ config('app.name') }}
@endcomponent
