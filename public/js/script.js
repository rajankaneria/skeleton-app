var baseURL;
$(function(){
	baseURL = $("#baseURL").val();
});


function deleteConfirm(userid)
{
	$("#deleteConfirm").openModal();
	$("#deleteBtn").off("click");
	$("#deleteBtn").on("click",function(){
		deleteUser(userid);
	});
}

function deleteUser(userid)
{
	$("#deleteBtn").addClass("disabled");
	$("#deleteBtn").html("Processing");
	$.post(baseURL+"/user/delete",{userid:userid},function(data){
		$("#deleteBtn").removeClass("disabled");
		$("#deleteBtn").html("Delete");
		$("#deleteConfirm").closeModal();
		$("#user"+userid).fadeOut(300);
		console.log(data);
	});
}