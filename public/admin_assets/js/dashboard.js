alert();
$(document).ready(function () {
    $('[card-type]').each(function(){
        var temp = $(this).attr('card-type');
        $(this).val(temp);
    });
})