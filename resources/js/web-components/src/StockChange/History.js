import BaseModel from "../BaseModel";

class History extends BaseModel {
    
    static get observedAttributes() {
        return ['getter'];
    }

    get requiredAttributes () {
        return ['getter'];
    }

    get castAttributes () {
        return {getter: 'string'};
    }

    get availableAttributes () {
        return ['getter'];
    }

    constructor() {
        super();
        this.count = 0;
    }


    _render() {
        const validator = this._validateAttr();
        if(validator.error) {
            console.error(validator.message);
            return;
        }

        const activity = this.act = document.createElement('act-box');
        this.append(activity);

        fetch(this.attr.getter())
        .then(response => {
            if(response.ok) {
                return response.json();
            } else {
                response.json().then(error => console.error(error.message));
                return false;
            }
        }).then(data => {
            if(data) {
                this._appendAct(data.data);
            }
        })
    }

    _appendAct(data = []) {
        data.forEach(item => {
            this.act.add({
                icon    : {type: 'solid', icon: 'ellipsis'},
                title   : 'Title',
                detail  : 'Small details',
                action  : false
            })
        })
    }
}

export default History;