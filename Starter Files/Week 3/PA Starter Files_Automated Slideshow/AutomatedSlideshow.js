/*
   Author:  Jaden Covington
   Date:    02/11/2026
   Purpose: This program creates an automated slideshow that rotates
            through ISS images and updates captions automatically.
*/

document.addEventListener("DOMContentLoaded", function () {

   // Array holding image file paths
   let images = [
      "slide0.jpg","slide1.jpg","slide2.jpg","slide3.jpg","slide4.jpg","slide5.jpg","slide6.jpg",
      "slide7.jpg","slide8.jpg","slide9.jpg","slide10.jpg","slide11.jpg","slide12.jpg","slide13.jpg"
   ];

   // Parallel caption array
   let captions = [
      "International Space Station fourth expansion [2009]",
      "Assembling the International Space Station [1998]",
      "The Atlantis docks with the ISS [2001]",
      "The Atlantis approaches the ISS [2000]",
      "The Soyuz departs from the ISS [2001]",
      "International Space Station over Earth [2002]",
      "The International Space Station first expansion [2002]",
      "Hurricane Ivan from the ISS [2008]",
      "The Soyuz spacecraft approaches the ISS [2005]",
      "The International Space Station from above [2006]",
      "Maneuvering in space with the Canadarm2 [2006]",
      "The International Space Station second expansion [2006]",
      "The International Space Station third expansion [2007]",
      "The ISS over the Ionian Sea [2007]"
   ];

   let currentSlide = 0;

   // Get references to the image and caption elements
   let slideshowImg = document.getElementById("slideshow-img");
   let captionText = document.getElementById("caption");

   function showSlide() {
      slideshowImg.src = images[currentSlide];
      captionText.textContent = captions[currentSlide];
   }

   // Show first image immediately
   showSlide();

   // Change slide every 3 seconds
   setInterval(function () {
      currentSlide = (currentSlide + 1) % images.length;
      showSlide();
   }, 3000);

});
