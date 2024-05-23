// user-registration-function
function user_register() {

    var user_First_name = document.getElementById("user_first_name").value;
    var user_last_name = document.getElementById("user_last_name").value;
    var user_email_address = document.getElementById("user_email").value;
    var user_password = document.getElementById("user_password").value;
    var user_gender = document.getElementById("user_Gender").value;
    var user_contact = document.getElementById("user_phone").value;

    if (user_First_name.trim() === '') {
        document.getElementById("responseAlert").className = "text-danger";
        document.getElementById("responseAlert").innerHTML = "Please enter first name";
    } else if (user_last_name.trim() === '') {
        document.getElementById("responseAlert").className = "text-danger";
        document.getElementById("responseAlert").innerHTML = "Please enter last name";
    } else if (!/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/.test(user_email_address)) {
        document.getElementById("responseAlert").className = "text-danger";
        document.getElementById("responseAlert").innerHTML = "Please enter a valid email address";
    } else if (user_email_address.length < 1) {
        document.getElementById("responseAlert").className = "text-danger";
        document.getElementById("error_text_register").innerHTML = "Email address must be at least 1 characters long";
    } else if (user_email_address.length > 25) {
        document.getElementById("responseAlert").className = "text-danger";
        document.getElementById("error_text_register").innerHTML = "Email address must be less than 25 characters long";
    } else if (user_password.trim() === '') {
        document.getElementById("responseAlert").className = "text-danger";
        document.getElementById("responseAlert").innerHTML = "Please enter a password";
    } else if (user_gender.trim() === '') {
        document.getElementById("responseAlert").className = "text-danger";
        document.getElementById("responseAlert").innerHTML = "Please select a gender";
    } else if (!/^\d{10}$/.test(user_contact)) {
        document.getElementById("responseAlert").className = "text-danger";
        document.getElementById("responseAlert").innerHTML = "Please enter a valid 10-digit mobile number";
    } else if (user_contact.length !== 10) {
        document.getElementById("responseAlert").className = "text-danger";
        document.getElementById("error_text_register").innerHTML = "Mobile number must be 10 digits long";
    } else {

        var form = new FormData();
        form.append("user_first_name", user_First_name);
        form.append("user_last_name", user_last_name);
        form.append("user_email_address", user_email_address);
        form.append("user_password", user_password);
        form.append("user_gender", user_gender);
        form.append("user_contact", user_contact);

        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                var text = request.responseText;
                // alert(text);           
                if (text == "success") {
                    document.getElementById("responseAlert").innerHTML = "user registration successfull";
                    document.getElementById("responseAlert").className = "text-dark";
                    window.location="./index.php";
                } else {
                    document.getElementById("responseAlert").innerHTML = text;
                    document.getElementById("responseAlert").className = "text-danger";
                }
            }
        };
        request.open("POST", "./process/user_registrationProcess.php", true);
        request.send(form);

    }

}



