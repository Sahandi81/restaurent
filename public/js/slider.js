/* slider */

const controls_container = document.querySelector(".bill-controls-container");

const slider = tns({
  container: "#bill-container",
  items: 1,
  nav: false,
  axis: "vertical",
  mouseDrag: true,
  constrolsPosition: "bottom",
  controlsContainer: controls_container,
  speed: 400,
  gutter: 40,
  center: true,
});

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
  if (event.target == img) {
    modal.style.marginTop = "scale(1,1)";
  }
};

/* send input */

const food = document.querySelectorAll(".add-food");
const drink = document.querySelectorAll(".add-drink");
const input2 = document.querySelectorAll(".discount");


function myFunction(x,e) {
    const elem = e.target.parentElement.parentElement.querySelector(".add-number")
    elem.textContent = Number(elem.textContent) + 1

    let element = 0;
    let elemt = document.querySelectorAll(".hamberger1");
    elemt.forEach((i) => {
      element += Number(i.textContent);
    });
    const input = document.querySelectorAll("input.hamberger1");
    input.forEach((i) => {
      i.value = element;
    });

    let element2 = 0;
    let elemt2 = document.querySelectorAll(".hamberger2");
    elemt2.forEach((i) => {
      element2 += Number(i.textContent);
    });
    const inpt2 = document.querySelectorAll("input.hamberger2");
    inpt2.forEach((i) => {
      i.value = element2;
    });

    let element3 = 0;
    let elemt3 = document.querySelectorAll(".hamberger3");
    elemt3.forEach((i) => {
      element3 += Number(i.textContent);
    });
    const input3 = document.querySelectorAll("input.hamberger3");
    input3.forEach((i) => {
      i.value = element3;
    });

    food.forEach((i) => {
      i.value = Number(i.value) + 1;
    });
    input2.forEach((i) => {
      i.value = Number(i.value) + x
    });
}

function myFunction2(x,e) {
  const elem = e.target.parentElement.parentElement.querySelector(".add-number")
  elem.textContent = Number(elem.textContent) + 1

  drink.forEach((i) => {
    i.value = Number(i.value) + 1;
  });
  input2.forEach((i) => {
    i.value = Number(i.value) + x
  });
}
