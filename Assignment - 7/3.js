function findWordIndex(sentenceArray, word) {
    for (let i = 0; i < sentenceArray.length; i++) {
        if (sentenceArray[i] === word) {
            return i; // Return the index of the word if found
        }
    }
    return -1; // Return -1 if the word is not found in the sentence
}

function searchWord() {
    const sentence = "My Name Is Somaiya Ishit."; // Predefined sentence
    const word = document.getElementById("word").value;
    const sentenceArray = sentence.split(" ");
    const index = findWordIndex(sentenceArray, word);
    if (index !== -1) {
        document.getElementById("result").textContent = `Index of "${word}" is: ${index}`;
    } else {
        document.getElementById("result").textContent = `Word "${word}" not found in the sentence.`;
    }
}