@component('mail::message')
# New Appointment

You Have A new Appointment With {{ ucfirst($client->firstname) .' '.  $client->lastname}}<br>
This Appointment Will take Time at : {{ $appointment->start_at }}<br>

@component('mail::button', ['url' => url('/')])
Check It
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
