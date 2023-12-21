function updateFileName() {
    const fileInput = document.getElementById('file-input');
    const fileLabel = document.getElementById('file-label');
    const name = document.getElementById('name');
    const size = document.getElementById('size');
    const extension = document.getElementById('extension');
    const type = document.getElementById('type');
    const fileDetails = document.getElementById('file-details');
    const submitBtn = document.getElementById('submit-btn');

    if (fileInput.files.length > 0) {
        name.textContent = fileInput.files[0].name;
        size.textContent = (fileInput.files[0].size / (1024)).toFixed(2) + ' KB';
        extension.textContent = fileInput.files[0].name.split('.').pop();
        type.textContent = fileInput.files[0].type;
        submitBtn.style.display = 'block';
        fileDetails.style.display = 'block'

    } else {
        fileLabel.textContent = 'Select a file';
        submitBtn.style.display = 'none';
    }
}