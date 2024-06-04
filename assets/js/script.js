
function advanced_search() {
    // Get the parent element
    const product_search_parent = document.getElementById("product_search_parent");

    // Get all checkbox elements within the parent element
    const checkboxes = product_search_parent.querySelectorAll("input[type=checkbox]");

    // Loop through the checkboxes and add the onchange event listener
    for (let j = 0; j < checkboxes.length; j++) {
        checkboxes[j].addEventListener("change", sortproduct);
    }

}

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
    } else if (user_email_address.trim() === '') {
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
    } else if (user_passowrd.trim() === '') {
        document.getElementById("responseAlert").className = "text-danger";
        document.getElementById("responseAlert").innerHTML = "Please enter password!";
    } else if (user_passowrd.trim() === '') {
        document.getElementById("responseAlert").className = "text-danger";
        document.getElementById("responseAlert").innerHTML = "Please enter a password";
    } else {

        var form = new FormData();
        form.append("user_email", user_email);
        form.append("user_password", user_passowrd);
        form.append("rememberme", remember_me.checked);

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



// review -adding
function review_adding(id) {
    var review_text = document.getElementById("review_text").value;
    var review_name = document.getElementById("review_name").value;
    var review_email = document.getElementById("review_email").value;

    if (review_text.trim() === '') {
        document.getElementById("responseAlert").className = "text-danger";
        document.getElementById("responseAlert").innerHTML = "Please enter review text";
    } else if (review_name.trim() === '') {
        document.getElementById("responseAlert").className = "text-danger";
        document.getElementById("responseAlert").innerHTML = "Please enter name";
    } else if (!/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/.test(review_email)) {
        document.getElementById("responseAlert").className = "text-danger";
        document.getElementById("responseAlert").innerHTML = "Please enter a valid email address";
    } else {

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



// add-to cart
function addToCart(id, quantity) {
    // alert(id + " " + quantity);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var text = request.responseText;
            if (text === "Update Cart" || text === "Product added to the Cart") {
                window.location = "./cart-page.php";
            } else {
                document.getElementById("responseAlert").innerHTML = text;
                document.getElementById("responseAlert").className = "text-danger";
            }
        }
    }

    request.open("GET", "./process/addToCartProcess.php?id=" + id + "&quantity=" + quantity, true);
    request.send();


}


// remove from cart
function removecartproduct(id) {

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var text = request.responseText;
            //   alert(text);
            if (text == "Product has been removed") {
                window.location.reload();
            } else {
                alert(text);
            }
        }
    }

    request.open("GET", "./process/removeCartProcess.php?id=" + id, true);
    request.send();
}



// user-sign-out
function signout() {

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var text = request.responseText;
            if (text == "success") {
                window.location = "./index.php";
            } else {
                alert(text);
            }

        }
    }
    request.open("GET", "./process/signoutProcess.php", true);
    request.send();
}


// add to watchlist
function addtowishlist(id) {
    // alert(id);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var text = request.responseText;
            if (text === "sucess") {
                window.location = "./wishlist.php";
            } else {
                document.getElementById("responseAlert").innerHTML = text;
                document.getElementById("responseAlert").className = "text-danger";
            }
        }
    }

    request.open("GET", "./process/addToWatchlistProcess.php?id=" + id, true);
    request.send();


}

// user-addtess-update
function userAddressUpdate(id) {

    var Address_number = document.getElementById("Address_number").value;
    var Address_line01 = document.getElementById("Address_line01").value;
    var Address_line02 = document.getElementById("Address_line02").value;
    var postal_code = document.getElementById("postal_code").value;

    alert(Address_number + " " + Address_line01 + " " + Address_line02 + " " + postal_code + "" + id);

    if (Address_number.trim() === '') {
        document.getElementById("responseAlert").className = "text-danger";
        document.getElementById("responseAlert").innerHTML = "Please enter adress number";
    } else if (Address_line01.trim() === '') {
        document.getElementById("responseAlert").className = "text-danger";
        document.getElementById("responseAlert").innerHTML = "Please enter address line 01";
    } else if (Address_line02.trim() === '') {
        document.getElementById("responseAlert").className = "text-danger";
        document.getElementById("responseAlert").innerHTML = "Please address line 02";
    } else if (postal_code.trim() === '') {
        document.getElementById("responseAlert").className = "text-danger";
        document.getElementById("responseAlert").innerHTML = "Please enter postal code";
    } else {

        var form = new FormData();
        form.append("Address_number", Address_number);
        form.append("Address_line01", Address_line01);
        form.append("Address_line02", Address_line02);
        form.append("postal_code", postal_code);
        form.append("user_id", id);

        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                var text = request.responseText;
                if (text == "success") {
                    window.location.reload();
                } else {
                    document.getElementById("responseAlert").innerHTML = text;
                    document.getElementById("responseAlert").className = "text-danger";
                }
            }
        }
        request.open("POST", "./process/user_address_upadate&add_process.php", true);
        request.send(form);
    }
}



