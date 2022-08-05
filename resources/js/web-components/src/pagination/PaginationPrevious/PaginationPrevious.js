import BaseModel from "../../BaseModel";
import view from "../../HelperFunctions/View";

import Previous from "./Previous.html";

class PaginationPrevious extends BaseModel {
    static observedAttributes = [
        'page'
    ];

    castAttributes = {
        page: 'integer',
    }

    requiredAttributes = ['page'];

    constructor() {
        super();
        this.addEventListener('click', event => {
            console.log('Prev');
            if(this.attr.page == 1) {
                return;
            }

            if(this._callback && typeof this._callback == 'function') {
                this._callback(this.attr.page - 1);
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
            this.innerHTML = view(Previous);
            this.classList.add('page-item');
        }

        if(this.attr.page == 1) {
            this.classList.add('disabled');
        } else if(this.classList.contains('disabled')) {
            this.classList.remove('disabled');
        }
    }

    set callback (callback = (page) => false) {
        this._callback = callback;
    }
}

export default PaginationPrevious;