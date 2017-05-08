function SetStats(stats){
	$( "#pending-apps" ).text(stats.pending);
	$( "#resc-apps" ).text(stats.resc);
	$( "#done-apps" ).text(stats.done);
	$( "#total-agents" ).text(stats.agents);
}


$( "#showroom-select" ).change(function() {
	$.ajax({
	    url: url+'/com/getevents',
	    type: 'post',
	    dataType: 'json',
	    data: {
	        'showroom_id': $("#showroom-select").val()
	    },
	    success: function(data) {
	    	SetStats(data.stats)
	        $('#calendar').fullCalendar('removeEvents');
	        $("#calendar").fullCalendar('addEventSource', data.events);
	    }
	});
 });
 $(window).load(function() {
    var calendar = $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },

        eventClick: function(calEvent, jsEvent, view) {

        	if ( !$('#view-invoice').hasClass( "hidden" ) ) {
        		$('#view-invoice').addClass('hidden');
        	}
        	if ( !$('#create-invoice').hasClass( "hidden" ) ) {
        		$('#create-invoice').addClass('hidden');
        	}

            $('#client-name').text(calEvent.client.firstname +' '+ calEvent.client.lastname);
            $('#client-email').text(calEvent.client.email);
            $('#client-address').text(calEvent.client.address);
            $('#client-phone').text(calEvent.client.phone);
            $('#app-date').text(calEvent.start.format('YYYY-MM-DD HH:MM:SS'));
            $('#status option[value="' + calEvent.status + '"]').prop('selected', true);

            if(calEvent.status == 'done' && calEvent.invoice == null)
            {
            	var appid = calEvent.id;
            	var showid = calEvent.showroom_id;

            	var url = "/invoice/"+showid+"/"+appid+'/create';

            	$('#create-invoice').attr("href", url).removeClass('hidden');
            }
            if(calEvent.invoice != null)
            {
            	var appid = calEvent.id;
            	var showid = calEvent.showroom_id;

            	var url = "/invoice/"+showid+"/"+appid;
            	$('#view-invoice').attr("href", url).removeClass('hidden');
            }
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
                    	showAlert('success', 'Success','Updated Successfuly');
                        var UpdatedEvent = {
                            _id: evid,
                            id: data.event.id,
                            title: data.event.title,
                            client_id: data.event.client_id,
                            showroom_id: data.event.showroom_id,
                            status: $('#status').val(),
                            start: data.event.start_at,
                            end: data.event.end_at,
                            allDay: false,
                            notes: data.event.notes,
                            color: data.event.color,
                            client: data.event.client,
                        };
                        calendar.fullCalendar('removeEvents', evid);
                        calendar.fullCalendar('renderEvent', UpdatedEvent, false);
                    },
                    error: function () {
						showAlert('error', 'error','Something Went Wrong');
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