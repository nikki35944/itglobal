$(document).ready(function()
{
    $("#dtBox").DateTimePicker({
        dateTimeFormat: "yyyy-MM-dd HH:mm:ss",
        language: "ru",
    });
});



$('table .table-sort').on('click', function (e) {
    e.preventDefault();

    let url = new URL(document.URL);
    let originURL = url.origin;
    let urlParams = new URLSearchParams(document.location.search);

    let dataSort = this.dataset.sort;
    let dataSortDesc = dataSort + ',desc';
    let currentSortParam = urlParams.get("sort");

    if (currentSortParam == null) {
        let fullURL = originURL + '/?sort=' + dataSort;
        window.location.replace(fullURL);
    }

    let currentOrderDesc = currentSortParam.slice(-5);

    if (currentOrderDesc !== ',desc' && currentSortParam === dataSort) {
        let fullURL = originURL + '/?sort=' + dataSort + ',desc';
        window.location.replace(fullURL);
    }
    if (currentOrderDesc === ',desc' && currentSortParam === dataSortDesc) {
        let orderAsc = currentSortParam.slice(0, -5);
        let fullURL = originURL + '/?sort=' + orderAsc;
        window.location.href = fullURL;
    }
    if (currentSortParam !== dataSort) {
        let fullUrl = originURL + '/?sort=' + dataSort;
        window.location.replace(fullUrl);
    }
})
