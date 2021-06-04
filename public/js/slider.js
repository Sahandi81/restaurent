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

const input = document.querySelectorAll(".add-food");
const input2 = document.querySelectorAll(".discount");

function myFunction(x) {
  input.forEach((i) => {
    i.value = Number(i.value) + 1;
  });
  input2.forEach((i) => {
    i.value = Number(i.value) + x
  });
}

