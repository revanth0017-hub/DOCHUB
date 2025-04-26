
let dropArea = document.getElementById("dropArea");
let fileInput = document.getElementById("fileInput");
let loadingText = document.getElementById("loadingText");

//dropArea.addEventListener("click", () => fileInput.click());

fileInput.addEventListener("change", () => {
dropArea.innerHTML = `<div class="upload-content">
    <i class="bi bi-file-earmark fileicon"></i>
    <p> ${fileInput.files[0].name} selected</p>
</div>`;
});

function uploadFile() {
    let file = fileInput.files[0];
    if (!file) {
        alert("Please select a file!");
        return;
    }

    let formData = new FormData();
    formData.append("file", file);

    loadingText.style.display = "block"; // Show loading

    fetch("http://127.0.0.1:5000/upload", {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        loadingText.style.display = "none"; // Hide loading
        document.getElementById("result").innerText = "🩺 Diagnosis: " + data.condition + "\n💊 Suggested Medicine: " + data.medicine;
    })
    .catch(error => {
        loadingText.style.display = "none";
        console.error("Error:", error);
    });
}