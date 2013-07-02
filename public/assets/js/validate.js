var error = document.getElementById('error');
console.log(error);
function isNumber(n) {
    return !isNaN(parseFloat(n)) && isFinite(n);
}
function  val_single() {
    var flag = val_customer_details();
    //alert("flag"+flag);
    if (flag) {
        return true;
    }
    else {
        return false;
    }
}
function  val_monthly() {
    if (document.getElementById('client_name').value == "")
    {
        document.getElementById('error').innerHTML = "<h5>*Errors : <hr /><br />Enter Organization Name</h5>";
        document.getElementById('client_name').focus();
        return false;
    }
    var flag = val_customer_details();
    //alert(flag);
    if (flag) {
        return true;
    }
    else {
        return false;
    }
}

function val_customer_details() {
    if (document.getElementById('f_name').value == "")
    {
        document.getElementById('error').innerHTML = "<h5>*Errors : <hr /><br />Enter First Name</h5>";
        document.getElementById('f_name').focus();
        return false;
    }
    if (document.getElementById('l_name').value == "")
    {
        document.getElementById('error').innerHTML = "<h5>*Errors : <hr /><br />Enter Last Name</h5>";
        document.getElementById('l_name').focus();
        return false;
    }
    if (document.getElementById('addr_1').value == "")
    {
        document.getElementById('error').innerHTML = "<h5>*Errors : <hr /><br />Enter Address Line #1</h5>";
        document.getElementById('addr_1').focus();
        return false;
    }
    if (document.getElementById('city').value == "")
    {
        document.getElementById('error').innerHTML = "<h5>*Errors : <hr /><br />Enter City</h5>";
        document.getElementById('city').focus();
        return false;
    }
    //if (document.getElementById('state').value == "")
    //{
    //   document.getElementById('error').innerHTML="<h5>*Errors : <hr /><br />Enter State</h5>";
    //    document.getElementById('state').focus();
    //   return false;
    //}
    if (document.getElementById('country').value == "")
    {
        document.getElementById('error').innerHTML = "<h5>*Errors : <hr /><br />Enter Country</h5>";
        document.getElementById('country').focus();
        return false;
    }
    if (document.getElementById('country').value == "India") {
        if (document.getElementById('pincode').value == "")
        {
            document.getElementById('error').innerHTML = "<h5>*Errors : <hr /><br />Enter Pincode</h5>";
            document.getElementById('pincode').focus();
            return false;
        }

        var pincode = document.getElementById('pincode').value;
        var check = isNumber(pincode);
        if (!check) {
            document.getElementById('error').innerHTML = "<h5>*Errors : <hr /><br />Enter Digits</h5>";
            document.getElementById('pincode').focus();
            return false;
        }
        else
        {
            if (pincode.length != 6) {
                document.getElementById('error').innerHTML = "<h5>*Errors : <hr /><br />Enter Pincode</h5>";
                document.getElementById('pincode').focus();
                return false;
            }
        }
        //return true;

    }
    else {
        if (document.getElementById('pincode').value == "")
        {
            document.getElementById('error').innerHTML = "<h5>*Errors : <hr /><br />Enter Pincode</h5>";
            document.getElementById('pincode').focus();
            return false;
        }

        var pincode = document.getElementById('pincode').value;
        var check = isNumber(pincode);
        if (!check) {
            document.getElementById('error').innerHTML = "<h5>*Errors : <hr /><br />Enter Digits</h5>";
            document.getElementById('pincode').focus();
            return false;
        }
    }



    if (document.getElementById('country_code').value == "")
    {
        document.getElementById('error').innerHTML = "<h5>*Errors : <hr /><br />Enter Country Code</h5>";
        document.getElementById('country_code').focus();
        return false;
    }
    else {
        var country = document.getElementById('country_code').value;
        var check = isNumber(country);
        if (!check) {
            document.getElementById('error').innerHTML = "<h5>*Errors : <hr /><br />Please Enter Country Code in Digits (2 characters)</h5>";
            document.getElementById('country_code').focus();
            return false;
        }
        if (check)
        {
            if (country.length != 2) {
                document.getElementById('error').innerHTML = "<h5>*Errors : <hr /><br />Please Enter Country Code in Digits (2 characters)</h5>";
                document.getElementById('country_code').focus();
                return false;
            }
        }
    }
    if (document.getElementById('tele').value == "")
    {
        document.getElementById('error').innerHTML = "<h5>*Errors : <hr /><br />Please Enter 10 Digit Telephone</h5>";
        document.getElementById('tele').focus();
        return false;
    }
    else {
        var tele = document.getElementById('tele').value;
        var check = isNumber(tele);
        if (!check) {
            document.getElementById('tele').focus();
            return false;
        }
        if (check)
        {
            if (tele.length != 10) {
                document.getElementById('error').innerHTML = "<h5>*Errors : <hr /><br />Please Enter 10 Digit Telephone</h5>";
                document.getElementById('tele').focus();
                return false;
            }
        }

    }
    if (document.getElementById('email').value != "")
    {
        var emailID = document.getElementById('email').value;
        atpos = emailID.indexOf("@");
        dotpos = emailID.lastIndexOf(".");
        if (atpos < 1 || (dotpos - atpos < 2))
        {

            document.getElementById('email').style.border = "1px solid red";
            document.getElementById('error').innerHTML = "<h5>*Errors : <hr /><br />Please Enter Valid Email</h5>";
            document.getElementById('email').focus();
            return false;
        }

    }
    document.getElementById('error').innerHTML = "<h5>Errors*:</h5>";
    return true;
}

function val_invoice_panels() {
    if (document.getElementById('total').value == "" || document.getElementById('total').value == "0")
    {
        document.getElementById('error').innerHTML += "<br />Please Enter Panel Details";
        document.getElementById('total').focus();
        return false;
    }
    return true;
}
function val_payment() {
    if (document.getElementById('amount_paid').value == "")
    {
        document.getElementById('error').innerHTML = "<h5>*Errors : <hr /><br />Enter Amount Paid</h5>";
        document.getElementById('amount_paid').focus();
        return false;
    }
    if (document.getElementById('payment_ddl').value == "cheque")
    {
        if (document.getElementById('payment_txt').value == "")
        {
            document.getElementById('error').innerHTML = "<h5>*Errors : <hr /><br />Enter Amount Paid</h5>";
            document.getElementById('payment_txt').focus();
            return false;
        }
        if (document.getElementById('bank_name').value == "")
        {
            document.getElementById('error').innerHTML = "<h5>*Errors : <hr /><br />Enter Amount Paid</h5>";
            document.getElementById('bank_name').focus();
            return false;
        }
        if (document.getElementById('bank_branch').value == "")
        {
            document.getElementById('error').innerHTML = "<h5>*Errors : <hr /><br />Enter Amount Paid</h5>";
            document.getElementById('bank_branch').focus();
            return false;
        }
        if (document.getElementById('bank_city').value == "")
        {
            document.getElementById('error').innerHTML = "<h5>*Errors : <hr /><br />Enter Amount Paid</h5>";
            document.getElementById('bank_city').focus();
            return false;
        }

    }

}