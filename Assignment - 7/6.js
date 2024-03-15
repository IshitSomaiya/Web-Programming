// Get elements
const heading = document.getElementById('heading');
const findTimeBtn = document.getElementById('find-time');
const redBtn = document.getElementById('red');
const greenBtn = document.getElementById('green');

// Event handlers
heading.addEventListener('mouseover', function() {
  this.style.color = 'yellow';
});

heading.addEventListener('mouseout', function() {
  this.style.color = 'black';
});

findTimeBtn.addEventListener('click', function() {
  const currentDate = new Date();
  alert("Current Date and Time: " + currentDate);
});

redBtn.addEventListener('click', function() {
  document.body.style.backgroundColor = 'red';
});

greenBtn.addEventListener('click', function() {
  document.body.style.backgroundColor = 'green';
});