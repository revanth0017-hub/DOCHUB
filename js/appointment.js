document.addEventListener('DOMContentLoaded', () => {
  const hamburger = document.querySelector('.hamburger');
  const navLinks = document.querySelector('.nav-links');

  hamburger.addEventListener('click', () => {
    navLinks.classList.toggle('active');
    const bars = hamburger.querySelectorAll('div');
    bars.forEach(bar => bar.classList.toggle('active'));
  });
});

// Doctor specialties data
const specialties = [
  'Cardiologist',
  'Dermatologist',
  'Endocrinologist',
  'Gastroenterologist',
  'Neurologist',
  'Oncologist',
  'Ophthalmologist',
  'Orthopedist',
  'Pediatrician',
  'Psychiatrist',
  'Pulmonologist',
  'Rheumatologist',
  'Urologist'
];

// Sample doctors data
const doctors = [
  {
    id: 1,
    name: 'Dr. Sarah Johnson',
    specialty: 'Cardiologist',
    experience: '15 years',
    location: 'New York',
    rating: 4.8,
    image: 'https://randomuser.me/api/portraits/women/1.jpg'
  },
  {
    id: 2,
    name: 'Dr. Michael Chen',
    specialty: 'Dermatologist',
    experience: '12 years',
    location: 'New York',
    rating: 4.9,
    image: 'https://randomuser.me/api/portraits/men/1.jpg'
  },
  {
    id: 3,
    name: 'Dr. Emily Williams',
    specialty: 'Pediatrician',
    experience: '10 years',
    location: 'New York',
    rating: 4.7,
    image: 'https://randomuser.me/api/portraits/women/2.jpg'
  },
  {
    id: 4,
    name: 'Dr. Robert Patel',
    specialty: 'Neurologist',
    experience: '18 years',
    location: 'Chicago',
    rating: 4.9,
    image: 'https://randomuser.me/api/portraits/men/2.jpg'
  },
  {
    id: 5,
    name: 'Dr. Jennifer Lee',
    specialty: 'Ophthalmologist',
    experience: '11 years',
    location: 'Los Angeles',
    rating: 4.6,
    image: 'https://randomuser.me/api/portraits/women/3.jpg'
  },
  {
    id: 6,
    name: 'Dr. David Wilson',
    specialty: 'Orthopedist',
    experience: '14 years',
    location: 'Houston',
    rating: 4.7,
    image: 'https://randomuser.me/api/portraits/men/3.jpg'
  },
  {
    id: 7,
    name: 'Dr. Maria Garcia',
    specialty: 'Psychiatrist',
    experience: '9 years',
    location: 'Miami',
    rating: 4.8,
    image: 'https://randomuser.me/api/portraits/women/4.jpg'
  },
  {
    id: 8,
    name: 'Dr. James Brown',
    specialty: 'Pulmonologist',
    experience: '16 years',
    location: 'Boston',
    rating: 4.9,
    image: 'https://randomuser.me/api/portraits/men/4.jpg'
  },
  {
    id: 9,
    name: 'Dr. Olivia Davis',
    specialty: 'Endocrinologist',
    experience: '13 years',
    location: 'Seattle',
    rating: 4.7,
    image: 'https://randomuser.me/api/portraits/women/5.jpg'
  },
];

// Populate specialties dropdown
const specialtySelect = document.getElementById('specialtySelect');
const consultSpecialty = document.getElementById('consultSpecialty');

specialties.forEach(specialty => {
  // For search dropdown
  const option = document.createElement('option');
  option.value = specialty;
  option.textContent = specialty;
  specialtySelect.appendChild(option);
  
  // For consultation form dropdown
  const consultOption = document.createElement('option');
  consultOption.value = specialty;
  consultOption.textContent = specialty;
  consultSpecialty.appendChild(consultOption);
});

// Generate time slots
function generateTimeSlots() {
  const timeSelect = document.getElementById('appointmentTime');
  timeSelect.innerHTML = '<option value="">Select Time</option>';
  
  for (let hour = 9; hour <= 17; hour++) {
    const time12 = hour <= 12 ? `${hour}:00 AM` : `${hour-12}:00 PM`;
    const option = document.createElement('option');
    option.value = `${hour}:00`;
    option.textContent = time12;
    timeSelect.appendChild(option);
  }
}

// Display doctors
function displayDoctors(filteredDoctors = doctors) {
  const doctorsList = document.getElementById('doctorsList');
  doctorsList.innerHTML = '';

  filteredDoctors.forEach(doctor => {
    const doctorCard = document.createElement('div');
    doctorCard.className = 'doctor-card';
    doctorCard.innerHTML = `
      <img src="${doctor.image}" alt="${doctor.name}">
      <div class="doctor-info">
        <h3>${doctor.name}</h3>
        <p>${doctor.specialty}</p>
        <p>${doctor.experience} experience</p>
        <p>⭐ ${doctor.rating} / 5</p>
        <button class="book-button btn btn-primary" onclick="openModal(${doctor.id})">Book Appointment</button>
      </div>
    `;
    doctorsList.appendChild(doctorCard);
  });
}

// Search functionality
document.getElementById('searchButton').addEventListener('click', () => {
  const specialty = specialtySelect.value;
  const location = document.getElementById('locationInput').value;

  const filteredDoctors = doctors.filter(doctor => {
    return (!specialty || doctor.specialty === specialty) &&
           (!location || doctor.location.toLowerCase().includes(location.toLowerCase()));
  });

  displayDoctors(filteredDoctors);
});

// Modal functionality
const bookingModal = document.getElementById('bookingModal');
const consultationModal = document.getElementById('consultationModal');
const closeBtns = document.getElementsByClassName('close');

window.openModal = (doctorId) => {
  bookingModal.style.display = 'block';
  generateTimeSlots();
  // Set minimum date to today
  const dateInput = document.getElementById('appointmentDate');
  const today = new Date().toISOString().split('T')[0];
  dateInput.min = today;
};

// Video consultation button
document.getElementById('startConsultation').addEventListener('click', () => {
  consultationModal.style.display = 'block';
});

// Close buttons functionality
Array.from(closeBtns).forEach(btn => {
  btn.onclick = function() {
    bookingModal.style.display = 'none';
    consultationModal.style.display = 'none';
  }
});

// Close modals when clicking outside
window.onclick = (event) => {
  if (event.target === bookingModal) {
    bookingModal.style.display = 'none';
  }
  if (event.target === consultationModal) {
    consultationModal.style.display = 'none';
  }
};

// Form submissions
document.getElementById('bookingForm').addEventListener('submit', (e) => {
  e.preventDefault();
  const formData = new FormData(e.target);
  const appointmentData = Object.fromEntries(formData.entries());
  
  // Here you would typically send this data to a server
  console.log('Appointment booked:', appointmentData);
  
  alert('Appointment booked successfully!');
  bookingModal.style.display = 'none';
  e.target.reset();
});

document.getElementById('consultationForm').addEventListener('submit', (e) => {
  e.preventDefault();
  const formData = new FormData(e.target);
  const consultationData = Object.fromEntries(formData.entries());
  
  // Here you would typically send this data to a server
  console.log('Video consultation requested:', consultationData);
  
  alert('Video consultation request submitted successfully! A doctor will connect with you shortly.');
  consultationModal.style.display = 'none';
  e.target.reset();
});

// Initial display
displayDoctors();