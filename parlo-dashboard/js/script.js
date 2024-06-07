// admin sign in
var av;
function adminsignin() {

    var admin_email = document.getElementById("admin_email").value;

    // alert(admni_email);

    var form = new FormData();
    form.append("admin_email", admin_email);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var text = request.responseText;
            if (text == "Success") {
                var adminVerificationModal = document.getElementById("modaldemo1");
                av = new bootstrap.Modal(adminVerificationModal);
                av.show();
            } else {
                alert(text);
            }
        }
    }

    request.open("POST", "./process/adminsignin_process.php", true);
    request.send(form);


}

// admin verify code
function admin_verify() {
    var admin_verify_code = document.getElementById("admin_verification_code");

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            var text = request.responseText;
            if (text == "success") {
                av.hide();
                window.location = "./index.php";
            } else {
                alert(text);
            }

        }
    }

    request.open("GET", "./process/verificationProcess.php?v=" + admin_verify_code.value, true);
    request.send();
}

// user status change
function changestatus(id) {
    // alert(id);

    var user_id = id;

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.status == 200 && request.readyState == 4) {
            var text = request.responseText;
            if (text == "activated" || text == "deactivated") {
                window.location.reload();
            } else {
                alert(text);
            }
        }
    }

    request.open("GET", "./process/changeStatusProcess.php?p=" + user_id, true);
    request.send();
}


// product status chnage
function changestatusproduct(id) {

    var product_id = id;

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.status == 200 && request.readyState == 4) {
            var text = request.responseText;
            if (text == "activated" || text == "deactivated") {
                window.location.reload();
            } else {
                alert(text);
            }
        }
    }

    request.open("GET", "./process/changeProductStatusProcess.php?p=" + product_id, true);
    request.send();


}

function subimageupload() {
    var images = document.getElementById("file1");
    images.onchange = function () {

        var file_count = images.files.length;

        if (file_count = 1) {

            for (var x = 0; x < file_count; x++) {
                var file = this.files[x];
                var url = window.URL.createObjectURL(file);
                document.getElementById("l" + x).src = url;
            }

        } else {
            alert(file_count + " files uploaded.");
        }
    }
}

function subimageupload2() {
    var images = document.getElementById("file2");
    images.onchange = function () {

        var file_count = images.files.length;

        if (file_count = 1) {

            for (var x = 0; x < file_count; x++) {
                var file = this.files[x];
                var url = window.URL.createObjectURL(file);
                document.getElementById("j" + x).src = url;
            }

        } else {
            alert(file_count + " files uploaded.");
        }
    }
}


function subimageupload3() {
    var images = document.getElementById("file3");
    images.onchange = function () {

        var file_count = images.files.length;

        if (file_count = 1) {

            for (var x = 0; x < file_count; x++) {
                var file = this.files[x];
                var url = window.URL.createObjectURL(file);
                document.getElementById("y" + x).src = url;
            }

        } else {
            alert(file_count + " files uploaded.");
        }
    }
}


function subimageupload4() {
    var images = document.getElementById("file4");
    images.onchange = function () {

        var file_count = images.files.length;

        if (file_count = 1) {

            for (var x = 0; x < file_count; x++) {
                var file = this.files[x];
                var url = window.URL.createObjectURL(file);
                document.getElementById("t" + x).src = url;
            }

        } else {
            alert(file_count + " files uploaded.");
        }
    }
}

//  product adding
function addproduct() {

    var category_id = document.getElementById("category_id").value;
    var brand_id = document.getElementById("brand_id").value;
    var model_id = document.getElementById("model_id").value;
    var product_name = document.getElementById("product_name").value;
    var product_title = document.getElementById("product_title").value;
    var product_dimention = document.getElementById("product_dimention").value;
    var product_material = document.getElementById("product_material").value;
    var product_price = document.getElementById("product_price").value;
    var product_adding_date = document.getElementById("product_adding_date").value;
    var product_description = document.getElementById("product_description").value;
    var product_designer_name = document.getElementById("product_designer_name").value;
    var product_quantity = document.getElementById("product_quantity").value;
    var product_deleivery_fee = document.getElementById("product_deleivery_fee").value;
    var product_type = document.getElementById("product_type").value;
    var file1 = document.getElementById("file1");
    var file2 = document.getElementById("file2");
    var file3 = document.getElementById("file3");
    var file4 = document.getElementById("file4");

    var form = new FormData();
    form.append("category_id", category_id);
    form.append("brand_id", brand_id);
    form.append("model_id", model_id);
    form.append("product_name", product_name);
    form.append("product_title", product_title);
    form.append("product_dimention", product_dimention);
    form.append("product_material", product_material);
    form.append("product_price", product_price);
    form.append("product_adding_date", product_adding_date);
    form.append("product_description", product_description);
    form.append("product_designer_name", product_designer_name);
    form.append("product_quantity", product_quantity);
    form.append("product_deleivery_fee", product_deleivery_fee);
    form.append("product_type", product_type);
    form.append("file1", file1.files[0]);
    form.append("file2", file2.files[0]);
    form.append("file3", file3.files[0]);
    form.append("file4", file4.files[0]);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var text = request.responseText;
            alert(text);

            if (successText == "success") {
                window.location.reload();
            } else {
                alert(text);
            }

        };

    }
    request.open("POST", "./process/add_product_process.php", true);
    request.send(form);

}

