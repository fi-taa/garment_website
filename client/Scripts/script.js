// JavaScript code for product.html

// Smooth scrolling for cloth type links
document.querySelectorAll('.cloth-types ul li a').forEach((link) => {
    link.addEventListener('click', (e) => {
      e.preventDefault();
  
      // Remove the active class from all links
      document.querySelectorAll('.cloth-types ul li a').forEach((el) => {
        el.classList.remove('active');
      });
  
      // Add the active class to the clicked link
      link.classList.add('active');
  
      // Get the target section id from the link's href attribute
      const targetId = link.getAttribute('href').substring(1);
  
      // Show the target section and hide the others
      document.querySelectorAll('.product-section').forEach((section) => {
        if (section.id === targetId) {
          section.style.display = 'block';
        } else {
          section.style.display = 'none';
        }
      });
  
      const target = document.querySelector(link.getAttribute('href'));
      target.scrollIntoView({ behavior: 'smooth' });
    });
  });
  
function getProductName(){
    // document.getElementById('product-name').innerHTML = "product-name : " + document.getElementById('prod').innerText;
    console.log(document.getElementById('prod').innerText);
  }
console.log("================================");

  getProductName();
console.log("================================");
