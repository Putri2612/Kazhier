import BaseModel from "../../BaseModel";
import view from "../../HelperFunctions/View";

import NumberItem from "./Number.html";
import SkipItem from "./Skip.html";

class PaginationNumber extends BaseModel {
    static observedAttributes = [
        'active',
        'page'
    ];

    castAttributes      = {
        active  : 'boolean',
        page    : 'integer',
    };

    constructor() {
        super();
        
        this.addEventListener('click', event => {
            if(!this.attr.page || this.attr.active) {
                return;
            }
    
            if(this._callback && typeof this._callback == 'function') {
                this._callback(this.attr.page);
            }
        });
    }

    _render() {

        if(!this.classList.contains('page-item')) {
            this.classList.add('page-item');
        }
        
        if(this.attr.active) {
            this.classList.add('active');
        } else if(this.classList.contains('active')) {
            this.classList.remove('active');
        }

        if(this.attr.page) {
            if(this.classList.contains('disabled')) {
                this.classList.remove('disabled');
            }

            this.innerHTML = view(NumberItem, {number: this.attr.page});
        } else {
            if(!this.classList.contains('disabled')) {
                this.classList.add('disabled');
            }

            this.innerHTML = view(SkipItem);
        }
    }

    set callback(callback = page => false) {
        this._callback = callback;
    }
}

export default PaginationNumber;