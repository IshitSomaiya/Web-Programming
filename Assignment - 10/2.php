$(document).ready(function() {
$('#submit').click(function(e) {
e.preventDefault();
var username = $('#username').val();
$.ajax({
url: 'localhost/ass 10/2/Validate.php',
type: 'POST',
data: {username: username},
dataType: 'json',
success: function(response) {
$('#result').text(response.result);