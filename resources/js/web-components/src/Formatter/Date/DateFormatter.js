import BaseModel from "../../BaseModel";
import getLang from "../../HelperFunctions/DocumentLang";

class DateFormatter extends BaseModel {
    static format   = {}
    static fetching = false;

    constructor() {
        super();

        this._locale = getLang();
        if(Object.keys(DateFormatter.format).length) {
            console.log(DateFormatter.format);
            return;
        }

        const storage = localStorage.getItem('date-format');
        if(storage) {
            DateFormatter.format = JSON.parse(storage);
            return;
        }

        if(!DateFormatter.fetching) {
            DateFormatter.fetching = true;

            let url     = window.location.href,
                pos     = url.indexOf('kazhier'),
                slashPos;

            if(pos <= 0) {
                slashPos = url.length
            } else {
                slashPos = url.indexOf('/', pos);
            }

            if(slashPos <= 0) {
                slashPos = url.length;
            }

            url = url.substring(0, slashPos);
            url += `/api/v2/format/date`;

            fetch(url)
            .then(response => {
                if(!response.ok) {
                    response.text().then(error => console.error(error));
                    return false;
                } 
                return response.json();
            }).then(data => {
                DateFormatter.fetching = false;
                if(!data) {
                    return;
                }
                localStorage.setItem('date-format', JSON.stringify(data.data));
                DateFormatter.format = data.data;
                document.querySelectorAll('date-str').forEach(element => {
                    element.refresh();
                })
            }).catch(error => console.error(error));
        }
    }

    _render() {
        const date = new Date(this.innerHTML);
        this.innerHTML = new Intl.DateTimeFormat(
            [this._locale, 'id'],
            DateFormatter.format
        ).format(date);
    }

    refresh() {
        this._render();
    }
}

export default DateFormatter;