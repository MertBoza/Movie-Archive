document.addEventListener('DOMContentLoaded', function() {
    function showError(input, errorElement, message) {
        errorElement.textContent = message;
        errorElement.style.display = 'block';
        input.style.borderColor = 'red';
    }

    function hideError(input, errorElement) {
        if (errorElement) {
            errorElement.style.display = 'none';
            input.style.borderColor = '';
        }
    }

    function validateEmail(email) {
        const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        return emailRegex.test(email);
    }

    function validatePhone(phone) {
        return phone.length >= 9;
    }

    const contactForm = document.querySelector('.contact-form');
    if (contactForm) {
        const nameInput = document.getElementById('name');
        const surnameInput = document.getElementById('surname');
        const emailInput = document.getElementById('email');
        const phoneInput = document.getElementById('phone');
        const messageInput = document.getElementById('message');

        const nameError = document.getElementById('name-error');
        const surnameError = document.getElementById('surname-error');
        const emailError = document.getElementById('email-error');
        const phoneError = document.getElementById('phone-error');
        const messageError = document.getElementById('message-error');

        contactForm.addEventListener('submit', function(event) {
            event.preventDefault();

            const name = nameInput.value.trim();
            const surname = surnameInput.value.trim();
            const email = emailInput.value.trim();
            const phone = phoneInput.value.trim();
            const message = messageInput.value.trim();

            hideError(nameInput, nameError);
            hideError(surnameInput, surnameError);
            hideError(emailInput, emailError);
            hideError(phoneInput, phoneError);
            hideError(messageInput, messageError);

            let isValid = true;

            if (name === '') {
                showError(nameInput, nameError, 'Please enter your name.');
                isValid = false;
            }

            if (surname === '') {
                showError(surnameInput, surnameError, 'Please enter your surname.');
                isValid = false;
            }

            if (email === '' || !validateEmail(email)) {
                showError(emailInput, emailError, 'Please enter a valid email.');
                isValid = false;
            }

            if (phone === '' || !validatePhone(phone)) {
                showError(phoneInput, phoneError, 'Please enter a valid phone number.');
                isValid = false;
            }

            if (message === '') {
                showError(messageInput, messageError, 'Please enter a message.');
                isValid = false;
            }

            if (isValid) {
                contactForm.submit();
            }
        });
    }

    const registerForm = document.querySelector('.register-form');
    if (registerForm) {
        const usernameInput = document.getElementById('username');
        const emailInput = document.getElementById('email');
        const phoneInput = document.getElementById('phone');
        const passwordInput = document.getElementById('password');
        const confirmPasswordInput = document.getElementById('confirm-password');

        const usernameError = document.getElementById('username-error');
        const emailError = document.getElementById('email-error');
        const phoneError = document.getElementById('phone-error');
        const passwordError = document.getElementById('password-error');
        const confirmPasswordError = document.getElementById('confirm-password-error');

        registerForm.addEventListener('submit', function(event) {
            event.preventDefault();

            const username = usernameInput.value.trim();
            const email = emailInput.value.trim();
            const phone = phoneInput.value.trim();
            const password = passwordInput.value.trim();
            const confirmPassword = confirmPasswordInput.value.trim();

            hideError(usernameInput, usernameError);
            hideError(emailInput, emailError);
            hideError(phoneInput, phoneError);
            hideError(passwordInput, passwordError);
            hideError(confirmPasswordInput, confirmPasswordError);

            let isValid = true;

            if (username === '') {
                showError(usernameInput, usernameError, 'Please enter a username.');
                isValid = false;
            }

            if (email === '' || !validateEmail(email)) {
                showError(emailInput, emailError, 'Please enter a valid email.');
                isValid = false;
            }

            if (phone === '' || !validatePhone(phone)) {
                showError(phoneInput, phoneError, 'Please enter a valid phone number.');
                isValid = false;
            }

            if (password === '') {
                showError(passwordInput, passwordError, 'Please enter a password.');
                isValid = false;
            }

            if (confirmPassword === '' || confirmPassword !== password) {
                showError(confirmPasswordInput, confirmPasswordError, 'Passwords do not match.');
                isValid = false;
            }

            if (isValid) {
                registerForm.submit();
            }
        });
    }

    let currentIndex = 0;

    function moveSlide(direction) {
        const slider = document.querySelector('.slider');
        const slides = document.querySelectorAll('.slide');
        const totalSlides = slides.length;

        currentIndex += direction;

        if (currentIndex < 0) {
            currentIndex = totalSlides - 1;
        } else if (currentIndex >= totalSlides) {
            currentIndex = 0;
        }

        slider.style.transform = `translateX(-${currentIndex * 100}%)`;
    }

    const prevButton = document.querySelector('.prev');
    const nextButton = document.querySelector('.next');
    prevButton.addEventListener('click', function() {
        moveSlide(-1);
    });
    nextButton.addEventListener('click', function() {
        moveSlide(1);
    });

});
