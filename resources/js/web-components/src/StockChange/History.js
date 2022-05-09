import BaseModel from "../BaseModel";

class History extends BaseModel {
    
    static get observedAttributes() {
        return ['getter', 'limit'];
    }

    get requiredAttributes () {
        return ['getter'];
    }

    get castAttributes () {
        return {limit: 'integer'};
    }

    get availableAttributes () {
        return ['getter', 'limit'];
    }

    constructor() {
        super();
        this.page = 0;
        this.gettingData = false;
        this.attr = {
            limit: 5,
        };
    }


    _render() {
        const validator = this._validateAttr();
        if(validator.error) {
            console.error(validator.message);
            return;
        }

        this.style.maxHeight = '70vh';

        const activity  = this.act = document.createElement('act-box'),
            getBtn      = this.getBTN = document.createElement('button');

        getBtn.className = "btn btn-outline-primary btn-icon";
        getBtn.style.borderRadius = '50%';
        getBtn.innerHTML = `<i class="fa-solid fa-arrow-down fa-2x"></i>`;
        getBtn.addEventListener('click', event => {
            this._getData()
        });

        this.append(activity);
        this.append(getBtn);

        this._getData();
    }

    _appendAct(data = []) {
        data.forEach(item => {
            const icon  = item.quantity > 0 ? 'plus' : 'minus',
                date    = this.dateFormat(item.date);
            let detail  = '',
                focus   = `(${this.numberFormat(item.quantity)}`;

            if('invoice_number' in item) {
                detail = item.invoice_number;
            } else if('bill_number' in item) {
                detail = item.bill_number;
            } else {
                detail = item.description;
            }

            if('product' in item) {
                const product = item.product;
                if('unit' in product) {
                    focus += ` ${product.unit.name}`;
                }
            }
            focus += ')';
            
            this.act.add({
                icon    : {type: 'solid', icon: icon},
                title   : date,
                detail  : detail,
                focus   : focus,
                action  : false
            })
        })
    }

    _getData() {
        if(!this.gettingData){
            this.gettingData = true;

            const getIcon = this.getBTN.querySelector('i');
            const prevPage = this.page;

            this.getBTN.disabled = true;
            getIcon.classList.remove('fa-arrow-down');
            getIcon.classList.add('fa-ellipsis');

            const data = new FormData;
            data.append('limit', this.attr.limit);
            data.append('page', ++this.page);
            data.append('_token', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));

            fetch(this.attr.getter, {
                method: 'POST',
                headers: {
                    'accept': 'application/json',
                },
                body: data
            })
            .then(response => {
                if(response.ok) {
                    return response.json();
                } else {
                    response.json().then(error => console.error(error.message));
                    return false;
                }
            }).then(data => {
                this.getBTN.disabled = false;
                getIcon.classList.remove('fa-ellipsis');
                getIcon.classList.add('fa-arrow-down');
                
                if(data) {
                    this._dateStyle = data.date;
                    this._maxPage   = data.pages;
                    this._appendAct(data.data);
                    if(this.page == data.pages) {
                        this.removeChild(this.getBTN);
                    }
                } else {
                    if(prevPage){
                        this.page = prevPage;
                    }
                    if(this.page == 1 || this.page == this._maxPage){
                        this.removeChild(this.getBTN);
                        const noItem = document.createElement('div');
                        noItem.className = 'text-center';
                        noItem.innerHTML = `
                            <i class="fa-solid fa-5x fa-box-open text-secondary"></i><br/>
                            <span><tl-str class="text-secondary">No older history</tl-str></span>
                        `
                        this.append(noItem);
                    }
                }
                setTimeout(() => {
                    this.gettingData = false;
                }, 500);
            });
        }
    }

    dateFormat(date) {
        const time = new Date(date),
            locale = document.documentElement.lang;
        return new Intl.DateTimeFormat([locale, 'id'], this._dateStyle ).format(time);
    }

    numberFormat(number) {
        const locale = document.documentElement.lang;
        return new Intl.NumberFormat([locale, 'id']).format(number);
    }
}

export default History;