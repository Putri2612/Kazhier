const d = document;

class Kaka{
    constructor(selected){
        this.selected = selected;
        this.elem = d.querySelector(selected);
        if(this.elem == null){
            throw "Element not found";
        }
    }

    addClass(className){
        if(this.elem.classList.contains(className)) return;
        else {
            this.elem.classList.add(className);
        }
    }
    
    removeClass(className){
        if(this.elem.classList.contains(className)){
            this.elem.classList.remove(className);
        } else {
            throw "This Element doesn't have this class";
        }
    }
    toggleClass(className){
        this.elem.classList.toggle(className);
    }
}

// import {Kaka} from './element-selector.js';
// import {d} from './global-var.js';

window.onload = () => {
    try {
        let navBTN = new Kaka("#nav-btn");
        let navList = new Kaka("#nav-list");

        let navBTNOrnament0 = new Kaka("#navburg-00");
        let navBTNOrnament1 = new Kaka("#navburg-01");
        let navBTNOrnament2 = new Kaka("#navburg-02");

        let navOpen = false;

        navBTN.elem.addEventListener('click', ()=>{
            try {
                if(navOpen){
                    navList.removeClass("open");
                    navBTNOrnament0.removeClass("close");
                    navBTNOrnament1.removeClass("close");
                    navBTNOrnament2.removeClass("close");
                    navOpen = false;
                } else {
                    navList.addClass("open");
                    navBTNOrnament0.addClass("close");
                    navBTNOrnament1.addClass("close");
                    navBTNOrnament2.addClass("close");
                    navOpen = true;
                }
            } catch (error) {
                console.log(error);
            }
        }, false);    
    } catch (error) {
        console.log(error);
    }
    
};