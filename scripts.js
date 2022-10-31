function displayCreditcardInfo() {
    let cc_no = document.getElementById("creditcard_number");
    let cvc_no = document.getElementById("cvc_number");
    if(document.getElementById('creditcard').selected){
        document.getElementById("creditcard_number_label").innerHTML = "Creditcard number*:  ";
        document.getElementById("cvc_number_label").innerHTML = "CVC number*:  ";
        cc_no.type = "text";
        cvc_no.type = "text";
        cc_no.required = "1";
        cvc_no.required = "1";
    } else {
        document.getElementById("creditcard_number_label").innerHTML = "";
        document.getElementById("cvc_number_label").innerHTML = "";
        cc_no.type = "hidden";
        cvc_no.type = "hidden";
        cc_no.required = "0";
        cvc_no.required = "0";
    }
}

function validateRegEx(regex, test_string) {
    if ( !(regex.test(test_string)) || test_string === "" )
    {
        return false;
    }
    return true;
}

function validateForm(form_name){

    if(form_name === 'order'){
        if(!validateName()){
            alert("Invalid name input.");
            return false;
        } else if(!validateZipcode()){
            alert("Invalid zipcode input.");
            return false;
        } else if(document.getElementById('creditcard').selected) {
            if (!validateCreditcardNumber()) {
                alert("Invalid credit card number.");
                return false;
            } else if (!validateCvcNumber()) {
                alert("Invalid cvc number.");
                return false;
            }
        }
    } else if(form_name === 'jobs'){
        if(!validateName()){
            alert("Invalid name input.");
            return false;
        } else if (!validateEmail()){
            alert("Invalid email input");
            return false;
        }
    }
    return true;
}

function validateName() {
    var first_name_string = document.getElementById('firstname').value;
    var last_name_string = document.getElementById('lastname').value;
    var name_regex = /^[A-Za-z\s]*$/;
    return (validateRegEx(name_regex, first_name_string) && validateRegEx(name_regex, last_name_string));
}

function validateZipcode() {
    var zip = document.getElementById('zipcode').value;
    var zip_regex = /^\d{6}$/;

    return validateRegEx(zip_regex, zip);
}

function validateCreditcardNumber(){
    var cc_number = document.getElementById('creditcard_number').value;
    var cc_number_regex = /^\d{16}$/;

    return validateRegEx(cc_number_regex, cc_number);
}

function validateCvcNumber(){
    var cvc_number = document.getElementById('cvc_number').value;
    var cvc_number_regex = /^\d{3}$/;

    return validateRegEx(cvc_number_regex, cvc_number);
}

function validateDate() {
    var date = document.getElementById('date').value;
    var today = new Date();

    if ( (date.getFullYear() < today.getFullYear())
        || (date.getFullYear() === today.getFullYear())
        && date.getMonth() < today.getMonth()
        || (date.getFullYear() === today.getFullYear())
        && date.getMonth() === today.getMonth()
        && date.getDay() <= today.getDay())
    {
        alert('Invalid date');
        return false;
    }
    return true;
}

// button to empty cart, each button for different php page.
function clearCart() {
    window.location.href = "cart.php?empty=1";
}

function clear_Cart() {
    window.location.href = "checkout.php?empty=1";
}