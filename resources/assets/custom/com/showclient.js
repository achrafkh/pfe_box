if (donut[0].value || donut[1].value || donut[2].value) {
	$('#pending').text(donut[2].value);
	$('#resc').text(donut[1].value);
	$('#done').text(donut[0].value);
	Morris.Donut({
		element: 'morris-donut-chart',
		data: donut,
		resize: true,
		colors: ['#99d683', '#FB9678', '#6164c1']
	});
} else {
	$('#morris-donut-chart').html('<h1 style="margin-top:40%;">Not enough data to Render The Chart</h1>').addClass('text-center');
}
$(window).load(function () {
	$("#city_id").val('{{ $client->city }}');
	if (errors.length > 0) {
		$('.nav li').removeClass('active');
		$('#cont div').removeClass('active');
		$('#edit-tab').addClass('active');
		$('#edit').addClass('active');
	}
	var calendar = $('#calendar').fullCalendar({
		header: {
			left: 'prev,next today',
			center: 'title',
			right: 'month,agendaWeek,agendaDay'
		},
		eventClick: function (calEvent, jsEvent, view) {
			var evid = calEvent._id;
			if (!$('#view-invoice').hasClass("hidden")) {
				$('#view-invoice').addClass('hidden');
			}
			if (!$('#create-invoice').hasClass("hidden")) {
				$('#create-invoice').addClass('hidden');
			}
			$('#name').text(calEvent.client.firstname + ' ' + calEvent.client.lastname);
			$('#email').text(calEvent.client.email);
			$('#birthdate').text(calEvent.client.birthdate);
			$('#phone').text(calEvent.client.phone);
			$('#showroom').text(calEvent.showroom);
			$('#date').text(calEvent.start.format('YYYY-MM-DD HH:MM:SS'));
			$('#status option[value="' + calEvent.status + '"]').prop('selected', true);
			if (calEvent.status == 'done' && calEvent.invoice == null) {
				var appid = calEvent.id;
				var showid = calEvent.showroom_id;
				var url = "/invoice/" + showid + "/" + appid + '/create';
				$('#create-invoice').attr("href", url).removeClass('hidden');
			}
			if (calEvent.invoice != null) {
				var appid = calEvent.id;
				var showid = calEvent.showroom_id;
				var url = "/invoice/" + showid + "/" + appid;
				$('#view-invoice').attr("href", url).removeClass('hidden');
			}
			$('#fc_edit').click();
			$("#save-status").unbind('click').bind("click", function () {
				$('#bt-spin').addClass('fa fa-spinner fa-spin');
				var data = {
					id: calEvent.id,
					status: $('#status').val(),
				};
				$.ajax({
					url: '/com/updatestatus',
					type: 'post',
					dataType: 'json',
					data: data,
					success: function (data) {
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
						$('#bt-spin').removeClass('fa fa-spinner fa-spin');
						calendar.fullCalendar('removeEvents', evid);
						calendar.fullCalendar('renderEvent', UpdatedEvent, false);
					},
					error: function () {
						$('#bt-spin').removeClass('fa fa-spinner fa-spin');
						showAlert('error', 'error','Something Went Wrong');
					}
				});
				$('#close-update').click();
			});
			$("#close-update").unbind('click').bind("click", function () {
				calendar.fullCalendar('unselect');
			});
			calendar.fullCalendar('unselect');
		},
		editable: true,
		events: evs,
	});
});