const readline = require('readline').createInterface({
  input: process.stdin,
  output: process.stdout
});

function fibonacci(n) {
  if (n < 2) {
    return n;
  }
  return fibonacci(n - 1) + fibonacci(n - 2);
}

readline.question('Vpiši n, katerega člen želip (fibonacci): ', num => {
  console.log(fibonacci(parseInt(num)));
  readline.close();
});