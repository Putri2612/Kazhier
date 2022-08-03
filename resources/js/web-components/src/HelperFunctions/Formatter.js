const dateFormat = (date, style) => {
    const time = new Date(date),
        locale = document.documentElement.lang;
    return new Intl.DateTimeFormat([locale, 'id'], style ).format(time);
}

const numberFormat = (number) => {
    const locale = document.documentElement.lang;
    return new Intl.NumberFormat([locale, 'id']).format(number);
}

export {dateFormat, numberFormat};