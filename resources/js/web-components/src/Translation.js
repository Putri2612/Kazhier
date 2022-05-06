import BaseModel from "./BaseModel";

class Translation extends BaseModel {
    constructor() {
        super();
    }

    _render() {
        let url     = window.location.href,
            phrase  = this.innerHTML,
            pos     = url.indexOf('/app/'),
            lang    = document.documentElement.lang.toLowerCase();

        if(pos <= 0) {
            pos = url.length;
        }

        url = url.substring(0, pos);
        url += `/resources/lang/${lang}.json`;

        fetch(url)
        .then(response => {
            if(response.ok) {
                return response.json();
            } else {
                return false;
            }
        }).then(data => {
            if(data && (phrase in data)) {
                this.innerHTML = data[phrase];
            }
        }).catch(error => console.error(error));
    }
}

export default Translation;