function SendButton() {
  const star = document.querySelectorAll(".star");
  fetch("send-comment.php?starts=" + star.length)
    .then((res) => res.text())
    .then((data) => {
      console.log(data);
    })
    .catch((err) => console.log(err));
}
