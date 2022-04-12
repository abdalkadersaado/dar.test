@component('mail::message')

 <h3> The client {{ $data['name'] }}</h3>
 <p>transmitted his private documents through the Dar Alnuzum Website</p>
<h3> Company Name is : {{ $data['company_name'] }}</h3>
{{-- @component('mail::button', ['url' => ''])
Visit Our Site
@endcomponent --}}

Thanks<br>
{{ config('app.name') }}
@endcomponent
