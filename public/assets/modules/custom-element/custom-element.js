// essential functions
const thousandSeparator = (num) => {
    num += '';
    x  = num.split(',');
    x1 = x[0];
    x2 = x.length > 1 ? ',' + x[1] : '';
    let rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)){
        x1 = x1.replace(rgx, '$1' + '.' + '$2');
    }
    return x1 + x2;
}

const cssHref = './assets/modules/custom-element/custom-element.css';

// Features
class FeatureItem extends HTMLElement{
    constructor(){
        super();
        this._shadowRoot = this.attachShadow({mode: 'closed'});
        let css = document.createElement('link');
        css.setAttribute('rel', 'stylesheet');
        css.setAttribute('href', cssHref)
        this._shadowRoot.appendChild(css);
    }

    connectedCallback(){
        this.icon = this.getAttribute('icon');
        this.name = this.getAttribute('name');
        this.isImage = this.getAttribute('is-icon-image');
        this.isFontAwesome = this.getAttribute('is-FA');

        let container = document.createElement('div');
        container.classList.add('feature-item');

        let iconContainer = document.createElement('div');
        iconContainer.classList.add('icon-container');
        if(this.isImage == "true"){
            let icon = document.createElement('img');
            icon.setAttribute('src', this.icon);
            icon.setAttribute('height', '48');
            icon.setAttribute('width', 'auto')
            iconContainer.appendChild(icon);
        } else if(this.isFontAwesome == "true"){
            let css = document.createElement('link');
            css.setAttribute('rel', 'stylesheet');
            css.setAttribute('href', './app/assets/modules/fontawesome/css/all.min.css');
            this._shadowRoot.appendChild(css);

            let font_awesome = document.createElement('i');
            let fa_class = this.icon.split(' ');
            font_awesome.classList.add(fa_class[0], fa_class[1]);
            iconContainer.appendChild(font_awesome);
        } else if(this.icon == "ellipsis"){
            let dotContainer = document.createElement('div');
            dotContainer.style.display = 'flex';
            dotContainer.style.alignItems = 'center';
            dotContainer.style.justifyContent = 'center';
            for(let i = 0; i < 3; i++){
                let dots = document.createElement('div');
                dots.style.width='0.75rem';
                dots.style.height='0.75rem';
                dots.style.background='white';
                dots.style.borderRadius='50%';
                dots.style.margin= '0.1rem';
                dotContainer.appendChild(dots);
            }
            iconContainer.appendChild(dotContainer);
        }
        container.appendChild(iconContainer);

        let featureName = document.createElement('div');
        featureName.classList.add('name');
        featureName.innerHTML = this.name;
        container.appendChild(featureName);

        this._shadowRoot.appendChild(container);
    }
}
customElements.define('feature-item', FeatureItem);

class FeatureList extends HTMLElement{
    constructor(){
        super();
        this._shadowRoot = this.attachShadow({mode: 'closed'});
        let css = document.createElement('link');
        css.setAttribute('rel', 'stylesheet');
        css.setAttribute('href', cssHref)
        this._shadowRoot.appendChild(css);
    }
    connectedCallback(){
        let container = document.createElement('div');
        container.classList.add('feature-list');
        container.innerHTML = this.innerHTML;
        this._shadowRoot.appendChild(container);
    }
}
customElements.define('feature-list', FeatureList);

// Paket layanan
class PlanCard extends HTMLElement{
    constructor(){
        super();
        this._shadowRoot = this.attachShadow({mode: 'closed'});
    }
    connectedCallback(){
        let content   = JSON.parse(this.innerHTML);
        this.name     = content.name;
        this.price    = content.price;
        this.users    = content.max_users;
        this.account  = content.max_account;
        this.duration = content.duration;
        let planName  = this.name;
        let planPrice = thousandSeparator(this.price);
        let users     = ( this.users < 1 ? 'Hanya 1 akun' : `Hingga ${this.users} akun`);
        let account   = ( this.account <= 1 ? 'Hanya 1 kas': `Hingga ${this.account} kas`);
        let duration  = ( this.duration == 'Unlimited' ? 'Selamanya' : (this.duration == 'year' ? 'Per Tahun' : 'Per Bulan'));

        let css       = document.createElement('link');
        css.setAttribute('rel', 'stylesheet');
        css.setAttribute('href', cssHref)
        this._shadowRoot.appendChild(css);

        let container    = document.createElement('div');
        container.classList.add('card-content');

        let cardContent      = document.createElement('div');
        cardContent.classList.add('planName');
        cardContent.innerHTML= planName;
        container.appendChild(cardContent);

        cardContent          = document.createElement('div');
        cardContent.classList.add('priceTag');
        cardContent.innerHTML= `<sup>Rp</sup> ${planPrice}`;
        container.appendChild(cardContent);

        cardContent          = document.createElement('div');
        cardContent.classList.add('planDuration');
        cardContent.innerHTML= duration;
        container.appendChild(cardContent);

        cardContent          = document.createElement('ul');
        cardContent.classList.add('features');
        let cardContentList  = document.createElement('li');
        cardContentList.innerHTML = users;
        cardContent.appendChild(cardContentList);
        cardContentList      = document.createElement('li');
        cardContentList.innerHTML = account;
        cardContent.appendChild(cardContentList);
        container.appendChild(cardContent);

        this._shadowRoot.appendChild(container);
    }
}

customElements.define('plan-card', PlanCard);

class PlanDisplay extends HTMLElement{
    constructor(){
        super();
        this._shadowRoot = this.attachShadow({mode: 'closed'});
        
    }
    connectedCallback(){
        this.link = this.getAttribute('url');
        let JSONString;
        let xhr = new XMLHttpRequest();
        xhr.onreadystatechange = () => {
            if(xhr.readyState == 4 && xhr.status == 200) {
                JSONString = xhr.responseText;
                this.attachCard(JSON.parse(JSONString));
            }
        };
        xhr.open("GET", this.link, true);
        xhr.send();
    }
    attachCard(data){
        let css = document.createElement('link');
        css.setAttribute('rel', 'stylesheet');
        css.setAttribute('href', cssHref)
        this._shadowRoot.appendChild(css);

        let container = document.createElement('div');
        container.classList.add('display-content');
        data.forEach(item => {
            let itemString = JSON.stringify(item);
            let card = document.createElement('plan-card');
            card.innerHTML = itemString;
            container.appendChild(card);
        });
        this._shadowRoot.appendChild(container);
    }
}
customElements.define('plan-display', PlanDisplay);