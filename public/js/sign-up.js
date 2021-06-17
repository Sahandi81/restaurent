let form = document.getElementById('form');
let username = document.getElementById('username');
let phone = document.getElementById('number')
let email = document.getElementById('email');
let password = document.getElementById('password');
let password2 = document.getElementById('password2');


function showError(input,message) {
    const elem = document.querySelector(".modal .card")
    const small = document.createElement("small")
    small.innerText = message;
    small.id = 'small'
    elem.appendChild(small)
}

function showSuccess(input) {
    let form = input.parentElement;
    form.className = 'input-text success';
}


let required = false;
let modal = document.getElementById("modalEl");
let span = document.getElementsByClassName("close")[0];

function checkRequired(inpt) {
    inpt.forEach(function(input) {
        if (input.value.trim() === '') {
            function Modal() {
                modal.style.margin = "0";
                modal.style.animation = "fadein .5s";

                setTimeout(function(){
                    showError(input,
                        `${getFieldName(input)} is required`,required);
                }, 200);
            }
            Modal();

            span.onclick = function() {
                modal.style.marginTop = "-150vh";
                modal.style.animation = "fadeout .5s";
            }

            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.marginTop = "-150vh";
                    modal.style.animation = "fadeout .5s";
                }
            }
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
        return false
    }
    return true
}

function checkEmail(input) {
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (re.test(input.value.trim())) {
        showSuccess(input);
        return true
    } else {
        showError(input, 'Email is not valid');
        return false
    }
}

function checkLength(input, min, max) {
    if (input.value.length < min) {
        showError(
            input,
            `${getFieldName(input)} must be at least ${min} characters`
    );
        return false
    } else if (input.value.length > max) {
        showError(
            input,
            `${getFieldName(input)} must be less than ${max} characters`
    );
        return false
    } else {
        showSuccess(input);
        return true
    }
}


function checkPasswordsMatch(input1, input2) {
    if (input1.value !== input2.value) {
        showError(input2, 'Passwords do not match');
        return false
    }
    return true
}


function getFieldName(input) {
    return input.id.charAt(0).toUpperCase() + input.id.slice(1);
}


form.addEventListener('submit' , function(e) {
    e.preventDefault();

    if(!checkRequired([username, email, phone, password, password2])){
        return
    }
    if(!checkLength(username, 3, 10) || !checkCharacters(username,  /^[A-Za-z]+$/) || !checkEmail(email) || !checkPasswordsMatch(password, password2) || !checkLength(phone, 6, 11) ||!checkLength(password, 6, 25)) {
        return true
    }

    let formData = new FormData(this);

    fetch('sign-up.php', {
        method:'post',
        body: formData
    }).then(function(response) {
        return response.json();
    }).then(function(data) {
        if(data.MSG === "SUCCESSFULLY"){
            window.location.href = "user-profile.php"
        }
        else if(data.MSG === "USER_EXISTS"){
            alert("user exists")
        }
    }).catch(function(error) {
        console.log(error);
    })
});

