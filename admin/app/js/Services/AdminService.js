angular.module("miaudote.controller").service("Menu", function(){
	this.LoadMenu = function(){	
		return $("#menu_admin").css("display", "block");
	};
})

.service("Toast", function(){
	 this.ShowMessage = function(tipo, mensagem){
		   toastr.options = {
			  "closeButton": false,
			  "debug": false,
			  "newestOnTop": false,
			  "progressBar": false,
			  "positionClass": "toast-top-right",
			  "preventDuplicates": false,
			  "onclick": null,
			  "showDuration": "300",
			  "hideDuration": "1000",
			  "timeOut": "5000",
			  "extendedTimeOut": "1000",
			  "showEasing": "swing",
			  "hideEasing": "linear",
			  "showMethod": "fadeIn",
			  "hideMethod": "fadeOut"
		}
		toastr[tipo](mensagem);
	 }
})

.service("CheckSession", function(){
	$.ajax({
		type: "POST",
		url: "../api/Auth.php?acao=ChecarSessao",
		success: function(e) {
			if (e.sucesso) {
				
			}
			else {
				window.location = "/admin";
				toastr["error"](e.mensagem);
			}
		}
	});
});