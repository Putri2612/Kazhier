import BaseModel from "../../BaseModel";

class TableHeader extends BaseModel {
    static observedAttributes = [];

    requiredAttributes = [];

    castAttributes = {}

    constructor() {
        super();
    }

    _render() {
        const rows = this.querySelectorAll('pg-row');
        rows.forEach(row => {
            row.setAttribute('type', 'heading');
            row.setAttribute('renderable', true);
        });

        this.outerHTML = `<thead>${this.innerHTML}</thead>`;
    }
}

export default TableHeader;