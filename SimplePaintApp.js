const canvas = document.getElementById("canvas"); /* taking canvas from html */
canvas.width = window.innerWidth - 60; /* width of canvas */
canvas.height = 400; /* height of canvas*/

let index = -1; /* started out with -1 because 0 means there is already a path inside the array, -1 means I didn't draw anything yet */
let restore_array = [];

let context = canvas.getContext("2d"); /* 2d dimension of context, everything that is on the canvas atm */
let start_background_color = "white";
context.fillStyle = start_background_color;
context.fillRect(0, 0, canvas.width, canvas.height); /* area that you can draw on the canvas */

let draw_color = "black"; 
let draw_width = "2"; 
let is_drawing = false;  

function change_color(element) {
  draw_color = element.style.background;
}


canvas.addEventListener("touchstart", start, false); /* for phone, the start function prepairs the drawing and draw function draws it*/
canvas.addEventListener("touchmove", draw, false);
canvas.addEventListener("mousedown", start, false); /* for mouse, the start function prepairs the drawing and draw function draws it*/
canvas.addEventListener("mousemove", draw, false);

canvas.addEventListener("touchend", stop, false);
canvas.addEventListener("mouseup", stop, false);
canvas.addEventListener("mouseout", stop, false);


function start (event) {  /*this event gets the mouse coordinates */
  is_drawing = true;
  context.beginPath(); /* get ready to do something */
  context.moveTo(event.clientX - canvas.offsetLeft,
                 event.clientY - canvas.offsetTop);
  event.preventDefault();
}

function draw(event) {  
  if (is_drawing) {    
      context.lineTo(event.clientX - canvas.offsetLeft,
                     event.clientY - canvas.offsetTop); /*saying to draw a line to the coordinates where the mouse is moving*/
      context.strokeStyle = draw_color;
      context.lineWidth = draw_width;
      context.lineCap = "round"; /*round style in the drawing */
      context.lineJoin = "round"; /*important so you can get a full line without so many interruptions inside*/
      context.stroke(); /*to use the defined styles like, lineCap lineJoin, lineWidth and strokestyle*/
  }
}

function stop(event) {
  if (is_drawing) { 
      context.stroke();
      context.closePath();  
      is_drawing = false;
  }
  event.preventDefault();

  /* if you stop the drawing, it will get added to the array/ for undo function */

  if (event.type != 'mouseout') { 
    restore_array.push(context.getImageData(0, 0, canvas.width, canvas.height));
    index += 1; 
  }
}

function clear_canvas() {
  context.fillStyle = start_background_color; 
  context.clearRect(0, 0, canvas.width, canvas.height);
  context.fillRect(0, 0, canvas.width, canvas.height);

  restore_array = []; 
  index = -1;
}

function undo_last() { 
  if (index <= 0) {
    clear_canvas();
  }
  else {
    index -= 1; 
    restore_array.pop();
    context.putImageData(restore_array[index], 0, 0);
  }
}

function download(){  
  const image = canvas.toDataURL();  // access the context of the canvas, get the image from canvas
  const link = document.createElement('a'); // a element is a link
  link.href = image; // image in link
  link.download = 'image.png'; 
  link.click(); // giving the result of a user clicking the download link without the need to prompt the user to do so
}


/* all this java script below is for the nav bar */
const menu = document.querySelector('.mobile-menu');
const menuLinks = document.querySelector('.navbar__menu');
const navLogo = document.querySelector('.navbar__logo');

// Display Mobile Menu
const mobileMenu = () => {
    menu.classList.toggle('is-active');
    menuLinks.classList.toggle('active');
};

menu.addEventListener('click', mobileMenu); // Activates the mobileMenu arrow function

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

  let logout = document.getElementById('logout');

  // When the user clicks anywhere outside of the login or signup, close it
  window.onclick = function(event) {
    if (event.target == logout){
      logout.style.display = "none";
    } 
  };