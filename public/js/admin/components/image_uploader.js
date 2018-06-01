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
/******/ 	__webpack_require__.p = "/";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 48);
/******/ })
/************************************************************************/
/******/ ({

/***/ 48:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(49);


/***/ }),

/***/ 49:
/***/ (function(module, exports) {

// IMAGE UPLOADER
$(function () {

    uplodImage = function uplodImage(e) {

        var settings = new settingsUploads();
        var prop = settings.getUrl($(e).data('upload-type'));

        var form = new FormData();
        var image = $(e)[0].files[0];
        form.append('image', image);

        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            url: prop.url,
            data: form,
            cache: false,
            contentType: false,
            processData: false,
            type: 'POST',
            beforeSend: function beforeSend() {
                $('#spinner').addClass('spinner-on');
            },
            error: function error(_error) {},
            success: function success(img) {
                if (img.url) {
                    $('#image_change').attr('src', prop.path + img.url);
                    $('#image_input_hidden').val(img.url);
                }
            },
            complete: function complete() {
                $('#spinner').removeClass('spinner-on');
            }
        });
    };
});

var settingsUploads = function settingsUploads() {

    this.getConfig = function () {
        return {
            'create_news': {
                url: '/admin/upload',
                path: '/uploads/images/news/'
            }
        };
    };

    this.getUrl = function (id) {
        return this.dict[id];
    };

    this.dict = this.getConfig();
};

/***/ })

/******/ });