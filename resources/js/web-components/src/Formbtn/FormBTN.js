import BaseModel from "../BaseModel";

class FormBtn extends BaseModel {

    static get observedAttributes() {
        return ['method', 'text', 'url', 'type', 'icon', 'icon-type'];
    }

    get requiredAttributes () {
        return ['method', 'text', 'url', 'type'];
    }

    get availableAttributes () {
        return ['method', 'text', 'url', 'type', 'icon', 'icon-type'];
    }

    constructor() {
        super();
    }

    _render() {
        const validator = this._validateAttr();
        if(validator.error) {
            console.error(validator.message);
            return;
        }

        if(this.attr.type == 'button') {
            this.className = 'btn btn-primary';
        } else if (this.attr.type == 'dropdown-item') {
            this.classList.add('dropdown-item', 'pe-auto', 'has-icon');
        }
        
        const form = document.createElement('form');
        form.setAttribute('action', this.attr.url);
        
        if(this.attr.method.toLowerCase() == 'post'
            || this.attr.method.toLowerCase() == 'put' 
            || this.attr.method.toLowerCase() == 'delete') {
            const method = document.createElement('input'),
                token = document.createElement('input');

            method.value    = this.attr.method;
            method.type     = 'hidden';
            method.name     = '_method';
            token.value     = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            token.type      = 'hidden';
            token.name      = '_token';

            form.setAttribute('method', 'POST');
            form.append(method);
            form.append(token);
        } else {
            form.setAttribute('method', 'GET');
        }

        let innerHTML = '';
        if('icon' in this.attr && 'icon-type' in this.attr) {
            innerHTML = `<i class="fa-${this.attr['icon-type']} fa-${this.attr.icon}"></i> ${this.attr.text}`;
        } else {
            innerHTML = this.attr.text
        }

        this.innerHTML = innerHTML;
        this.append(form);

        this.addEventListener('click', event => {
            form.submit();
        });
    }
}

export default FormBtn;