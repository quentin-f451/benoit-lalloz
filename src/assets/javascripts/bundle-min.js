!function(n){var r={};function o(e){if(r[e])return r[e].exports;var t=r[e]={i:e,l:!1,exports:{}};return n[e].call(t.exports,t,t.exports,o),t.l=!0,t.exports}o.m=n,o.c=r,o.d=function(e,t,n){o.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:n})},o.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},o.t=function(t,e){if(1&e&&(t=o(t)),8&e)return t;if(4&e&&"object"==typeof t&&t&&t.__esModule)return t;var n=Object.create(null);if(o.r(n),Object.defineProperty(n,"default",{enumerable:!0,value:t}),2&e&&"string"!=typeof t)for(var r in t)o.d(n,r,function(e){return t[e]}.bind(null,r));return n},o.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return o.d(t,"a",t),t},o.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},o.p="",o(o.s=0)}([function(e,t,n){"use strict";n.r(t);var r=function(){console.log("Loaded")},o=function(){var e=document.querySelectorAll(".js-menuButton"),t=document.querySelector(".js-hamburger"),n=document.querySelector(".js-sidebar"),r=document.querySelector(".js-grid");e.forEach(function(e){e.addEventListener("click",function(e){n.classList.toggle("sidebar--in"),t.classList.toggle("hamburger--hidden"),r&&r.classList.toggle("grid--small")})})},i=function(){var o=document.querySelectorAll(".js-filterTitle"),e=document.querySelectorAll(".js-filterItem"),i=document.querySelectorAll(".js-hiddenFilter"),l=[];o.forEach(function(t,e){t.addEventListener("click",function(e){t.nextElementSibling.classList.add("select--open")}),l[e]=t.dataset.value}),e.forEach(function(r){r.addEventListener("click",function(e){var t=r.parentElement,n=Array.from(o).indexOf(t.previousElementSibling);t.classList.remove("select--open"),Array.from(t.children).forEach(function(e){e.classList.remove("select__item--selected")}),r.classList.add("select__item--selected"),t.previousElementSibling.dataset.value=r.dataset.value,t.previousElementSibling.innerHTML=r.innerHTML,l[n]=r.dataset.value,l.every(function(e,t,n){return e===n[0]})?i.forEach(function(e){e.classList.add("menu__item--hidden")}):i.forEach(function(e){e.classList.remove("menu__item--hidden")})})})};document.addEventListener("DOMContentLoaded",function(){r(),o(),i()})}]);