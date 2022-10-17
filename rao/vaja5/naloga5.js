function calculateAge(age) {
  const today = new Date();

  return today.getFullYear() - age;
}

console.log(calculateAge(2003));
