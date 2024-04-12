$(document).ready(function(){
    $("#sign-up-form").submit(function(event){
        var email = $("#email").val();
        var password = $("#password").val();
        var confirmPassword = $("#confirm-password").val();
        var domainPattern = /^[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        var domain = email.substring(email.lastIndexOf("@") +1);
        if (email === "" || password === "" || confirmPassword === "") {
            event.preventDefault();
            alert("Please fill in all fields.");
        } else if (password !== confirmPassword) {
            event.preventDefault();
            alert("Passwords do not match.");
        } else if (!domainPattern.test(domain)) { // Test if domain matches the regular expression
            event.preventDefault();
            alert("Invalid email address.");
        }
    });
});