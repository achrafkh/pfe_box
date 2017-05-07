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
/******/ 	return __webpack_require__(__webpack_require__.s = 136);
/******/ })
/************************************************************************/
/******/ ({

/***/ 122:
/***/ (function(module, exports) {

$(document).ready(function () {

    var datepicker = jQuery('#datepicker-autoclose').datepicker({
        autoclose: true,
        todayHighlight: false,
        format: 'yyyy/mm/dd'
    });

    var table = $('#myTable').DataTable({
        columnDefs: [{
            "targets": 'no-sort',
            "orderable": false
        }],
        order: [[7, 'desc']],
        displayLength: 10,
        processing: true,
        serverSide: true,
        ajax: '/op/getclients',
        columns: [{ 'data': 'src', render: function render(data, type, full, meta) {
                if (data == 'fb') {
                    return '<i class="fa fa-facebook-official" aria-hidden="true"></i>';
                }
                return '';
            }
        }, { 'data': 'id', 'name': 'id' }, { 'data': 'name', 'name': 'name' }, { 'data': 'email', 'name': 'email' }, { 'data': 'phone', 'name': 'phone' }, { 'data': 'address', 'name': 'address' }, { 'data': 'city', 'name': 'city' }, { 'data': 'created_at', 'name': 'created_at' }, { 'data': 'id', render: function render(data, type, full, meta) {
                return '<a href="/op/client/' + data + '" class="btn btn-info waves-effect waves-light m-t-10">View</a>';
            }
        }]
    });
    function addRow(data) {
        var link = '<a href="/op/client/' + data.id + '" class="btn btn-info waves-effect waves-light m-t-10">View</a>';

        var rowNode = table.row.add({
            'name': data.firstname + ' ' + data.lastname,
            'email': data.email,
            'phone': data.phone,
            'address': data.address,
            'city': data.city,
            'created_at': data.created_at,
            'id': link
        }).draw(false).node();

        $(rowNode).addClass('newClient');
    }
    $('#newClient').wizard({

        onInit: function onInit() {

            $(this).parents(".myadmin-alert").fadeToggle(350);
            $('#validation').formValidation({
                framework: 'bootstrap',
                fields: {
                    firstname: {
                        validators: {
                            notEmpty: {
                                message: 'The First name is required'
                            },
                            stringLength: {
                                min: 3,
                                max: 30,
                                message: 'The First name must be more than 6 and less than 30 characters long'
                            },
                            regexp: {
                                regexp: /^([ \u00c0-\u01ffa-zA-Z'\-])+$/,
                                message: 'The First name can only consist of alphabetical, number, dot and underscore'
                            }
                        }
                    },
                    lastname: {
                        validators: {
                            notEmpty: {
                                message: 'The Last name is required'
                            },
                            stringLength: {
                                min: 3,
                                max: 30,
                                message: 'The Last name must be more than 6 and less than 30 characters long'
                            },
                            regexp: {
                                regexp: /^([ \u00c0-\u01ffa-zA-Z'\-])+$/,
                                message: 'The Last name can only consist of alphabetical, number, dot and underscore'
                            }
                        }
                    },
                    email: {
                        validators: {
                            notEmpty: {
                                message: 'The email address is required'
                            },
                            emailAddress: {
                                message: 'The input is not a valid email address'
                            }
                        }
                    },

                    phone: {
                        validators: {
                            digits: true,
                            notEmpty: {
                                message: 'The Phone Number is required'
                            },
                            stringLength: {
                                min: 8,
                                max: 15,
                                message: 'Use a valid phone Number'
                            }
                        }
                    },
                    birthdate: {
                        validators: {
                            notEmpty: {
                                message: 'BirthDate is required'
                            }
                        }
                    }
                }
            });
        },

        validator: function validator() {
            var fv = $('#validation').data('formValidation');
            var $this = $(this);
            // Validate the container
            fv.validateContainer($this);
            var isValidStep = fv.isValidContainer($this);
            if (isValidStep === false || isValidStep === null) {
                return false;
            }
            return true;
        },
        onFinish: function onFinish() {
            $('#close-create-client').click();
            $.ajax({
                url: '/op/client/create',
                type: 'post',
                dataType: 'json',
                data: $("#validation").serialize(),
                success: function success(response) {
                    addRow(response.data);
                    showAlert('success', 'Success', 'Client Added Successfuly');
                },
                error: function error(response) {
                    //Error message
                    showAlert('error', 'Error', 'OOps Something Went Wrong');

                    $('#close-create-client').click();
                }
            });

            $("#validation").trigger('reset');
            $(".wizard-back").click();
            $(".wizard-back").click();
            $("#newClient > ul > li:nth-child(2)").removeClass().removeClass('current').addClass('disabled');
            $('li.active').addClass('current');
            $("#validation").data('formValidation').resetForm();
        }

    });
});

/***/ }),

/***/ 136:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(122);


/***/ })

/******/ });