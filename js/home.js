function viewMoreDoctors() {
    const hiddenDoctors = document.querySelectorAll('#specialties-container .col.d-none');
    for (let i = 0; i < 5 && i < hiddenDoctors.length; i++) {
        hiddenDoctors[i].classList.remove('d-none');
    }
    if (document.querySelectorAll('#specialties-container .col.d-none').length === 0) {
        document.getElementById('view-more-button').style.display = 'none';
        const buttonContainer = document.createElement('div');
        buttonContainer.className = 'text-center mt-4';
        buttonContainer.id = 'view-less-button';
        const viewLessButton = document.createElement('button');
        viewLessButton.className = 'btn btn-primary';
        viewLessButton.textContent = 'View Less Doctors';
        viewLessButton.onclick = viewLessDoctors;
        buttonContainer.appendChild(viewLessButton);
        document.getElementById('specialties-container').insertAdjacentElement('afterend', buttonContainer);
    }
}
function viewLessDoctors() {
    // Hide all doctors except first 3
    const allDoctors = document.querySelectorAll('#specialties-container .col');
    allDoctors.forEach((doctor, index) => {
        if (index >= 3) {
            doctor.classList.add('d-none');
        }
    });
    // Show the "View More" button again
    document.getElementById('view-more-button').style.display = 'block';
    // Remove the "View Less" button
    const viewLessButton = document.getElementById('view-less-button');
    if (viewLessButton) {
        viewLessButton.remove();
    }
    // Scroll back to specialty section
    document.querySelector('#specialties-container').scrollIntoView({ behavior: 'smooth' });
}