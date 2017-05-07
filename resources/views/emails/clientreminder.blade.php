@component('mail::message')
# This is An automatic Reminder

Greetings {{ $appointment->client->firstname . ' ' . $appointment->client->lastname}} <br>
You have an appointment tomorrow starting at : {{ $appointment->start_at }}<br>
Location : {{ $appointment->showroom->city }}<br>
Thanks,<br>
{{ config('app.name') }}
@endcomponent
