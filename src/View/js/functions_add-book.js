$(function() {

    function nameFileAdd(input, file_name, label) {
        $(input).change(function () { 
            file_name.html(input.val());
            $(label).html('Arquivo selecionado:');
        });
    };

    nameFileAdd($('input[name=book_cover]'), $('span[name=book_cover]'), $('label[for=book_cover]'));
    nameFileAdd($('input[name=book_pdf]'), $('span[name=book_pdf]'), $('label[for=book_pdf]'));

});