import BaseModel from "../BaseModel";
import view from "../HelperFunctions/View";

import Page from "./Pagination.html";

class Pagination extends BaseModel {
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
        this._callback = page => {
            if(page <= this.attr.max) {
                this.setAttribute('page', page);
            }
        }
    }

    _render() {
        const validator = this._validateAttr();
        if(validator.error) {
            console.warn(validator.message);
            return;
        }

        if(!this.innerHTML) {
            this.classList.add('pagination');
            this.innerHTML = view(Page);
        }

        if(!this._prevPage) {
            this._prevPage = this.querySelector('pg-prev');
            this._prevPage.callback = this._callback;
        }

        if(!this._nextPage) {
            this._nextPage = this.querySelector('pg-next');
            this._nextPage.callback = this._callback;
        }

        if(!this._numbers) {
            this._numbers = this.querySelectorAll('pg-number');
            this._numbers.forEach(number => {
                number.callback = this._callback;
            })
        }

        this._prevPage.setAttribute('page', this.attr.page);

        this._nextPage.setAttribute('page', this.attr.page);
        this._nextPage.setAttribute('max', this.attr.max);

        

        let page = 1;
        this._numbers.forEach(number => {
            if(page == 1 || 
                (page > this.attr.page - 3 && page < this.attr.page + 3 && page <= this.attr.max) 
                || page == this.attr.max) {
                number.setAttribute('page', page);
                if(number.classList.contains('d-none')) {
                    number.classList.remove('d-none');
                }
                if(page == this.attr.page) {
                    number.setAttribute('active', true);
                } else {
                    number.setAttribute('active', false);
                }
            } else if(page > 1 && page <= this.attr.page - 3) {
                if(number.classList.contains('d-none')) {
                    number.classList.remove('d-none');
                }
                number.removeAttribute('page');
                page = this.attr.page - 3;
            } else if(page >= this.attr.page + 3 && page < this.attr.max) {
                if(number.classList.contains('d-none')) {
                    number.classList.remove('d-none');
                }
                number.removeAttribute('page');
                page = this.attr.max - 1;
            } else {
                if(!number.classList.contains('d-none')) {
                    number.classList.add('d-none');
                    number.setAttribute('page', 0);
                    number.setAttribute('active', false);
                }
            }

            page++;
        });
    }

    set callback (callback = (page) => false) {
        this._callback = page => {
            if(page <= this.attr.max) {
                this.setAttribute('page', page);
                callback(page);
            }
        };

        if(this._prevPage) {
            this._prevPage.callback = this._callback;
        }

        if(this._nextPage) {
            this._nextPage.callback = this._callback;
        }

        if(this._numbers) {
            this._numbers.forEach(number => {
                number.callback = this._callback;
            })
        }
    }
}

export default Pagination;