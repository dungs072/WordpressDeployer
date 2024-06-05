function getRandomMathEquation() {
    const num1 = Math.floor(Math.random() * 10) + 1;
    const num2 = Math.floor(Math.random() * 10) + 1;
    const operators = ['+', '-', '*', '/'];
    const operator = operators[Math.floor(Math.random() * operators.length)];
    const equation = `${num1} ${operator} ${num2}`;
    return equation;
  
  
  const equation = getRandomMathEquation();
  console.log(equation);
  