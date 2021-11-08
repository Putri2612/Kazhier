import {d} from './global-var.js';
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

export {Kaka};