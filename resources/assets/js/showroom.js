require('fullcalendar');

$(window).load(function() {
    var calendar = $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },

        eventClick: function(calEvent, jsEvent, view) {

            console.log(calEvent);

            $('#client-name').text(calEvent.client.firstname +' '+ calEvent.client.lastname);
            $('#client-email').text(calEvent.client.email);
            $('#client-address').text(calEvent.client.address);
            $('#client-phone').text(calEvent.client.phone);
            $('#app-date').text(calEvent.start.format('YYYY-MM-DD HH:MM:SS'));

            $('#show').click();
            calendar.fullCalendar('unselect');
        },

        selectable: false,
        selectHelper: false,
        editable: false,
        events: evs,
    });
});