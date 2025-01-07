$(document).on('click','.popup_selector',function (event) {
    event.preventDefault();
    var updateID = $(this).attr('data-inputid'); // Btn id clicked
    var elfinderUrl = '/elfinder/popup/';

    // trigger the reveal modal with elfinder inside
    var triggerUrl = elfinderUrl + updateID;
    $.colorbox({
        href: triggerUrl,
        fastIframe: true,
        iframe: true,
        width: '70%',
        height: '100%'
    });

});
// function to update the file selected by elfinder
function processSelectedFile(filePath, requestingField) {
    let fileUrl = filePath.replace(/\\/g, '/');
    $('#' + requestingField).val(fileUrl).trigger('change');
    $('.post-thumb').html(`<img src="/${fileUrl}" alt="Post thumb" width="200px">`);
}
