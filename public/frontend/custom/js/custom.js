(function($){
    $('#selectEmbassy').select2();
    $('#selectEmbassy').on('change', function(){
        var link = $(this).find('option:selected').attr('link');
        if (link) {
            window.location.href = link;
        }
    });
}(jQuery));