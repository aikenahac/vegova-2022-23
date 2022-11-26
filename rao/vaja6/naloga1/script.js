for (let i = 0; i < 10; i++) {
  const ranCol = Math.floor(Math.random() * 0xffffff).toString(16);

  const num = document.createElement("p");
  const numText = document.createTextNode(i + 1);

  num.appendChild(numText);
  num.style.color = `#${ranCol}`;

  document.body.appendChild(num);
}
