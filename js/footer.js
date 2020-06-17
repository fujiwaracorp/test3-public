/*! modernizr 3.6.0 (Custom Build) | MIT *
 * https://modernizr.com/download/?-backgroundcliptext-csspointerevents-setclasses !*/
!function(e,n,t){function r(e){var n=_.className,t=Modernizr._config.classPrefix||"";if(x&&(n=n.baseVal),Modernizr._config.enableJSClass){var r=new RegExp("(^|\\s)"+t+"no-js(\\s|$)");n=n.replace(r,"$1"+t+"js$2")}Modernizr._config.enableClasses&&(n+=" "+t+e.join(" "+t),x?_.className.baseVal=n:_.className=n)}function o(e,n){return typeof e===n}function s(){var e,n,t,r,s,i,l;for(var a in S)if(S.hasOwnProperty(a)){if(e=[],n=S[a],n.name&&(e.push(n.name.toLowerCase()),n.options&&n.options.aliases&&n.options.aliases.length))for(t=0;t<n.options.aliases.length;t++)e.push(n.options.aliases[t].toLowerCase());for(r=o(n.fn,"function")?n.fn():n.fn,s=0;s<e.length;s++)i=e[s],l=i.split("."),1===l.length?Modernizr[l[0]]=r:(!Modernizr[l[0]]||Modernizr[l[0]]instanceof Boolean||(Modernizr[l[0]]=new Boolean(Modernizr[l[0]])),Modernizr[l[0]][l[1]]=r),C.push((r?"":"no-")+l.join("-"))}}function i(){return"function"!=typeof n.createElement?n.createElement(arguments[0]):x?n.createElementNS.call(n,"http://www.w3.org/2000/svg",arguments[0]):n.createElement.apply(n,arguments)}function l(e,n){return!!~(""+e).indexOf(n)}function a(e){return e.replace(/([a-z])-([a-z])/g,function(e,n,t){return n+t.toUpperCase()}).replace(/^-/,"")}function u(e,n){return function(){return e.apply(n,arguments)}}function f(e,n,t){var r;for(var s in e)if(e[s]in n)return t===!1?e[s]:(r=n[e[s]],o(r,"function")?u(r,t||n):r);return!1}function c(e){return e.replace(/([A-Z])/g,function(e,n){return"-"+n.toLowerCase()}).replace(/^ms-/,"-ms-")}function p(n,t,r){var o;if("getComputedStyle"in e){o=getComputedStyle.call(e,n,t);var s=e.console;if(null!==o)r&&(o=o.getPropertyValue(r));else if(s){var i=s.error?"error":"log";s[i].call(s,"getComputedStyle returning null, its possible modernizr test results are inaccurate")}}else o=!t&&n.currentStyle&&n.currentStyle[r];return o}function d(){var e=n.body;return e||(e=i(x?"svg":"body"),e.fake=!0),e}function m(e,t,r,o){var s,l,a,u,f="modernizr",c=i("div"),p=d();if(parseInt(r,10))for(;r--;)a=i("div"),a.id=o?o[r]:f+(r+1),c.appendChild(a);return s=i("style"),s.type="text/css",s.id="s"+f,(p.fake?p:c).appendChild(s),p.appendChild(c),s.styleSheet?s.styleSheet.cssText=e:s.appendChild(n.createTextNode(e)),c.id=f,p.fake&&(p.style.background="",p.style.overflow="hidden",u=_.style.overflow,_.style.overflow="hidden",_.appendChild(p)),l=t(c,e),p.fake?(p.parentNode.removeChild(p),_.style.overflow=u,_.offsetHeight):c.parentNode.removeChild(c),!!l}function v(n,r){var o=n.length;if("CSS"in e&&"supports"in e.CSS){for(;o--;)if(e.CSS.supports(c(n[o]),r))return!0;return!1}if("CSSSupportsRule"in e){for(var s=[];o--;)s.push("("+c(n[o])+":"+r+")");return s=s.join(" or "),m("@supports ("+s+") { #modernizr { position: absolute; } }",function(e){return"absolute"==p(e,null,"position")})}return t}function y(e,n,r,s){function u(){c&&(delete T.style,delete T.modElem)}if(s=o(s,"undefined")?!1:s,!o(r,"undefined")){var f=v(e,r);if(!o(f,"undefined"))return f}for(var c,p,d,m,y,g=["modernizr","tspan","samp"];!T.style&&g.length;)c=!0,T.modElem=i(g.shift()),T.style=T.modElem.style;for(d=e.length,p=0;d>p;p++)if(m=e[p],y=T.style[m],l(m,"-")&&(m=a(m)),T.style[m]!==t){if(s||o(r,"undefined"))return u(),"pfx"==n?m:!0;try{T.style[m]=r}catch(h){}if(T.style[m]!=y)return u(),"pfx"==n?m:!0}return u(),!1}function g(e,n,t,r,s){var i=e.charAt(0).toUpperCase()+e.slice(1),l=(e+" "+E.join(i+" ")+i).split(" ");return o(n,"string")||o(n,"undefined")?y(l,n,r,s):(l=(e+" "+P.join(i+" ")+i).split(" "),f(l,n,t))}function h(e,n,r){return g(e,t,t,n,r)}var C=[],S=[],w={_version:"3.6.0",_config:{classPrefix:"",enableClasses:!0,enableJSClass:!0,usePrefixes:!0},_q:[],on:function(e,n){var t=this;setTimeout(function(){n(t[e])},0)},addTest:function(e,n,t){S.push({name:e,fn:n,options:t})},addAsyncTest:function(e){S.push({name:null,fn:e})}},Modernizr=function(){};Modernizr.prototype=w,Modernizr=new Modernizr;var _=n.documentElement,x="svg"===_.nodeName.toLowerCase();Modernizr.addTest("csspointerevents",function(){var e=i("a").style;return e.cssText="pointer-events:auto","auto"===e.pointerEvents});var b="Moz O ms Webkit",E=w._config.usePrefixes?b.split(" "):[];w._cssomPrefixes=E;var P=w._config.usePrefixes?b.toLowerCase().split(" "):[];w._domPrefixes=P;var z={elem:i("modernizr")};Modernizr._q.push(function(){delete z.elem});var T={style:z.elem.style};Modernizr._q.unshift(function(){delete T.style}),w.testAllProps=g,w.testAllProps=h,Modernizr.addTest("backgroundcliptext",function(){return h("backgroundClip","text")}),s(),r(C),delete w.addTest,delete w.addAsyncTest;for(var N=0;N<Modernizr._q.length;N++)Modernizr._q[N]();e.Modernizr=Modernizr}(window,document);

