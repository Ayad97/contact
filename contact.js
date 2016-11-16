/*global $, alert, console*/

$(function () {
	'use strict';

	var userError = true,
		emailError= true,
		messageError=true;
/*
	function checkError() {

		if (userError === true || emailError === true || messageError === true) {

		}else {

		}
	}
	 checkError();
	 */

	$('.username').blur(function () {if ($(this).val().length < 3) {$(this).css('border', '1px solid #F00').parent().find('.custom-alert').fadeIn(300).end().find('.astrisc').fadeIn(300);userError = true;
		}else {$(this).css('border', '1px solid #080').parent().find('.custom-alert').fadeOut(300).end().find('.astrisc').fadeOut(300);userError = false;}
	});

	$('.email').blur(function () {if ($(this).val() === "") {$(this).css('border', '1px solid #F00').parent().find('.custom-alert').fadeIn(300).end().find('.astrisc').fadeIn(300);emailError = true;
		}else {$(this).css('border', '1px solid #080').parent().find('.custom-alert').fadeOut(300).end().find('.astrisc').fadeOut(300);emailError = false;}	
	});

	$('.text').blur(function () {if ($(this).val().length < 10) {$(this).css('border', '1px solid #F00').parent().find('.custom-alert').fadeIn(300).end().find('.astrisc').fadeIn(300);messageError = true;
		}else {$(this).css('border', '1px solid #080').parent().find('.custom-alert').fadeOut(300).end().find('.astrisc').fadeOut(300);messageError = false;}	
	});

	//submit form validation	

	

});