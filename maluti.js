 function adminlogin(){
			window.open("admin_login.php");
		}
function pharmasistlogin(){
			window.open("pharmasist_login.php");
		}
function patientlogin(){
			window.open("patient_login.php");
		}
function validate() {
	           if(document.login.username.value == "")
				{
					alert("Username Cannot be Null");
					document.login.username.focus();
					return false;
				}
				if(document.login.password.value == "")
				{
					alert("Password Cannot be Null");
					document.pharmasistlogin.username.focus();
					return false;
				}
}
document.addEventListener('DOMContentLoaded', function() {
	var form = document.getElementById('formOrder');
	form.addEventListener('submit', function(event) {
		event.preventDefault();
	
		var medid_inputs = document.getElementsByClassName('medID')
		var priceInputs = document.getElementsByClassName('price');
		var qtyInputs = document.getElementsByClassName('qty');

		var all_price = [];
		var all_qty = [];
		var all_medid = [];

		var total_price = 0;

		for(var i = 0; i < priceInputs.length; i++)
		{
			all_price.push(parseInt(priceInputs[i].value));
			all_qty.push(parseInt(qtyInputs[i].value));
			all_medid.push(parseInt(medid_inputs[i].value))

			total_price += (parseInt(priceInputs[i].value) * parseInt(qtyInputs[i].value));
		}

		var km = document.getElementById("km").value
		var addCost = 5;
		var price = total_price;
		if ( km > 10 && total_price != 0)
		{
			price = total_price + addCost ;
		}

		var Approve = confirm("Your Order price is:  "+ total_price + " You Are "+ km + "Kilometers From The Pharmacy So Your Total Price Is: "+ price );
	
		if (Approve){
			
			var form = document.getElementById("formOrder");

			var formData = new FormData(form);
			formData.append('allprices', all_price);
			formData.append('allqty', all_qty);
			formData.append('medid', all_medid);
			formData.append('total_price', price);

			formData.append('Pid', document.getElementById('Pid').value);
			formData.append('Oid', document.getElementById('Oid').value);
			formData.append('date', document.getElementById('date').value);
			

			//form.submit();
			fetch('orders.php', {
				method: 'POST',
				body: formData
			}).then(function(response) {
				return response.text();
			}).then(function(text) {
				console.log(text);

				
					alert("YOUR ORDER IS SUCCESSFULLY ADDED");
				
			}).catch(function(error) {
				console.error(error);
			});
		}
		else 
		{
			alert("You Order is Canceled");
			event.preventDefault();
		}

	});
});
 function adminAccounts(){
			window.open("view_all_admins.php");
		}
function pharmasistAccounts(){
			window.open("view_all_pharmacists.php");
		}
function patientAccounts(){
			window.open("view_all_patients.php");
		}