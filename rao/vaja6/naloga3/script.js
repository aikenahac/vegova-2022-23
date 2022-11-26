const button = document.getElementById("btn");

console.log("aaa");
button.onmouseover = () => {
  console.log("aaa");
  button.style.top = Math.random() * window.innerHeight + "px";
  button.style.left = Math.random() * window.innerWidth + "px";
};

button.onclick = () => {
  button.style.opacity = 0;
  document.body.style.backgroundColor = "green";
};
