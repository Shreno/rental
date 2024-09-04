document.addEventListener('DOMContentLoaded', function () {
    // Handle City Selection
    const citySelect = document.querySelector('.city');
    const cityInput = document.getElementById('city-id');

    citySelect.addEventListener('click', function (event) {
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

    neighborhoodSelect.addEventListener('click', function (event) {
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

directionSelect.addEventListener('click', function (event) {
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


// handel the primaryAmenitiesInput and his sub_amenities
document.addEventListener('DOMContentLoaded', function () {
    const primaryAmenities = document.querySelectorAll('.box-icon');
    const primaryAmenitiesInput = document.getElementById('primaryAmenitiesInput');
    const subAmenitiesInput = document.getElementById('sub_amenities');
    const numberOfImageElement = document.querySelector('.numberofImage');
    const imageInput = document.getElementById('tf-upload-img');


    let selectedSubAmenities = {};
    let selectedPrimaryAmenities = new Set();

    primaryAmenities.forEach(function (box) {
        box.addEventListener('click', function () {
            const primaryAmenityId = box.getAttribute('data-id');
            toggleSubAmenities(primaryAmenityId);
            updatePrimaryAmenitiesInput();
            updateTotalQuantity();
            updateImageUploadRequirement();

            if (selectedPrimaryAmenities.has(primaryAmenityId)) {
                selectedPrimaryAmenities.delete(primaryAmenityId);
            } else {
                selectedPrimaryAmenities.add(primaryAmenityId);
            }
        });
    });

    function toggleSubAmenities(primaryAmenityId) {
        const subAmenityDivs = document.querySelectorAll(`.subAmenitie[data-id="${primaryAmenityId}"]`);

        subAmenityDivs.forEach(sub => {
            const input = sub.querySelector('.quantity-number');
            const subAmenityId = parseInt(input.name.match(/\d+/)[0], 10);

            if (sub.style.display === 'block') {
                sub.style.display = 'none';
                delete selectedSubAmenities[subAmenityId];
            } else {
                sub.style.display = 'block';
                selectedSubAmenities[subAmenityId] = parseInt(input.value, 10);
                addQuantityListeners(sub);
            }
        });

        updateSubAmenitiesInput();
    }

    

    function addQuantityListeners(subAmenityDiv) {
        const plusBtn = subAmenityDiv.querySelector('.plus-btn');
        const minusBtn = subAmenityDiv.querySelector('.minus-btn');
        const input = subAmenityDiv.querySelector('.quantity-number');

        // Ensure we remove existing event listeners before adding new ones
        plusBtn.removeEventListener('click', handlePlusClick);
        minusBtn.removeEventListener('click', handleMinusClick);

        // Add event listener for the "+" button
        plusBtn.addEventListener('click', handlePlusClick);

        // Add event listener for the "-" button
        minusBtn.addEventListener('click', handleMinusClick);

        function handlePlusClick() {

            input.value = parseInt(input.value, 10);
            updateSubAmenityQuantity(input);
            updateTotalQuantity();
            updateImageUploadRequirement();
        }

        function handleMinusClick() {
            if (input.value > 1) {
                input.value = parseInt(input.value, 10);
                updateSubAmenityQuantity(input);
                updateTotalQuantity();
                updateImageUploadRequirement();
            }
        }
    }

    function updateSubAmenityQuantity(input) {
        const subAmenityId = parseInt(input.name.match(/\d+/)[0], 10);
        selectedSubAmenities[subAmenityId] = parseInt(input.value, 10);
        updateSubAmenitiesInput();
    }

    function updateSubAmenitiesInput() {
        subAmenitiesInput.value = JSON.stringify(selectedSubAmenities);
    }

    function updatePrimaryAmenitiesInput() {
        primaryAmenitiesInput.value = Array.from(selectedPrimaryAmenities).join(',');
    }

    function updateTotalQuantity() {
        let totalQuantity = 0;
        Object.values(selectedSubAmenities).forEach(quantity => {
            totalQuantity += quantity;
        });
        return totalQuantity;
    }

    function updateImageUploadRequirement() {
        const totalQuantity = updateTotalQuantity();
        // Check the language of the document
        const language = document.documentElement.lang;

        // Set the text content based on the language
        if (language === 'ar') {
            numberOfImageElement.textContent = `مطلوب رفع ${totalQuantity} صورة كحد أدنى *`;
        } else {
            numberOfImageElement.textContent = `A minimum of ${totalQuantity} images is required *`;
        }
        imageInput.required = totalQuantity > 0;
    }
    // 
    document.querySelector('form').addEventListener('submit', function (event) {
        const totalQuantity = Object.values(selectedSubAmenities).reduce((a, b) => a + b, 0);
        const fileCount = imageInput.files.length;

        if (fileCount < totalQuantity) {
            event.preventDefault();
            const language = document.documentElement.lang;

            // Set the text content based on the language
            if (language === 'ar') {
                alert(`مطلوب رفع ${totalQuantity} صورة كحد أدنى *`);
            } else {
                alert( `A minimum of ${totalQuantity} images is required *`)
            }        }
    });



    // 
});


// 



// function validateForm() {
//     var isValid = true; // Assume the form is valid
//     // Check if any features are selected
//     if (selectedFeatures.length === 0) {
//         document.getElementById('propertyFeaturesError').style.display = 'block';
//         isValid = false;
//     }

//     // Get input elements

//     // Check if direction is selected
//     if (directionInput.value == '') {
//         document.getElementById('directionError').style.display = 'block';
//         isValid = false;
//     }

//     // Check if neighborhood is selected
//     if (neighborhoodInput.value == '') {
//         document.getElementById('neighborhoodError').style.display = 'block';
//         isValid = false;
//     }

//     // Check if city is selected
//     if (cityInput.value == '') {
//         document.getElementById('cityError').style.display = 'block';
//         isValid = false;
//     }
//     // 
   



//     return isValid; // Return true if all conditions are met, otherwise false
// }

document.getElementById('tf-upload-img').addEventListener('change', function (event) {
    const previewContainer = document.getElementById('preview-images');
    previewContainer.innerHTML = ''; // تفريغ المعاينة الحالية

    const files = event.target.files;
    if (files.length > 0) {
        for (let i = 0; i < files.length; i++) {
            const file = files[i];
            const reader = new FileReader();

            reader.onload = function (e) {
                const imgElement = document.createElement('img');
                imgElement.src = e.target.result;
                imgElement.classList.add('img-thumbnail', 'm-2'); // إضافة بعض الفئات للأنماط
                imgElement.style.maxWidth = '150px'; // تحديد حجم الصورة
                imgElement.style.maxHeight = '150px';
                previewContainer.appendChild(imgElement);
            };

            reader.readAsDataURL(file);
        }
    }
});


// 




// 
