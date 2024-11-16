
  // Get all stages


// Function to update the crop stage (simulated AJAX request)
function updateCropStage(stage) {
    // Simulated AJAX request (replace this with the actual AJAX logic)
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'update_crop.php');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {
        if (xhr.status === 200) {
            console.log('Crop stage updated to:', stage);
            console.log('Database updated successfully');
        } else {
            console.error('Error: Failed to update crop stage');
        }
    };

    xhr.onerror = function() {
        console.error('Error: Network request failed');
    };

    const params = `stage=${stage}`; // Parameters to be sent
    xhr.send(params);
}

// Get the button and input field
const updateBtn = document.getElementById('updateStageBtn');
const stageInput = document.getElementById('newStage');

// Add click event listener to the button
updateBtn.addEventListener('click', function() {
    // Get the entered stage value
    const newStage = stageInput.value;

    // Call the function to update the crop stage
    updateCropStage(newStage);
});


// Get all stages
const stages = document.querySelectorAll('.stage');

// Add click event listener to each stage
stages.forEach(stage => {
  stage.addEventListener('click', function() {
    // Toggle 'completed' class on click
    this.classList.toggle('completed');
  });
});

