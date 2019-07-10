/**POP UP**/
document.getElementById('login').addEventListener('click', function() {
	document.querySelector('.sign-box').style.display = 'flex';
});
	
document.querySelector('.close').addEventListener('click',function() {
	document.querySelector('.sign-box').style.display = 'none';
});


/**Saving Data on Proceed to checkout**/
function redirectToPayment()
{
	alert("I\"m working");
}
