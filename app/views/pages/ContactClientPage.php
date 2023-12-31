  <!--================Home Banner Area =================-->
  <!-- breadcrumb start-->
  <section class="breadcrumb breadcrumb_bg">
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-lg-8">
                  <div class="breadcrumb_iner">
                      <div class="breadcrumb_iner_item">
                          <h2>contact us</h2>
                          <p>Home <span>-</span> contact us</p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!-- breadcrumb start-->

  <!-- ================ contact section start ================= -->
  <section class="contact-section padding_top">
      <div class="container">
          <div class="d-none d-sm-block mb-5 pb-4">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d660.0002090224698!2d105.75160991638819!3d9.997897318912035!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a08952c740a241%3A0xce6745ba902fc338!2zMTk4NyBUSeG7hk0gVFLDgCBDSEFOSCBTRU4tIEPDgUkgUsSCTkc!5e1!3m2!1svi!2s!4v1699107523749!5m2!1svi!2s" width="1200px" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>


          <div class="row">
              <div class="col-12">
                  <h2 class="contact-title">Get in Touch</h2>
              </div>
              <div class="col-lg-8">
                  <form class="form-contact contact_form" action="" method="post" id="contactForm" class="needs-validation was-validated">
                      <div class="row">
                          <div class="col-12">
                              <div class="form-group mb-5">
                                  <textarea class="form-control w-100"  name="body" id="message" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'" placeholder='Enter Message'><?php echo isset($_POST['body']) ? htmlspecialchars($_POST['body']) : ''; ?></textarea>
                                  <div class="invalid-feedback">
                                      Please enter a valid content
                                  </div>
                              </div>
                          </div>
                          <div class="col-sm-6">
                              <div class="form-group mt-5">
                                  <div class="form-group">
                                      <input class="form-control" name="sender_name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" placeholder='Enter your name' value="<?php echo isset($_POST['sender_name']) ? htmlspecialchars($_POST['sender_name']) : ''; ?>">
                                  </div>

                              </div>
                          </div>
                          <div class="col-sm-6">
                              <div class="form-group mt-5">
                                  <input class="form-control" name="sender_email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" placeholder='Enter email address' value="<?php echo isset($_POST['sender_email']) ? htmlspecialchars($_POST['sender_email']) : ''; ?>">
                              </div>
                          </div>
                          <div class="col-12">
                              <div class="form-group">
                                  <input class="form-control" name="subject" id="subject" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Subject'" placeholder='Enter Subject' value="<?php echo isset($_POST['subject']) ? htmlspecialchars($_POST['subject']) : ''; ?>">
                              </div>
                          </div>
                      </div>
                      <div class="form-group mt-3">
                          <input type="submit" class="btn_3 button-contactForm" value="submit">
                      </div>
                  </form>
              </div>
              <div class="col-lg-4">
                  <div class="media contact-info">
                      <span class="contact-info__icon"><i class="fas fa-home"></i></span>
                      <div class="media-body">
                          <h3>Cần Thơ, Việt Nam</h3>
                          <p>Thường Thạnh, Cái Răng</p>
                      </div>
                  </div>
                  <div class="media contact-info">
                      <span class="contact-info__icon"><i class="fas fa-tablet"></i></span>
                      <div class="media-body">
                          <h3>0393379856</h3>
                      </div>
                  </div>
                  <div class="media contact-info">
                      <span class="contact-info__icon"><i class="fas fa-send"></i></span>
                      <div class="media-body">
                          <h3>infotech@gmail.com</h3>
                          <p>Send us your query anytime!</p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <script>
      document.addEventListener("DOMContentLoaded", function () {
          var form = document.getElementById('contactForm');
          form.addEventListener('submit', function (event) {
              var message = document.getElementById('message').value;
              var name = document.getElementById('name').value;
              var email = document.getElementById('email').value;
              var subject = document.getElementById('subject').value;

              // Reset previous error messages
              clearErrors();

              var hasErrors = false;

              // Validate message
              if (message.trim() === '') {
                  displayError('Please enter a message', 'message');
                  hasErrors = true;
              }

              // Validate name
              if (name.trim() === '') {
                  displayError('Please enter your name', 'name');
                  hasErrors = true;
              }

              // Validate email
              if (email.trim() === '' || !isValidEmail(email)) {
                  displayError('Please enter a valid email address', 'email');
                  hasErrors = true;
              }

              // Validate subject
              if (subject.trim() === '') {
                  displayError('Please enter a subject', 'subject');
                  hasErrors = true;
              }

              if (hasErrors) {
                  event.preventDefault();
              }
          });

          function displayError(message, fieldId) {
              var errorDiv = document.createElement('div');
              errorDiv.className = 'error-message';
              errorDiv.style.color = 'red'; // Set text color to red
              errorDiv.innerText = message;
              document.getElementById(fieldId).parentNode.appendChild(errorDiv);
          }

          function clearErrors() {
              var errorMessages = document.querySelectorAll('.error-message');
              errorMessages.forEach(function (error) {
                  error.parentNode.removeChild(error);
              });
          }

          function isValidEmail(email) {
              // Simple email validation using regular expression
              var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
              return emailRegex.test(email);
          }
      });
  </script>
