function openLoginForm() {
    document.getElementById("loginModal").style.display = "block";
}

function closeLoginForm() {
    document.getElementById("loginModal").style.display = "none";
}

function openSignUpForm() {
    document.getElementById("signUpModal").style.display = "block";
}

function closeSignUpForm() {
    document.getElementById("signUpModal").style.display = "none";
}

// Close the modal if the user clicks outside of it
window.onclick = function(event) {
    var loginModal = document.getElementById("loginModal");
    var signUpModal = document.getElementById("signUpModal");
    if (event.target == loginModal) {
        loginModal.style.display = "none";
    } else if (event.target == signUpModal) {
        signUpModal.style.display = "none";
    }
}


