<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail | Business-card</title>
  <link rel="stylesheet" href="../Css/form.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
    integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


</head>

<body>

  <form action="/card tamplate/home.html" class="form" method="post">

    <div class="container container-active">
      <div class="row mt-5 mb-5">
        <h1 class="main-heading text-center">Basic Information</h1>
        <div class="form-step form-step-active col-md-7 mt-3">

          <div class="input-group">
            <lable class="C-Name"></lable>
            <input type="text" name="Company Name" id="C-Name" placeholder="Company Name">
          </div>
          <div class="input-group">
            <lable class="what-you-do"></lable>
            <input type="text" name="What-you-do" id="what-you-do" placeholder="What You Do">
            <p id="errorMsg" style="color: red; display: none;"></p>
          </div>

        </div>


        <div class="right-1 col-md-5 pt-5">
          <div class="C-img">
            <label for="uploadImage">
              <img id="userImage" src="../images/7309681.jpg" alt="">
            </label>
            <input type="file" id="uploadImage" accept="image/*">
          </div>

        </div>





        <div class="next-button mt-5">
          <a href="#" class="btn btn-next width-50 ml-auto" id="nextButton">Next -></a>
        </div>
      </div>
    </div>



    <!-- secound form -->


    <div class="container">
      <div class="row mt-5 mb-5">
        <h1 class="main-heading text-center">Contact Details</h1>
        <div class="form-step form-step-active col-md-6 mt-3">

          <div class="input-group">
            <lable class="C-Phone"></lable>
            <input type="tel" name="C-Phone" id="C-Phone" placeholder="Phone No.">
          </div>
          <div class="input-group">
            <lable class="C-Email"></lable>
            <input type="email" name="C-Email" id="C-Email" placeholder="Email">
          </div>
          <div class="input-group">
            <lable class="C-WPhone"></lable>
            <input type="tel" name="C-WPhone" id="C-WPhone" placeholder="Whatsapp No.">
          </div>



        </div>

        <div class="form-step form-step-active col-md-6 mt-3">
          <div class="input-group">
            <lable class="C-Add"></lable>
            <input type="text-area" name="C-Add" id="C-Add" placeholder="Address">
          </div>
          <div class="input-group">
            <lable class="C-Insta"></lable>
            <input type="url" name="C-Insta" id="C-Insta" placeholder="Instagram URL">
          </div>
          <div class="input-group">
            <lable class="C-Face"></lable>
            <input type="url" name="C-Face" id="C-Face" placeholder="Facebook URL">
          </div>




        </div>

        <!-- <div class="right col-md-5 ">
                         <div class="input-group">
                            <lable class="C-Add"></lable>
                            <input type="text-area" name="C-Add" id="C-Add" placeholder="Address">
                        </div>
                    </div> -->



        <div class="btn-group mt-5">
          <a href="#" class="btn btn-prev width-50 ml-auto"><--Previous </a>
              <a href="#" class="btn btn-next width-50 ml-auto">Next -></a>

        </div>
      </div>
    </div>





    <!-- product  form -->


    <div class="container productDetail" id="productDetailId">
      <div class="row mt-5 mb-5">
        <h1 class="main-heading text-center">Product Information</h1>
        <div class="form-step form-step-active col-md-7 mt-3">
          <div class="input-group">
            <label class="C-Prod"></label>
            <input type="text" name="C-Prod" id="C-Prod" placeholder="Product Name" required>
          </div>
          <div class="input-group">
            <label class="C-Prod-Dec"></label>
            <input type="text-area" name="C-Prod-Dec" id="C-Prod-Dec" placeholder="Product Description" required>
          </div>
          <div class="input-group">
            <label class="C-Prod-Price"></label>
            <input type="number" inputmode="numeric" name="C-Prod-Price" id="C-Prod-Price"
              placeholder="Price In Indian Rupee (ex.4500)" required>
          </div>
          <div class="input-group">
            <label for="pImage"></label>
            <input type="file" id="pImage" accept="image/*" required>
          </div>
        </div>
        <div class="right-1 col-md-5 pt-5">
          <div class="C-P-img">
            <label for="pImage">
              <img id="Pro-Image" src="../images/7309681.jpg" alt="">
            </label>
          </div>
        </div>
        <div class="btn-group mt-5 " id="proAddBtn">
          <a href="#" onclick="goToPreviousStep()" class="btn btn-prev width-50 ml-auto"><-- Previous</a>
              <a href="#" onclick="addNewPro()" class="btn btn-add width-50 ml-auto">Add+</a>
              <a href="#" class="btn btn-next width-50 ml-auto">Next -></a>
        </div>
        <div class="previous-details mt-3">
          <h3 id="PreviousHeading">Previous Details:</h3>
          <ul id="previousDetailsList" onclick="showPreviousDetail(event)"></ul>
        </div>
      </div>
    </div>

    <script>

      let previousDetails = [];
      let updateMode = false;
      let updateIndex = -1;

      async function addNewPro() {
        // console.log('addNewPro');

        // Get input values
        let productName = document.getElementById('C-Prod').value;
        let productDescription = document.getElementById('C-Prod-Dec').value;
        let productPrice = document.getElementById('C-Prod-Price').value;

        // Check if all fields are filled
        if (productName == '' || productDescription == '' || productPrice == '') {
          alert('Please fill all the input fields');
          return;
        }

        let imageFile = document.getElementById('pImage').files[0];
        if (!imageFile) {
          alert('Please select a product image');
          return;
        }

        const reader = new FileReader();

        reader.addEventListener('load', () => {
          const imageString = reader.result; // Convert src to string
          // console.log(imageString); // Display the string in the console or use it as needed
          let detail = { name: productName, description: productDescription, price: productPrice, image: imageString };

          if (updateMode) {
            // Update existing item
            previousDetails[updateIndex] = detail;
            updatePreviousDetailItem(updateIndex);
            updateMode = false;
            updateIndex = -1;
          } else {
            // Add new item
            previousDetails.push(detail);
            let previousDetailsList = document.getElementById('previousDetailsList');
            let listItem = document.createElement('li');
            listItem.textContent = productName; // Show only product name
            listItem.setAttribute('data-index', previousDetails.length - 1);
            previousDetailsList.appendChild(listItem);

            document.getElementById('C-Prod').value = "";
            document.getElementById('C-Prod-Dec').value = "";
            document.getElementById('C-Prod-Price').value = "";
            document.getElementById('Pro-Image').src = "../images/7309681.jpg"

            localStorage.setItem("AllProducts", JSON.stringify(previousDetails))
          }
        });

        reader.readAsDataURL(imageFile);

      }

      function imageToString() {
        document.getElementById('Pro-Image').addEventListener("change", function (event) {
          var file = event.target.files[0];
          var reader = new FileReader();

          reader.onload = function (e) {
            gImageElement.src = e.target.result;
          };

          if (file) {
            reader.readAsDataURL(file);
          }
        });
      }

      function updatePreviousDetailItem(index) {
        let previousDetailsList = document.getElementById('previousDetailsList');
        let listItem = previousDetailsList.querySelector(`li[data-index="${index}"]`);
        let detail = previousDetails[index];
        listItem.textContent = detail.name; // Update only the product name
      }

      function findProductIndex(productName) {
        for (let i = 0; i < previousDetails.length; i++) {
          if (previousDetails[i].name == productName) {
            return i;
          }
        }
        return -1;
      }

      function showPreviousDetail(event) {
        let index = event.target.getAttribute('data-index');
        if (index !== null) {
          let detail = previousDetails[index];
          document.getElementById('C-Prod').value = detail.name;
          document.getElementById('C-Prod-Dec').value = detail.description;
          document.getElementById('C-Prod-Price').value = detail.price;
          document.getElementById('Pro-Image').src = detail.image;
          document.getElementById('pImage').value = ''; // Reset image input value
          updateMode = true;
          updateIndex = index;
        }
      }

      function goToPreviousStep() {
        // Implement the logic to go to the previous step
        console.log('Go to previous step');
      }
    </script>





    <!-- gallery section -->



    <div class="container">
      <div class="row mt-5 mb-5">
        <h1 class="main-heading text-center">Add Gallery Photos</h1>

        <div class="right col-md-12 pt-5">
          <div class="C-G-img">
            <label class="Gallery-Image" for="gImage">
              <img id="G-Image" src="../images/7309681.jpg" alt="" style="width: 200px; height: 200px;">
            </label>
            <input type="file" id="gImage" accept="image/*">
          </div>
        </div>

        <div class="btn-group mt-5">
          <a href="#" class="btn btn-prev width-50 ml-auto"><--Previous </a>
              <a onclick="addNewImage(event)" class="btn btn-add width-50 ml-auto">Add+</a>
              <a href="#" class="btn btn-next width-50 ml-auto">Next -></a>
        </div>

        <div id="galleryContainer" class="mt-5">
          <!-- Existing images will be displayed here -->
        </div>
      </div>
    </div>
    <script>


      // nitesh - saving all image url as string in the below array
      let allGalleryUrls = []

      function addNewImage(event) {
        event.preventDefault();

        let input = document.getElementById('gImage');
        let files = input.files;

        // Check if files are selected
        if (files && files.length > 0) {
          let galleryContainer = document.getElementById('galleryContainer');

          // Loop through each selected file
          for (let i = 0; i < files.length; i++) {
            let reader = new FileReader();

            reader.onload = function (e) {
              let image = document.createElement('img');

              // nitesh - add new image url in array
              allGalleryUrls.push(e.target.result)

              image.src = e.target.result;
              image.style.width = '100px';
              image.style.height = '100px';
              image.style.marginRight = '10px'; // Add a margin-right to create a gap between images

              // Check if the image already exists in the gallery
              if (!isImageAlreadyAdded(image.src)) {
                galleryContainer.appendChild(image);
              } else {
                alert('The selected image is already added.');
              }
            };

            reader.readAsDataURL(files[i]);
          }
        } else {
          // Display an error message or perform any other action when no image is selected
          alert('Please select one or more images to add.');
        }
      }

      function isImageAlreadyAdded(src) {
        let images = document.querySelectorAll('#galleryContainer img');

        for (let i = 0; i < images.length; i++) {
          if (images[i].src === src) {
            return true;
          }
        }

        return false;
      }
    </script>





    <!-- payment details -->

    <div class="container">
      <div class="row mt-5 mb-5">
        <h1 class="main-heading text-center">Payment Details</h1>

        <div class="form-step">
          <!-- <div class="input-group">
            <lable class="C-Qr"></lable>
            <input type="url" name="C-Qr" id="C-Qr" placeholder="UPI Id">
          </div> -->
        </div>

        <div class="right col-md-12 paymentImg">
          <div class="C-Qr-img">
            <label for="QrImage">
              <img id="Qr-Image" src="../images/7309681.jpg" alt="">
            </label>
            <input type="file" id="QrImage" accept="image/*">
          </div>

        </div>

        <div class="btn-group mt-5 ">
          <a href="#" class="btn btn-prev width-50 ml-auto"><--Previous </a>

              <a href="#" class="btn btn-next width-50 ml-auto">Next -></a>

        </div>
      </div>
    </div>





    <!-- describe your company  -->



    <div class="container">
      <div class="row mt-5 mb-5">
        <h1 class="main-heading text-center">Describe your company</h1>
        <div class="form-step C-dec form-step-active mt-3">

          <div class="input-group ">
            <lable class="C-dec"></lable>
            <textarea type="text-area" name="C-dec" id="C-decs"  class="C-decs"  placeholder="Write about your company"></textarea>

          </div>


        </div>

        <div class="right-1 " style="display: none;">
          <div class="C-P-img">
            <label for="pro3Image">
              <img class="Pro3-Image" id="Pro-Image" src="../images/7309681.jpg" alt="">
            </label>
            <input type="file" class="pro3-img" id="pImage" accept="image/*">
          </div>



        </div>

        <div class="btn-group mt-5">
          <a href="#" class="btn btn-prev width-50 ml-auto"><--Previous </a>

              <a href="#" class="btn btn-next width-50 ml-auto" id="nextButton1">Next -></a>

        </div>
      </div>
    </div>



    <!-- reviews section -->


    <div class="container">
      <div class="row mt-5 mb-5 ">
        <h1 class="main-heading text-center">Reviews 1/3</h1>
        <div class="form-step C-dec form-step-active col-md-7 ">

          <div class="input-group">
            <lable class="C-Rname"></lable>
            <input type="text" name="C-Rname" id="C-Rname1" placeholder="Customer Name">
          </div>
          <div class="input-group">
            <lable class="C-Rew-Loc"></lable>
            <input type="text" name="C-RnameLoc" id="C-Rew-Loc1" placeholder="Customer Location">
          </div>

          <div class="input-group ">
            <lable class="C-Prod"></lable>
            <textarea type="text-area" name="C-Prod" id="C-Rew-Dec1" placeholder="Write about your company"
              style="min-height: 10rem !important;"></textarea>

          </div>






        </div>

        <div class="right-1 right-rew col-md-5 ">
          <div class="C-R-img">
            <label for="rImage">
              <img class="rew-Img" src="../images/7309681.jpg" alt="">
            </label>
            <input type="file" class="R-Img" id="Rew-Image1" accept="image/*">



          </div>

        </div>

        <div class="btn-group mt-5">
          <a href="#" class="btn btn-prev width-50 ml-auto"><--Previous </a>


              <a href="#" class="btn btn-next width-50 ml-auto">Next -></a>

        </div>
      </div>
    </div>




    <div class="container">
      <div class="row mt-5 mb-5 ">
        <h1 class="main-heading text-center">Reviews 2/3</h1>
        <div class="form-step C-dec form-step-active col-md-7 ">

          <div class="input-group">
            <lable class="C-Rname"></lable>
            <input type="text" name="C-Rname" id="C-Rname2" placeholder="Customer Name">
          </div>
          <div class="input-group">
            <lable class="C-Rew-Loc"></lable>
            <input type="text" name="C-RnameLoc" id="C-Rew-Loc2" placeholder="Customer Location">
          </div>

          <div class="input-group ">
            <lable class="C-Prod"></lable>
            <textarea type="text-area" name="C-Prod" id="C-Rew-Dec2" placeholder="Write about your company"
              style="min-height: 10rem !important;"></textarea>

          </div>






        </div>

        <div class="right-1 right-rew col-md-5 ">
          <div class="C-R-img">
            <label for="rImage">
              <img class="rew-Img"  src="../images/7309681.jpg" alt="">
            </label>
            <input type="file" class="R-Img" id="Rew-Image2" accept="image/*">



          </div>

        </div>

        <div class="btn-group mt-5">
          <a href="#" class="btn btn-prev width-50 ml-auto"><--Previous </a>


              <a href="#" class="btn btn-next width-50 ml-auto">Next -></a>

        </div>
      </div>
    </div>




    <div class="container">
      <div class="row mt-5 mb-5 ">
        <h1 class="main-heading text-center">Reviews 3/3</h1>
        <div class="form-step C-dec form-step-active col-md-7 ">

          <div class="input-group">
            <lable class="C-Rname"></lable>
            <input type="text" name="C-Rname" id="C-Rname3" placeholder="Customer Name">
          </div>
          <div class="input-group">
            <lable class="C-Rew-Loc"></lable>
            <input type="text" name="C-RnameLoc" id="C-Rew-Loc3" placeholder="Customer Location">
          </div>

          <div class="input-group ">
            <lable class="C-Prod"></lable>
            <textarea type="text-area" name="C-Prod" id="C-Rew-Dec3" placeholder="Write about your company"
              style="min-height: 10rem !important;"></textarea>

          </div>







        </div>

        <div class="right-1 right-rew col-md-5 ">
          <div class="C-R-img">
            <label for="rImage">
              <img class="rew-Img"  src="../images/7309681.jpg" alt="">
            </label>
            <input type="file" class="R-Img" id="Rew-Image3" accept="image/*">



          </div>

        </div>

        <div class="btn-group mt-5">
          <a href="#" class="btn btn-prev width-50 ml-auto"><--Previous </a>

              <button type="submit" onclick="handleSubmit()" class="btn btn-sub width-50 ml-auto"><a
                  href="/card tamplate/home.html">Submit</a></button>


        </div>
      </div>
    </div>


  </form>




  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="../Javascript/form.js"></script>
</body>

</html>