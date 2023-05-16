document.querySelector("#NavButton").addEventListener("click", function(){
     document.querySelector(".LoginMenu").classList.toggle("LoginMenu-View")  
})
document.querySelector(".RegistrationSelectButton").addEventListener("click", function(){
     document.querySelector("#LoginInputMenu").classList.toggle("LoginInputMenu-deactive")
     document.querySelector("#RegistrationInputMenu").classList.toggle("RegistrationInputMenu-active")
     document.querySelector(".LoginSelectButton").classList.toggle("LoginChosen")
     document.querySelector(".RegistrationSelectButton").classList.toggle("RegistrationChosen")
})
document.querySelector(".LoginSelectButton").addEventListener("click", function(){
     document.querySelector("#LoginInputMenu").classList.toggle("LoginInputMenu-deactive")
     document.querySelector("#RegistrationInputMenu").classList.toggle("RegistrationInputMenu-active")
     document.querySelector(".LoginSelectButton").classList.toggle("LoginChosen")
     document.querySelector(".RegistrationSelectButton").classList.toggle("RegistrationChosen")
})