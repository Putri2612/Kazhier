import Translation from "./Translation/Translation";
customElements.define('tl-str', Translation);

import FormBtn from "./Formbtn/FormBTN";
customElements.define('form-btn', FormBtn);

import ActivityItem from "./Activity/Item";
customElements.define('act-item', ActivityItem);

import ActivityContainer from "./Activity/Container";
customElements.define('act-box', ActivityContainer);

import {default as StockChange} from "./StockChange/History";
customElements.define('stock-change', StockChange);

// Paginated Table
import TableCell from "./PaginatedTable/TableCell/TableCell";
customElements.define('pg-cell', TableCell);

import TableRow from "./PaginatedTable/TableRow/TableRow";
customElements.define('pg-row', TableRow);

import TableHeader from "./PaginatedTable/TableHeader/TableHeader";
customElements.define('pg-header', TableHeader);