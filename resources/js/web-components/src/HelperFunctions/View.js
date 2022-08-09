const view = (html, values = {}) => {
    for (const valName in values) {
        if (Object.hasOwnProperty.call(values, valName)) {
            const element   = values[valName];

            if(Array.isArray(element)) {
                const replacement = element.toString();
                const regstring = `\\\${${valName}}`,
                    regex       = new RegExp(regstring, 'g');

                html = html.replace(regex, replacement);
            } else if(typeof element == 'object') {
                for (const name in element) {
                    if (Object.hasOwnProperty.call(element, name)) {
                        const value = element[name];
                        const regstring = `\\\${${valName}.${name}}`,
                            regex       = new RegExp(regstring, 'g');

                        html = html.replace(regex, value);
                    }
                }
            } else {
                const regstring = `\\\${${valName}}`,
                    regex       = new RegExp(regstring, 'g');
                html = html.replace(regex, element);
            }

        }
    }

    html = html.replace(/\${\w+\.*\w*}/g, '');

    return html;
}

export default view;