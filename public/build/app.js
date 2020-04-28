(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["app"],{

/***/ "./assets/css/app.css":
/*!****************************!*\
  !*** ./assets/css/app.css ***!
  \****************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "./assets/css/form.css":
/*!*****************************!*\
  !*** ./assets/css/form.css ***!
  \*****************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "./assets/css/profile.css":
/*!********************************!*\
  !*** ./assets/css/profile.css ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "./assets/css/project.css":
/*!********************************!*\
  !*** ./assets/css/project.css ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "./assets/js/app.js":
/*!**************************!*\
  !*** ./assets/js/app.js ***!
  \**************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _css_app_css__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../css/app.css */ "./assets/css/app.css");
/* harmony import */ var _css_app_css__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_css_app_css__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _css_profile_css__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../css/profile.css */ "./assets/css/profile.css");
/* harmony import */ var _css_profile_css__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_css_profile_css__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _js_tools__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../js/tools */ "./assets/js/tools.js");
/* harmony import */ var _js_tools__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_js_tools__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _css_project_css__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../css/project.css */ "./assets/css/project.css");
/* harmony import */ var _css_project_css__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_css_project_css__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _css_form_css__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../css/form.css */ "./assets/css/form.css");
/* harmony import */ var _css_form_css__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_css_form_css__WEBPACK_IMPORTED_MODULE_4__);
/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */
// any CSS you import will output into a single css file (app.css in this case)






__webpack_require__(/*! @fortawesome/fontawesome-free/js/all.js */ "./node_modules/@fortawesome/fontawesome-free/js/all.js");

/***/ }),

/***/ "./assets/js/tools.js":
/*!****************************!*\
  !*** ./assets/js/tools.js ***!
  \****************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function($) {$(document).ready(function () {
  $(".up").each(function () {
    $(this).on("click", function () {
      $.ajax({
        url: $(this).data("url")
      });
      $(this).addClass('text-success');
      $(this).siblings(".upNB").first().text($(this).siblings(".upNB").first().text() - 1 + 2);
    });
  });
  $(".down").each(function () {
    $(this).on("click", function () {
      $.ajax({
        url: $(this).data("url")
      });
      $(this).addClass('text-danger');
      $(this).siblings(".downNB").first().text($(this).siblings(".downNB").first().text() - 1 + 2);
    });
  });
  $(".sub").each(function () {
    $(this).on("click", function () {
      $.ajax({
        url: $(this).data("url")
      });
      $(this).addClass('text-info');
    });
  });
  $(".unup").each(function () {
    $(this).on("click", function () {
      $.ajax({
        url: $(this).data("url")
      });
      $(this).removeClass('text-success');
      $(this).siblings(".upNB").first().text($(this).siblings(".upNB").first().text() - 1);
    });
  });
  $(".undown").each(function () {
    $(this).on("click", function () {
      $.ajax({
        url: $(this).data("url")
      });
      $(this).removeClass('text-danger');
      $(this).siblings(".downNB").first().text($(this).siblings(".downNB").first().text() - 1);
    });
  });
  $(".unsub").each(function () {
    $(this).on("click", function () {
      $.ajax({
        url: $(this).data("url")
      });
      $(this).removeClass('text-info');
    });
  });
});
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js")))

/***/ })

},[["./assets/js/app.js","runtime","vendors~app"]]]);

