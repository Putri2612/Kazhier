import BaseModel from "../../BaseModel";
import getLang from "../../HelperFunctions/DocumentLang";

class CurrencyFormatter extends BaseModel {
    static format   = {}
    static fetching = false;

    constructor() {
        super();

        this._locale = getLang();
        if(Object.keys(CurrencyFormatter.format).length) {
            console.log(CurrencyFormatter.format);
            return;
        }

        const storage = localStorage.getItem('currency-format');
        if(storage) {
            CurrencyFormatter.format = JSON.parse(storage);
            return;
        }

        if(!CurrencyFormatter.fetching) {
            CurrencyFormatter.fetching = true;

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
            url += `/api/v2/format/currency`;

            fetch(url)
            .then(response => {
                if(!response.ok) {
                    response.text().then(error => console.error(error));
                    return false;
                } 
                return response.json();
            }).then(data => {
                CurrencyFormatter.fetching = false;
                if(!data) {
                    return;
                }
                localStorage.setItem('currency-format', JSON.stringify(data.data));
                CurrencyFormatter.format = data.data;
                document.querySelectorAll('price-str').forEach(element => {
                    element.refresh();
                })
            }).catch(error => console.error(error));
        }
    }

    _render() {
        const price = parseFloat(this.innerHTML);
        try {
            this.innerHTML = new Intl.NumberFormat(
                [this._locale, 'id'], 
                {
                    style: 'currency',
                    currency: CurrencyFormatter.format
                }
            ).format(price);
        } catch (error) {
            this.innerHTML = new Intl.NumberFormat(
                [this._locale, 'id'], 
                {
                    style: 'currency',
                    currency: 'IDR'
                }
            ).format(price);
        }
    }

    refresh() {
        this._render();
    }
}

export default CurrencyFormatter;