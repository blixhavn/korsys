$('.timepicker').timepicker();
$('.datepicker').datepicker({ dateFormat: 'yy-mm-dd' });
$('.oppdrag-notat').popover({html: true});
$('.faktura-notat').popover({html: true});


function toggleDiv(id){

 if ( $('#'+id).is(':visible')) {
        $('#'+id).slideUp();
    } else {
        $('#'+id).slideDown();
    }
return false;
}

$(".toggle").change(function() {
	toggleDiv($(this).attr("toggle-this"));
});

$("a.confirm").click(function(event) {
	event.preventDefault();
	if (confirm($(this).attr('confirm-text'))) {
		window.location = $(this).attr("href");
	}
});

$("form.confirm").submit(function(event) {
	event.preventDefault();
	if (confirm('Er du sikker på at du vil slette hendelsen?')) {
		this.submit();
	} else {
		alert("Ok, ingen skade skjedd.");
	}
  });

$("select.hotsubmit").change(function() {
	$(this).parents('form:first').submit();
});

$("button.toggle").click(function(event) {
	if($(this).html() == "+") {
		$("#"+$(this).attr("hide-div")).slideDown();
		$(this).html("-");
	} else {
		$("#"+$(this).attr("hide-div")).slideUp();
		$(this).html("+");
	}
});
