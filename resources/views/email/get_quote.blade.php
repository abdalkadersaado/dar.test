
@component('mail::message')
# Mr. {{ $data['name'] }}
## We are pleased to deal with Dar Al-Nuzum Company
<p>We will contact you as soon as possible and create an account for you according to the email you sent in order to get our best services</p>
<p>Therefore, we hope that you will wait while we update you with an account on our platform</p>

@component('mail::button', ['url' => 'http://127.0.0.1:8000'])
Visit Our Site Dar Alnuzum
@endcomponent

Thanks<br>
{{ config('app.name') }}
@endcomponent
