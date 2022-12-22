// Set the date we're counting down to
var countDownDate = new Date("Jan 5, 2024 15:37:25").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  //document.getElementById("timer").innerHTML =minutes + ": " + seconds;

  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
  //  document.getElementById("timer").innerHTML = "EXPIRED";
  }
}, 1000);

// owl carusole


// add option
let count = 1;
function myFunction() {

      $('#add-option').append(`<label for="name" class="mb-2 fw-bold">Question Option</label><div class="d-flex justify-content-start">
           <div class="form-group">
                <input type="text" name="blank_answer[]" class="form-control" placeholder="option">
           </div>
           <div class="form-check mt-2">
              <input class="form-check-input" type="checkbox" name="is_correct[]" value="${count}" id="flexCheckDefault${count}">
              <label class="form-check-label" for="flexCheckDefault${count}">is correct</label>
           </div>
        </div>`);

      //  document.getElementById("add-option").innerHTML +=`<label for="name" class="mb-2 fw-bold">Question Option</label>
      //  <div class="d-flex justify-content-start">
      //      <div class="form-group">
      //          <input type="text" name="blank_answer[]" class="form-control" placeholder="option">
      //      </div>
      //      <div class="form-check">
      //          <input class="form-check-input" type="checkbox" name="is_correct[]" value="${count}" id="flexCheckDefault${count}">
      //          <label class="form-check-label" for="flexCheckDefault${count}">is correct</label>
      //      </div>
      //  </div>`;

      count++;      
}
