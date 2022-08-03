import BaseModel from "../../BaseModel";

class TableCell extends BaseModel {
    static observedAttributes = ['heading', 'renderable'];

    requiredAttributes = [];

    castAttributes = {
        heading     : 'boolean',
        renderable  : 'boolean' 
    }

    constructor() {
        super();
    }

    _render() {
        if(this.attr.renderable) {
            const innerHTML = this.innerHTML;
            let cell;

            if(this.attr.heading) {
                cell = `<th>${innerHTML}</th>`;
            } else {
                cell = `<td>${innerHTML}</td>`;
            }

            this.outerHTML = outer;
        }
    }
}

export default TableCell;