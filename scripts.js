function displayCreditcardInfo() {
    let cc_no = document.getElementById("creditcard_number");
    let cvc_no = document.getElementById("cvc_number");
    if(document.getElementById('creditcard').selected){
        document.getElementById("creditcard_number_label").innerHTML = "Creditcard number*";
        document.getElementById("cvc_number_label").innerHTML = "CVC number*";
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