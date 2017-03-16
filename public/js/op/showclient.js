/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId])
/******/ 			return installedModules[moduleId].exports;
/******/
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
/******/ 	return __webpack_require__(__webpack_require__.s = 121);
/******/ })
/************************************************************************/
/******/ ({

/***/ 112:
/***/ (function(module, exports) {

$(window).load(function () {

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


            document.getElementById("date-create").valueAsDate = new Date(start);
            $('#fc_create').click();

            $("#create-app").unbind('click').bind("click", function () {
                $.ajax({
                    url: '/op/setappointment',
                    type: 'post',
                    dataType: 'json',
                    data: $('#create-appointment').serialize(),
                    success: function success(data) {
                        $("#create-appointment").trigger('reset');

                        console.log(data);

                        var NewEvent = {
                            id: data.event.id,
                            title: data.event.title,
                            client_id: data.event.client_id,
                            showroom_id: data.event.showroom_id,
                            start: data.event.start_at,
                            end: data.event.end_at,
                            allDay: false,
                            notes: data.event.notes,
                            color: '#1751c3'
                        };
                        calendar.fullCalendar('renderEvent', NewEvent, false);
                    },

                    error: function error(errors) {
                        console.log(errors.responseText);
                    }
                });
                calendar.fullCalendar('unselect');

                $('#close-create').click();
                return false;
            });
        },

        eventResize: function eventResize(event, delta, revertFunc, jsEvent, ui, view) {

            var start = event.start.format('YYYY-MM-DD HH:MM:SS');
            var end = event.end.format('YYYY-MM-DD HH:MM:SS');
            var id = event.id;

            $.ajax({
                url: '/op/updateapptime',
                type: 'post',
                dataType: 'json',
                data: { 'id': id, 'start': start, 'end': end },
                success: function success(data) {
                    //
                }
            });
        },

        eventDrop: function eventDrop(event, dayDelta, minuteDelta, allDay, revertFunc) {

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
                color: '#1751c3'
            };

            console.log(UpdatedEvent);

            $.ajax({
                url: '/op/updateappointment',
                type: 'post',
                dataType: 'json',
                data: UpdatedEvent,
                success: function success(data) {
                    console.log(data);
                }
            });
        },

        eventClick: function eventClick(calEvent, jsEvent, view) {

            var evid = calEvent._id;
            $('#title-update').val(calEvent.title);
            $('#notes-update').val(calEvent.notes);
            $('#id').val(calEvent.id);
            $('#start-time-update').val(timeNow(new Date(calEvent.start)));
            $('#end-time-update').val(timeNow(new Date(calEvent.end)));
            document.getElementById("date-update").valueAsDate = new Date(calEvent.start);

            $('#fc_edit').click();

            $("#edit-app").unbind('click').bind("click", function () {
                $.ajax({
                    url: '/op/updateappointment',
                    type: 'post',
                    dataType: 'json',
                    data: $('#edit-appointment').serialize(),
                    success: function success(data) {
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
                            color: '#1751c3'
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
        events: evs
    });

    function timeNow(d) {
        h = (d.getHours() < 10 ? '0' : '') + d.getHours(), m = (d.getMinutes() < 10 ? '0' : '') + d.getMinutes();
        i = h + ':' + m;
        return i;
    }
});

/***/ }),

/***/ 121:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(112);


/***/ })

/******/ });