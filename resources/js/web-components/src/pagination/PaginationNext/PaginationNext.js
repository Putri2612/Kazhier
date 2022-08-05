import BaseModel from "../../BaseModel";
import view from "../../HelperFunctions/View";

import Next from "./Next.html";

class PaginationNext extends BaseModel {
    static observedAttributes = [
        'page', 'max'
    ];

    castAttributes = {
        page: 'integer',
        max : 'integer'
    }

    requiredAttributes = ['page', 'max'];

    constructor() {
        super();

        this.addEventListener('click', event => {
            if(this.attr.max == this.attr.page) {
                return;
            }
    
            if(this._callback && typeof this._callback == 'function') {
                this._callback(this.attr.page + 1);
            }
        })
    }

    _render() {
        const validator = this._validateAttr();
        if(validator.error) {
            console.warn(validator.message);
            return;
        }

        if(!this.innerHTML) {
            this.innerHTML = view(Next);
            this.classList.add('page-item');
        }

        if(this.attr.max == this.attr.page) {
            this.classList.add('disabled');
        } else if(this.classList.contains('disabled')) {
            this.classList.remove('disabled');
        }
    }

    set callback (callback = (page) => false) {
        this._callback = callback;
    }
}

export default PaginationNext;