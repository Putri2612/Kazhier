import BaseModel from "../BaseModel";

class ActivityItem extends BaseModel {

    static get observedAttributes() {
        return [
            'icon', 
            'icon-type', 
            'title', 
            'details',
            'details-highlight',
            'action-modal', 
            'action-modal-title',
            'action-text', 
            'action-url',
        ];
    }

    get requiredAttributes () {
        return [
            'icon', 
            'icon-type', 
            'title', 
            'details'
        ];
    }

    get castAttributes () {
        return [];
    }

    get availableAttributes () {
        return [
            'icon', 
            'icon-type', 
            'title', 
            'details',
            'details-highlight',
            'action-modal',
            'action-modal-title',
            'action-text', 
            'action-url'
        ];
    }

    constructor () {
        super();
    }

    _render() {
        const validator = this._validateAttr();
        if(validator.error) {
            console.error(validator.message);
            return;
        }

        let action = '',
            highlight = '';

        if('action-text' in this.attr && 'action-url' in this.attr) {
            let href = this.attr['action-url'];
            if('action-modal' in this.attr && 'action-modal-title' in this.attr) {
                href= '#!';
                action = `
                data-ajax-popup="true"
                data-title="${this.attr['action-modal-title']}"
                data-url="${this.attr['action-url']}"
                `;
            }
            action = `
            <a href="${href}"
                class="btn btn-primary btn-action me-1 float-right"
                ${action}>
                ${this.attr['action-text']}
            </a>
            `;
        }
        
        if('details-highlight' in this.attr) {
            console.log('ada highlight');
            highlight = `<a href="#!">${this.attr['details-highlight']}</a>`;
        }

        this.className = 'activity';
        this.innerHTML = `
        <div class="activity-icon bg-primary text-white shadow-primary">
            <i class="fa-${this.attr['icon-type']} fa-${this.attr.icon}"></i>
        </div>
        <div class="activity-detail">
            <div class="mb-2">
                <span class="text-job text-primary"><h6>${this.attr['title']}</h6></span>
            </div>
            ${action}
            <p>${this.attr['details']} ${highlight}</p>
        </div>`;
    }
}

export default ActivityItem;