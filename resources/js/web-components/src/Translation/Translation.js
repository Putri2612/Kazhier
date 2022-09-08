import BaseModel from "../BaseModel";
import getLang from "../HelperFunctions/DocumentLang";

class Translation extends BaseModel {

    static data = {};
    static fetching = false;

    constructor() {
        super();
        const lang  = getLang(),
            oldLang = localStorage.getItem('trans-lang'),
            nofetch = lang == oldLang;

        if(Object.keys(Translation.data).length && nofetch) {
            return;
        }

        const storage = localStorage.getItem('translations');
        if(storage && nofetch) {
            Translation.data = JSON.parse(storage);
            return;
        }

        if(!Translation.fetching) {
            Translation.fetching = true;

            let url     = window.location.href,
                pos     = url.indexOf('/app/');

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
                localStorage.setItem('translations', JSON.stringify(data));
                localStorage.setItem('trans-lang', lang);
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