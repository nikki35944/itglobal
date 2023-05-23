$(document).ready(function()
{
    $("#dtBox").DateTimePicker({
        dateTimeFormat: "yyyy-MM-dd HH:mm:ss",
        language: "ru",
    });
});

$('#nav__sort-tasks').on('change', function () {
    let url = new URL(document.URL);
    let originURL = url.origin;
    let sortParam = this.value;
    let fullURL = originURL + '/?sort=' + sortParam;

    window.location.replace(fullURL);
});

$('.card .task__edit-link').on('click', function (){

    let editLinkContainer = this.querySelector('.edit-link__container');

    if ( editLinkContainer.style.display === 'none' || !editLinkContainer.style.display) {
        editLinkContainer.style.display = 'block';
    } else {
        editLinkContainer.style.display = 'none';
    }
});
