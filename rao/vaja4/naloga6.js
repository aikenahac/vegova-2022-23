const niz1 = '31ca';
const niz2 = '57db';

let final = '';

function getNums(str) {
  return str.split('').filter(el => !isNaN(parseInt(el)));
}

function getNaNs(str) {
  return str.split('').filter(el => isNaN(parseInt(el)));
}

let nums = '';
let nans = '';

const niz1nums = getNums(niz1);
const niz2nums = getNums(niz2);

const niz1nans = getNaNs(niz1);
const niz2nans = getNaNs(niz2);

while (niz1nums.length && niz2nums.length) {
  nums += niz1nums.shift();
  nums += niz2nums.shift();
}

while (niz1nans.length && niz2nans.length) {
  nans += niz1nans.shift();
  nans += niz2nans.shift();
}

if (niz1.length > niz2.length) {
  niz1nums.forEach(num => {
    nums += num;
  });

  niz1nans.forEach(nan => {
    nans += nan;
  });
} else if (niz1.length < niz2.length) {
  niz2nums.forEach(num => {
    nums += num;
  })

  niz2nans.forEach(nan => {
    nans += nan;
  })
}

console.log(nums + nans);