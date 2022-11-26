const fonts = ["Arial", "Verdana", "Helvetica"];

const paragraphs = Array.from(document.body.getElementsByClassName("odstavek"));
const images = Array.from(document.body.getElementsByClassName("slika"));

paragraphs.forEach((par) => {
  console.log(par);
  const rand = Math.floor(Math.random() * 3);

  par.style.fontFamily = fonts[rand];
});

images.forEach((img) => {
  img.style.border = "2px solid";
});

const randImgIndex = Math.floor(Math.random() * 3);
images[randImgIndex].style.width =
  (images[randImgIndex].offsetWidth * 0.5).toString() + "px";