// change-user_details
function changeuserdetails() {
    var user_first_name = document.getElementById("first_name").value;
    var user_last_name = document.getElementById("last_name").value;
    var user_contact_number = document.getElementById("contact_number").value;
    var user_email = document.getElementById("email").value;
    var user_Gender = document.getElementById("Gender").value;

    // alert(user_first_name + " " + user_last_name + " " + user_contact_number + " " + user_email + " " + user_Gender);

    if (user_first_name.trim() === '') {
        document.getElementById("responseAlert2").className = "text-danger";
        document.getElementById("responseAlert2").innerHTML = "Please enter first name";
    } else if (user_last_name.trim() === '') {
        document.getElementById("responseAlert2").className = "text-danger";
        document.getElementById("responseAlert2").innerHTML = "Please enter last name";
    } else if (!/^\d{10}$/.test(user_contact_number)) {
        document.getElementById("responseAlert2").className = "text-danger";
        document.getElementById("responseAlert2").innerHTML = "Please enter a valid 10-digit mobile number";
    } else if (user_contact_number.length !== 10) {
        document.getElementById("responseAlert2").className = "text-danger";
        document.getElementById("error_text_register").innerHTML = "Mobile number must be 10 digits long";
    } else if (user_email.trim() === '') {
        document.getElementById("responseAlert2").className = "text-danger";
        document.getElementById("responseAlert2").innerHTML = "Please enter your email address";
    } else if (!/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/.test(user_email)) {
        document.getElementById("responseAlert2").className = "text-danger";
        document.getElementById("responseAlert2").innerHTML = "Please enter a valid email address";
    } else if (user_email.length < 1) {
        document.getElementById("responseAlert2").className = "text-danger";
        document.getElementById("error_text_register").innerHTML = "Email address must be at least 1 characters long";
    } else if (user_email.length > 25) {
        document.getElementById("responseAlert2").className = "text-danger";
        document.getElementById("error_text_register").innerHTML = "Email address must be less than 25 characters long";
    } else if (user_Gender.trim() === '') {
        document.getElementById("responseAlert2").className = "text-danger";
        document.getElementById("responseAlert2").innerHTML = "Please enter gender name";
    } else if (user_Gender.trim() !== "Female" && user_Gender.trim() !== "Male") {
        document.getElementById("responseAlert2").className = "text-danger";
        document.getElementById("responseAlert2").innerHTML = "Please enter 'Female' or 'Male' for gender";
    } else {

        var form = new FormData();
        form.append("user_first_name", user_first_name);
        form.append("user_last_name", user_last_name);
        form.append("user_contact_number", user_contact_number);
        form.append("user_email", user_email);
        form.append("user_Gender", user_Gender);

        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                var text = request.responseText;
                if (text == "success") {
                    window.location.reload();
                } else {
                    document.getElementById("responseAlert2").innerHTML = text;
                    document.getElementById("responseAlert2").className = "text-danger";
                }
            }
        }
        request.open("POST", "./process/user_detail_upadate&add_process.php", true);
        request.send(form);
    }

}



// change-user_password
function changepassword() {

    var user_current_password = document.getElementById("current_pwd").value;
    var user_new_password = document.getElementById("new_pwd").value;
    var user_confirm_new_password = document.getElementById("confirm_pwd").value;

    // alert(user_current_password + " " + user_new_password + " " + user_confirm_new_password);

    if (user_current_password.trim() === '') {
        document.getElementById("responseAlert3").className = "text-danger";
        document.getElementById("responseAlert3").innerHTML = "Please enter your current password";
    } else if (user_new_password.trim() === '') {
        document.getElementById("responseAlert3").className = "text-danger";
        document.getElementById("responseAlert3").innerHTML = "Please enter a new password";
    } else if (user_confirm_new_password.trim() === '') {
        document.getElementById("responseAlert3").className = "text-danger";
        document.getElementById("responseAlert3").innerHTML = "Please confirm your new password";
    } else if (user_new_password !== user_confirm_new_password) {
        document.getElementById("responseAlert3").className = "text-danger";
        document.getElementById("responseAlert3").innerHTML = "New passwords do not match";
    } else if (user_new_password.length < 5) {
        document.getElementById("responseAlert3").className = "text-danger";
        document.getElementById("responseAlert3").innerHTML = "Password must be at least 8 characters long";
    } else {

        var form = new FormData();
        form.append("user_current_password", user_current_password);
        form.append("user_new_password", user_new_password);
        form.append("user_confirm_new_password", user_confirm_new_password);

        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                var text = request.responseText;
                if (text == "success") {
                    document.getElementById("responseAlert3").innerHTML = "Password changed successfully please reload the page";
                    document.getElementById("responseAlert3").className = "text-dark";
                } else {
                    document.getElementById("responseAlert3").innerHTML = text;
                    document.getElementById("responseAlert3").className = "text-danger";
                }
            }
        }
        request.open("POST", "./process/user_password_upadate_process.php", true);
        request.send(form);
    }

}

