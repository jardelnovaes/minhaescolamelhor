/*
	English App 	
	using Laravel 5.1, PHP 5.5, MySQL 5, Blade.	
	by Jardel Novaes
*/

function wordControllerInit(lesson){
	$("#book_id").change(function (event){
		event.preventDefault();
		url = "/engapp/api/complete/book/" + $(this).val();
		console.debug("url: " + url);
		$("#lesson_id").html('<option>loading...</option>');
		$.getJSON(url, function(data) {
			var items = [];			
			$.each(data.book.lessons, function(key, val){				
				items.push("<option value='" + val.id + "' " + ((lesson==val.id) ? "selected='selected'" : "")  + ">" + val.name + "</option>");
			});
			$("#lesson_id").html(items);
		});
	});
	$("#book_id").change();
}