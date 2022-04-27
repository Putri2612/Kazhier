const PGSetup = {
    EmptyText : 'No Data Found',
}

class Pagination {
    constructor({
        locale  = 'id', 
        table   = 'table[data-pagination-table]',
        pageContainer,
        limitContainer,
        additionalForm,
        navigation = {
            previous : 'Prev',
            next : 'Next',
            limit : 'Entries per page'
        }
    }) {
        this._locale    = locale;
        this._table     = document.querySelector(table);
        this._page      = 1;
        this._limit     = 10;
        this._navigation= navigation;
        this._currency  = 'IDR';
        this._dateStyle = {
            year: 'numeric',
            month: 'short',
            day: 'numeric',
        };
        this._formChanged = false;

        if(!this._table) {
            throw 'Cannot find the table';
        }

        if(pageContainer) {
            this._paginator = document.querySelector(pageContainer);
        }

        if(limitContainer) {
            this._limiter   = document.querySelector(limitContainer);
        }

        if(additionalForm) {
            const self = this;
            this._form  = document.querySelector(additionalForm);
            this._form.addEventListener('submit', event => {
                event.preventDefault();
                self._formChanged = true;
                self.getData();
            });
        }
    }

    init() {
        this.getData();
        this.renderLimiter();
    }

    set additionalData(data = new FormData) {
        this._additionalData = data;
    }

    set format(format = () => '') {
        this._format = format;
    }

    getData() {
        if(!this._table.hasAttribute('data-pagination-url')) {
            throw 'Getter url is not set properly';
        }

        const url = this._table.getAttribute('data-pagination-url');

        let data;

        if(this._formChanged) {
            data = new FormData(this._form);
        } else {
            data = new FormData;
        }

        if(this._additionalData) {
            for(let additional of this._additionalData.entries()) {
                data.append(additional[0], additional[1]);
            }
        }

        data.append('page', this._page);
        data.append('limit', this._limit);
        data.append('_token', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));

        fetch(url, { method: 'POST', headers: {Accept: 'application/json'}, body: data })
        .then(response => {
            if(response.ok) {
                return response.json();
            } else if (response.status == 404) {
                response.json().then(data => {
                    toastrs('Warning', data.message, 'warning');
                    this.loadData([]);
                    this.renderPaginator(1);
                })
            } else {
                response.json().then(data => {
                    throw data.message;
                }).catch(error => {
                    toastrs('Error', error, 'error');
                    console.error(error);
                });
                return false;
            }
        }).then(data => {
            if(data) {
                this.loadData(data.data);
                this.renderPaginator(data.pages);
                this._currency = data.currency;
                this._dateStyle = data.date;
            }
        }).catch(error => {
            throw error;
        });
    }

    loadData(data = []) {
        if(typeof data === 'string') {
            data = JSON.parse(data);
        }
        let tbody = this._table.querySelector('tbody');
        if(tbody) {
            tbody.innerHTML = '';
        } else {
            tbody = document.createElement('tbody');
            this._table.appendChild(tbody);
        }

        if(data.length){
            data.forEach(item => {
                let row = this._format(item);

                tbody.insertAdjacentHTML('beforeend', row);
            });
        } else {
            const count = this._table.querySelectorAll('thead th').length,
                row = document.createElement('tr'),
                cell = document.createElement('td');
            cell.setAttribute('colspan', count);
            cell.className = 'text-center';
            cell.innerHTML = PGSetup.EmptyText;
            row.append(cell);
            tbody.append(row);
        }
    }

    renderPaginator(totalPage) {
        let container;
        if(this._paginator) {
            container = this._paginator;
        } else {
            container = this._table.parentNode;
        }
        let nav;
        if(container.querySelector('nav')) {
            nav = container.querySelector('nav');
            nav.innerHTML = '';
        } else {
            nav = document.createElement('nav');
            nav.setAttribute('aria-label', 'Data page navigation');
            container.appendChild(nav);
        }
        if(totalPage > 1) {

            const list    = document.createElement('ul');
            
            list.className = 'pagination justify-content-end';
            nav.appendChild(list);

            if(this._page > 1) {
                const previous  = document.createElement('li'),
                    self = this;
                previous.className = "page-item";
                previous.innerHTML = `<a href="#!" class="page-link">${this._navigation.previous}</a>`;
                previous.addEventListener('click', event => self.switchPage(self._page - 1) );

                list.appendChild(previous);
            }
            for(let index = 1; index <= totalPage; index++) {
                if(index == 1 || (index > this._page - 3 && index < this._page + 3) || index == totalPage) {
                    const pageItem = document.createElement('li'),
                        self = this;
                    pageItem.className = 'page-item';
                    if(index == this._page) {
                        pageItem.classList.add('active');
                        pageItem.setAttribute('aria-current', 'page');
                    }
                    pageItem.innerHTML = `<a href="#!" class="page-link">${index}</a>`;
                    if(index != this._page){
                        pageItem.addEventListener('click', event => self.switchPage(index));
                    }
                    
                    list.appendChild(pageItem);
                } else if ( index == this._page - 3 || index == this._page + 3) {
                    const pageItem = document.createElement('li');
                    pageItem.className = 'page-item disabled';
                    pageItem.innerHTML = `<a href="#!" class="page-link">...</a>`;
                    list.appendChild(pageItem);
                }
            }
            if(this._page < totalPage) {
                const next  = document.createElement('li'),
                    self    = this;
                next.className = 'page-item';
                next.innerHTML = `<a href="#!" class="page-link">${this._navigation.next}</a>`;
                next.addEventListener('click', event => self.switchPage(self._page + 1) );

                list.appendChild(next);
            }
        }
    }

    switchPage (page) {
        this._page = page;
        this.getData();
    }

    renderLimiter() {
        let container;
        if(this._limiter) {
            container = this._limiter;
        } else {
            container = this._table.parentNode;
        }
        const select = document.createElement('select'),
            label    = document.createElement('label'),
            self     = this;

        select.id = "paginator-limit";
        select.className = "form-select";
        select.setAttribute('aria-label', 'Data limit selector');

        for(let index = 2; index < 6; index++) {
            const option = document.createElement('option'),
                limit = index * 5;
            option.innerText = limit;
            option.value     = limit;
            select.appendChild(option);
        }
        select.addEventListener('change', event => {
            console.log('berubah');
            self._page  = 1;
            self._limit = select.value;
            self.getData();
        })

        container.appendChild(select);

        label.innerText = this._navigation.limit;
        label.className = 'form-label';
        container.appendChild(label);
    }

    numberFormat(number) {
        return new Intl.NumberFormat([this._locale, 'id']).format(number);
    }

    priceFormat(number) {
        let formatted;
        try {
            formatted = new Intl.NumberFormat(this._locale, { style: 'currency', currency: this._currency}).format(number);
        } catch (error) {
            try {
                formatted = new Intl.NumberFormat('id', { style: 'currency', currency: 'IDR' }).format(number);
            } catch (error) {
                console.error(error);
            }
        }
        return formatted;
    }

    dateFormat(date) {
        const time = new Date(date);
        return new Intl.DateTimeFormat([this._locale, 'id'], this._dateStyle ).format(time);
    }
}