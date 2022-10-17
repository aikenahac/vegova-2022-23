function printDiamond(size) {
  let temp;

  for (let i = 1; i <= size; i++) {
    for (let s = size - 1; s >= i; s--) {
      process.stdout.write(" ");
    }
    for (let j = 1; j <= i; j++) {
      process.stdout.write("* ");
    }
    console.log();

    temp = i;
  }

  temp++;

  if (temp == size + 1) {
    for (let i = 1; i <= size - 1; i++) {
      for (let s = 1; s <= i; s++) {
        process.stdout.write(" ");
      }
      for (j = i; j <= size - 1; j++) {
        process.stdout.write("* ");
      }
      console.log();
    }
  }
}

printDiamond(20);
