function validateUsers() {

	let name = document.getElementById("name").value;
	let lastname = document.getElementById("lastname").value;
	let identification = document.getElementById("identification").value;
	let email = document.getElementById("email").value;
	let city = document.getElementById("city").value;
    
	if (name == "" || lastname == "" || identification == "" || email == "" || city == ""){
        let AlertError = document.getElementById("AlertError");
        AlertError.style.display = "block";
        return false;
    }
    return true;

}
