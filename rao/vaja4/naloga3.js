const fruits = ['apple', 'pineapple', 'orange', 'peach', 'tomato'];
let longest = fruits[0];

fruits.forEach(fruit => {
  console.log(`${fruit} - len: ${fruit.length}`);

  if (fruit.length > longest.length) {
    longest = fruit;
  }
});

console.log(`\nLongest fruit: ${longest}`);