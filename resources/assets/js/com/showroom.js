$(window).load(function() {
    var calendar = $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },

        eventClick: function(calEvent, jsEvent, view) {

            

            $('#client-name').text(calEvent.client.firstname +' '+ calEvent.client.lastname);
            $('#client-email').text(calEvent.client.email);
            $('#client-address').text(calEvent.client.address);
            $('#client-phone').text(calEvent.client.phone);
            $('#app-date').text(calEvent.start.format('YYYY-MM-DD HH:MM:SS'));
            $('#status option[value="' + calEvent.status + '"]').prop('selected', true);
            var evid = calEvent._id;



            $('#show').click();

            $("#submit-status").unbind('click').bind("click", function() {

                var data = {
                    id: calEvent.id,
                    status:  $('#status').val(),
                };
                $.ajax({
                    url: '/com/updatestatus',
                    type: 'post',
                    dataType: 'json',
                    data: data,
                    success: function(data) {
                        var UpdatedEvent = {
                            _id: evid,
                            id: data.event.id,
                            title: data.event.title,
                            client_id: event.client_id,
                            showroom_id: event.showroom_id,
                            start: data.event.start_at,
                            end: data.event.end_at,
                            allDay: false,
                            notes: data.event.notes,
                            color: data.event.color,
                            client: data.event.client,
                        };
                        calendar.fullCalendar('removeEvents', evid);
                        calendar.fullCalendar('renderEvent', UpdatedEvent, false);
                    }
                });
                $('#close-update').click();
            });
            calendar.fullCalendar('unselect');
        },

        selectable: false,
        selectHelper: false,
        editable: false,
        events: evs,
    });
});