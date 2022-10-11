const readline = require('readline').createInterface({
  input: process.stdin,
  output: process.stdout
});

function isPrime(num) {
  for (let i = 2; i < num; i++) {
    if (num % i == 0) {
      return false;
    }
  }

  return true;
}

readline.question('Vpiši število: ', num => {
  if (isPrime(num)) {
    console.log(`${num} is a prime number`);
  } else {
    console.log(`${num} is not a prime number`)
  }
  readline.close();
});