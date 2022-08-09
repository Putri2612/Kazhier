class BaseModel extends HTMLElement {

    static observedAttributes = [];

    requiredAttributes  = [];
    castAttributes      = [];
    availableAttributes = [];

    constructor() {
        super();

        this.attr = {};
        this.rendered = false;

        for(let name of this.getAttributeNames()) {
            if(name in this.constructor.observedAttributes) {
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

    _storeAttribute(name, value = "") {
        if(name in this.castAttributes) {
            if (Array.isArray(this.castAttributes[name])) {
                if(this.castAttributes[name].includes(value)) {
                    this.attr[name] = value;
                }
            } else if(this.castAttributes[name]  == 'object') {
                this.attr[name] = JSON.parse(value);
            } else if (this.castAttributes[name] == 'integer') {
                this.attr[name] = parseInt(value);
            } else if (this.castAttributes[name] == 'boolean') {
                value = value.toLowerCase();
                this.attr[name] = (value === 'true' || value === '1') && value !== '';
            } else if (this.castAttributes[name] == 'url') {
                this.attr[name] = new URL(value);
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