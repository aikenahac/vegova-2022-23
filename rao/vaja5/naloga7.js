function drawCircle(rad) {
  const thickness = 0.4;
  const symbol = "*";

  const rin = rad - thickness;
  const rout = rad + thickness;

  for (let y = rad; y >= -rad; --y) {
    let string = "";

    for (let x = -rad; x < rout; x += 0.5) {
      const value = x * x + y * y;

      if (value >= rin * rin && value <= rout * rout) {
        string += symbol;
      } else {
        string += " ";
      }
    }

    console.log(string);
  }
}

let r = 1;
let increase = true;

setInterval(() => {
  console.clear();
  if (increase) {
    r++;
  } else {
    r--;
  }

  if (r === 25) {
    increase = false;
  } else if (r === 1) {
    increase = true;
  }

  drawCircle(r);
}, 60);
