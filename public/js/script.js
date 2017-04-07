var baseURL;
$(function(){
	baseURL = $("#baseURL").val();
	$("#saveUser").on("click",function(){ saveUser(); });
	$("#updateUserBtn").on("click",function(){ updateUser(); });
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

function saveUser()
{
	$("#saveUser").addClass("disabled");
	$("#saveUser").html("Processing...");
	var userData = {
		"username": $("#username").val(),
		"fullname": $("#fullname").val(),
		"email": $("#email").val(),
		"phone": $("#phone").val(),
		"address": $("#address").val()
	};

	$.post(baseURL+"/user/save",{userData:userData},function(data){
		$("#deleteBtn").html("Redirecting...");
		window.location.href = baseURL+"/user/index";
	});
}


function editUser(userid)
{
	$("#updateUser").openModal();
	$.post(baseURL+"/user/get",{userid:userid},function(data){
		var userData = $.parseJSON(data);
		$("#username").val(userData.username);
		$("#fullname").val(userData.fullname);
		$("#email").val(userData.email);
		$("#phone").val(userData.phone);
		$("#address").val(userData.address);
		$("#userid").val(userData.id);
		Materialize.updateTextFields();
	});
}

function updateUser()
{
	$("#updateUserBtn").addClass("disabled");
	$("#updateUserBtn").html("Processing...");
	var userid = $("#userid").val();
	var userData = {
		"username": $("#username").val(),
		"fullname": $("#fullname").val(),
		"email": $("#email").val(),
		"phone": $("#phone").val(),
		"address": $("#address").val()
	};
	$.post(baseURL+"/user/update",{userData:userData,userid:userid},function(data){
		$("#updateUserBtn").html("Refreshing...");
		window.location.href = baseURL+"/user/index";
	});
}