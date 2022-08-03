import BaseModel from "../BaseModel";
import view from "../HelperFunctions/View";

import WithMethod from "./Html/ActionWithMethod.html";
import WithoutMethod from "./Html/ActionWithoutMethod.html";
import ItemHtml from "./Html/ActivityItem.html";

class ActivityItem extends BaseModel {

    static observedAttributes = [
        'icon', 
        'icon-type', 
        'title', 
        'details',
        'details-highlight',
        'action-modal', 
        'action-modal-title',
        'action-text', 
        'action-url',
        'action-method',
    ];

    requiredAttributes =  [
        'icon', 
        'icon-type', 
        'title', 
        'details'
    ];

    castAttributes =  [];

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
            if('action-method' in this.attr) {
                action = view(
                    WithMethod, 
                    {
                        method  : this.attr['action-method'],
                        text    : this.attr['action-text'],
                        url     : this.attr['action-url']
                    }
                );
            } else {
                let href = this.attr['action-url'];
                if('action-modal' in this.attr && 'action-modal-title' in this.attr) {
                    href= '#!';
                    action = `
                    data-ajax-popup="true"
                    data-title="${this.attr['action-modal-title']}"
                    data-url="${this.attr['action-url']}"
                    `;
                }
                action = view(
                    WithoutMethod,
                    {
                        href    : href,
                        text    : this.attr['action-text'],
                        modal   : action
                    }
                );
            }
        }
        
        if('details-highlight' in this.attr) {
            highlight = `<a href="#!">${this.attr['details-highlight']}</a>`;
        }

        this.className = 'activity';
        this.innerHTML = view(
            ItemHtml,
            {
                'icon-type' : this.attr['icon-type'],
                icon        : this.attr.icon,
                title       : this.attr.title,
                action      : action,
                details     : this.attr.details,
                highlight   : highlight
            }
        );
    }
}

export default ActivityItem;