require('moment');
require('fullcalendar');

$(window).load(function() {

    var date = new Date();
    var d = date.getDate();
    var m = date.getMonth();
    var y = date.getFullYear();

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
                            appid: data.event.id,
                            title: data.event.title,
                            start: data.event.start_at,
                            end: data.event.end_at,
                            allDay: false,
                            notes: data.event.notes,
                            color: '#1751c3',
                        }
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


        eventClick: function(calEvent, jsEvent, view) {

            var evid = calEvent._id;
            $('#title-update').val(calEvent.title);
            $('#notes-update').val(calEvent.notes);
            $('#appid').val(calEvent.appid);
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
                        console.log(data)
                        $("#edit-appointment").trigger('reset');
                        var UpdatedEvent = {
                            _id: evid,
                            appid: data.event.id,
                            title: data.event.title,
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