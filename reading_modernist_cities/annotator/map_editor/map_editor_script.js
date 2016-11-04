// Get the text to be annotated in the text box, properly formatted
function format(text, color){
	var formatted_text = '<p style="color:' + color + '">' + text + '</p>';
	return formatted_text;
}
function add(text, color){
    var TheTextBox = document.getElementById("body");
    TheTextBox.value = TheTextBox.value + format(text, color);
}
var the_text = localStorage.the_text;
var the_color = "#089496"; //RMC annotation color
add(the_text, the_color);

// Store the slug
var the_slug = document.getElementById("slug").value; 
// or getElementsByName? which doesn't seem to work,
// except that this is how "slug" is listed (not ID, not currently...)
console.log( the_slug );
localStorage.the_slug = the_slug;