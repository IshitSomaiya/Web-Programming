function separateAndMultiply() {
    const number = parseInt(document.getElementById('inputNumber').value);
    
    // Check if the input is a 2-digit number
    if (isNaN(number) || number < 10 || number > 99) {
        document.getElementById('result').textContent = "Please provide a valid 2-digit number.";
        return;
    }

    // Separate the digits
    const firstDigit = Math.floor(number / 10);
    const secondDigit = number % 10;

    // Multiply the first digit by itself for the second digit times
    let result = 1;
    for (let i = 0; i < secondDigit; i++) {
        result *= firstDigit;
    }

    document.getElementById('result').textContent = "Result: " + result;
}