function product_update(x) {
    // console.log("hello");
    var product_name = document.getElementById("product_name").value;
    var product_title = document.getElementById("product_title").value;
    var product_dimentions = document.getElementById("product_dimentions").value;
    var product_material = document.getElementById("product_material").value;
    var product_quantity = document.getElementById("product_quantity").value;
    var product_price = document.getElementById("product_price").value;
    var product_date = document.getElementById("product_date").value;
    var product_designer = document.getElementById("product_designer").value;
    var product_description = document.getElementById("product_description").value;
    var product_image1 = document.getElementById("file1");
    var product_image2 = document.getElementById("file2");
    var product_image3 = document.getElementById("file3");
    var product_image4 = document.getElementById("file4");

    // console.log(product_name,product_title,product_dimentions,product_material,product_price,product_date,product_designer,product_description,product_image1,product_image2,product_image3,product_image4);

    var form = new FormData();
    form.append("product_name", product_name);
    form.append("product_title", product_title);
    form.append("product_dimentions", product_dimentions);
    form.append("product_material", product_material);
    form.append("product_quantity", product_quantity);
    form.append("product_price", product_price);
    form.append("product_date", product_date);
    form.append("product_designer", product_designer);
    form.append("product_description", product_description);
    form.append("product_id", x);
    form.append("product_image1", product_image1.files[0]);
    form.append("product_image2", product_image2.files[0]);
    form.append("product_image3", product_image3.files[0]);
    form.append("product_image4", product_image4.files[0]);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var text = request.responseText;
            //   console.log(text);
            // alert(text);
            if (text == "success") {
                window.location.reload();
            } else {
                alert(text);
            }

        };

    }
    request.open("POST", "./process/update_product_process.php", true);
    request.send(form);

}

function deleteproduct(x) {
    // alert(x);
    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var text = request.responseText;
            if (text == "success") {
                window.location.reload();

            } else {
                alert(text);
            }
            // alert(text);

        }
    }
    request.open("GET", "./process/delete_product_process.php?product_id=" + x, true);
    request.send();


}

function deleteuser(x) {
    // alert(x);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var text = request.responseText;
            if (text == "success") {
                window.location.reload();

            } else {
                alert(text);
            }
        }
    }
    request.open("GET", "./process/delete_user_process.php?user_id=" + x, true);
    request.send();
}

function search(event) {
    if (event.keyCode === 13) {
        var inputValue = document.getElementById("search_input").value;

        var form = new FormData();
        form.append("search_input", inputValue);

        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                var text = request.responseText;
                document.getElementById("searchTable").innerHTML = text;
                // alert(text);
            }
        };

        request.open("POST", "./process/product_search_process.php", true);
        request.send(form);
    }

}

function searchuser(event) {
    if (event.keyCode === 13) {
        var inputValue = document.getElementById("search_user").value;

        var form = new FormData();
        form.append("search_user", inputValue);

        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                var text = request.responseText;
                document.getElementById("searchTable").innerHTML = text;
                // alert(text);
            }
        };

        request.open("POST", "./process/user_search_process.php", true);
        request.send(form);
    }
}

// adding-category
function add_category() {
    var add_category = document.getElementById("add_category").value;

    var form = new FormData();
    form.append("add_category", add_category);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;
            if (response == "Success") {
                alert("Registration Successfully");
                window.location.reload();
            } else {
                alert(response);
            }
        }
    }

    request.open("POST", "./process/categoryRegisterProcess.php", true);
    request.send(form);
}

// adding-brand
function add_brand() {
    var add_brand = document.getElementById("add_brand");

    var form = new FormData();
    form.append("add_brand", add_brand.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;
            if (response == "Success") {
                alert("Registration Successfully");
                window.location.reload();
            } else {
                alert(response);
            }
        }
    }

    request.open("POST", "./process/BrandRegisterProcess.php", true);
    request.send(form);
}

// adding-model
function add_model() {

    var add_model = document.getElementById("add_model");

    var form = new FormData();
    form.append("add_model", add_model.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;
            if (response == "Success") {
                alert("Registration Successfully");
                window.location.reload();
            } else {
                alert(response);
            }
        }
    }

    request.open("POST", "./process/ModelRegisterProcess.php", true);
    request.send(form);

}