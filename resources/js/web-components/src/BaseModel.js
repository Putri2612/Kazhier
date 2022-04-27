class BaseModel extends HTMLElement {

    get requiredAttributes () {
        return [];
    }

    get castAttributes () {
        return [];
    }

    get availableAttributes () {
        return [];
    }

    constructor() {
        super();

        this.attr = {};
        this.rendered = false;

        for(let name of this.getAttributeNames()) {
            if(name in this.availableAttributes) {
                this.storeAttribute(name, this.getAttribute(name));
            }
        }
    }

    attributeChangedCallback(name, oldval, newval) {
        this._storeAttribute(name, newval);

        if(this.isConnected && this.rendered) {
            this._render();
        }
    }

    connectedCallback() {
        this._render();
        this.rendered = true;
    }

    _storeAttribute(name, value) {
        if(name in this.castAttributes) {
            if(this.castAttributes[name]  == 'object') {
                this.attr[name] = JSON.parse(value);
            } else if (this.castAttributes[name] == 'integer') {
                this.attr[name] = parseInt(value);
            }
        } else {
            this.attr[name] = value;
        }
    }

    _validateAttr() {
        let errorMessage = '';
        this.requiredAttributes.forEach(attr => {
            if(!(attr in this.attr)) {
                errorMessage += `${attr} is missing; 
                `;
            }
        });

        return {error: errorMessage != '', message: errorMessage}
    }

    _render() {

    }
}

export default BaseModel;