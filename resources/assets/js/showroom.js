require('moment');
require('fullcalendar');

$(window).load(function() {
    var calendar = $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
        selectable: false,
        selectHelper: false,
        editable: false,
        events: evs,
    });
});