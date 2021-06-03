let form = document.getElementById('form');
let username = document.getElementById('username');
let email = document.getElementById('email');
let number = document.getElementById('number');
let password = document.getElementById('password');
let password2 = document.getElementById('password2');




function showError(input, message) {
    let form = input.parentElement;
    let small = form.querySelector('small');
    form.className = 'input-text error';
    small.innerText = message;
}


function showSuccess(input) {
    let form = input.parentElement;
    form.className = 'input-text success';
}



let required = false;

function checkRequired(inpt) {
    inpt.forEach(function(input) {
        if (input.value.trim() === '') {
            showError(input, `${getFieldName(input)} is required`);
            required = true;
        } else {
            showSuccess(input);
        }
    });

    return required;
}


function checkCharacters(input) {
    let letters = /^[a-zA-Z0-9_]{3,10}$/;
    if (!letters.test(input.value.trim())) {
        showError(input , 'please enter [a-z-0-9]');
    }
}

function checkEmail(input) {
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (re.test(input.value.trim())) {
        showSuccess(input);
    } else {
        showError(input, 'Email is not valid');
    }
}

function checkLength(input, min, max) {
    if (input.value.length < min) {
        showError(
            input,
            `${getFieldName(input)} must be at least ${min} characters`
        );
    } else if (input.value.length > max) {
        showError(
            input,
            `${getFieldName(input)} must be less than ${max} characters`
        );
    } else {
        showSuccess(input);
    }
}


function checkPasswordsMatch(input1, input2) {
    if (input1.value !== input2.value) {
        showError(input2, 'Passwords do not match');
    }
}


function getFieldName(input) {
    return input.id.charAt(0).toUpperCase() + input.id.slice(1);
}


form.addEventListener('submit', function(e) {
    e.preventDefault();

    if(!checkRequired([username, email, number, password, password2])){
        checkLength(username, 3, 10);
        checkCharacters(username,  /^[A-Za-z]+$/);
        checkEmail(email);
        checkLength(number, 6, 11);
        checkLength(password, 6, 25);
        checkPasswordsMatch(password, password2);
    }

});


form.addEventListener('submit' , function(e) {
    e.preventDefault();

    let formData = new FormData(this);

    fetch('signup.php', {
        method:'post',
        body: formData
    }).then(function(response) {
        return response.text();
    }).then(function(text) {
        console.log(text);
    }).catch(function(error) {
        console.log(error);
    })
});