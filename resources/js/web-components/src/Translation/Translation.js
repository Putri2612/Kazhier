import BaseModel from "../BaseModel";

class Translation extends BaseModel {

    static data = {};
    static fetching = false;

    constructor() {
        super();
        if(!Object.keys(Translation.data).length && !Translation.fetching) {
            Translation.fetching = true;

            let url     = window.location.href,
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
                    response.text().then(error => console.error(error));
                    return false;
                }
            }).then(data => {
                Translation.data = data;
                Translation.fetching = false;
                document.querySelectorAll('tl-str').forEach(element => {
                    element.refresh();
                })
            }).catch(error => console.error(error));
        }
    }

    _render() {
        let phrase = this.innerHTML;
        if(phrase in Translation.data) {
            this.innerHTML = Translation.data[phrase];
        }
    }

    refresh() {
        this._render();
    }
}

export default Translation;