//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hc3NldHMvY3NzL2FwcC5jc3MiLCJ3ZWJwYWNrOi8vLy4vYXNzZXRzL2Nzcy9mb3JtLmNzcyIsIndlYnBhY2s6Ly8vLi9hc3NldHMvY3NzL3Byb2ZpbGUuY3NzIiwid2VicGFjazovLy8uL2Fzc2V0cy9jc3MvcHJvamVjdC5jc3MiLCJ3ZWJwYWNrOi8vLy4vYXNzZXRzL2pzL2FwcC5qcyIsIndlYnBhY2s6Ly8vLi9hc3NldHMvanMvdG9vbHMuanMiXSwibmFtZXMiOlsicmVxdWlyZSIsIiQiLCJkb2N1bWVudCIsInJlYWR5IiwiZWFjaCIsIm9uIiwiYWpheCIsInVybCIsImRhdGEiLCJhZGRDbGFzcyIsInNpYmxpbmdzIiwiZmlyc3QiLCJ0ZXh0Il0sIm1hcHBpbmdzIjoiOzs7Ozs7Ozs7QUFBQSx1Qzs7Ozs7Ozs7Ozs7QUNBQSx1Qzs7Ozs7Ozs7Ozs7QUNBQSx1Qzs7Ozs7Ozs7Ozs7QUNBQSx1Qzs7Ozs7Ozs7Ozs7O0FDQUE7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBOzs7Ozs7QUFPQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUFBLG1CQUFPLENBQUMsdUdBQUQsQ0FBUCxDOzs7Ozs7Ozs7OztBQ2RBQywwQ0FBQyxDQUFDQyxRQUFELENBQUQsQ0FBWUMsS0FBWixDQUFrQixZQUFZO0FBQzFCRixHQUFDLENBQUMsS0FBRCxDQUFELENBQVNHLElBQVQsQ0FBYyxZQUFZO0FBQ3RCSCxLQUFDLENBQUMsSUFBRCxDQUFELENBQVFJLEVBQVIsQ0FBVyxPQUFYLEVBQW9CLFlBQVk7QUFDNUJKLE9BQUMsQ0FBQ0ssSUFBRixDQUFPO0FBQ0hDLFdBQUcsRUFBRU4sQ0FBQyxDQUFDLElBQUQsQ0FBRCxDQUFRTyxJQUFSLENBQWEsS0FBYjtBQURGLE9BQVA7QUFHQVAsT0FBQyxDQUFDLElBQUQsQ0FBRCxDQUFRUSxRQUFSLENBQWlCLGNBQWpCO0FBQ0FSLE9BQUMsQ0FBQyxJQUFELENBQUQsQ0FBUVMsUUFBUixDQUFpQixPQUFqQixFQUEwQkMsS0FBMUIsR0FBa0NDLElBQWxDLENBQXdDWCxDQUFDLENBQUMsSUFBRCxDQUFELENBQVFTLFFBQVIsQ0FBaUIsT0FBakIsRUFBMEJDLEtBQTFCLEdBQWtDQyxJQUFsQyxFQUFELEdBQTZDLENBQTdDLEdBQWlELENBQXhGO0FBQ0gsS0FORDtBQU9ILEdBUkQ7QUFTQVgsR0FBQyxDQUFDLE9BQUQsQ0FBRCxDQUFXRyxJQUFYLENBQWdCLFlBQVk7QUFDeEJILEtBQUMsQ0FBQyxJQUFELENBQUQsQ0FBUUksRUFBUixDQUFXLE9BQVgsRUFBb0IsWUFBWTtBQUM1QkosT0FBQyxDQUFDSyxJQUFGLENBQU87QUFDSEMsV0FBRyxFQUFFTixDQUFDLENBQUMsSUFBRCxDQUFELENBQVFPLElBQVIsQ0FBYSxLQUFiO0FBREYsT0FBUDtBQUdBUCxPQUFDLENBQUMsSUFBRCxDQUFELENBQVFRLFFBQVIsQ0FBaUIsYUFBakI7QUFDQVIsT0FBQyxDQUFDLElBQUQsQ0FBRCxDQUFRUyxRQUFSLENBQWlCLFNBQWpCLEVBQTRCQyxLQUE1QixHQUFvQ0MsSUFBcEMsQ0FBMENYLENBQUMsQ0FBQyxJQUFELENBQUQsQ0FBUVMsUUFBUixDQUFpQixTQUFqQixFQUE0QkMsS0FBNUIsR0FBb0NDLElBQXBDLEVBQUQsR0FBK0MsQ0FBL0MsR0FBbUQsQ0FBNUY7QUFDSCxLQU5EO0FBT0gsR0FSRDtBQVNBWCxHQUFDLENBQUMsTUFBRCxDQUFELENBQVVHLElBQVYsQ0FBZSxZQUFZO0FBQ3ZCSCxLQUFDLENBQUMsSUFBRCxDQUFELENBQVFJLEVBQVIsQ0FBVyxPQUFYLEVBQW9CLFlBQVk7QUFDNUJKLE9BQUMsQ0FBQ0ssSUFBRixDQUFPO0FBQ0hDLFdBQUcsRUFBRU4sQ0FBQyxDQUFDLElBQUQsQ0FBRCxDQUFRTyxJQUFSLENBQWEsS0FBYjtBQURGLE9BQVA7QUFHQVAsT0FBQyxDQUFDLElBQUQsQ0FBRCxDQUFRUSxRQUFSLENBQWlCLFdBQWpCO0FBQ0gsS0FMRDtBQU1ILEdBUEQ7QUFRSCxDQTNCRCxFIiwiZmlsZSI6ImFwcC5qcyIsInNvdXJjZXNDb250ZW50IjpbIi8vIGV4dHJhY3RlZCBieSBtaW5pLWNzcy1leHRyYWN0LXBsdWdpbiIsIi8vIGV4dHJhY3RlZCBieSBtaW5pLWNzcy1leHRyYWN0LXBsdWdpbiIsIi8vIGV4dHJhY3RlZCBieSBtaW5pLWNzcy1leHRyYWN0LXBsdWdpbiIsIi8vIGV4dHJhY3RlZCBieSBtaW5pLWNzcy1leHRyYWN0LXBsdWdpbiIsIi8qXG4gKiBXZWxjb21lIHRvIHlvdXIgYXBwJ3MgbWFpbiBKYXZhU2NyaXB0IGZpbGUhXG4gKlxuICogV2UgcmVjb21tZW5kIGluY2x1ZGluZyB0aGUgYnVpbHQgdmVyc2lvbiBvZiB0aGlzIEphdmFTY3JpcHQgZmlsZVxuICogKGFuZCBpdHMgQ1NTIGZpbGUpIGluIHlvdXIgYmFzZSBsYXlvdXQgKGJhc2UuaHRtbC50d2lnKS5cbiAqL1xuXG4vLyBhbnkgQ1NTIHlvdSBpbXBvcnQgd2lsbCBvdXRwdXQgaW50byBhIHNpbmdsZSBjc3MgZmlsZSAoYXBwLmNzcyBpbiB0aGlzIGNhc2UpXG5pbXBvcnQgJy4uL2Nzcy9hcHAuY3NzJztcbmltcG9ydCAnLi4vY3NzL3Byb2ZpbGUuY3NzJztcbmltcG9ydCAnLi4vanMvdG9vbHMnXG5pbXBvcnQgJy4uL2Nzcy9wcm9qZWN0LmNzcyc7XG5pbXBvcnQgJy4uL2Nzcy9mb3JtLmNzcyc7XG5cbnJlcXVpcmUoJ0Bmb3J0YXdlc29tZS9mb250YXdlc29tZS1mcmVlL2pzL2FsbC5qcycpO1xuIiwiJChkb2N1bWVudCkucmVhZHkoZnVuY3Rpb24gKCkge1xuICAgICQoXCIudXBcIikuZWFjaChmdW5jdGlvbiAoKSB7XG4gICAgICAgICQodGhpcykub24oXCJjbGlja1wiLCBmdW5jdGlvbiAoKSB7XG4gICAgICAgICAgICAkLmFqYXgoe1xuICAgICAgICAgICAgICAgIHVybDogJCh0aGlzKS5kYXRhKFwidXJsXCIpXG4gICAgICAgICAgICB9KTtcbiAgICAgICAgICAgICQodGhpcykuYWRkQ2xhc3MoJ3RleHQtc3VjY2VzcycpO1xuICAgICAgICAgICAgJCh0aGlzKS5zaWJsaW5ncyhcIi51cE5CXCIpLmZpcnN0KCkudGV4dCgoJCh0aGlzKS5zaWJsaW5ncyhcIi51cE5CXCIpLmZpcnN0KCkudGV4dCgpKSAtIDEgKyAyKVxuICAgICAgICB9KVxuICAgIH0pXG4gICAgJChcIi5kb3duXCIpLmVhY2goZnVuY3Rpb24gKCkge1xuICAgICAgICAkKHRoaXMpLm9uKFwiY2xpY2tcIiwgZnVuY3Rpb24gKCkge1xuICAgICAgICAgICAgJC5hamF4KHtcbiAgICAgICAgICAgICAgICB1cmw6ICQodGhpcykuZGF0YShcInVybFwiKVxuICAgICAgICAgICAgfSk7XG4gICAgICAgICAgICAkKHRoaXMpLmFkZENsYXNzKCd0ZXh0LWRhbmdlcicpO1xuICAgICAgICAgICAgJCh0aGlzKS5zaWJsaW5ncyhcIi5kb3duTkJcIikuZmlyc3QoKS50ZXh0KCgkKHRoaXMpLnNpYmxpbmdzKFwiLmRvd25OQlwiKS5maXJzdCgpLnRleHQoKSkgLSAxICsgMilcbiAgICAgICAgfSlcbiAgICB9KVxuICAgICQoXCIuc3ViXCIpLmVhY2goZnVuY3Rpb24gKCkge1xuICAgICAgICAkKHRoaXMpLm9uKFwiY2xpY2tcIiwgZnVuY3Rpb24gKCkge1xuICAgICAgICAgICAgJC5hamF4KHtcbiAgICAgICAgICAgICAgICB1cmw6ICQodGhpcykuZGF0YShcInVybFwiKVxuICAgICAgICAgICAgfSk7XG4gICAgICAgICAgICAkKHRoaXMpLmFkZENsYXNzKCd0ZXh0LWluZm8nKTtcbiAgICAgICAgfSlcbiAgICB9KVxufSkiXSwic291cmNlUm9vdCI6IiJ9
