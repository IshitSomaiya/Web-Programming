function displayFibonacci() {
    var n = parseInt(document.getElementById("fibonacciNumber").value);
    var fibonacciList = document.getElementById("fibonacciList");
    fibonacciList.innerHTML = ""; // Clear previous content

    var fibSequence = calculateFibonacci(n);

    for (var i = 0; i < fibSequence.length; i++) {
        var listItem = document.createElement("li");
        listItem.textContent = fibSequence[i];
        fibonacciList.appendChild(listItem);
    }
}

function calculateFibonacci(n) {
    var fibSequence = [0, 1];
    for (var i = 2; i < n; i++) {
        fibSequence.push(fibSequence[i - 1] + fibSequence[i - 2]);
    }
    return fibSequence;
}