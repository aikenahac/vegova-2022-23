const readline = require('readline').createInterface({
  input: process.stdin,
  output: process.stdout
});

function add(num) {
  let final = 0;
  
  num.split('').forEach(stevka => final += parseInt(stevka));

  return final;
}

readline.question('Vpiši število: ', num => {
  console.log(add(num));
  readline.close();
});