// forgot-password
var bm;
function forgot_password() {

    var Useremail = document.getElementById("users_name").value;

    // alert(Useremail);
    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var text = request.responseText;
            if (text == "success") {

                var m = document.getElementById("exampleModal");
                bm = new bootstrap.Modal(m);
                bm.show();

            } else {
                document.getElementById("responseAlert").innerHTML = text;
                document.getElementById("responseAlert").className = "text-danger";
            }
        }
    }
    request.open("GET", "./process/forgot_password_process.php?email=" + Useremail, true);
    request.send();

}


// change_password
function change_password() {

    var Useremail = document.getElementById("users_name").value;
    var verificatino_code = document.getElementById("verification_code").value;
    var new_password = document.getElementById("new_password").value;
    var current_password = document.getElementById("confirm_password").value;

    // alert(Useremail + " " + verificatino_code + " " + new_password + " " + current_password);


    if (verificatino_code.trim() === '') {
        document.getElementById("responseAlert1").className = "text-danger";
        document.getElementById("responseAlert1").innerHTML = "Please enter your verification code";
    } else if (new_password.trim() === '') {
        document.getElementById("responseAlert1").className = "text-danger";
        document.getElementById("responseAlert1").innerHTML = "Please enter a new password";
    } else if (current_password.trim() === '') {
        document.getElementById("responseAlert1").className = "text-danger";
        document.getElementById("responseAlert1").innerHTML = "Please confirm your new password";
    } else if (new_password !== current_password) {
        document.getElementById("responseAlert1").className = "text-danger";
        document.getElementById("responseAlert1").innerHTML = "New passwords do not match";
    } else if (new_password.length < 5) {
        document.getElementById("responseAlert1").className = "text-danger";
        document.getElementById("responseAlert1").innerHTML = "Password must be at least 8 characters long";
    } else {

        var form = new FormData()
        form.append("email", Useremail);
        form.append("verification_code", verificatino_code);
        form.append("new_password", new_password);
        form.append("current_password", current_password);

        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                var text = request.responseText;
                if (text == "success") {

                    document.getElementById("responseAlert1").innerHTML = "Your password has been updated";
                    document.getElementById("responseAlert1").className = "text-dark";
                    bm.hide();
                    window.location.reload();

                } else {

                    document.getElementById("responseAlert1").innerHTML = text;
                    document.getElementById("responseAlert1").className = "text-danger";

                }
            }
        };
        request.open("POST", "./process/resetPasswordProcess.php", true);
        request.send(form);

    }

}

function sortproduct() {

    if (document.getElementById("clear01").checked) {
        location.reload(true);
    } else if (document.getElementById("clear02").checked) {
        location.reload(true);
    } else if (document.getElementById("clear03").checked) {
        location.reload(true);
    }

    // stock avilability
    let ofs = document.getElementById("ofs");
    let is = document.getElementById("is");
    let avilability = "";

    // price
    let lth = document.getElementById("lth");
    let htl = document.getElementById("htl");
    let price = "";

    // category
    let cat1 = document.getElementById("1");
    let cat2 = document.getElementById("2");
    let cat3 = document.getElementById("3");
    let cat4 = document.getElementById("4");
    let category = "";

    // stock avilability 2
    if (ofs.checked) {
        avilability = ofs.value;
    } else if (is.checked) {
        avilability = is.value;
    }

    if (cat1.checked) {
        category = cat1.value;
    } else if (cat2.checked) {
        category = cat2.value;
    } else if (cat3.checked) {
        category = cat3.value;
    } else if (cat4.checked) {
        category = cat4.value;
    }

    // stock avalability Part
    const gender_part = document.querySelectorAll('input[name="availabilty"]');

    for (let i = 0; i < gender_part.length; i++) {
        gender_part[i].addEventListener('click', function () {
            // Loop through all the gender_part in the group
            for (let j = 0; j < gender_part.length; j++) {
                // Uncheck any that are checked except for the one that was clicked
                if (gender_part[j] !== this && gender_part[j].checked) {
                    gender_part[j].checked = false;
                }
            }
        });
    }

    // category Part
    const category_part = document.querySelectorAll('input[name="category"]');

    for (let i = 0; i < category_part.length; i++) {
        category_part[i].addEventListener('click', function () {
            // Loop through all the gender_part in the group
            for (let j = 0; j < category_part.length; j++) {
                // Uncheck any that are checked except for the one that was clicked
                if (category_part[j] !== this && category_part[j].checked) {
                    category_part[j].checked = false;
                }
            }
        });
    }

   
    var form = new FormData();
    form.append("avilability", avilability);
    form.append("category", category);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var text = request.responseText;
            document.getElementById("product_selected").innerHTML = text;
        }
    };
    request.open("POST", "./process/sortProductProcess.php", true);
    request.send(form);

}