@component('mail::message')
# Your Appointment Was Updated

Appointment Details Has been updated

@if($appointment->status != 'rescheduled')
This Appointment Will take Time at : {{ $appointment->start_at }}
@endif
This Appointment Status is : {{ $appointment->status }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
