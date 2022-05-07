!function(t,e){if("object"==typeof exports&&"object"==typeof module)module.exports=e();else if("function"==typeof define&&define.amd)define([],e);else{var n=e();for(var r in n)("object"==typeof exports?exports:t)[r]=n[r]}}(self,(()=>(()=>{"use strict";var t={};function e(t){return e="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(t){return typeof t}:function(t){return t&&"function"==typeof Symbol&&t.constructor===Symbol&&t!==Symbol.prototype?"symbol":typeof t},e(t)}function n(t,e){(null==e||e>t.length)&&(e=t.length);for(var n=0,r=new Array(e);n<e;n++)r[n]=t[n];return r}function r(t,e){for(var n=0;n<e.length;n++){var r=e[n];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),Object.defineProperty(t,r.key,r)}}function o(t,n){if(n&&("object"===e(n)||"function"==typeof n))return n;if(void 0!==n)throw new TypeError("Derived constructors may only return object or undefined");return function(t){if(void 0===t)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return t}(t)}function i(t){var e="function"==typeof Map?new Map:void 0;return i=function(t){if(null===t||(n=t,-1===Function.toString.call(n).indexOf("[native code]")))return t;var n;if("function"!=typeof t)throw new TypeError("Super expression must either be null or a function");if(void 0!==e){if(e.has(t))return e.get(t);e.set(t,r)}function r(){return c(t,arguments,f(this).constructor)}return r.prototype=Object.create(t.prototype,{constructor:{value:r,enumerable:!1,writable:!0,configurable:!0}}),u(r,t)},i(t)}function c(t,e,n){return c=a()?Reflect.construct:function(t,e,n){var r=[null];r.push.apply(r,e);var o=new(Function.bind.apply(t,r));return n&&u(o,n.prototype),o},c.apply(null,arguments)}function a(){if("undefined"==typeof Reflect||!Reflect.construct)return!1;if(Reflect.construct.sham)return!1;if("function"==typeof Proxy)return!0;try{return Boolean.prototype.valueOf.call(Reflect.construct(Boolean,[],(function(){}))),!0}catch(t){return!1}}function u(t,e){return u=Object.setPrototypeOf||function(t,e){return t.__proto__=e,t},u(t,e)}function f(t){return f=Object.setPrototypeOf?Object.getPrototypeOf:function(t){return t.__proto__||Object.getPrototypeOf(t)},f(t)}(t=>{"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})})(t);const l=function(t){!function(t,e){if("function"!=typeof e&&null!==e)throw new TypeError("Super expression must either be null or a function");t.prototype=Object.create(e&&e.prototype,{constructor:{value:t,writable:!0,configurable:!0}}),Object.defineProperty(t,"prototype",{writable:!1}),e&&u(t,e)}(p,t);var e,i,c,l,s=(e=p,i=a(),function(){var t,n=f(e);if(i){var r=f(this).constructor;t=Reflect.construct(n,arguments,r)}else t=n.apply(this,arguments);return o(this,t)});function p(){var t;!function(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}(this,p),(t=s.call(this)).attr={},t.rendered=!1;var e,r=function(t,e){var r="undefined"!=typeof Symbol&&t[Symbol.iterator]||t["@@iterator"];if(!r){if(Array.isArray(t)||(r=function(t,e){if(t){if("string"==typeof t)return n(t,e);var r=Object.prototype.toString.call(t).slice(8,-1);return"Object"===r&&t.constructor&&(r=t.constructor.name),"Map"===r||"Set"===r?Array.from(t):"Arguments"===r||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(r)?n(t,e):void 0}}(t))||e&&t&&"number"==typeof t.length){r&&(t=r);var o=0,i=function(){};return{s:i,n:function(){return o>=t.length?{done:!0}:{done:!1,value:t[o++]}},e:function(t){throw t},f:i}}throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}var c,a=!0,u=!1;return{s:function(){r=r.call(t)},n:function(){var t=r.next();return a=t.done,t},e:function(t){u=!0,c=t},f:function(){try{a||null==r.return||r.return()}finally{if(u)throw c}}}}(t.getAttributeNames());try{for(r.s();!(e=r.n()).done;){var o=e.value;o in t.availableAttributes&&t.storeAttribute(o,t.getAttribute(o))}}catch(t){r.e(t)}finally{r.f()}return t}return c=p,(l=[{key:"requiredAttributes",get:function(){return[]}},{key:"castAttributes",get:function(){return[]}},{key:"availableAttributes",get:function(){return[]}},{key:"attributeChangedCallback",value:function(t,e,n){this._storeAttribute(t,n),this.isConnected&&this.rendered&&this._render()}},{key:"connectedCallback",value:function(){this._render(),this.rendered=!0}},{key:"_storeAttribute",value:function(t,e){t in this.castAttributes?"object"==this.castAttributes[t]?this.attr[t]=JSON.parse(e):"integer"==this.castAttributes[t]&&(this.attr[t]=parseInt(e)):this.attr[t]=e}},{key:"_validateAttr",value:function(){var t=this,e="";return this.requiredAttributes.forEach((function(n){n in t.attr||(e+="".concat(n," is missing; \n                "))})),{error:""!=e,message:e}}},{key:"_render",value:function(){}}])&&r(c.prototype,l),Object.defineProperty(c,"prototype",{writable:!1}),p}(i(HTMLElement));function s(t){return s="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(t){return typeof t}:function(t){return t&&"function"==typeof Symbol&&t.constructor===Symbol&&t!==Symbol.prototype?"symbol":typeof t},s(t)}function p(t,e){for(var n=0;n<e.length;n++){var r=e[n];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),Object.defineProperty(t,r.key,r)}}function y(t,e){return y=Object.setPrototypeOf||function(t,e){return t.__proto__=e,t},y(t,e)}function b(t,e){if(e&&("object"===s(e)||"function"==typeof e))return e;if(void 0!==e)throw new TypeError("Derived constructors may only return object or undefined");return function(t){if(void 0===t)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return t}(t)}function d(t){return d=Object.setPrototypeOf?Object.getPrototypeOf:function(t){return t.__proto__||Object.getPrototypeOf(t)},d(t)}const h=function(t){!function(t,e){if("function"!=typeof e&&null!==e)throw new TypeError("Super expression must either be null or a function");t.prototype=Object.create(e&&e.prototype,{constructor:{value:t,writable:!0,configurable:!0}}),Object.defineProperty(t,"prototype",{writable:!1}),e&&y(t,e)}(c,t);var e,n,r,o,i=(r=c,o=function(){if("undefined"==typeof Reflect||!Reflect.construct)return!1;if(Reflect.construct.sham)return!1;if("function"==typeof Proxy)return!0;try{return Boolean.prototype.valueOf.call(Reflect.construct(Boolean,[],(function(){}))),!0}catch(t){return!1}}(),function(){var t,e=d(r);if(o){var n=d(this).constructor;t=Reflect.construct(e,arguments,n)}else t=e.apply(this,arguments);return b(this,t)});function c(){return function(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}(this,c),i.call(this)}return e=c,(n=[{key:"_render",value:function(){var t=this,e=window.location.href,n=this.innerHTML,r=e.indexOf("/app/"),o=document.documentElement.lang.toLowerCase();r<=0&&(r=e.length),e=e.substring(0,r),e+="/resources/lang/".concat(o,".json"),fetch(e).then((function(t){return!!t.ok&&t.json()})).then((function(e){e&&n in e&&(t.innerHTML=e[n])})).catch((function(t){return console.error(t)}))}}])&&p(e.prototype,n),Object.defineProperty(e,"prototype",{writable:!1}),c}(l);function m(t){return m="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(t){return typeof t}:function(t){return t&&"function"==typeof Symbol&&t.constructor===Symbol&&t!==Symbol.prototype?"symbol":typeof t},m(t)}function v(t,e){for(var n=0;n<e.length;n++){var r=e[n];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),Object.defineProperty(t,r.key,r)}}function g(t,e){return g=Object.setPrototypeOf||function(t,e){return t.__proto__=e,t},g(t,e)}function w(t,e){if(e&&("object"===m(e)||"function"==typeof e))return e;if(void 0!==e)throw new TypeError("Derived constructors may only return object or undefined");return function(t){if(void 0===t)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return t}(t)}function O(t){return O=Object.setPrototypeOf?Object.getPrototypeOf:function(t){return t.__proto__||Object.getPrototypeOf(t)},O(t)}const j=function(t){!function(t,e){if("function"!=typeof e&&null!==e)throw new TypeError("Super expression must either be null or a function");t.prototype=Object.create(e&&e.prototype,{constructor:{value:t,writable:!0,configurable:!0}}),Object.defineProperty(t,"prototype",{writable:!1}),e&&g(t,e)}(a,t);var e,n,r,o,i,c=(o=a,i=function(){if("undefined"==typeof Reflect||!Reflect.construct)return!1;if(Reflect.construct.sham)return!1;if("function"==typeof Proxy)return!0;try{return Boolean.prototype.valueOf.call(Reflect.construct(Boolean,[],(function(){}))),!0}catch(t){return!1}}(),function(){var t,e=O(o);if(i){var n=O(this).constructor;t=Reflect.construct(e,arguments,n)}else t=e.apply(this,arguments);return w(this,t)});function a(){return function(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}(this,a),c.call(this)}return e=a,r=[{key:"observedAttributes",get:function(){return["method","text","url","type","icon","icon-type"]}}],(n=[{key:"requiredAttributes",get:function(){return["method","text","url","type"]}},{key:"availableAttributes",get:function(){return["method","text","url","type","icon","icon-type"]}},{key:"_render",value:function(){var t=this._validateAttr();if(t.error)console.error(t.message);else{"button"==this.attr.type?this.className="btn btn-primary":"dropdown-item"==this.attr.type&&this.classList.add("dropdown-item","pe-auto","has-icon");var e=document.createElement("form");if(e.setAttribute("action",this.attr.url),"post"==this.attr.method.toLowerCase()||"put"==this.attr.method.toLowerCase()||"delete"==this.attr.method.toLowerCase()){var n=document.createElement("input"),r=document.createElement("input");n.value=this.attr.method,n.type="hidden",n.name="_method",r.value=document.querySelector('meta[name="csrf-token"]').getAttribute("content"),r.type="hidden",r.name="_token",e.setAttribute("method","POST"),e.append(n),e.append(r)}else e.setAttribute("method","GET");var o;o="icon"in this.attr&&"icon-type"in this.attr?'<i class="fa-'.concat(this.attr["icon-type"]," fa-").concat(this.attr.icon,'"></i> ').concat(this.attr.text):this.attr.text,this.innerHTML=o,this.append(e),this.addEventListener("click",(function(t){e.submit()}))}}}])&&v(e.prototype,n),r&&v(e,r),Object.defineProperty(e,"prototype",{writable:!1}),a}(l);function _(t){return _="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(t){return typeof t}:function(t){return t&&"function"==typeof Symbol&&t.constructor===Symbol&&t!==Symbol.prototype?"symbol":typeof t},_(t)}function S(t,e){for(var n=0;n<e.length;n++){var r=e[n];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),Object.defineProperty(t,r.key,r)}}function P(t,e){return P=Object.setPrototypeOf||function(t,e){return t.__proto__=e,t},P(t,e)}function A(t,e){if(e&&("object"===_(e)||"function"==typeof e))return e;if(void 0!==e)throw new TypeError("Derived constructors may only return object or undefined");return function(t){if(void 0===t)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return t}(t)}function E(t){return E=Object.setPrototypeOf?Object.getPrototypeOf:function(t){return t.__proto__||Object.getPrototypeOf(t)},E(t)}const k=function(t){!function(t,e){if("function"!=typeof e&&null!==e)throw new TypeError("Super expression must either be null or a function");t.prototype=Object.create(e&&e.prototype,{constructor:{value:t,writable:!0,configurable:!0}}),Object.defineProperty(t,"prototype",{writable:!1}),e&&P(t,e)}(a,t);var e,n,r,o,i,c=(o=a,i=function(){if("undefined"==typeof Reflect||!Reflect.construct)return!1;if(Reflect.construct.sham)return!1;if("function"==typeof Proxy)return!0;try{return Boolean.prototype.valueOf.call(Reflect.construct(Boolean,[],(function(){}))),!0}catch(t){return!1}}(),function(){var t,e=E(o);if(i){var n=E(this).constructor;t=Reflect.construct(e,arguments,n)}else t=e.apply(this,arguments);return A(this,t)});function a(){return function(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}(this,a),c.call(this)}return e=a,r=[{key:"observedAttributes",get:function(){return["icon","icon-type","title","details","details-highlight","action-modal","action-modal-title","action-text","action-url","action-method"]}}],(n=[{key:"requiredAttributes",get:function(){return["icon","icon-type","title","details"]}},{key:"castAttributes",get:function(){return[]}},{key:"availableAttributes",get:function(){return["icon","icon-type","title","details","details-highlight","action-modal","action-modal-title","action-text","action-url","action-method"]}},{key:"_render",value:function(){var t=this._validateAttr();if(t.error)console.error(t.message);else{var e="",n="";if("action-text"in this.attr&&"action-url"in this.attr)if("action-method"in this.attr)e='<form-btn\n                            method="'.concat(this.attr["action-method"],'"\n                            text="').concat(this.attr["action-text"],'"\n                            type="button"\n                            url="').concat(this.attr["action-url"],'"\n                            ></form-btn>');else{var r=this.attr["action-url"];"action-modal"in this.attr&&"action-modal-title"in this.attr&&(r="#!",e='\n                    data-ajax-popup="true"\n                    data-title="'.concat(this.attr["action-modal-title"],'"\n                    data-url="').concat(this.attr["action-url"],'"\n                    ')),e='\n                <a href="'.concat(r,'"\n                    class="btn btn-primary btn-action me-1 float-right"\n                    ').concat(e,">\n                    ").concat(this.attr["action-text"],"\n                </a>\n                ")}"details-highlight"in this.attr&&(n='<a href="#!">'.concat(this.attr["details-highlight"],"</a>")),this.className="activity",this.innerHTML='\n        <div class="activity-icon bg-primary text-white shadow-primary">\n            <i class="fa-'.concat(this.attr["icon-type"]," fa-").concat(this.attr.icon,'"></i>\n        </div>\n        <div class="activity-detail">\n            <div class="mb-2">\n                <span class="text-job text-primary"><h6>').concat(this.attr.title,"</h6></span>\n            </div>\n            ").concat(e,"\n            <p>").concat(this.attr.details," ").concat(n,"</p>\n        </div>")}}}])&&S(e.prototype,n),r&&S(e,r),Object.defineProperty(e,"prototype",{writable:!1}),a}(l);function x(t){return x="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(t){return typeof t}:function(t){return t&&"function"==typeof Symbol&&t.constructor===Symbol&&t!==Symbol.prototype?"symbol":typeof t},x(t)}function T(t,e){for(var n=0;n<e.length;n++){var r=e[n];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),Object.defineProperty(t,r.key,r)}}function R(t,e){return R=Object.setPrototypeOf||function(t,e){return t.__proto__=e,t},R(t,e)}function L(t,e){if(e&&("object"===x(e)||"function"==typeof e))return e;if(void 0!==e)throw new TypeError("Derived constructors may only return object or undefined");return function(t){if(void 0===t)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return t}(t)}function B(t){return B=Object.setPrototypeOf?Object.getPrototypeOf:function(t){return t.__proto__||Object.getPrototypeOf(t)},B(t)}const C=function(t){!function(t,e){if("function"!=typeof e&&null!==e)throw new TypeError("Super expression must either be null or a function");t.prototype=Object.create(e&&e.prototype,{constructor:{value:t,writable:!0,configurable:!0}}),Object.defineProperty(t,"prototype",{writable:!1}),e&&R(t,e)}(c,t);var e,n,r,o,i=(r=c,o=function(){if("undefined"==typeof Reflect||!Reflect.construct)return!1;if(Reflect.construct.sham)return!1;if("function"==typeof Proxy)return!0;try{return Boolean.prototype.valueOf.call(Reflect.construct(Boolean,[],(function(){}))),!0}catch(t){return!1}}(),function(){var t,e=B(r);if(o){var n=B(this).constructor;t=Reflect.construct(e,arguments,n)}else t=e.apply(this,arguments);return L(this,t)});function c(){return function(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}(this,c),i.call(this)}return e=c,(n=[{key:"_render",value:function(){this.className="activities"}},{key:"add",value:function(t){var e=t.icon,n=void 0===e?{type:"solid",icon:"ellipsis"}:e,r=t.title,o=void 0===r?"Title":r,i=t.detail,c=void 0===i?"Small details":i,a=t.focus,u=void 0!==a&&a,f=t.action,l=void 0!==f&&f,s=document.createElement("act-item");s.setAttribute("icon-type",n.type),s.setAttribute("icon",n.icon),s.setAttribute("title",o),s.setAttribute("details",c),u&&s.setAttribute("details-highlight",u),l&&"object"==x(l)&&(s.setAttribute("action-text",l.text),s.setAttribute("action-url",l.url),"modal"in l&&"object"==x(l.modal)&&(s.setAttribute("action-modal","object"==x(l.modal)),s.setAttribute("action-modal-title",l.modal.title))),this.append(s)}}])&&T(e.prototype,n),Object.defineProperty(e,"prototype",{writable:!1}),c}(l);function D(t){return D="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(t){return typeof t}:function(t){return t&&"function"==typeof Symbol&&t.constructor===Symbol&&t!==Symbol.prototype?"symbol":typeof t},D(t)}function N(t,e){for(var n=0;n<e.length;n++){var r=e[n];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),Object.defineProperty(t,r.key,r)}}function M(t,e){return M=Object.setPrototypeOf||function(t,e){return t.__proto__=e,t},M(t,e)}function q(t,e){if(e&&("object"===D(e)||"function"==typeof e))return e;if(void 0!==e)throw new TypeError("Derived constructors may only return object or undefined");return function(t){if(void 0===t)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return t}(t)}function F(t){return F=Object.setPrototypeOf?Object.getPrototypeOf:function(t){return t.__proto__||Object.getPrototypeOf(t)},F(t)}const H=function(t){!function(t,e){if("function"!=typeof e&&null!==e)throw new TypeError("Super expression must either be null or a function");t.prototype=Object.create(e&&e.prototype,{constructor:{value:t,writable:!0,configurable:!0}}),Object.defineProperty(t,"prototype",{writable:!1}),e&&M(t,e)}(a,t);var e,n,r,o,i,c=(o=a,i=function(){if("undefined"==typeof Reflect||!Reflect.construct)return!1;if(Reflect.construct.sham)return!1;if("function"==typeof Proxy)return!0;try{return Boolean.prototype.valueOf.call(Reflect.construct(Boolean,[],(function(){}))),!0}catch(t){return!1}}(),function(){var t,e=F(o);if(i){var n=F(this).constructor;t=Reflect.construct(e,arguments,n)}else t=e.apply(this,arguments);return q(this,t)});function a(){var t;return function(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}(this,a),(t=c.call(this)).page=0,t.gettingData=!1,t.attr={limit:5},t}return e=a,n=[{key:"requiredAttributes",get:function(){return["getter"]}},{key:"castAttributes",get:function(){return{limit:"integer"}}},{key:"availableAttributes",get:function(){return["getter","limit"]}},{key:"_render",value:function(){var t=this,e=this._validateAttr();if(e.error)console.error(e.message);else{this.style.maxHeight="70vh";var n=this.act=document.createElement("act-box"),r=this.getBTN=document.createElement("button");r.className="btn btn-outline-primary btn-icon",r.style.borderRadius="50%",r.innerHTML='<i class="fa-solid fa-arrow-down fa-2x"></i>',r.addEventListener("click",(function(e){t._getData()})),this.append(n),this.append(r),this._getData()}}},{key:"_appendAct",value:function(){var t=this,e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:[];e.forEach((function(e){var n=e.quantity>0?"plus":"minus",r=t.dateFormat(e.date),o="",i="(".concat(t.numberFormat(e.quantity));if("description"in e?o=e.description:"invoice_number"in e?o=e.invoice_number:"bill_number"in e&&(o=e.bill_number),"product"in e){var c=e.product;"unit"in c&&(i+=" ".concat(c.unit.name))}i+=")",t.act.add({icon:{type:"solid",icon:n},title:r,detail:o,focus:i,action:!1})}))}},{key:"_getData",value:function(){var t=this;if(!this.gettingData){this.gettingData=!0;var e=this.getBTN.querySelector("i");this.getBTN.disabled=!0,e.classList.remove("fa-arrow-down"),e.classList.add("fa-ellipsis");var n=new FormData;n.append("limit",this.attr.limit),n.append("page",++this.page),n.append("_token",document.querySelector('meta[name="csrf-token"]').getAttribute("content")),fetch(this.attr.getter,{method:"POST",headers:{accept:"application/json"},body:n}).then((function(t){return t.ok?t.json():(t.json().then((function(t){return console.error(t.message)})),!1)})).then((function(n){if(t.getBTN.disabled=!1,e.classList.remove("fa-ellipsis"),e.classList.add("fa-arrow-down"),n&&t.page==n.pages&&t.removeChild(t.getBTN),n)t._dateStyle=n.date,t._appendAct(n.data);else if(1==t.page||t.page==n.pages){var r=document.createElement("div");r.className="text-center",r.innerHTML='\n                        <i class="fa-solid fa-5x fa-box-open text-secondary"></i><br/>\n                        <span><tl-str class="text-secondary">No older history</tl-str></span>\n                    ',t.append(r)}setTimeout((function(){t.gettingData=!1}),500)}))}}},{key:"dateFormat",value:function(t){var e=new Date(t),n=document.documentElement.lang;return new Intl.DateTimeFormat([n,"id"],this._dateStyle).format(e)}},{key:"numberFormat",value:function(t){var e=document.documentElement.lang;return new Intl.NumberFormat([e,"id"]).format(t)}}],r=[{key:"observedAttributes",get:function(){return["getter","limit"]}}],n&&N(e.prototype,n),r&&N(e,r),Object.defineProperty(e,"prototype",{writable:!1}),a}(l);return customElements.define("tl-str",h),customElements.define("form-btn",j),customElements.define("act-item",k),customElements.define("act-box",C),customElements.define("stock-change",H),t})()));