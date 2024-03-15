function printOddCharacters() {
    let inputString = document.getElementById("inputString").value;
    let oddCharacters = "";
    for (let i = 0; i < inputString.length; i++) {
        if (i % 2 === 0) {
            oddCharacters += inputString[i];
        }
    }
    document.getElementById("output").innerText = "Characters at odd positions: " + oddCharacters;
}