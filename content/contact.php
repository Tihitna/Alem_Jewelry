<?php
$addContactFromAction = $_SERVER['PHP_SELF'];
if(isset($_SERVER['QUERY_STRING'])){
    $addContactFromAction .= "?" .htmlentities($_SERVER['QUERY_STRING']);
}
if(isset($_POST["send"])){
  $name = $_POST['name'];
  $email = $_POST["email"];
  $message = $_POST["message"];
  $contactSql = "INSERT INTO contact_form (name, email, message) VALUES ('$name', '$email', '$message') ";
  $contactResult = $conn->query($contactSql);
  echo '<META HTTP-EQUIV=REFRESH CONTENT="0; index.php?page=contact">';
}
?>
<div class="container inTouch mt-5">
  <div class="row align-items-start rows">
    <div class="col">
     <h2 class="text-center">Get in touch</h2>
     <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis accusamus quisquam nostrum! Eos accusantium officiis dolorem nisi recusandae dolore, corrupti sint temporibus modi totam cupiditate.</p>
     <div class="address">
        <div class="location text-center">
        <i class="fa-solid fa-envelope" style="color: #aa6d10;"></i>
        <p>alemjewelryeth@gmail.com</p>
        </div>
        <div class="location text-center">
        <i class="fa-solid fa-phone" style="color: #aa6d10;"></i>
        <p>+251 9 856 247 865 4613 1</p>
        </div>
        <div class="location text-center">
        <i class="fa-solid fa-location-dot" style="color: #aa6d10;"></i>
            <p>Ethiopia, Addis Ababa, Piassa</p>
        </div>
        <div class="location text-center">
        <i class="fa-solid fa-location-dot" style="color: #aa6d10;"></i>
            <p>Ethiopia, Addis Ababa, Jemo</p>
    </div>
        
     </div>
    </div>
    <div class="col">
    <form class="row g-3 needs-validation" action="<?php echo $addContactFromAction; ?>" name="addForm2" method="POST" enctype="multipart/form-data">
  <div class="col-md-12">
    <label for="validationCustom01" class="form-label">Your Name</label>
    <input type="text" placeholder="Name" class="form-control" id="validationCustom01" name = "name" required>
    <div class="valid-feedback">
      Looks good!
    </div>
  </div>
  <div class="col-md-12">
    <label for="validationCustom02" class="form-label">Your Email Address</label>
    <input type="email" class="form-control" placeholder="Email Address" id="validationCustom02" name="email" required>
    <div class="valid-feedback">
      Looks good!
    </div>
  </div>
  <div class="mb-3">
    <label for="validationTextarea" class="form-label">Message</label>
    <textarea class="form-control" id="validationTextarea" placeholder="Message" name="message" required></textarea>
    <div class="invalid-feedback">
      Please enter a message in the textarea.
    </div>
  </div>
  
  <div class="col-12">
    <button class="btn" name="send" type="submit">Send</button>
  </div>
</form>
    </div>
    
  </div>
</div>

<div class="container text-center mt-5 FAQ">
    <h2>Frequently Asked Questions</h2>
    <div class="accordion mt-5" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        How often should I have my jewelry checked?
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        What is your return policy?
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        Do you offer aftercare?
      </button>
    </h2>
    <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
      </div>
    </div>
  </div>
</div>
</div>