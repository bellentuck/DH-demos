// Get the modal
var modal = document.getElementById('myModal');

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// Right-click opens modal
if (document.addEventListener) { // IE >= 9; other browsers
    document.addEventListener('contextmenu', function(e) {
        modal.style.display = "block";
        e.preventDefault();
    }, false);
} else { // IE < 9
    document.attachEvent('oncontextmenu', function() {
        modal.style.display = "block";
        window.event.returnValue = false;
    });
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

// get highlighted text to show up in modal
function getSelectionText() {
    var text = "";
    var activeEl = document.activeElement;
    var activeElTagName = activeEl ? activeEl.tagName.toLowerCase() : null;
    if (
      (activeElTagName == "textarea" || activeElTagName == "input") &&
      /^(?:text|search|password|tel|url)$/i.test(activeEl.type) &&
      (typeof activeEl.selectionStart == "number")
    ) {
      text = activeEl.value.slice(activeEl.selectionStart, activeEl.selectionEnd);
    } else if (window.getSelection) {
        text = window.getSelection().toString();
    }
    return text;
}

//var the_text = "";

document.onmouseup = document.onkeyup = document.onselectionchange = function() {
  document.getElementById("sel").value = getSelectionText();
  var the_text = document.getElementById("sel").value;
  console.log( the_text );
  // Temporarily store the highlighted text (to be put into a new annotation entry)
  localStorage.the_text = the_text;
};

// window.onload = function() {
//        //when the document is finished loading, replace everything
//        //between the <a ...> </a> tags with the value of splitText
//    document.getElementById("selection").innerHTML = the_text;
// };





// //I.
// function getSelText() {
//     var txt = '';
//      if (window.getSelection) {
//         txt = window.getSelection();
//      } else if (document.getSelection) {
//         txt = document.getSelection();
//      } else if (document.selection) {
//         txt = document.selection.createRange().text;
//      } else return;
// console.log(txt);
// }

//I.
var paragraphs = document.querySelectorAll('#neatline-narrative p');
//II.
for(i=0; i<paragraphs.length; i++) {
    paragraphs[i].addEventListener("mouseup", function(e) {
        console.log(e.target);
    }, false);
}




document.getElementsByTagName("p").addEventListener("select", function(e) {
    console.log(e.target);
}, false);
