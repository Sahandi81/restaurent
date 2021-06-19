let form = document.getElementById('form');
let username = document.getElementById('username');
let phone = document.getElementById('number')
let email = document.getElementById('email');
let password = document.getElementById('password');
let password2 = document.getElementById('password2');

let modal = document.getElementById("modalEl");
function showError(input,message) {
    console.log(message)
    modal.style.margin = "0";
    modal.style.animation = "fadein .5s";
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

let span = document.getElementsByClassName("close")[0];

function checkRequired(inpt) {
    inpt.forEach(function(input) {
        if (input.value.trim() === '') {
            function Modal() {
                modal.style.margin = "0";
                modal.style.animation = "fadein .5s";
                    showError(input,
                        `${getFieldName(input)} باید پر شود. `,required);
                     
               
            }
            Modal();
        } else {
            showSuccess(input);
            required = true
        }
    });

    return required;
}



function checkCharacters(input) {
    let letters = /^[a-zA-Z0-9_]{3,10}$/;
    if (!letters.test(input.value.trim())) {
        showError(input , 'فقط از حروف انگلیسی و اعداد استفاده کنید.');
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
        showError(input, 'ایمیل معتبر نمیباشد.');
        return false
    }
}

function checkLength(input, min, max) {
    if (input.value.length < min) {
        showError(
            input,
            `${getFieldName(input)} باید کمتر از ${min} کارکتر باشد. `
        );
        return false
    } else if (input.value.length > max) {
        showError(
            input,
            `${getFieldName(input)} باید کمتر از ${max} کارکتر باشد.`
        );
        return false
    } else {
        showSuccess(input);
        return true
    }
}


function checkPasswordsMatch(input1, input2) {
    if (input1.value !== input2.value) {
        showError(input2, 'رمز عبور با تکرار مطابقت ندارد.');
        return false
    }
    return true
}


function getFieldName(input) {
    return input.id.charAt(0).toUpperCase() + input.id.slice(1);
}


form.addEventListener('submit' , function(e) {
    e.preventDefault();
    console.log(checkPasswordsMatch(password,password2))

    if(!checkRequired([username, email, phone, password, password2])){
        return
        
    }
    if(!checkLength(username, 3, 10) || !checkCharacters(username,  /^[A-Za-z]+$/) || !checkEmail(email) || !checkPasswordsMatch(password, password2) || !checkLength(phone, 6, 11) ||!checkLength(password, 6, 25)) {
            return true
    }

    // if(!checkRequired([username, email, phone, password, password2])){
    //     checkLength(username, 3, 10);
    //     checkCharacters(username,  /^[A-Za-z]+$/);
    //     checkEmail(email);
    //     checkLength(phone, 6, 11);
    //     checkLength(password, 6, 25);
    //     checkPasswordsMatch(password, password2);
    // }

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