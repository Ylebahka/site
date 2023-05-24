document.querySelector("#NavButton").addEventListener("click", function(){
     document.querySelector(".LoginMenu").classList.toggle("LoginMenu-View")  
})
document.querySelector(".RegistrationSelectButton").addEventListener("click", function(){
     document.querySelector("#LoginInputMenu").classList.add("LoginInputMenu-deactive")
     document.querySelector("#RegistrationInputMenu").classList.add("RegistrationInputMenu-active")
     document.querySelector(".LoginSelectButton").classList.remove("LoginChosen")
     document.querySelector(".RegistrationSelectButton").classList.add("RegistrationChosen")
     document.querySelector(".LoginMenu").classList.add("LoginMenuForRegistation")
})
document.querySelector(".LoginSelectButton").addEventListener("click", function(){
     document.querySelector("#LoginInputMenu").classList.remove("LoginInputMenu-deactive")
     document.querySelector("#RegistrationInputMenu").classList.remove("RegistrationInputMenu-active")
     document.querySelector(".LoginSelectButton").classList.add("LoginChosen")
     document.querySelector(".RegistrationSelectButton").classList.remove("RegistrationChosen")
     document.querySelector(".LoginMenu").classList.remove("LoginMenuForRegistation")
})