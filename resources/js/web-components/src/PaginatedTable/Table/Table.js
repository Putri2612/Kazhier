import BaseModel from "../../BaseModel";
import view from "../../HelperFunctions/View";
import Pagination from "../Class/Pagination";

import table from "./Table.html";

class PaginatedTable extends BaseModel {
    static observedAttributes = [
        'getter-url', 'limit', 'page'
    ];

    requiredAttributes = [
        'getter-url',
    ];

    castAttributes = {
        'getter-url': 'url',
        'limit'     : 'integer',
        'page'      : 'integer'
    }

    constructor() {
        super();
        this.attr = {
            page    : 1,
            limit   : 10
        }
        this._options   = {};
    }

    _render() {
        if(!this.rendered) {
            const template  = this.querySelector('template'),
                header      = template.content.querySelector('thead'),
                body        = template.content.querySelector('tbody');

            if(header) {
                this._header = header.cloneNode(true);
            }
            
            this._bodyTemplate = body.cloneNode(true);

            this.innerHTML  = table;
            this._table     = this.querySelector('table');

            if(this._header) {
                this._table.append(this._header);
            }
            
            this._pagination = new Pagination({table: this._table, url: this.attr['getter-url']});
            this._pagination.format = this._bodyTemplate.innerHTML;

            this._paginationList = this.querySelector('pg-list');
            this._paginationList.callback = (page) => this._paginationCallback(page);

            this._pagination.callback = (data, status) => {
                if(status == 200) {
                    this._paginationList.setAttribute('max', data.pages);
                    return;
                }

                this._paginationList.setAttribute('page', 1);
                this._paginationList.setAttribute('max', 1);
            }
        }
        if(this.querySelector('tbody')) {
            this.querySelector('tbody').innerHTML = '';
        }

        
        this._pagination.get({
            page: this.attr.page, 
            limit: this.attr.limit
        });
    }

    set options(options = {}) {
        this._options = options;
    }

    _paginationCallback(page) {
        this.setAttribute('page', page);
    }
}

export default PaginatedTable;