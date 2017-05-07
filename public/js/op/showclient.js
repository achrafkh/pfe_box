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
/******/ 	return __webpack_require__(__webpack_require__.s = 137);
/******/ })
/************************************************************************/
/******/ ({

/***/ 123:
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

    $('.clockpicker').clockpicker({
        donetext: 'Done'
    });

    var datepicker = jQuery('#datepicker-autoclose').datepicker({
        autoclose: true,
        todayHighlight: false,
        format: 'yyyy/mm/dd'
    });
    datepicker.datepicker('update', userdate);

    var modaldatepicker = jQuery('.thedatepicker').datepicker({
        autoclose: true,
        todayHighlight: false,
        format: 'yyyy/mm/dd'
    });

    var calendar = $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
        selectable: true,
        selectHelper: true,
        select: function select(start, end) {
            var allDay = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : false;

            modaldatepicker.datepicker('update', moment(start).format('YYYY-MM-DD'));
            $('#fc_create').click();
            $("#create-app").unbind('click').bind("click", function () {
                var form = $('#create-appointment');
                var myform = form.serializeArray();
                $("#create-app").attr("disabled", true);
                $("#create-appointment :input").prop("disabled", true);

                $('#bt-spin').addClass('fa fa-spinner fa-spin');
                $.ajax({
                    url: '/op/setappointment',
                    type: 'post',
                    dataType: 'json',
                    statusCode: {
                        422: function _(response) {
                            $("#create-appointment :input").prop("disabled", false);
                            $('#create-spinner').removeClass('fa fa-spinner fa-spin');
                            $("#bt-spin").attr("disabled", false);
                            $.each(response.responseJSON, function (key, value) {
                                var id = "#" + form.attr('id') + " p[name=" + key + "E]";
                                $(id).css('margin-top', '10px').text(value);
                            });
                        }
                    },
                    data: myform,

                    success: function success(data) {

                        showAlert('success', 'Success', 'Appointment Set Successfuly');
                        $("#create-appointment").trigger('reset');
                        var NewEvent = {
                            id: data.event.id,
                            title: data.event.title,
                            client_id: data.event.client_id,
                            showroom_id: data.event.showroom_id,
                            start: moment(data.event.start_at, ["MM-DD-YYYY", "YYYY-MM-DD"]),
                            end: moment(data.event.end_at, ["MM-DD-YYYY", "YYYY-MM-DD"]),
                            allDay: false,
                            notes: data.event.notes,
                            color: '#1751c3'
                        };
                        calendar.fullCalendar('renderEvent', NewEvent, false);
                        $('#bt-spin').removeClass('fa fa-spinner fa-spin');
                        $('#close-create').click();
                        $("#create-app").attr("disabled", false);
                        $("#create-appointment :input").prop("disabled", false);
                    },
                    error: function error(errors) {
                        showAlert('error', 'Error', 'Something Went Wrong! Please Verify Your input!');
                        $("#create-appointment :input").prop("disabled", false);
                        $('#bt-spin').removeClass('fa fa-spinner fa-spin');
                        $("#create-app").attr("disabled", false);
                    }
                });
                calendar.fullCalendar('unselect');
            });
        },
        eventResize: function eventResize(event, delta, revertFunc, jsEvent, ui, view) {
            $.ajax({
                url: '/op/updateapptime',
                type: 'post',
                dataType: 'json',
                data: {
                    'id': event.id,
                    'start': event.start.format('YYYY-MM-DD HH:MM:SS'),
                    'end': event.end.format('YYYY-MM-DD HH:MM:SS')
                },
                success: function success(data) {
                    showAlert('success', 'Success', 'Appointment Updated Successfuly');
                }
            });
        },
        eventDrop: function eventDrop(event, dayDelta, minuteDelta, allDay, revertFunc) {
            var start = event.start.format('YYYY-MM-DD HH:MM:SS');
            $.ajax({
                url: '/op/updateapptime',
                type: 'post',
                dataType: 'json',
                data: {
                    'id': event.id,
                    'start': start,
                    'end': event.end != null ? event.end.format('YYYY-MM-DD HH:MM:SS') : start
                },
                success: function success(data) {
                    var msg = 'Appointment "' + event.title + '" Updated Successfuly';
                    showAlert('success', 'Success', msg);
                }
            });
        },
        eventClick: function eventClick(calEvent, jsEvent, view) {

            $('#title-update').val(calEvent.title);
            $('#notes-update').val(calEvent.notes);
            $('#id').val(calEvent.id);
            $('#start-time-update').val(moment(calEvent.start).format('HH:MM'));
            $('#end-time-update').val(moment(calEvent.end).format('HH:MM'));

            modaldatepicker.datepicker('update', moment(calEvent.start).format('YYYY-MM-DD'));

            $('#fc_edit').click();
            $("#edit-app").unbind('click').bind("click", function () {
                var form = $('#edit-appointment').serialize();
                $("#edit-appointment :input").prop("disabled", true);
                $('#bt-spin2').addClass('fa fa-spinner fa-spin');
                $("#edit-app").attr("disabled", true);

                $.ajax({
                    url: '/op/updateappointment',
                    type: 'post',
                    dataType: 'json',
                    statusCode: {
                        422: function _(response) {
                            $("#edit-appointment :input").prop("disabled", false);
                            $('#bt-spin2').removeClass('fa fa-spinner fa-spin');
                            $("#edit-app").attr("disabled", false);
                            $.each(response.responseJSON, function (key, value) {
                                var id = "#" + form.attr('id') + " p[name=" + key + "E]";
                                $(id).css('margin-top', '10px').text(value);
                            });
                        }
                    },
                    data: form,
                    success: function success(data) {
                        showAlert('success', 'Success', 'Appointment Updated Successfuly');
                        $("#edit-appointment").trigger('reset');
                        var UpdatedEvent = {
                            _id: data.event.id,
                            id: data.event.id,
                            title: data.event.title,
                            client_id: data.event.client_id,
                            showroom_id: data.event.showroom_id,
                            start: moment(data.event.start_at, ["MM-DD-YYYY", "YYYY-MM-DD"]),
                            end: moment(data.event.end_at, ["MM-DD-YYYY", "YYYY-MM-DD"]),
                            allDay: false,
                            notes: data.event.notes,
                            color: '#1751c3'
                        };
                        calendar.fullCalendar('removeEvents', [data.event.id]);
                        calendar.fullCalendar('renderEvent', UpdatedEvent, false);
                        $('#bt-spin2').removeClass('fa fa-spinner fa-spin');
                        $('#close-update').click();
                        $("#edit-app").attr("disabled", false);
                        $("#edit-appointment :input").prop("disabled", false);
                    },
                    error: function error(errors) {
                        showAlert('error', 'Error', 'Something Went Wrong! Please Verify Your input!');
                        $("#edit-appointment :input").prop("disabled", false);
                        $('#bt-spin2').removeClass('fa fa-spinner fa-spin');
                    }
                });
            });
            calendar.fullCalendar('unselect');
        },
        editable: true,
        events: evs
    });
});

/***/ }),

/***/ 137:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(123);


/***/ })

/******/ });