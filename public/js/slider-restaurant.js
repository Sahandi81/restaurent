/* slider */

const controls_container = document.querySelector(".bill-controls-container");


/* zoom */

const img = document.querySelectorAll(".hambrg");


img.forEach((i) => {
  i.addEventListener("click", (e) => {
    if (i.classList.contains("scaled")) {
      i.classList.remove("scaled");
    } else {
      img.forEach((m) => {
        m.classList.remove("scaled");
      });
      i.classList.add("scaled");
    }
  });
});

window.onclick = function (event) {
  if (event.target === img) {
    modal.style.marginTop = "scale(1,1)";
  }
};

/* send input */

const food = document.querySelectorAll(".add-food");
const drink = document.querySelectorAll(".add-drink");
const input2 = document.querySelectorAll(".discount");


function myFunction(x,e) {

    const nameClass = e.target.className.split(' ')[1];
    const elem = e.target.parentElement.parentElement.querySelector(".add-number");
    const input = document.querySelector("input."+nameClass);
    let NumberProduct = e.target.parentElement.parentElement;

    elem.textContent = Number(elem.textContent) + 1;
    input.value = NumberProduct.querySelector(".add-number").textContent;

    return true;
}

function btn(x,e) {

    const nameClass = e.target.parentElement.parentElement.querySelector(".list").className.split(' ')[1];
    const elem = e.target.parentElement.parentElement.parentElement.querySelector(".add-number");
    const input = document.querySelector("input."+nameClass);
    elem.textContent = Number(elem.textContent) - 1;
    input.value = elem.textContent;

    return true;
}

function btn2(x,e) {
    const elem = e.target.parentElement.parentElement.querySelector(".add-number") || e.target.parentElement.parentElement.parentElement.querySelector(".add-number")
    elem.textContent = Number(elem.textContent) - 1

    drink.forEach((i) => {
        i.value = Number(i.value) - 1;
    });
    input2.forEach((i) => {
        i.value = Number(i.value) - x
    });
}