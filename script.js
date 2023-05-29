// Toggle the LoginMenu visibility when the NavButton is clicked
document.querySelector("#NavButton").addEventListener("click", function() {
     console.log("NavButton clicked");
     document.querySelector(".LoginMenu").classList.toggle("LoginMenu-View");
 });

// Form Creator Modal
var formCreatorModal = document.getElementById("form-creator-modal");
var formCreatorBtn = document.getElementById("form-creator-btn");
var closeFormCreatorModal = document.getElementById("close-form-creator")

closeFormCreatorModal.onclick = function() {
     formCreatorModal.style.display = "none";
}

formCreatorBtn.onclick = function(event) {
     console.log("Form Creator Button clicked");
     formCreatorModal.style.display = "flex";
};

// Modal Window
var modal = document.getElementById("modal");
var comments = document.getElementsByClassName("comment");
var closeModalBtn = document.getElementById("close-modal-window");

closeModalBtn.onclick = function() {
     modal.style.display = "none";
}

function openModal(header, mainText) {
     console.log("Open Modal:", "Header:", header, "Main Text:", mainText);
     document.getElementById("modal-header").innerText = header;
     document.getElementById("modal-text").innerText = mainText;
     modal.style.display = "flex";
}

for (var i = 0; i < comments.length; i++) {
     comments[i].addEventListener("click", function(event) {
         var header = this.querySelector("h3").innerText;
         var mainText = this.querySelector("p").innerText;
         console.log("Comment Clicked:", "Header:", header, "Main Text:", mainText);
         openModal(header, mainText);
     });
}

