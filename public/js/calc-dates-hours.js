export function calcDate(date) {
    let itemsDate = date.split("/");

    if (itemsDate[0].length == 1 && itemsDate[1].length == 1) {
        return `${itemsDate[2]}-0${itemsDate[1]}-0${itemsDate[0]}`;
    } else if (itemsDate[0].length == 1) {
        return `${itemsDate[2]}-${itemsDate[1]}-0${itemsDate[0]}`;
    } else if (itemsDate[1].length == 1) {
        return `${itemsDate[2]}-0${itemsDate[1]}-${itemsDate[0]}`;
    }
    
    return `${itemsDate[2]}-${itemsDate[1]}-${itemsDate[0]}`
}

export function calcHour(hour) {
    let itemsHour = hour.split(":");

    if (itemsHour[0].length == 1) return `0${itemsHour[0]}:${itemsHour[1]}`;

    return `${itemsHour[0]}:${itemsHour[1]}`;
}
