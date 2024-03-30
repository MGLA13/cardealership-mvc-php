

document.addEventListener("DOMContentLoaded",function(){


    eventListeners();
    darkMode();

});

//Check dark mode enablement
function darkMode(){

     let darkLocal = window.localStorage.getItem('dark');
     if(darkLocal === 'true') {
         document.body.classList.add('dark-mode');
     }

     document.querySelector('.dark-mode-button').addEventListener('click', darkChange);
}


//Enable or disable dark mode
function darkChange() {
    let darkLocal = window.localStorage.getItem('dark');
 
    if(darkLocal === null || darkLocal === 'false') {
        window.localStorage.setItem('dark', true);
        document.body.classList.add('dark-mode');
    } else {
        window.localStorage.setItem('dark', false);
        document.body.classList.remove('dark-mode');
    }
}

//Event listeners
function eventListeners(){

    const mobileMenu = document.querySelector(".mobile-menu");
    mobileMenu.addEventListener("click",responsiveNavegation);

    const contactMethods = document.querySelectorAll('input[name="contact[contact]"]');
    contactMethods.forEach(input => input.addEventListener("click",showContactMethods));

}

//To show navegation in mobile design
function responsiveNavegation(){

    const navegation = document.querySelector(".navegation");
    navegation.classList.toggle("view");
    
}


//Show inputs to contact
function showContactMethods(evt){

    const contactDiv = document.querySelector("#contact");

    if(evt.target.value === "phone_number"){
        contactDiv.innerHTML = `
            <label for="phone-number">phone number</label>
            <input type="tel" placeholder="Your phone number" id="phone-number" name="contact[phone_number]">
            
            <p>Choose the date and time for the call:</p>
            
            <label for="date">Date:</label>
            <input type="date" id="date" name="contact[date]">
            
            <label for="time">Time:</label>
            <input type="time" id="time" min="09:00" max="18:00" name="contact[time]">
            `;                       
    }else{
        contactDiv.innerHTML = `
            <label for="email">E-mail</label>
            <input type="email" placeholder="Your email" id="email" name="contact[email]" required>
        `;
    }
    
}

