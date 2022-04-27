import BaseModel from "../BaseModel";

class ActivityContainer extends BaseModel {
    constructor() {
        super();
    }

    _render() {
        this.className = 'activities';
    }

    add({
        icon    = {type: 'solid', icon: 'ellipsis'},
        title   = 'Title',
        detail  = 'Small details',
        action  = false
    }) {
        const item = document.createElement('act-item');
        
        item.setAttribute('icon-type', icon.type);
        item.setAttribute('icon', icon.icon);
        item.setAttribute('title', title);
        item.setAttribute('details', detail);
        if(action && typeof action == 'object') {
            item.setAttribute('action-text', action.text);
            item.setAttribute('action-url', action.url);
            if('modal' in action && typeof action.modal == 'object') {
                item.setAttribute('action-modal', typeof action.modal == 'object');
                item.setAttribute('action-modal-title', action.modal.title)
            }
        }

        this.append(item);
    }
}

export default ActivityContainer;