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

// Pagination
import PaginationNext from "./Pagination/PaginationNext/PaginationNext";
customElements.define('pg-next', PaginationNext);

import PaginationPrevious from "./Pagination/PaginationPrevious/PaginationPrevious";
customElements.define('pg-prev', PaginationPrevious);

import PaginationNumber from "./Pagination/PaginationNumber/PaginationNumber";
customElements.define('pg-number', PaginationNumber);

import Pagination from "./Pagination/Pagination";
customElements.define('pg-list', Pagination);

// Paginated Table
import PaginatedTable from "./PaginatedTable/Table/Table";
customElements.define('pg-tbl', PaginatedTable);