import{Kaka}from"./element-selector.js";import{d}from"./global-var.js";window.onload=()=>{try{let a=new Kaka("#nav-btn"),e=new Kaka("#nav-list"),s=new Kaka("#navburg-00"),l=new Kaka("#navburg-01"),o=new Kaka("#navburg-02"),n=!1;a.elem.addEventListener("click",(()=>{try{n?(e.removeClass("open"),s.removeClass("close"),l.removeClass("close"),o.removeClass("close"),n=!1):(e.addClass("open"),s.addClass("close"),l.addClass("close"),o.addClass("close"),n=!0)}catch(a){console.log(a)}}),!1)}catch(a){console.log(a)}};