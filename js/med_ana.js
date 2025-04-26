document.getElementById("uploadForm").addEventListener("submit", function(event) {
    event.preventDefault();
    
    let fileInput = document.getElementById("imageInput");
    if (fileInput.files.length === 0) {
        alert("Please select an image.");
        return;
    }

    let formData = new FormData();
    formData.append("image", fileInput.files[0]);

    fetch("medprocess.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.text())  // Change to text instead of JSON
    .then(data => {
        document.getElementById("result").innerHTML = data; // Show formatted medicine info
    })
    .catch(error => console.error("Error:", error));
});
