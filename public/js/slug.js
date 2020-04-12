$("#name").on('change', function() {
	var url_ =  $("#url_hostname").val() + "create-slug";
	var base_url = $("#base_url").val();
	$.get(url_, { str: $(this).val(), }, function (data) {
          $('#slug').val(data.slug);
          $('#link').val(base_url + data.slug);
    });
});