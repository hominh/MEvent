
$("div.alert").delay(3000).slideUp();
function confirmDelete(msg) {
	if(window.confirm(msg)) {
		return true;
	}
	return false;
}

$(document).ready(function() {
	$("a#delImageSlide").click(function(){
		var url = "http://localhost:8000/admin/slide/delImg/";
		var _token = $("form[name='frmEditSlide']").find("input[name='_token']").val();
		var idslide = $('#holder').attr("idHinh");
		var srcImage = $(this).parent().find("img").attr("src");
		var id = $(this).parent().find("img").attr("id");
		$.ajax({
			url: url+idslide,
			type: 'GET',
			cache: false,
			data: {"_token":_token,"idslide":idslide,"urlImage":srcImage},
			success: function (data) {
				if(data == "ok") {
					$("#holder").remove();
				}
			}
		});
	});

	$("a#delImageService").click(function(){
		var url = "http://localhost:8000/admin/service/delImg/";
		var _token = $("form[name='frmEditService']").find("input[name='_token']").val();
		var idimage =  $('#holder').attr("idHinh");
		var srcImage = $(this).parent().find("img").attr("src");
		var id = $(this).parent().find("img").attr("id");
		$.ajax({
			url: url+idimage,
			type: 'GET',
			cache: false,
			data: {"_token":_token,"idimage":idimage,"urlImage":srcImage},
			success: function (data) {
				if(data == "ok") {
					$("#holder").remove();
				}
			}
		});
	});

	$("a#delImageBrand").click(function(){
		var url = "http://localhost:8000/admin/brand/delImg/";
		var _token = $("form[name='frmEditBrand']").find("input[name='_token']").val();
		var idbrand =  $('#holder').attr("idHinh");
		var srcImage = $(this).parent().find("img").attr("src");
		var id = $(this).parent().find("img").attr("id");
		$.ajax({
			url: url+idbrand,
			type: 'GET',
			cache: false,
			data: {"_token":_token,"idbrand":idbrand,"urlImage":srcImage},
			success: function (data) {
				if(data == "ok") {
					$("#holder").remove();
				}
			}
		});
	});


});
