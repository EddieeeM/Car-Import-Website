/*
* Author: Edeser III Monserrate [102347754]
* Target: enquire.html
* Purpose: javastript of Exotic Customs webpage
* Created: 21 Sept 2018
* Last updated: 3 Oct 2018
* Credits: References in enhancements.html
*/

"use strict";                   /* Make sure to disable validation through JavaScript! */

/*-----------------------------------------enquire.html values----------------------------------------------------------*/
function confirm() {
    
  var errMsg = "";
  var result = true; 

  var givenname = document.getElementById("givenname").value;
  var familyname = document.getElementById("familyname").value;
  var email = document.getElementById("email").value;
  var phone = document.getElementById("phone").value;
  var postcode = document.getElementById("postcode").value;
  var suburb = document.getElementById("suburb").value;
  var state = document.getElementById("state").value;
  var street_address = document.getElementById("street_address").value;
  var Selection_A = document.getElementById("Selection_A").value;
  var Selection_J = document.getElementById("Selection_J").value;
  var quantity = document.getElementById("quantity").value;

  var mobile = document.getElementById("mobile").checked;
  var post_mail = document.getElementById("post_mail").checked;
  var e_mail = document.getElementById("e_mail").checked;
  var automatic = document.getElementById("automatic").checked;
  var manual = document.getElementById("manual").checked;
  var spoiler = document.getElementById("spoiler").checked;
  var alloy = document.getElementById("alloy").checked;

/*----------------------------------------Input Validations---------------------------*/
    if (!givenname.match(/^[a-zA-Z ]{1,25}$/)) {
        errMsg = errMsg + "Your first name must only contain alpha characters\n";
        result = false;
    }

    if (!familyname.match(/^[a-zA-Z ]{1,25}$/)) {
        errMsg = errMsg + "Your last name must only contain alpha characters\n";
        result = false;
    }

    if (!suburb.match(/^[a-zA-Z ]{1,20}$/)) {
        errMsg = errMsg + "Please enter the suburb name\n";
        result = false;
    }
    
    if (document.getElementById("state").value == "none"){           
        errMsg = errMsg + "You must select a state\n";
        result = false;
    }

    if (!street_address.match(/^[a-zA-Z0-9\s,'-]{1,40}$/)){
        errMsg = errMsg + "Please enter an address within your state\n";
        result = false;
    }

/*-------------------------------------State and Postcode Validation--------------------*/
    var expression = "";
    switch(state){
        case "VIC":
            expression = new RegExp(/^(3|8)\d+/);
        break;
        case "NSW":
            expression = new RegExp(/^(1|2)\d+/);
        break;
        case "QLD":
            expression = new RegExp(/^(4|9)\d+/);
        break;
        case "SA":
            expression = new RegExp(/^(5)\d+/);
        break;
        case "NT":
            expression = new RegExp(/^0\d+/);
        break;
        case "WA": 
            expression = new RegExp(/^6\d+/);
        break;
    }

    if (!postcode.match(expression)){
        errMsg = errMsg + "Postcode does not match the State...\n"
        result = false;
    }
    /*--------------------------------------------------------------------------------*/

    if (state == "") {
        errMsg = errMsg + "You must select a state!\n";
        result = false;
      }
    
    if (email == "") {
        errMsg = errMsg + "Please enter an email address!\n";
        result = false;
    }

    if (isNaN(phone, postcode)) {
        errMsg = errMsg + "Must be a numerical value in the following: Phone, Postcode etc.\n";
        result = false;
    }
    else if (!phone.match(/\d{10}/)){
        errMsg = errMsg + "Invalid Phone Number.\n"
        result = false;
    }
    else if (!postcode.match(/\d{3,4}/)){
        errMsg = errMsg + "Invalid Postcode.\n"
        result = false;
    }
/*--------------------------------------------------------------------------------------------------------------------------------*/
    if (isNaN(quantity)){
        errMsg = errMsg + "Please place in a numerical value (0 if you would not like anything)\n"
        result = false;
    }

    if (!(mobile || post_mail || e_mail )) {
        errMsg = errMsg + "Please select contact preference\n";
        result = false;
    }

    if (!(automatic || manual || spoiler || alloy)) {
        errMsg = errMsg + "Please select at least one of the following addons...\n";
        result = false;
    }

    if (Selection_J == ""){           
        errMsg = errMsg + "You must select an Option for Cars - Japanese\n";
        result = false;
    }

    if (Selection_A == ""){           
        errMsg = errMsg + "You must select an Option for Cars - American\n";
        result = false;
    }

    if (result) {
        storeDetails(givenname, familyname, email, phone, postcode, street_address, suburb, state, quantity, mobile, post_mail, e_mail, contactpref, Selection_J, Selection_A, automatic, manual, spoiler, alloy);
    }

    if (errMsg != "") {     //only display message box if there is something to show
        alert(errMsg);
    }

    return result;
}

function storeDetails(givenname, familyname, email, phone, postcode, street_address, suburb, state, quantity, mobile, post_mail, e_mail, contactpref, Selection_J, Selection_A, automatic, manual, spoiler, alloy){
    var requests = "";
    if (automatic) requests = "automatic";
    if (manual) requests += "manual";
    if (spoiler) requests += "spoiler";
    if (alloy) requests += "alloy";
    
    var contactpref = "";
    if (mobile) contactpref = "Mobile";
    if (post_mail) contactpref = "Mail Post";
    if (e_mail) contactpref = "Email";
    
    sessionStorage.givenname = givenname;
    sessionStorage.familyname = familyname;
    sessionStorage.email = email; 
    sessionStorage.phone = phone;
    sessionStorage.postcode = postcode;
    sessionStorage.street_address = street_address;
    sessionStorage.state = state;
    sessionStorage.suburb = suburb;
    sessionStorage.quantity = quantity;
    sessionStorage.mobile = mobile;
    sessionStorage.post_mail = post_mail;
    sessionStorage.e_mail = e_mail;
    sessionStorage.Selection_A = Selection_A;
    sessionStorage.Selection_J = Selection_J;
    sessionStorage.requests = requests;
    sessionStorage.contactpref = contactpref;
}

function prefill_payment() {
    if (sessionStorage.givenname != undefined) {
        document.getElementByID("givenname").value = sessionStorage.setItem("givenname", givenname);
        document.getElementByID("familyname").value = sessionStorage.setItem("familyname", familyname);
        document.getElementByID("email").value = sessionStorage.email.setItem("email", email); 
        document.getElementByID("phone").value = sessionStorage.phone.setItem("phone", phone);
        document.getElementByID("postcode").value = sessionStorage.setItem("postcode", postcode);
        document.getElementByID("Selection_J").value = sessionStorage.setItem("Selection_J", Selection_J);
        document.getElementByID("Selection_A").value = sessionStorage.setItem("Selection_A", Selection_A);
        document.getElementByID("quantity").value = sessionStorage.setItem("quantity", quantity);
        document.getElementById("street_address").value = sessionStorage.setItem("street_address", street_address);
        document.getElementById("suburb").value = sessionStorage.setItem("suburb", suburb);
        document.getElementById("state").value = sessionStorage.setItem("state", state);
        document.getElementById("requests").value = sessionStorage.setItem("requests", requests);
        document.getElementById("contactpref").value = sessionStorage.setItem("contactpref", contactpref);

        document.getElementById("mobile").value = sessionStorage.setItem("mobile", mobile);
        document.getElementById("post_mail").value = sessionStorage.setItem("post_mail", post_mail);
        document.getElementById("e_mail").value = sessionStorage.setItem("e_mail", e_mail);

        switch (sessionStorage.requests) {
            case "automatic": 
                document.getElementById("automatic").checked = true;
            break;
            case "manual": 
                document.getElementById("manual").checked = true;
            break;
            case "spoiler":
                document.getElementById("spoiler").checked = true;
            break;
            case "alloy":
                document.getElementById("alloy").checked = true;
            break;
        }
   }
 }
/*-----------------------------------------------Payment Page-------------------------------------------------*/
function pmtvalidate(){
 var errMsg = "";
 var outcome = true;

 var cardname = document.getElementById("cardname").value;
 var cardnumber = document.getElementById("cardnumber").value;
 var cardexpiry = document.getElementById("cardexpiry").value;
 var cvv = document.getElementById("cvv").value;
 var cardtype = document.getElementById("Card_Type").value;

 /*--------------------------Card Number Patterns--------------------*/
    var check = false;
    var visa = /^(?:4[0-9]{12}(?:[0-9]{3})?)$/;
    var mastercard = /^(?:5[1-5][0-9]{14})$/;
    var american_express = /^(?:3[47][0-9]{13})$/;
 /*------------------------------------------------------------------*/
    if (!cardname.match(/^[a-zA-Z ]{1,40}$/)) {
        errMsg = errMsg + "Please add a valid card name\n";
        outcome = false;
    }

    if (!cardnumber.match(/^\d{15,16}[0-9]/)) {
        errMsg = errMsg + "Card Value does not exist...\n";
        outcome = false;
    }

    if (visa.test(cardnumber)) {
        check = true;
    }
    else if (mastercard.test(cardnumber)){
        check = true;
    }
    else if (american_express.test(cardnumber)){
        check = true;
    }

    if (cardtype == "Visa") {
        if (cvv.length != 3){
            errMsg = errMsg + "CVV must be 3 Digits\n";
            outcome = false;
        }
    }
    if (cardtype == "Mastercard") {
        if (cvv.length != 3){
            errMsg = errMsg + "CVV must be 3 Digits\n";
            outcome = false;
        }
    }
    if (cardtype == "American_Express") {
        if (cvv.length != 4){
            errMsg = errMsg + "CVV must be 4 Digits\n";
            outcome = false;
        }
    }

    if (check) {
        alert("Processing Payment...\n");
    }
    else{
        errMsg = errMsg + "Invalid Payment!! The card number doesn't match the Card Type!\n";
    }

    if (!cardexpiry.match(/^(0[1-9]|1[0-2]|[1-9])\/(1[8-9]|[2-9][0-9]|20[1-9][1-9])$/)) {
        errMsg = errMsg + "Invalid card expiry date\n";
        outcome = false;
    }

    if (isNaN(cardnumber)) {
        errMsg = errMsg + "Please enter a valid card number\n";
        outcome = false;
    }

    if (cvv == "") {
        errMsg = errMsg + "CVV not found...\n"
        outcome = false;
    }

    if (errMsg != ""){
        alert(errMsg);
    }

    return outcome;    //if false the information will not be sent to the server
}

/*--------------------------------------------Cost Calculation------------------------------------*/
function calcCost(requests, quantity){
    var cost = 0;
    if (requests.search("automatic") != -1)
        cost += 1000;
    if (requests.search("manual") != -1)
        cost += 550;
    if (requests.search("spoiler") != -1)
        cost += 500;
    if (requests.search("alloy") != -1)
        cost += 1100;
    return cost * quantity;
}

/*----------------------------Stores User Details to Server into Payment Page-----------------------------------*/

function getDetails(){
    var cost = 0;
    if(sessionStorage.givenname != undefined){    //if sessionStorage for first name is not empty
        document.getElementById("confirm_name").textContent = sessionStorage.givenname + " " + sessionStorage.familyname;
        document.getElementById("confirm_email").textContent = sessionStorage.email;
        document.getElementById("confirm_phone").textContent = sessionStorage.phone;
        document.getElementById("confirm_postcode").textContent = sessionStorage.postcode;
        document.getElementById("confirm_street_address").textContent = sessionStorage.street_address;
        document.getElementById("confirm_suburb").textContent = sessionStorage.suburb;
        document.getElementById("confirm_state").textContent = sessionStorage.state;
        document.getElementById("confirm_contactpref").textContent = sessionStorage.contactpref;
        document.getElementById("confirm_requests").textContent = sessionStorage.requests;
        document.getElementById("confirm_Selection_J").textContent = sessionStorage.Selection_J;
        document.getElementById("confirm_Selection_A").textContent = sessionStorage.Selection_A;
        cost = calcCost(sessionStorage.requests, sessionStorage.quantity);
        document.getElementById("confirm_cost").textContent = cost;
        document.getElementById("confirm_quantity").textContent = sessionStorage.quantity;
        
        document.getElementById("givenname").value = sessionStorage.getItem("givenname");
        document.getElementById("familyname").value = sessionStorage.getItem("familyname");
        document.getElementById("email").value = sessionStorage.getItem("email");
        document.getElementById("phone").value = sessionStorage.getItem("phone");
        document.getElementById("postcode").value = sessionStorage.getItem("postcode");
        document.getElementById("street_address").value = sessionStorage.getItem("street_address");
        document.getElementById("suburb").value = sessionStorage.getItem("suburb");
        document.getElementById("state").value = sessionStorage.getItem("state");
        document.getElementById("requests").value = sessionStorage.getItem("requests");
        document.getElementById("quantity").value = sessionStorage.getItem("quantity");
        document.getElementById("contactpref").value = sessionStorage.getItem("contactpref");
        document.getElementById("Selection_J").value = sessionStorage.getItem("Selection_J");
        document.getElementById("Selection_A").value = sessionStorage.getItem("Selection_A");
        document.getElementById("cost").value = cost
    }
}

function cancelBooking() {
    window.location = "enquire.html";
    sessionStorage.clear;
    }

function init() {
    
 if (document.getElementById("enqpage") != null){
    if (!debug) {} 
    prefill_payment();
    //var enquiryform = document.getElementById("enquiryform");
    //enquiryform.onsubmit = confirm;
 }
 else if (document.getElementById("pmtpage") != null){
    if (!debug) {} 
    //var paymentform = document.getElementById("payment_form");
    //paymentform.onsubmit = pmtvalidate;
    getDetails();
 }

 var cancelButton = document.getElementById("cancelButton");
 cancelButton.onclick = cancelBooking;
 
/*----------------------------------------------------------------------------------------------------------------------*/
}
window.onload = init;