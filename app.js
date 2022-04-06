const menu = document.querySelector('#mobile-menu');
const menuLinks = document.querySelector('.navbar__menu');
const navLogo = document.querySelector('.navbar__logo');

// Display Mobile Menu
const mobileMenu = () => {
    menu.classList.toggle('is-active');
    menuLinks.classList.toggle('active');
};

menu.addEventListener('click', mobileMenu); // Activates the mobileMenu arrow function

// Show active menu when scrolling (highlighting)
const highlightMenu = () => {
    const elem = document.querySelector('.highlight');
    const createMenu = document.querySelector('#create-page');
    const aboutMenu = document.querySelector('#about-page');
    //const communityMenu = document.querySelector('#community-page');
    let scrollPos = window.scrollY;
    console.log(scrollPos); // logs the scrollPos(number) so you can see it when using command + shift + c
    //  how to get the scrollY postion (the number for scrollPos)
    // 1 command + shift + c while you have the live server open
    // 2 open the console and click on device emulation
    // 3 go to responsive
    // 4 and you'll be able to see the scroll postion of each section
    

    // adds 'highlight' class to my menu items
    if (window.innerWidth > 960 && scrollPos < 370) {
        createMenu.classList.add('highlight');
        aboutMenu.classList.remove('highlight');
        return;
      } else if (window.innerWidth > 960 && scrollPos < 1190) {
        aboutMenu.classList.add('highlight');
        createMenu.classList.remove('highlight');
       // communityMenu.classList.remove('highlight');
        return;
      } else if (window.innerWidth > 960 && scrollPos < 2345) {
       // communityMenu.classList.add('highlight');
        aboutMenu.classList.remove('highlight');
        return;
      }

      if ((elem && window.innerWIdth < 960 && scrollPos < 600) || elem) {
        elem.classList.remove('highlight');
      }
    };

    // toggle the highlight affects when a user scrolls or click
    window.addEventListener('scroll', highlightMenu); 
    window.addEventListener('click', highlightMenu);

  //  Close mobile Menu when clicking on a menu item
  const hideMobileMenu = () => {
    const menuBars = document.querySelector('.is-active');
    if (window.innerWidth <= 768 && menuBars) {
      menu.classList.toggle('is-active');
      menuLinks.classList.remove('active');
    }
  };   

  menuLinks.addEventListener('click', hideMobileMenu);
  navLogo.addEventListener('click', hideMobileMenu);

  let login = document.getElementById('login');
  let signup = document.getElementById('signup');

  // When the user clicks anywhere outside of the login or signup, close it
  window.onclick = function(event) {
      if (event.target == login) {
          login.style.display = "none";
      }
      else if (event.target == signup) {
        signup.style.display = "none";
      }
  };


