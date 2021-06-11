$(document).ready(function () {
    $('.subphoto').click(function (e) { 
        e.preventDefault();
        $('#mainphoto').attr('src',$(this).attr('src'));
    });
});