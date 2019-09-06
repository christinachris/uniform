<!--THIS IS GET IN TOUCH HTML PAGE-->



<!-- Google Maps Start -->
    <div class="akame-google-maps-area">
        <iframe src=" <?php echo $googlemap ?> " frameborder="0" scrolling="no" marginheight="0" marginwidth="0" allowfullscreen></iframe>
    </div>
    <!-- Google Maps End -->


<!-- Contact Information Area Start -->
    <section class="contact-information-area section-padding-80-0">
        <div class="container">
            <div class="row">
                <!-- Single Contact Information -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-contact-information mb-80">
                        <i class="icon_phone"></i>
                        <h4>Phone</h4>
                        <p><?php echo $phone ?></p>
                    </div>
                </div>

                <!-- Single Contact Information -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-contact-information mb-80">
                        <i class="icon_pin"></i>
                        <h4>Address</h4>
                        <p><?php echo $address ?></p>
                    </div>
                </div>

                <!-- Single Contact Information -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-contact-information mb-80">
                        <i class="icon_clock"></i>
                        <h4>Business Hours</h4>
                        <p><?php echo $businessdays ?><br><?php echo $businesshours ?></p>
                    </div>
                </div>

                <!-- Single Contact Information -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-contact-information mb-80">
                        <i class="icon_mail"></i>
                        <h4>Email</h4>
                        <p><?php echo $emailaccount ?><br><?php echo $emaildomain ?> </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Information Area End -->

<!-- Contact Area Start -->
    <section class="akame-contact-area bg-gray section-padding-80">
        <div class="container">
            <div class="row">
                <!-- Section Heading -->
                <div class="col-12">
                    <div class="section-heading text-center">
                        <h2>Get in Touch</h2>
                        <p>Send us a message</p>
                        <a class="btn akame-btn btn-3 mt-15 active" href="mailto:customerservice@shoreditchcorporate.com.au?subject=New Enquiry&body=Write your message here">Contact Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Area End -->