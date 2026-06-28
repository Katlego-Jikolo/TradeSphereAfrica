function confirmProductDelete() {

    return confirm("Are you sure you want to delete this product?");

}

function confirmOrder() {

    return confirm("Confirm this order?");

}

function validatePayment(form) {

    var cardNumber = form.card_number.value;
    var cvv = form.cvv.value;


    if (cardNumber.length != 16 ) {


        alert("Card number must contain 16 digits.");
        return false;

    }

    if (cvv.length != 3 ) {


        alert("CVV number must contain 3 digits.");
        return false;

    }

    return true;
}