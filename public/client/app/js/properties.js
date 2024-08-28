document.addEventListener('DOMContentLoaded', function() {
    // Handle City Selection
    const citySelect = document.querySelector('.city');
    const cityInput = document.getElementById('city-id');
    
    citySelect.addEventListener('click', function(event) {
        const selectedOption = event.target.closest('.option');
        if (selectedOption) {
            const cityId = selectedOption.getAttribute('data-value');
            cityInput.value = cityId;

            // Update the current text to reflect the selected city
            citySelect.querySelector('.current').textContent = selectedOption.textContent;
        }
    });

    // Handle Neighborhood Selection
    const neighborhoodSelect = document.querySelector('.neighborhood');
    const neighborhoodInput = document.getElementById('neighborhood-id');
    
    neighborhoodSelect.addEventListener('click', function(event) {
        const selectedOption = event.target.closest('.option');
        if (selectedOption) {
            const neighborhoodId = selectedOption.getAttribute('data-value');
            neighborhoodInput.value = neighborhoodId;
            // Update the current text to reflect the selected neighborhood
            neighborhoodSelect.querySelector('.current').textContent = selectedOption.textContent;
        }
    });
});


  // Handle  Selection direction
  const directionSelect = document.querySelector('.direction');
  const directionInput = document.getElementById('direction-id');
  
  directionSelect.addEventListener('click', function(event) {
      const selectedOption = event.target.closest('.option');
      if (selectedOption) {
          const directionId = selectedOption.getAttribute('data-value');
          directionInput.value = directionId;
          // Update the current text to reflect the selected neighborhood
          directionSelect.querySelector('.current').textContent = selectedOption.textContent;
      }
  });
  // Handle  Selection booking condition 

  const selectedConditions = [];

  function toggleBookingCondition(conditionId) {
      const index = selectedConditions.indexOf(conditionId);
      if (index > -1) {
          // If the condition is already selected, remove it
          selectedConditions.splice(index, 1);
      } else {
          // If the condition is not selected, add it
          selectedConditions.push(conditionId);
      }
      // Update the hidden input field with the selected conditions
      document.getElementById('bookingConditionsInput').value = selectedConditions.join(',');
  }

  // Handle  Selection Property Feature 

  const selectedFeatures = [];

    function togglePropertyFeature(featureId) {
        const index = selectedFeatures.indexOf(featureId);
        if (index > -1) {
            // If the feature is already selected, remove it
            selectedFeatures.splice(index, 1);
        } else {
            // If the feature is not selected, add it
            selectedFeatures.push(featureId);
        }

        // Update the hidden input value with the selected features as a comma-separated string
        document.getElementById('propertyFeaturesInput').value = selectedFeatures.join(',');

        // Debugging output to verify selected features
        console.log('Selected Property Features:', selectedFeatures);
    }


    ///------------------------------------------------------
    document.addEventListener('DOMContentLoaded', function () {
        const primaryAmenities = document.querySelectorAll('.box-icon');
        const primaryAmenitiesInput = document.getElementById('primaryAmenitiesInput');
        const subAmenitiesContainer = document.getElementById('subAmenitiesContainer');
        const subAmenitiesInput = document.getElementById('sub_amenities');
        const imageInput = document.getElementById('tf-upload-img');
        const preferredLanguage = 'ar'; // Replace 'ar' with 'en' or another language code as needed
    
        let selectedSubAmenities = {};
        let selectedPrimaryAmenities = new Set();
    
        primaryAmenities.forEach(function (box) {
            box.addEventListener('click', function () {
                const primaryAmenityId = box.getAttribute('data-id');
                const subAmenities = JSON.parse(box.getAttribute('data-sub-amenities'));
    
                if (selectedPrimaryAmenities.has(primaryAmenityId)) {
                    selectedPrimaryAmenities.delete(primaryAmenityId);
                    removeSubAmenities(subAmenities);
                } else {
                    selectedPrimaryAmenities.add(primaryAmenityId);
                    addSubAmenities(subAmenities);
                }
    
                primaryAmenitiesInput.value = Array.from(selectedPrimaryAmenities).join(',');
    
                subAmenitiesInput.value = JSON.stringify(selectedSubAmenities);
    
                // validateImageUpload();
            });
        });
    
        function addSubAmenities(subAmenities) {
            subAmenities.forEach(function (subAmenity) {
                if (!selectedSubAmenities[subAmenity.id]) {
                    const subAmenityDiv = document.createElement('div');
                    subAmenityDiv.classList.add('wg-box');
                    subAmenityDiv.setAttribute('data-sub-amenity-id', subAmenity.id);
                    const subAmenityName = subAmenity.name[preferredLanguage];
    
                    subAmenityDiv.innerHTML = `
                        <label class="title-user fw-6">${subAmenityName}</label>
                        <div class="box-quantity flex align-center">
                            <div class="quantity flex align-center">
                                <a class="btn-quantity plus-btn"><i class="far fa-plus"></i></a>
                                <div class="input-text">
                                    <input type="number" name="sub_amenities[${subAmenity.id}]" value="1" class="quantity-number" min="1">
                                </div>
                                <a class="btn-quantity minus-btn"><i class="far fa-minus"></i></a>
                            </div>
                        </div>
                    `;
    
                    subAmenitiesContainer.appendChild(subAmenityDiv);
                    selectedSubAmenities[subAmenity.id] = 1;
    
                    addQuantityListeners(subAmenityDiv);
                }
            });
        }
    
        function removeSubAmenities(subAmenities) {
            subAmenities.forEach(function (subAmenity) {
                const subAmenityDiv = subAmenitiesContainer.querySelector(`[data-sub-amenity-id="${subAmenity.id}"]`);
                if (subAmenityDiv) {
                    subAmenityDiv.remove();
                    delete selectedSubAmenities[subAmenity.id];
                }
            });
        }
    
        function addQuantityListeners(subAmenityDiv) {
            const plusBtn = subAmenityDiv.querySelector('.plus-btn');
            const minusBtn = subAmenityDiv.querySelector('.minus-btn');
            const input = subAmenityDiv.querySelector('.quantity-number');
    
            plusBtn.addEventListener('click', function () {
                input.value = parseInt(input.value, 10) + 1;
                updateSubAmenityQuantity(input);
            });
    
            minusBtn.addEventListener('click', function () {
                if (input.value > 1) {
                    input.value = parseInt(input.value, 10) - 1;
                    updateSubAmenityQuantity(input);
                }
            });
        }
    
        function updateSubAmenityQuantity(input) {
            const subAmenityId = parseInt(input.name.match(/\d+/)[0], 10);
            selectedSubAmenities[subAmenityId] = parseInt(input.value, 10);
            subAmenitiesInput.value = JSON.stringify(selectedSubAmenities);
            validateImageUpload();
        }
    
        function validateImageUpload() {
            const totalQuantity = Object.values(selectedSubAmenities).reduce((a, b) => a + b, 0);
            const fileCount = imageInput.files.length;
    
            if (fileCount !== totalQuantity) {
                alert(`يجب عليك رفع ${totalQuantity} صور بالضبط.`);
            }
        }
    
        // Validation for image input
        imageInput.addEventListener('change', function () {
            validateImageUpload();
        });
    
        // Optional: Add validation on form submit
        document.querySelector('form').addEventListener('submit', function (event) {
            const totalQuantity = Object.values(selectedSubAmenities).reduce((a, b) => a + b, 0);
            const fileCount = imageInput.files.length;
    
            if (fileCount !== totalQuantity) {
                event.preventDefault();
                alert(`يجب عليك رفع ${totalQuantity} صور بالضبط.`);
            }
        });
    });
    // ------------------------------------------------------------------------------------------------



    function validateForm() {
        var isValid = true; // Assume the form is valid
        // Check if any features are selected
        if (selectedFeatures.length === 0) {
            document.getElementById('propertyFeaturesError').style.display = 'block';
            isValid = false;
        } 
    
        // Get input elements
    
        // Check if direction is selected
        if (directionInput.value=='') {
            document.getElementById('directionError').style.display = 'block';
            isValid = false;
        }

        // Check if neighborhood is selected
        if (neighborhoodInput.value=='') {
            document.getElementById('neighborhoodError').style.display = 'block';
            isValid = false;
        } 
    
        // Check if city is selected
        if (cityInput.value=='') {
            document.getElementById('cityError').style.display = 'block';
            isValid = false;
        } 
    
        return isValid; // Return true if all conditions are met, otherwise false
    }


