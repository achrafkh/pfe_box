require('fullcalendar');

$(window).load(function() {

    var calendar = $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
        selectable: true,
        selectHelper: true,
        select: function(start, end, allDay = false) {

            document.getElementById("date-create").valueAsDate = new Date(start);
            $('#fc_create').click();

            $("#create-app").unbind('click').bind("click", function() {
                $.ajax({
                    url: '/op/setappointment',
                    type: 'post',
                    dataType: 'json',
                    data: $('#create-appointment').serialize(),
                    success: function(data) {
                        $("#create-appointment").trigger('reset');

                        console.log(data);

                        var NewEvent = {
                            id: data.event.id,
                            title: data.event.title,
                            client_id: data.event.client_id,
                            showroom_id: data.event.showroom_id,
                            start_time: data.event.start_at,
                            end_time: data.event.end_at,
                            allDay: false,
                            notes: data.event.notes,
                            color: '#1751c3',
                        };
                        calendar.fullCalendar('renderEvent', NewEvent, false);
                    },

                    error: function(errors) {
                        console.log(errors.responseText);
                    }
                });
                calendar.fullCalendar('unselect');

                $('#close-create').click();
                return false;
            });
        },

        eventResize:function( event, delta, revertFunc, jsEvent, ui, view ) { 
            
            
            var start = event.start.format('YYYY-MM-DD HH:MM:SS');
            var end = event.end.format('YYYY-MM-DD HH:MM:SS');
            var id = event.id;

                 $.ajax({
                     url: '/op/updateapptime',
                     type: 'post',
                     dataType: 'json',
                     data:{'id':id,'start':start,'end':end},
                     success: function(data) {
                         //
                     },
                 });
        },

        eventDrop: function(event,dayDelta,minuteDelta,allDay,revertFunc) {
          
                        var UpdatedEvent = {
                            _id: event._id,
                            id: event.id,
                            client_id: event.client_id,
                            title: event.title,
                            showroom_id: event.showroom_id,
                            start: event.start.format('YYYY-MM-DD HH:MM:SS'),
                            end: event.end.format('YYYY-MM-DD HH:MM:SS'),
                            allDay: false,
                            notes: event.notes,
                            color: '#1751c3',
                        };

                        console.log(UpdatedEvent);


                $.ajax({
                    url: '/op/updateappointment',
                    type: 'post',
                    dataType: 'json',
                    data: UpdatedEvent,
                    success: function(data) {
                        console.log(data)
                    },
                });

        },


        eventClick: function(calEvent, jsEvent, view) {

            var evid = calEvent._id;
            $('#title-update').val(calEvent.title);
            $('#notes-update').val(calEvent.notes);
            $('#id').val(calEvent.id);
            $('#start-time-update').val(timeNow(new Date(calEvent.start)));
            $('#end-time-update').val(timeNow(new Date(calEvent.end)));
            document.getElementById("date-update").valueAsDate = new Date(calEvent.start);

            $('#fc_edit').click();

            $("#edit-app").unbind('click').bind("click", function() {
                $.ajax({
                    url: '/op/updateappointment',
                    type: 'post',
                    dataType: 'json',
                    data: $('#edit-appointment').serialize(),
                    success: function(data) {
                        console.log(data);
                        $("#edit-appointment").trigger('reset');
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
                            color: '#1751c3',
                        };
                        calendar.fullCalendar('removeEvents', evid);
                        calendar.fullCalendar('renderEvent', UpdatedEvent, false);

                    }
                });
                $('#close-update').click();
            });
            calendar.fullCalendar('unselect');
        },

        editable: true,
        events: evs,
    });

    function timeNow(d) {
        h = (d.getHours() < 10 ? '0' : '') + d.getHours(),
            m = (d.getMinutes() < 10 ? '0' : '') + d.getMinutes();
        i = h + ':' + m;
        return i;
    }
});