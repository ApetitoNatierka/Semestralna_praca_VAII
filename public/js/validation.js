    function validateRegister() {
    let name = document.getElementById('name').value;
    let email = document.getElementById('email').value;
    let password = document.getElementById('password').value;
    let passwordConfirmation = document.getElementById('password_confirmation').value;

    if (name === '') {
    alert('Please enter your username.');
    return false;
    }

    if (!/^[a-zA-Z]+$/.test(name)) {
    alert('Enter a valid username (only letters).');
    return false;
    }

    let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (email === '') {
        alert('Please enter your email address.');
        return false;
    }

    if (!emailRegex.test(email)) {
        alert('Enter a valid email address.');
        return false;
    }
    if (password === '') {
        alert('Please enter a password.');
        return false;
    }


    if (password.length < 8) {
        alert('Password must be at least 8 characters long.');
        return false;
    }


    if (password !== passwordConfirmation) {
        alert('Password and confirmation password do not match.');
        return false;
    }

    return true;
}
