import getLang from "../../HelperFunctions/DocumentLang";
import view from "../../HelperFunctions/View";

import empty from "./Empty.html";

class Pagination {
    constructor({
        table   = document.querySelector('table[data-pagination-table]'),
        url     = new URL('')
    }) {
        this._locale = getLang();

        if(typeof table == 'string') {
            table = document.querySelector(table);
        }

        if(typeof url == 'string') {
            url = new URL(url);
        }

        this._table = table;
        this._url   = url;
    }

    set format(format = '') {
        this._format = format;
    }

    set callback(callback = (data, status) => false) {
        this._callback = callback;
    }

    get({page = 1, limit = 10, data = {}}) {
        for (const key of this._url.searchParams.keys()) {
            this._url.searchParams.delete(key);
        }

        if(data) {
            for (const name in data) {
                if (Object.hasOwnProperty.call(data, name)) {
                    const additional = data[name];
                    this._url.searchParams.set(name, additional);
                }
            }
        }

        this._url.searchParams.set('page', page);
        this._url.searchParams.set('limit', limit);

        fetch(this._url, {headers: {'accept': 'application/json'}})
        .then(response => {
            

            if(!response.ok) {
                response.json().then(data => {
                    this._callback(data, response.status);
                    console.error(data.message);
                });
                return false;
            }
            return response.json();
        }).then(data => {
            if(!data) {
                return;
            }

            if(typeof this._callback == 'function') {
                this._callback(data, 200);
            }

            this._load(data.data);
        })
    }

    _load(data = []) {
        if(typeof data == 'string') {
            data = JSON.parse(data);
        }

        let tbody = this._table.querySelector('tbody');
        if(tbody) {
            tbody.innerHTML = '';
        } else {
            tbody = document.createElement('tbody');
            this._table.appendChild(tbody);
        }

        if(!data.length) {
            const count = this._table.querySelectorAll('thead th').length;
            tbody.innerHTML = view(empty, {colspan: count});

            return;
        }

        data.forEach(item => {
            const row = view(this._format, item);

            tbody.insertAdjacentHTML('beforeend', row);
        })
    }
}

export default Pagination;