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
/******/ 	return __webpack_require__(__webpack_require__.s = 120);
/******/ })
/************************************************************************/
/******/ ({

/***/ 111:
/***/ (function(module, exports) {

$(window).load(function () {
    var calendar = $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },

        eventClick: function eventClick(calEvent, jsEvent, view) {

            $('#client-name').text(calEvent.client.firstname + ' ' + calEvent.client.lastname);
            $('#client-email').text(calEvent.client.email);
            $('#client-address').text(calEvent.client.address);
            $('#client-phone').text(calEvent.client.phone);
            $('#app-date').text(calEvent.start.format('YYYY-MM-DD HH:MM:SS'));
            $('#status option[value="' + calEvent.status + '"]').prop('selected', true);
            var evid = calEvent._id;

            $('#show').click();

            $("#submit-status").unbind('click').bind("click", function () {

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
                            client: data.event.client
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
        events: evs
    });
});

/***/ }),

/***/ 120:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(111);


/***/ })

/******/ });