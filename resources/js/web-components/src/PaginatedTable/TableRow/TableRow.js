import BaseModel from "../../BaseModel";
import view from "../../HelperFunctions/View";
import html from "./no-data.html";

class TableRow extends BaseModel {
    static observedAttributes = ['type', 'renderable'];

    requiredAttributes = ['type'];

    castAttributes = {
        type        : [ 'heading', 'data' ],
        renderable  : 'boolean' 
    }

    constructor() {
        super();
        this._dataIsSet = false;
    }

    set data(data) {
        this._dataIsSet = true;
        if(typeof data == 'string') {
            this._data = JSON.parse(data);
        } else {
            this._data = data;
        }
        this._render();
    }

    _render() {
        if(this.attr.renderable){
            const validator = this._validateAttr();
            if(validator.error) {
                console.error(validator.message);
                return;
            }

            let innerHTML;
            if(this.attr.type == 'heading') {
                const cells = this.querySelectorAll('pg-cell');
                cells.forEach(cell => {
                    cell.setAttribute('heading', true);
                    cell.setAttribute('renderable', true);
                });
                innerHTML = this.innerHTML;
            } else if(this._dataIsSet) {
                if(this._data) {
                    const cells = this.querySelectorAll('pg-cell');
                    cells.forEach(cell => {
                        const varNames = cell.innerHTML.match(/{(\w+)}/g);
                        if(varNames) {
                            varNames.forEach(name => {
                                if(name in this._data) {
                                    cell.innerHTML = cell.innerHTML.replace(/{(\w+)}/g, this._data[$1]);
                                }
                            });
                        }
                        cell.setAttribute('renderable', true);
                    });
                    innerHTML = this.innerHTML;
                } else {
                    const cells = this.querySelectorAll('pg-cell').length;
                    innerHTML = view(html, {colspan: cells});
                }
            }

            this.outerHTML  = `<tr>${innerHTML}</tr>`;
        }
    }
}

export default TableRow;