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

    let sortParam = urlParams.get("sort");
    if (sortParam == null) {
        let fullURL = originURL + '/?sort=' + dataSort;
        window.location.replace(fullURL);
    }


    let currentOrderDesc = sortParam.slice(-5);

    if (currentOrderDesc !== ',desc') {
        let fullURL = originURL + '/?sort=' + dataSort + ',desc';
        console.log(fullURL);
        window.location.replace(fullURL);
    } else {
        let orderAsc = sortParam.slice(0, -5);
        let fullURL = originURL + '/?sort=' + orderAsc;
        window.location.href = fullURL;
    }
})
