let pageSize = 5;
// let currentPage = 1;

// function previousPage(currentPage, callback) {
//     if (currentPage > 1) {
//         // currentPage--;
//         callback();
//     }
// }

// function nextPage(currentPage, arrayParam, callback) {
//     if ((currentPage * pageSize) < arrayParam.length) {
//         // currentPage++;
//         callback();
//     }
// }

function numberOfPages(arrayParam) {
    return Math.ceil(arrayParam.length / pageSize);
}
