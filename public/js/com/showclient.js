/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// identity function for calling harmony imports with the correct context
/******/ 	__webpack_require__.i = function(value) { return value; };
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "./";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 133);
/******/ })
/************************************************************************/
/******/ ({

/***/ 119:
/***/ (function(module, exports) {

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
		eventClick: function eventClick(calEvent, jsEvent, view) {
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
					status: $('#status').val()
				};
				$.ajax({
					url: '/com/updatestatus',
					type: 'post',
					dataType: 'json',
					data: data,
					success: function success(data) {
						showAlert('success', 'Success', 'Updated Successfuly');
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
							client: data.event.client
						};
						$('#bt-spin').removeClass('fa fa-spinner fa-spin');
						calendar.fullCalendar('removeEvents', evid);
						calendar.fullCalendar('renderEvent', UpdatedEvent, false);
					},
					error: function error() {
						$('#bt-spin').removeClass('fa fa-spinner fa-spin');
						showAlert('error', 'error', 'Something Went Wrong');
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
		events: evs
	});
});

/***/ }),

/***/ 133:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(119);


/***/ })

/******/ });