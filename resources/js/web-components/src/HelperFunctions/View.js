const view = (html, values = {}) => {
    for (const valName in values) {
        if (Object.hasOwnProperty.call(values, valName)) {
            const element   = values[valName],
                regex       = new RegExp(`{{${valName}}}`, 'g');
            html = html.replace(regex, element);
        }
    }

    return html;
}

export default view;