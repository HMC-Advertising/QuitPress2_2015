//     Underscore.js 1.5.2
//     http://underscorejs.org
//     (c) 2009-2013 Jeremy Ashkenas, DocumentCloud and Investigative Reporters & Editors
//     Underscore may be freely distributed under the MIT license.
(function(){var e=this,t=e._,n={},r=Array.prototype,i=Object.prototype,s=Function.prototype,o=r.push,u=r.slice,a=r.concat,f=i.toString,l=i.hasOwnProperty,c=r.forEach,h=r.map,p=r.reduce,d=r.reduceRight,v=r.filter,m=r.every,g=r.some,y=r.indexOf,b=r.lastIndexOf,w=Array.isArray,E=Object.keys,S=s.bind,x=function(e){return e instanceof x?e:this instanceof x?(this._wrapped=e,void 0):new x(e)};"undefined"!=typeof exports?("undefined"!=typeof module&&module.exports&&(exports=module.exports=x),exports._=x):e._=x,x.VERSION="1.5.2";var T=x.each=x.forEach=function(e,t,r){if(null!=e)if(c&&e.forEach===c)e.forEach(t,r);else if(e.length===+e.length){for(var i=0,s=e.length;s>i;i++)if(t.call(r,e[i],i,e)===n)return}else for(var o=x.keys(e),i=0,s=o.length;s>i;i++)if(t.call(r,e[o[i]],o[i],e)===n)return};x.map=x.collect=function(e,t,n){var r=[];return null==e?r:h&&e.map===h?e.map(t,n):(T(e,function(e,i,s){r.push(t.call(n,e,i,s))}),r)};var N="Reduce of empty array with no initial value";x.reduce=x.foldl=x.inject=function(e,t,n,r){var i=arguments.length>2;if(null==e&&(e=[]),p&&e.reduce===p)return r&&(t=x.bind(t,r)),i?e.reduce(t,n):e.reduce(t);if(T(e,function(e,s,o){i?n=t.call(r,n,e,s,o):(n=e,i=!0)}),!i)throw new TypeError(N);return n},x.reduceRight=x.foldr=function(e,t,n,r){var i=arguments.length>2;if(null==e&&(e=[]),d&&e.reduceRight===d)return r&&(t=x.bind(t,r)),i?e.reduceRight(t,n):e.reduceRight(t);var s=e.length;if(s!==+s){var o=x.keys(e);s=o.length}if(T(e,function(u,a,f){a=o?o[--s]:--s,i?n=t.call(r,n,e[a],a,f):(n=e[a],i=!0)}),!i)throw new TypeError(N);return n},x.find=x.detect=function(e,t,n){var r;return C(e,function(e,i,s){return t.call(n,e,i,s)?(r=e,!0):void 0}),r},x.filter=x.select=function(e,t,n){var r=[];return null==e?r:v&&e.filter===v?e.filter(t,n):(T(e,function(e,i,s){t.call(n,e,i,s)&&r.push(e)}),r)},x.reject=function(e,t,n){return x.filter(e,function(e,r,i){return!t.call(n,e,r,i)},n)},x.every=x.all=function(e,t,r){t||(t=x.identity);var i=!0;return null==e?i:m&&e.every===m?e.every(t,r):(T(e,function(e,s,o){return(i=i&&t.call(r,e,s,o))?void 0:n}),!!i)};var C=x.some=x.any=function(e,t,r){t||(t=x.identity);var i=!1;return null==e?i:g&&e.some===g?e.some(t,r):(T(e,function(e,s,o){return i||(i=t.call(r,e,s,o))?n:void 0}),!!i)};x.contains=x.include=function(e,t){return null==e?!1:y&&e.indexOf===y?e.indexOf(t)!=-1:C(e,function(e){return e===t})},x.invoke=function(e,t){var n=u.call(arguments,2),r=x.isFunction(t);return x.map(e,function(e){return(r?t:e[t]).apply(e,n)})},x.pluck=function(e,t){return x.map(e,function(e){return e[t]})},x.where=function(e,t,n){return x.isEmpty(t)?n?void 0:[]:x[n?"find":"filter"](e,function(e){for(var n in t)if(t[n]!==e[n])return!1;return!0})},x.findWhere=function(e,t){return x.where(e,t,!0)},x.max=function(e,t,n){if(!t&&x.isArray(e)&&e[0]===+e[0]&&e.length<65535)return Math.max.apply(Math,e);if(!t&&x.isEmpty(e))return-1/0;var r={computed:-1/0,value:-1/0};return T(e,function(e,i,s){var o=t?t.call(n,e,i,s):e;o>r.computed&&(r={value:e,computed:o})}),r.value},x.min=function(e,t,n){if(!t&&x.isArray(e)&&e[0]===+e[0]&&e.length<65535)return Math.min.apply(Math,e);if(!t&&x.isEmpty(e))return 1/0;var r={computed:1/0,value:1/0};return T(e,function(e,i,s){var o=t?t.call(n,e,i,s):e;o<r.computed&&(r={value:e,computed:o})}),r.value},x.shuffle=function(e){var t,n=0,r=[];return T(e,function(e){t=x.random(n++),r[n-1]=r[t],r[t]=e}),r},x.sample=function(e,t,n){return arguments.length<2||n?e[x.random(e.length-1)]:x.shuffle(e).slice(0,Math.max(0,t))};var k=function(e){return x.isFunction(e)?e:function(t){return t[e]}};x.sortBy=function(e,t,n){var r=k(t);return x.pluck(x.map(e,function(e,t,i){return{value:e,index:t,criteria:r.call(n,e,t,i)}}).sort(function(e,t){var n=e.criteria,r=t.criteria;if(n!==r){if(n>r||n===void 0)return 1;if(r>n||r===void 0)return-1}return e.index-t.index}),"value")};var L=function(e){return function(t,n,r){var i={},s=null==n?x.identity:k(n);return T(t,function(n,o){var u=s.call(r,n,o,t);e(i,u,n)}),i}};x.groupBy=L(function(e,t,n){(x.has(e,t)?e[t]:e[t]=[]).push(n)}),x.indexBy=L(function(e,t,n){e[t]=n}),x.countBy=L(function(e,t){x.has(e,t)?e[t]++:e[t]=1}),x.sortedIndex=function(e,t,n,r){n=null==n?x.identity:k(n);for(var i=n.call(r,t),s=0,o=e.length;o>s;){var u=s+o>>>1;n.call(r,e[u])<i?s=u+1:o=u}return s},x.toArray=function(e){return e?x.isArray(e)?u.call(e):e.length===+e.length?x.map(e,x.identity):x.values(e):[]},x.size=function(e){return null==e?0:e.length===+e.length?e.length:x.keys(e).length},x.first=x.head=x.take=function(e,t,n){return null==e?void 0:null==t||n?e[0]:u.call(e,0,t)},x.initial=function(e,t,n){return u.call(e,0,e.length-(null==t||n?1:t))},x.last=function(e,t,n){return null==e?void 0:null==t||n?e[e.length-1]:u.call(e,Math.max(e.length-t,0))},x.rest=x.tail=x.drop=function(e,t,n){return u.call(e,null==t||n?1:t)},x.compact=function(e){return x.filter(e,x.identity)};var A=function(e,t,n){return t&&x.every(e,x.isArray)?a.apply(n,e):(T(e,function(e){x.isArray(e)||x.isArguments(e)?t?o.apply(n,e):A(e,t,n):n.push(e)}),n)};x.flatten=function(e,t){return A(e,t,[])},x.without=function(e){return x.difference(e,u.call(arguments,1))},x.uniq=x.unique=function(e,t,n,r){x.isFunction(t)&&(r=n,n=t,t=!1);var i=n?x.map(e,n,r):e,s=[],o=[];return T(i,function(n,r){(t?r&&o[o.length-1]===n:x.contains(o,n))||(o.push(n),s.push(e[r]))}),s},x.union=function(){return x.uniq(x.flatten(arguments,!0))},x.intersection=function(e){var t=u.call(arguments,1);return x.filter(x.uniq(e),function(e){return x.every(t,function(t){return x.indexOf(t,e)>=0})})},x.difference=function(e){var t=a.apply(r,u.call(arguments,1));return x.filter(e,function(e){return!x.contains(t,e)})},x.zip=function(){for(var e=x.max(x.pluck(arguments,"length").concat(0)),t=new Array(e),n=0;e>n;n++)t[n]=x.pluck(arguments,""+n);return t},x.object=function(e,t){if(null==e)return{};for(var n={},r=0,i=e.length;i>r;r++)t?n[e[r]]=t[r]:n[e[r][0]]=e[r][1];return n},x.indexOf=function(e,t,n){if(null==e)return-1;var r=0,i=e.length;if(n){if("number"!=typeof n)return r=x.sortedIndex(e,t),e[r]===t?r:-1;r=0>n?Math.max(0,i+n):n}if(y&&e.indexOf===y)return e.indexOf(t,n);for(;i>r;r++)if(e[r]===t)return r;return-1},x.lastIndexOf=function(e,t,n){if(null==e)return-1;var r=null!=n;if(b&&e.lastIndexOf===b)return r?e.lastIndexOf(t,n):e.lastIndexOf(t);for(var i=r?n:e.length;i--;)if(e[i]===t)return i;return-1},x.range=function(e,t,n){arguments.length<=1&&(t=e||0,e=0),n=arguments[2]||1;for(var r=Math.max(Math.ceil((t-e)/n),0),i=0,s=new Array(r);r>i;)s[i++]=e,e+=n;return s};var O=function(){};x.bind=function(e,t){var n,r;if(S&&e.bind===S)return S.apply(e,u.call(arguments,1));if(!x.isFunction(e))throw new TypeError;return n=u.call(arguments,2),r=function(){if(this instanceof r){O.prototype=e.prototype;var i=new O;O.prototype=null;var s=e.apply(i,n.concat(u.call(arguments)));return Object(s)===s?s:i}return e.apply(t,n.concat(u.call(arguments)))}},x.partial=function(e){var t=u.call(arguments,1);return function(){return e.apply(this,t.concat(u.call(arguments)))}},x.bindAll=function(e){var t=u.call(arguments,1);if(0===t.length)throw new Error("bindAll must be passed function names");return T(t,function(t){e[t]=x.bind(e[t],e)}),e},x.memoize=function(e,t){var n={};return t||(t=x.identity),function(){var r=t.apply(this,arguments);return x.has(n,r)?n[r]:n[r]=e.apply(this,arguments)}},x.delay=function(e,t){var n=u.call(arguments,2);return setTimeout(function(){return e.apply(null,n)},t)},x.defer=function(e){return x.delay.apply(x,[e,1].concat(u.call(arguments,1)))},x.throttle=function(e,t,n){var r,i,s,o=null,u=0;n||(n={});var a=function(){u=n.leading===!1?0:new Date,o=null,s=e.apply(r,i)};return function(){var f=new Date;u||n.leading!==!1||(u=f);var l=t-(f-u);return r=this,i=arguments,0>=l?(clearTimeout(o),o=null,u=f,s=e.apply(r,i)):o||n.trailing===!1||(o=setTimeout(a,l)),s}},x.debounce=function(e,t,n){var r,i,s,o,u;return function(){s=this,i=arguments,o=new Date;var a=function(){var f=new Date-o;t>f?r=setTimeout(a,t-f):(r=null,n||(u=e.apply(s,i)))},f=n&&!r;return r||(r=setTimeout(a,t)),f&&(u=e.apply(s,i)),u}},x.once=function(e){var t,n=!1;return function(){return n?t:(n=!0,t=e.apply(this,arguments),e=null,t)}},x.wrap=function(e,t){return function(){var n=[e];return o.apply(n,arguments),t.apply(this,n)}},x.compose=function(){var e=arguments;return function(){for(var t=arguments,n=e.length-1;n>=0;n--)t=[e[n].apply(this,t)];return t[0]}},x.after=function(e,t){return function(){return--e<1?t.apply(this,arguments):void 0}},x.keys=E||function(e){if(e!==Object(e))throw new TypeError("Invalid object");var t=[];for(var n in e)x.has(e,n)&&t.push(n);return t},x.values=function(e){for(var t=x.keys(e),n=t.length,r=new Array(n),i=0;n>i;i++)r[i]=e[t[i]];return r},x.pairs=function(e){for(var t=x.keys(e),n=t.length,r=new Array(n),i=0;n>i;i++)r[i]=[t[i],e[t[i]]];return r},x.invert=function(e){for(var t={},n=x.keys(e),r=0,i=n.length;i>r;r++)t[e[n[r]]]=n[r];return t},x.functions=x.methods=function(e){var t=[];for(var n in e)x.isFunction(e[n])&&t.push(n);return t.sort()},x.extend=function(e){return T(u.call(arguments,1),function(t){if(t)for(var n in t)e[n]=t[n]}),e},x.pick=function(e){var t={},n=a.apply(r,u.call(arguments,1));return T(n,function(n){n in e&&(t[n]=e[n])}),t},x.omit=function(e){var t={},n=a.apply(r,u.call(arguments,1));for(var i in e)x.contains(n,i)||(t[i]=e[i]);return t},x.defaults=function(e){return T(u.call(arguments,1),function(t){if(t)for(var n in t)e[n]===void 0&&(e[n]=t[n])}),e},x.clone=function(e){return x.isObject(e)?x.isArray(e)?e.slice():x.extend({},e):e},x.tap=function(e,t){return t(e),e};var M=function(e,t,n,r){if(e===t)return 0!==e||1/e==1/t;if(null==e||null==t)return e===t;e instanceof x&&(e=e._wrapped),t instanceof x&&(t=t._wrapped);var i=f.call(e);if(i!=f.call(t))return!1;switch(i){case"[object String]":return e==String(t);case"[object Number]":return e!=+e?t!=+t:0==e?1/e==1/t:e==+t;case"[object Date]":case"[object Boolean]":return+e==+t;case"[object RegExp]":return e.source==t.source&&e.global==t.global&&e.multiline==t.multiline&&e.ignoreCase==t.ignoreCase}if("object"!=typeof e||"object"!=typeof t)return!1;for(var s=n.length;s--;)if(n[s]==e)return r[s]==t;var o=e.constructor,u=t.constructor;if(o!==u&&!(x.isFunction(o)&&o instanceof o&&x.isFunction(u)&&u instanceof u))return!1;n.push(e),r.push(t);var a=0,l=!0;if("[object Array]"==i){if(a=e.length,l=a==t.length)for(;a--&&(l=M(e[a],t[a],n,r)););}else{for(var c in e)if(x.has(e,c)&&(a++,!(l=x.has(t,c)&&M(e[c],t[c],n,r))))break;if(l){for(c in t)if(x.has(t,c)&&!(a--))break;l=!a}}return n.pop(),r.pop(),l};x.isEqual=function(e,t){return M(e,t,[],[])},x.isEmpty=function(e){if(null==e)return!0;if(x.isArray(e)||x.isString(e))return 0===e.length;for(var t in e)if(x.has(e,t))return!1;return!0},x.isElement=function(e){return!!e&&1===e.nodeType},x.isArray=w||function(e){return"[object Array]"==f.call(e)},x.isObject=function(e){return e===Object(e)},T(["Arguments","Function","String","Number","Date","RegExp"],function(e){x["is"+e]=function(t){return f.call(t)=="[object "+e+"]"}}),x.isArguments(arguments)||(x.isArguments=function(e){return!!e&&!!x.has(e,"callee")}),"function"!=typeof /./&&(x.isFunction=function(e){return"function"==typeof e}),x.isFinite=function(e){return isFinite(e)&&!isNaN(parseFloat(e))},x.isNaN=function(e){return x.isNumber(e)&&e!=+e},x.isBoolean=function(e){return e===!0||e===!1||"[object Boolean]"==f.call(e)},x.isNull=function(e){return null===e},x.isUndefined=function(e){return e===void 0},x.has=function(e,t){return l.call(e,t)},x.noConflict=function(){return e._=t,this},x.identity=function(e){return e},x.times=function(e,t,n){for(var r=Array(Math.max(0,e)),i=0;e>i;i++)r[i]=t.call(n,i);return r},x.random=function(e,t){return null==t&&(t=e,e=0),e+Math.floor(Math.random()*(t-e+1))};var _={escape:{"&":"&amp;","<":"&lt;",">":"&gt;",'"':"&quot;","'":"&#x27;"}};_.unescape=x.invert(_.escape);var D={escape:new RegExp("["+x.keys(_.escape).join("")+"]","g"),unescape:new RegExp("("+x.keys(_.unescape).join("|")+")","g")};x.each(["escape","unescape"],function(e){x[e]=function(t){return null==t?"":(""+t).replace(D[e],function(t){return _[e][t]})}}),x.result=function(e,t){if(null==e)return void 0;var n=e[t];return x.isFunction(n)?n.call(e):n},x.mixin=function(e){T(x.functions(e),function(t){var n=x[t]=e[t];x.prototype[t]=function(){var e=[this._wrapped];return o.apply(e,arguments),F.call(this,n.apply(x,e))}})};var P=0;x.uniqueId=function(e){var t=++P+"";return e?e+t:t},x.templateSettings={evaluate:/<%([\s\S]+?)%>/g,interpolate:/<%=([\s\S]+?)%>/g,escape:/<%-([\s\S]+?)%>/g};var H=/(.)^/,B={"'":"'","\\":"\\","\r":"r","\n":"n","	":"t","\u2028":"u2028","\u2029":"u2029"},j=/\\|'|\r|\n|\t|\u2028|\u2029/g;x.template=function(e,t,n){var r;n=x.defaults({},n,x.templateSettings);var i=new RegExp([(n.escape||H).source,(n.interpolate||H).source,(n.evaluate||H).source].join("|")+"|$","g"),s=0,o="__p+='";e.replace(i,function(t,n,r,i,u){return o+=e.slice(s,u).replace(j,function(e){return"\\"+B[e]}),n&&(o+="'+\n((__t=("+n+"))==null?'':_.escape(__t))+\n'"),r&&(o+="'+\n((__t=("+r+"))==null?'':__t)+\n'"),i&&(o+="';\n"+i+"\n__p+='"),s=u+t.length,t}),o+="';\n",n.variable||(o="with(obj||{}){\n"+o+"}\n"),o="var __t,__p='',__j=Array.prototype.join,print=function(){__p+=__j.call(arguments,'');};\n"+o+"return __p;\n";try{r=new Function(n.variable||"obj","_",o)}catch(u){throw u.source=o,u}if(t)return r(t,x);var a=function(e){return r.call(this,e,x)};return a.source="function("+(n.variable||"obj")+"){\n"+o+"}",a},x.chain=function(e){return x(e).chain()};var F=function(e){return this._chain?x(e).chain():e};x.mixin(x),T(["pop","push","reverse","shift","sort","splice","unshift"],function(e){var t=r[e];x.prototype[e]=function(){var n=this._wrapped;return t.apply(n,arguments),"shift"!=e&&"splice"!=e||0!==n.length||delete n[0],F.call(this,n)}}),T(["concat","join","slice"],function(e){var t=r[e];x.prototype[e]=function(){return F.call(this,t.apply(this._wrapped,arguments))}}),x.extend(x.prototype,{chain:function(){return this._chain=!0,this},value:function(){return this._wrapped}})}).call(this);(function(e,t){"use strict";typeof define=="function"&&define.amd?define("intention",["jquery","underscore"],t):e.Intention=t(e.jQuery,e._)})(this,function(e,t){"use strict";var n=function(n){var r=t.extend(this,n,{_listeners:{},contexts:[],elms:e(),axes:{},priority:[]});return r};n.prototype={responsive:function r(e,n){var i="abcdefghijklmnopqrstuvwxyz0123456789",s="",o;for(o=0;o<5;o++)s+=i[Math.floor(Math.random()*i.length)];var u={matcher:function(e,t){return e===t.name},measure:t.identity,ID:s};t.isObject(n)===!1&&(n={});if(t.isArray(e)&&t.isArray(e[0].contexts)){t.each(e,function(e){r.apply(this,e)},this);return}t.isArray(e)===!1&&t.isObject(e)?n=e:n.contexts=e;n=t.extend({},u,n);this.on("_"+n.ID+":",t.bind(function(e){this.axes=this._contextualize(n.ID,e.context,this.axes);this._respond(this.axes,this.elms)},this));var a={ID:n.ID,current:null,contexts:n.contexts,respond:t.bind(this._responder(n.ID,n.contexts,n.matcher,n.measure),this)};this.axes[n.ID]=a;this.axes.__keys__=this.priority;this.priority.unshift(n.ID);return a},elements:function(n){n||(n=document);e("[data-intent],[intent],[data-in],[in]",n).each(t.bind(function(t,n){this.add(e(n))},this));return this},add:function(n,r){var i;r||(r={});n.each(t.bind(function(n,s){var o=!1;this.elms.each(function(e,t){if(s===t){o=!0;return!1}return!0});if(o===!1){i=this._fillSpec(t.extend(r,this._attrsToSpec(s.attributes,this.axes)));this._makeChanges(e(s),i,this.axes);this.elms.push({elm:s,spec:i})}},this));return this},remove:function(e){var t=this.elms;e.each(function(e,n){t.each(function(e,r){if(n===r.elm){t.splice(e,1);return!1}return!0})});return this},is:function(e){var n=this.axes;return t.some(n.__keys__,function(t){return e===n[t].current})},current:function(e){return this.axes.hasOwnProperty(e)?this.axes[e].current:!1},on:function(e,t){var n=e.split(" "),r=0;for(r;r<n.length;r++){this._listeners[n[r]]===undefined&&(this._listeners[n[r]]=[]);this._listeners[n[r]].push(t)}return this},off:function(e,n){if(t.isArray(this._listeners[e])){var r=this._listeners[e],i;for(i=0;r.length;i++)if(r[i]===n){r.splice(i,1);break}}return this},_responder:function(e,n,r,i){var s;return function(){var o=i.apply(this,arguments);t.every(n,function(n){if(r(o,n)){if(s===undefined||n.name!==s.name){s=n;this._emitter({_type:"_"+e+":",context:s.name},s,this)._emitter({_type:e+":",context:s.name},s,this)._emitter(t.extend({},{_type:e+":"+s.name},s),s,this)._emitter(t.extend({},{_type:s.name},s),s,this);return!1}return!1}return!0},this);return this}},_emitter:function(e){typeof e=="string"&&(e={_type:e});e.target||(e.target=this);if(!e._type)throw new Error(e._type+" is not a supported event.");if(t.isArray(this._listeners[e._type])){var n=this._listeners[e._type],r;for(r=0;r<n.length;r++)n[r].apply(this,arguments)}return this},_fillSpec:function(e){var n=function(n){t.each(e,function(e,r){t.each(e,function(e,t){n(e,t,r)})})},r={};n(function(e){t.isObject(e)&&t.each(e,function(e,t){r[t]=""})});n(function(n,i,s){t.isObject(n)&&(e[s][i]=t.extend({},r,n))});return e},_assocAxis:function(e,n){var r=!1;t.every(n.__keys__,function(i){if(r===!1){t.every(n[i].contexts,function(t){if(t.name===e){r=i;return!1}return!0});return!0}return!1});return r},_makeSpec:function(e,t,n,r,i){var s,o;if(i[e]!==undefined){s=i[e];s[t]===undefined&&(s[t]={})}else{s={};s[t]={};i[e]=s}s[t][n]=r;return i},_attrsToSpec:function(e,n){var r={},i=new RegExp("^(data-)?(in|intent)-(([a-zA-Z0-9][a-zA-Z0-9]*:)?([a-zA-Z0-9]*))-([A-Za-z:-]+)"),s=new RegExp("^(data-)?(in|intent)-([a-zA-Z0-9][_a-zA-Z0-9]*):$");t.each(e,function(e){var o=e.name.match(i),u;if(o!==null){o=o.slice(-3);u=o[0];if(o[0]===undefined){o[0]=this._assocAxis(o[1],n);if(o[0]===!1)return}else o[0]=o[0].replace(/:$/,"");o.push(e.value);o.push(r);r=this._makeSpec.apply(this,o)}else if(s.test(e.name)){u=e.name.match(s)[3];t.each(n[u].contexts,function(t){this._makeSpec(u,t.name,"class",t.name+" "+e.value,r)},this)}},this);return r},_contextSpec:function(e,t){return t.hasOwnProperty(e.axis)&&t[e.axis].hasOwnProperty(e.ctx)?t[e.axis][e.ctx]:{}},_resolveSpecs:function(n,r){var i={},s=["append","prepend","before","after"];t.each(n,function(n){t.each(this._contextSpec(n,r),function(n,r){if(r==="class"){i[r]||(i[r]=[]);i[r]=t.union(i[r],n.split(" "))}else if(i.move!==undefined&&i.move.value!==""||e.inArray(r,s)===-1){if(i[r]===undefined||i[r]==="")i[r]=n}else i.move={value:n,placement:r}},this)},this);return i},_currentContexts:function(e){var n=[];t.each(e.__keys__,function(t){if(e[t].current!==null){n.push({ctx:e[t].current,axis:t});return}});return n},_removeClasses:function(e,n){var r=[];t.each(n.__keys__,function(i){var s=n[i];t.each(s.contexts,function(n){if(n.name===s.current)return;var i=this._contextSpec({axis:s.ID,ctx:n.name},e),o;if(i!==undefined&&i["class"]!==undefined){o=i["class"].split(" ");o!==undefined&&(r=t.union(r,o))}},this)},this);return r},_contextConfig:function(e,t){return this._resolveSpecs(this._currentContexts(t),e,t)},_makeChanges:function(n,r,i){if(t.isEmpty(i)===!1){var s=this._contextConfig(r,i);t.each(s,function(s,o){if(o==="move"){if(r.__placement__!==s.placement||r.__move__!==s.value){e(s.value)[s.placement](n);r.__placement__=s.placement;r.__move__=s.value}}else if(o==="class"){var u=n.attr("class")||"";u=t.union(s,t.difference(u.split(" "),this._removeClasses(r,i)));n.attr("class",u.join(" "))}else n.attr(o,s)},this)}return n},_respond:function(n,r){r.each(t.bind(function(t,r){var i=e(r.elm);this._makeChanges(i,r.spec,n);i.trigger("intent",this)},this))},_contextualize:function(e,t,n){n[e].current=t;return n},_axis_test_pattern:new RegExp("^_[a-zA-Z0-9]"),_axis_match_pattern:new RegExp("^_([a-zA-Z0-9][_a-zA-Z0-9]*)"),_trim_pattern:new RegExp("^s+|s+$","g")};return n});(function(){"use strict";var e=function(e,t){function s(e,t){var n=new Date,r=null;return function(i){var s=new Date;if(s-n<t){r&&window.clearTimeout(r);var o=function(t){return function(){e(t)}};r=window.setTimeout(o(i),t);return!1}e(i);n=s}}var n=new t,r,i;n.responsive([{name:"base"}]).respond("base");r=n.responsive({ID:"width",contexts:[{name:"standard",min:992},{name:"tablet",min:753},{name:"mobile",min:0}],matcher:function(e,t){return typeof e=="string"?e===t.name:e>=t.min},measure:function(t){return typeof t=="string"?t:e(window).width()}});i=n.responsive({ID:"orientation",contexts:[{name:"portrait",rotation:0},{name:"landscape",rotation:90}],matcher:function(e,t){return e===t.rotation},measure:function(){var e=Math.abs(window.orientation);e>0&&(e=180-e);return e}});n.responsive({ID:"touch",contexts:[{name:"touch"}],matcher:function(){return"ontouchstart"in window}}).respond();n.responsive({ID:"highres",contexts:[{name:"highres"}],matcher:function(){return window.devicePixelRatio>1}}).respond();e(window).on("resize",s(r.respond,100)).on("orientationchange",r.respond).on("orientationchange",i.respond);r.respond();i.respond();e(function(){n.elements(document)});return n};(function(e,t){typeof define=="function"&&define.amd?define("context",["jquery","intention"],t):e.intent=t(e.jQuery,e.Intention)})(this,function(t,n){return e(t,n)})}).call(this);(function(e){"use strict";e.fn.fitVids=function(t){var n={customSelector:null};if(!document.getElementById("fit-vids-style")){var r=document.createElement("div"),i=document.getElementsByTagName("base")[0]||document.getElementsByTagName("script")[0],s="&shy;<style>.fluid-width-video-wrapper{width:100%;position:relative;padding:0;}.fluid-width-video-wrapper iframe,.fluid-width-video-wrapper object,.fluid-width-video-wrapper embed {position:absolute;top:0;left:0;width:100%;height:100%;}</style>";r.className="fit-vids-style";r.id="fit-vids-style";r.style.display="none";r.innerHTML=s;i.parentNode.insertBefore(r,i)}t&&e.extend(n,t);return this.each(function(){var t=["iframe[src*='player.vimeo.com']","iframe[src*='youtube.com']","iframe[src*='youtube-nocookie.com']","iframe[src*='kickstarter.com'][src*='video.html']","object","embed"];n.customSelector&&t.push(n.customSelector);var r=e(this).find(t.join(","));r=r.not("object object");r.each(function(){var t=e(this);if(this.tagName.toLowerCase()==="embed"&&t.parent("object").length||t.parent(".fluid-width-video-wrapper").length)return;var n=this.tagName.toLowerCase()==="object"||t.attr("height")&&!isNaN(parseInt(t.attr("height"),10))?parseInt(t.attr("height"),10):t.height(),r=isNaN(parseInt(t.attr("width"),10))?t.width():parseInt(t.attr("width"),10),i=n/r;if(!t.attr("id")){var s="fitvid"+Math.floor(Math.random()*999999);t.attr("id",s)}t.wrap('<div class="fluid-width-video-wrapper"></div>').parent(".fluid-width-video-wrapper").css("padding-top",i*100+"%");t.removeAttr("height").removeAttr("width")})})}})(window.jQuery||window.Zepto);(function(e){e(".main").fitVids();e("#nav-main-open").on("click",function(t){var n=e(this).toggleClass("is-active");e(".header-nav-wrap").toggleClass("is-active");t.preventDefault()});var t=e("body").height(),n=e(window).height(),r=e(window).width();if(r>760)if(n>t)e("#stickyFooterContainer").css({position:"absolute",bottom:0,width:"100%"});else if(e("#stickyFooterContainer").height()<314){e("#stickyFooterContainer").css({position:"fixed",bottom:0,width:"100%"});e("#main-container").css({"padding-bottom":e("#stickyFooterContainer").height()+"px"})}})(jQuery);