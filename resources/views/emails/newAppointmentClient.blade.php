@component('mail::message')
# Your Appointment Was Set

Your Appointment Is Confirmed

This Appointment Will take Time at : {{ $appointment->start_at }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
