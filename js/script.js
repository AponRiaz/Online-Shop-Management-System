// let userBox = document.querySelector('.header .header-2 .user-box');

// document.querySelector('#user-btn').onclick = () =>{
//    userBox.classList.toggle('active');
//    navbar.classList.remove('active');
// }

let userBox = document.querySelector('.header .header-2 .user-box');

// $("#user-btn").click(function(){
//    $(".header .header-2 .user-box").toggle("active");});
//    $(".header .header-2 .navbar").remove("active");
// };

$(document).ready(function(){
	$('#user-btn').click(function(){
		$('.header .header-2 .user-box').toggleClass('active');
		$('.header .header-2 .navbar').remove('active');
	})
})

let navbar = document.querySelector('.header .header-2 .navbar');

// document.querySelector('#menu-btn').onclick = () =>{
//    navbar.classList.toggle('active');
//    userBox.classList.remove('active');
// }

$(document).ready(function(){
	$('#menu-btn').click(function(){
		$('.header .header-2 .navbar').toggleClass('active');
		$('.header .header-2 .user-box').remove('active');
	})
})

window.onscroll = () =>{
   userBox.classList.remove('active');
   navbar.classList.remove('active');

   if(window.scrollY > 60){
      document.querySelector('.header .header-2').classList.add('active');
   }else{
      document.querySelector('.header .header-2').classList.remove('active');
   }
}

//login validation start

function loginvalidate(){
	var loginEmail=document.getElementById('email').value;
	let loginPassword=document.getElementById('password').value;

	if(loginEmail == ""){
		document.getElementById('loginEmail').innerHTML = "*Email required";
		document.getElementById('loginEmail').style.color = "red";
		return false;
	}

	else if(loginPassword == ""){
		document.getElementById('loginEmail').innerHTML = "";
		document.getElementById('loginPass').innerHTML = "*Password required";
		document.getElementById('loginPass').style.color = "red";
		return false;
	}else{
		return true;
	}

}

//login validation end

//checkout validation start
function checkoutvalidate(){
	var name = document.getElementById('name').value;
	var number=document.getElementById('number').value;
	var email=document.getElementById('email').value;
	let method=document.getElementById('method').value;
	let flat=document.getElementById('flat').value;
	let street=document.getElementById('street').value;
	let city=document.getElementById('city').value;
	let country=document.getElementById('country').value;
	let pin_code=document.getElementById('pin_code').value;

	if(name == ""){
		document.getElementById('nam').innerHTML = "*Name required";
		document.getElementById('nam').style.color = "red";
		return false;
	}

	else if(name.length<2){
		document.getElementById('nam').innerHTML = "*Length is too short";
		document.getElementById('nam').style.color = "red";
		return false;
	}

	else if(number == ""){
		document.getElementById('nam').innerHTML = "";
		document.getElementById('pnum').innerHTML = "*Phone required";
		document.getElementById('pnum').style.color = "red";
		return false;
	}

	else if(number<11){
		document.getElementById('nam').innerHTML = "";
		document.getElementById('pnum').innerHTML = "*Enter valid phone number";
		document.getElementById('pnum').style.color = "red";
		return false;
	}

	else if(email == ""){
		document.getElementById('pnum').innerHTML = "";
		document.getElementById('checkoutMail').innerHTML = "*Email required";
		document.getElementById('checkoutMail').style.color = "red";
		return false;
	}

	// else if(method == ""){
	// 	document.getElementById('checkoutMail').innerHTML = "";
	// 	document.getElementById('pmethod').innerHTML = "*Method required";
	// 	document.getElementById('pmethod').style.color = "red";
	// 	return false;
	// }

	else if(flat == ""){
		document.getElementById('checkoutMail').innerHTML = "";
		document.getElementById('checkoutflat').innerHTML = "*Address required";
		document.getElementById('checkoutflat').style.color = "red";
		return false;
	}

	else if(flat.length<2){
		document.getElementById('pmethod').innerHTML = "";
		document.getElementById('checkoutflat').innerHTML = "*Length is too short";
		document.getElementById('checkoutflat').style.color = "red";
		
		return false;
	}

	else if(street == ""){
		document.getElementById('checkoutflat').innerHTML = "";
		document.getElementById('checkoutstreet').innerHTML = "*Address required";
		document.getElementById('checkoutstreet').style.color = "red";
		return false;
	}

	else if(street.length<2){
		document.getElementById('checkoutflat').innerHTML = "";
		document.getElementById('checkoutstreet').innerHTML = "*Length is too short";
		document.getElementById('checkoutstreet').style.color = "red";
		
		return false;
	}

	else if(city == ""){
		document.getElementById('checkoutstreet').innerHTML = "";
		document.getElementById('checkoutcity').innerHTML = "*Address required";
		document.getElementById('checkoutcity').style.color = "red";
		return false;
	}

	else if(city.length<2){
		document.getElementById('checkoutstreet').innerHTML = "";
		document.getElementById('checkoutcity').innerHTML = "*Length is too short";
		document.getElementById('checkoutcity').style.color = "red";
		
		return false;
	}

	else if(country== ""){
		document.getElementById('checkoutcity').innerHTML = "";
		document.getElementById('checkoutcountry').innerHTML = "*Address required";
		document.getElementById('checkoutcountry').style.color = "red";
		return false;
	}

	else if(country.length<2){
		document.getElementById('checkoutcity').innerHTML = "";
		document.getElementById('checkoutcountry').innerHTML = "*Length is too short";
		document.getElementById('checkoutcountry').style.color = "red";
		
		return false;
	}

	else if(pin_code == ""){
		document.getElementById('checkoutcountry').innerHTML = "";
		document.getElementById('checkoutpin').innerHTML = "*Address required";
		document.getElementById('checkoutpin').style.color = "red";
		return false;
	}

	else if(pin_code.length<2){
		document.getElementById('checkoutcountry').innerHTML = "";
		document.getElementById('checkoutpin').innerHTML = "*Length is too short";
		document.getElementById('checkoutpin').style.color = "red";
		
		return false;
	}else{return true;}

}
//checkout validation end