//Prevent images to be right clicked or dragable
jQuery(function() {

    if (Modernizr.csspointerevents) {	// supported

        jQuery('img').css({
            'pointer-events': 'auto'
        });

        function prevent() {
            // this part disables the right click
            jQuery('img').on('contextmenu', function(e) {
                return false;
            });
            //this part disables dragging of image
            jQuery('img').on('dragstart', function(e) {
                return false;
            });

        }
        prevent();

    } else {	// not-supported

        function prevent() {
            // this part disables the right click
            jQuery('img').on('contextmenu', function(e) {
                return false;
            });
            //this part disables dragging of image
            jQuery('img').on('dragstart', function(e) {
                return false;
            });

        }
        prevent();
    }
});

// Fix skip-link focus in IE11
jQuery(function ($) {
    /(trident|msie)/i.test(navigator.userAgent) &&
        document.getElementById &&
        window.addEventListener &&
        window.addEventListener(
        "hashchange",
        function () {
            var t,
                e = location.hash.substring(1);
            /^[A-z0-9_-]+$/.test(e) && (t = document.getElementById(e)) && (/^(?:a|select|input|button|textarea)$/i.test(t.tagName) || (t.tabIndex = -1), t.focus());
        },
        !1
    );
});

// Dropdown menu
jQuery(function($) {
    var handle = $('.queerthm-container .site-header .dropdown-menu .handle');
    var toggler = $('.queerthm-container .site-header .dropdown-menu .toggle-menu');
    var headerMenu = $('.queerthm-container .site-header .dropdown-menu .header-menu');
    var skipLink = $('.queerthm-container .skip-link');
    $(headerMenu).prepend('<a class="close-menu" href="#"></a>');
    $(headerMenu).append('<a class="auto-close" href="#"></a>');
    var closeButton = $('.queerthm-container .site-header .dropdown-menu .close-menu');
    var autoClose = $('.queerthm-container .site-header .dropdown-menu .auto-close');
    // Enable menu to remain open with keyboard tab through menu
    handle.on('focus', function() {
        if (headerMenu.hasClass('slided')) {
            headerMenu.removeClass('slided');
            toggler.removeClass('clicked');
        } else {
            headerMenu.addClass('slided');
            toggler.addClass('clicked');
        }
    });
    // Close on last tab trough dropdown menu
    $(autoClose).on('keyup', function(e) { 
        if (e.key === 'Tab' || e.key === 'Space' || e.key === 'Enter') {
            e.preventDefault();
            if (headerMenu.hasClass('slided')) {
                headerMenu.toggleClass('slided');
                toggler.removeClass('clicked');
            }
        }
    });
    // Close on shift+tab on skip-link
    $(skipLink).on('keyup', function(e) { 
        if (e.shiftKey && e.key === 'Tab') {
            e.preventDefault();
            if (headerMenu.hasClass('slided')) {
                headerMenu.toggleClass('slided');
                toggler.removeClass('clicked');
            }
        }
    });
    // Close menu on esc button
    $(document).on( 'keydown', function( e ) {
        if ( e.keyCode === 27 ) {
            e.preventDefault();
            if (headerMenu.hasClass('slided')) {
                headerMenu.toggleClass('slided');
                toggler.removeClass('clicked');
            }
        }
    });
    // Open/close on toggle-menu click
    $(toggler).on('click', function() {
        if ($(this).hasClass('clicked')) {
            $(this).removeClass('clicked');
        } else {
            $(this).addClass('clicked');
        }
        headerMenu.toggleClass('slided');
        return false;
    });
    // Close on close button click
    $(closeButton).on('click', function() {
        toggler.removeClass('clicked');
        headerMenu.removeClass('slided');
        return false;
    });
    // Close on any other item click
    $(document).on('click', function(event) {	
        if (headerMenu.hasClass('slided') && $(event.target).closest(headerMenu).length == 0) {
            headerMenu.toggleClass('slided');
            toggler.removeClass('clicked');  
        }
    });

});

// Set rainbow text by javasscript if css solution is not supported
(function($) {

    $.fn.rainbowize = function() {
        return this.each(function() {
            var rainbowtext = '';
            var hue=0;
            var step=0;

            // get the current text inside element
            var text = $(this).text();

            // hue is 360 degrees
            if (text.length > 0)
                step = 360 / (text.length);

            // iterate the whole 360 degrees
            for (var i = 0; i < text.length; i++)
            {
                rainbowtext = rainbowtext + '<span style="color:' + color_from_hue(hue) + '">' + text.charAt(i) + '</span>';
                hue += step;
            }

            $(this).html(rainbowtext);
        });
    };

})(jQuery);

jQuery(function($) {

    $('.js-off').removeClass('js-off');

    $('.queerthm-container .site-header a, .queerthm-container .site-header .dropdown-menu .toggle-menu, .queerthm-container .site-footer a, .queerthm-container .footer-widget-area a').addClass('rainbowize');

    if (Modernizr.backgroundcliptext) {
        $(".rainbow").addClass("rainbowize");
    } else {
        $(".rainbow").rainbowize();
    }

});
