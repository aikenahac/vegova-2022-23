function numToArray(num) {
  const stringArray = num.toString().split('');

  return stringArray.map(el => parseInt(el));
}

console.log(numToArray(1234));