//registration validation start
function validate(){

	var fname = document.getElementById('fname').value;
	var lname = document.getElementById('lname').value;
	var email=document.getElementById('email').value;
	var pnumber=document.getElementById('pnumber').value;
	let address=document.getElementById('address').value;
	let password=document.getElementById('password').value;
	let cpassword=document.getElementById('cpassword').value;

	
	

	if(fname == ""){
		document.getElementById('p').innerHTML = "*FirstName required";
		document.getElementById('p').style.color = "red";
		return false;
	}

	else if(fname.length<2){
		document.getElementById('p').innerHTML = "*Length is too short";
		document.getElementById('p').style.color = "red";
		return false;
	}
	
	else if(lname == ""){
		document.getElementById('p').innerHTML = "";
		document.getElementById('a').innerHTML = "*LastName required";
		document.getElementById('a').style.color = "red";
		return false;
	}

	else if(lname.length<2){
		document.getElementById('a').innerHTML = "*Length is too short";
		document.getElementById('a').style.color = "red";
		document.getElementById('p').innerHTML = "";
		return false;
	}
	
	else if(email == ""){
		document.getElementById('a').innerHTML = "";
		document.getElementById('r').innerHTML = "*Email required";
		document.getElementById('r').style.color = "red";
		return false;
	}

	// else if(email.length<2){
	// 	document.getElementById('r').innerHTML = "*Length is too short";
	// 	document.getElementById('r').style.color = "red";
	// 	document.getElementById('a').innerHTML = "";
	// 	return false;
	// }
	
	else if(pnumber == ""){
		document.getElementById('r').innerHTML = "";
		document.getElementById('t').innerHTML = "*Phone required";
		document.getElementById('t').style.color = "red";
		return false;
	}

	else if(pnumber.length<11){
		document.getElementById('r').innerHTML = "";
		document.getElementById('t').innerHTML = "*Enter valid phone number";
		document.getElementById('t').style.color = "red";
		return false;
	}
	
	else if(address == ""){
		document.getElementById('t').innerHTML = "";
		document.getElementById('h').innerHTML = "*Address required";
		document.getElementById('h').style.color = "red";
		return false;
	}

	else if(address.length<2){
		document.getElementById('t').innerHTML = "";
		document.getElementById('h').innerHTML = "*Length is too short";
		document.getElementById('h').style.color = "red";
		
		return false;
	}
	
	else if(password == ""){
		document.getElementById('h').innerHTML = "";
		document.getElementById('eemail').innerHTML = "*Password required";
		document.getElementById('eemail').style.color = "red";
		return false;
	}

	else if(password.length<6){
		document.getElementById('h').innerHTML = "";
		document.getElementById('eemail').innerHTML = "*Enter At least 6 character";
		document.getElementById('eemail').style.color = "red";
		return false;
	}
	
	else if(cpassword == ""){
		document.getElementById('eemail').innerHTML = "";
		document.getElementById('doba').innerHTML = "*Confirm password required";
		document.getElementById('doba').style.color = "red";
		return false;
	
	}else{
		return true;
	}


}