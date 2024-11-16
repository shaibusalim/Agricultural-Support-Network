function reveal() {
    var reveals = document.querySelectorAll(".reveal");
  
    for (var i = 0; i < reveals.length; i++) {
      var windowHeight = window.innerHeight;
      var elementTop = reveals[i].getBoundingClientRect().top;
      var elementVisible = 150;
  
      if (elementTop < windowHeight - elementVisible) {
        reveals[i].classList.add("active");
      } else {
        reveals[i].classList.remove("active");
      }
    }
  }

window.addEventListener("scroll", reveal);

// To check the scroll position on the page load
reveal();


function slideIn() {
  var slideInElement = document.getElementById("slide-in");
  var windowHeight = window.innerHeight;
  var elementTop = slideInElement.getBoundingClientRect().top;
  var elementVisible = 150;

  if (elementTop < windowHeight - elementVisible) {
    slideInElement.classList.add("active");
  } else {
    slideInElement.classList.remove("active");
  }
}

function handleScroll() {
  window.addEventListener("scroll", slideIn);
}

// Call the scroll handler function
handleScroll();

// Call slideIn initially when the page loads
window.addEventListener("load", slideIn);





var textElement = document.getElementById("text");
var text1 = "Discover what we have....!";
var text2 = "Who are the end-users/stakeholders targeted?";
var text = text1 + text2;
let index = 1;

function speedText(){
    textElement.innerText = text.slice(0, index);
    index++;
  //  if (index <= text.length) {
    //    requestAnimationFrame(speedText);
  //  }
  if (index > text.length) index = 1;
   setTimeout(speedText, 100);
}
speedText();