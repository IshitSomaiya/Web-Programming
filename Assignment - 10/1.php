$(document).ready(function() {
$("#retrieveButton").click(function() {
$.ajax({
url: "data.txt",
type: "GET",
dataType: "text",
success: function(response) {
$("#content").text(response);