$('#contactForm').click(function() {
    var name = $("input#name").val();
          
    var email = $("input#email").val();
    var message = $("input#message").val();
    var phone = $("input#phone").val();
    var company = $("textarea#company").val();
    var firstName = name; // For Success/Failure Message
    alert(name)
    // Check for white space in name for Success/Fail message
    if (firstName.indexOf(' ') >= 0) {
        firstName = name.split(' ').slice(0, -1).join(' ');
    }
    $.ajax({
        url: "https://jddesign.000webhostapp.com/mail/contact_me1.php",
        type: "POST",
        data: {
            name: name,
            email: email,
            message: message,
            phone: phone,
            company: company,
        },

        cache: false,

        success: function() {
            // Success message
            $('#success').html("<div class='alert alert-success'>");
            $('#success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                .append("</button>");
            $('#success > .alert-success')
                .append("<strong>Your message has been sent. </strong>");
            $('#success > .alert-success')
                .append('</div>');

            //clear all fields
            $('#contactForm').trigger("reset");
        },
        error: function() {
            // Fail message
          
            $('#contactForm').trigger("reset");
        },
    })
});
/*When clicking on Full hide fail/success boxes */
$('#name').focus(function() {
    $('#success').html('');
});
//Get the button:
mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
} 