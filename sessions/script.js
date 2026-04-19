/*
Author: Jaden Covington
Date: 02/16/2026
Purpose: 4.5 GP Sessions
*/
// Stores the username in sessionStorage if the "Remember" checkbox is checked
function processStorage() {
if (document.getElementById("rememberinput").checked) {
sessionStorage.username =
document.getElementById("usernameinput").value; // Save input to sessionStorage
}
}
// Populates the username field with the stored value from sessionStorage
function populateInfo() {
if (sessionStorage.username) {
document.getElementById("usernameinput").value =
sessionStorage.username; // Retrieve stored value and place it back into the input
}
}
// Handles the form submission process
function handleSubmit(evt) {
// Prevents the default form submission so custom logic can run first
if (evt.preventDefault) {
evt.preventDefault();
}
else {
evt.returnValue = false; // For older versions of IE
}
processStorage(); // Store username if necessary
document.getElementsByTagName("form")[0].submit(); // Then submit the form
}
// Creates event listeners for form submission
function createEventListener() {
var loginForm = document.getElementsByTagName("form")[0];
// For modern browsers
if (loginForm.addEventListener) {
loginForm.addEventListener("submit", handleSubmit, false);
}
// For older versions of IE
else if (loginForm.attachEvent) {
loginForm.attachEvent("onsubmit", handleSubmit);
}
}
// Sets up the page: auto-populates username and attaches event listener
function setUpPage() {
populateInfo(); // Pre-fill username if stored
createEventListener(); // Set up form submission handling
}
// Adds event listeners to call setUpPage when the window loads
if (window.addEventListener) {
window.addEventListener("load", setUpPage, false); // Modern browsers
}
else if (window.attachEvent) {
window.attachEvent("onload", setUpPage); // Older IE
}