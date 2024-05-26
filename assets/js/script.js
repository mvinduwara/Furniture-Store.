// user-registration-function
function user_register() {

    var user_First_name = document.getElementById("user_first_name").value;
    var user_last_name = document.getElementById("user_last_name").value;
    var user_email_address = document.getElementById("user_email").value;
    var user_password = document.getElementById("user_password").value;
    var user_gender = document.getElementById("user_Gender").value;
    var user_contact = document.getElementById("user_phone").value;
    var user_birthdate = document.getElementById("user_birthdate").value;

    if (user_First_name.trim() === '') {
        document.getElementById("responseAlert").className = "text-danger";
        document.getElementById("responseAlert").innerHTML = "Please enter first name";
    } else if (user_last_name.trim() === '') {
        document.getElementById("responseAlert").className = "text-danger";
        document.getElementById("responseAlert").innerHTML = "Please enter last name";
    }else if(user_email_address.trim() === '') {
        document.getElementById("responseAlert").className = "text-danger";
        document.getElementById("responseAlert").innerHTML = "Please enter your email address";
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
    } else if (!/^\d{4}-\d{2}-\d{2}$/.test(user_birthdate)) {
        document.getElementById("responseAlert").className = "text-danger";
        document.getElementById("responseAlert").innerHTML = "Please enter a valid birthdate in the format YYYY-MM-DD";
    } else {

        var form = new FormData();
        form.append("user_first_name", user_First_name);
        form.append("user_last_name", user_last_name);
        form.append("user_email_address", user_email_address);
        form.append("user_password", user_password);
        form.append("user_gender", user_gender);
        form.append("user_contact", user_contact);
        form.append("user_birthdate", user_birthdate);

        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                var text = request.responseText;
                // alert(text);           
                if (text == "success") {
                    document.getElementById("responseAlert").innerHTML = "user registration successfull";
                    document.getElementById("responseAlert").className = "text-dark";
                    window.location = "./login-register.php";
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

// user-login-process
function user_login() {

    var user_email = document.getElementById("users_name").value;
    var user_passowrd = document.getElementById("users_password").value;
    var remember_me = document.getElementById("remember_me");

    if (user_email.trim() === '') {
        document.getElementById("responseAlert").className = "text-danger";
        document.getElementById("responseAlert").innerHTML = "Please enter registered email address";
    } else if (!/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/.test(user_email)) {
        document.getElementById("responseAlert").className = "text-danger";
        document.getElementById("responseAlert").innerHTML = "Please enter a valid email address";
    } else if (user_email.length < 1) {
        document.getElementById("responseAlert").className = "text-danger";
        document.getElementById("error_text_register").innerHTML = "Email address must be at least 1 characters long";
    } else if (user_email.length > 25) {
        document.getElementById("responseAlert").className = "text-danger";
        document.getElementById("error_text_register").innerHTML = "Email address must be less than 25 characters long";
    }else if(user_passowrd.trim() === '') {
        document.getElementById("responseAlert").className = "text-danger";
        document.getElementById("responseAlert").innerHTML = "Please enter password!";
    } else if (user_passowrd.trim() === '') {
        document.getElementById("responseAlert").className = "text-danger";
        document.getElementById("responseAlert").innerHTML = "Please enter a password";
    } else {

        var form = new FormData();
        form.append("user_email", user_email);
        form.append("user_password", user_passowrd);
        form.append("remember_me", remember_me.checked);

        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                var text = request.responseText;
                if (text == "success") {
                    window.location = "./index.php";
                } else {
                    document.getElementById("responseAlert").innerHTML = text;
                    document.getElementById("responseAlert").className = "text-danger";
                }
            }
        };
        request.open("POST", "./process/user_loginprocess.php", true);
        request.send(form);
    }

}


function review_adding(id){
    var review_text = document.getElementById("review_text").value;
    var review_name = document.getElementById("review_name").value;
    var review_email = document.getElementById("review_email").value;

    if (review_text.trim() === '') {
        document.getElementById("responseAlert").className = "text-danger";
        document.getElementById("responseAlert").innerHTML = "Please enter review text";
    }else if (review_name.trim() === '') {
        document.getElementById("responseAlert").className = "text-danger";
        document.getElementById("responseAlert").innerHTML = "Please enter name";
    }else if (!/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/.test(review_email)) {
        document.getElementById("responseAlert").className = "text-danger";
        document.getElementById("responseAlert").innerHTML = "Please enter a valid email address";
    }else{

    var form = new FormData();
    form.append("review_text", review_text);
    form.append("review_name", review_name);
    form.append("review_email", review_email);
    form.append("product_id", id);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var text = request.responseText;
            if (text == "Success") {
                window.location.reload();
            } else {
                document.getElementById("responseAlert").innerHTML = text;
                document.getElementById("responseAlert").className = "text-danger";
            }
        }
    };
    request.open("POST", "./process/review_adding_process.php", true);
    request.send(form);

}
}

function addToCart(id , quantity){
    
  
    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
         if (request.readyState == 4 && request.status == 200) {
              var text = request.responseText;
             if(text === "Update Cart" || text === "Product added to the Cart"){
                window.location="./cart-page.php";
             }else{
                document.getElementById("responseAlert").innerHTML = text;
                document.getElementById("responseAlert").className = "text-danger";
             }
         }
    }

    request.open("GET", "./process/addToCartProcess.php?id=" + id + "&quantity=" + quantity ,true);
    request.send();


}

function removecartproduct(){
    alert("removecartproduct");
}