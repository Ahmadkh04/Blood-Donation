// Initialize Lucide icons
lucide.createIcons();

// Blood types data
const bloodTypes = [
    { type: "A+", description: "Compatible with positive types" },
    { type: "B+", description: "Compatible with positive types" },
    { type: "AB+", description: "Universal recipient" },
    { type: "O+", description: "Compatible with positive types" },
    { type: "A-", description: "Compatible with all types" },
    { type: "B-", description: "Compatible with all types" },
    { type: "AB-", description: "Compatible with all types" },
    { type: "O-", description: "Universal donor" }
];

// Populate blood types section
function populateBloodTypes() {
    const bloodTypesContainer = document.getElementById('bloodTypes');
    if (!bloodTypesContainer) return;

    bloodTypes.forEach(({ type, description }) => {
        const bloodTypeElement = document.createElement('div');
        bloodTypeElement.className = 'bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow';
        bloodTypeElement.innerHTML = `
            <div class="flex items-center justify-center w-16 h-16 mx-auto mb-4 rounded-full bg-red-100 text-red-600">
                <span class="text-xl font-bold">${type}</span>
            </div>
            <h3 class="text-xl font-semibold text-center mb-2">Type ${type}</h3>
            <p class="text-gray-600 text-center">${description}</p>
        `;
        bloodTypesContainer.appendChild(bloodTypeElement);
    });
}

// Handle form submission
function handleFormSubmit(event) {
    event.preventDefault();
    
    const formData = {
        name: document.getElementById('name').value,
        email: document.getElementById('email').value,
        phone: document.getElementById('phone').value,
        bloodType: document.getElementById('bloodType').value,
        date: document.getElementById('date').value
    };

    // Here you would typically send the data to a server
    console.log('Form submitted:', formData);

    // Show success message
    const form = document.getElementById('donationForm');
    form.innerHTML = `
        <div class="text-center py-8">
            <i data-lucide="check-circle" class="mx-auto text-green-500 mb-4" style="width: 48px; height: 48px;"></i>
            <h3 class="text-2xl font-semibold mb-2">Thank You!</h3>
            <p class="text-gray-600">Your donation has been scheduled. We'll contact you shortly to confirm your appointment.</p>
        </div>
    `;
    lucide.createIcons();

    // Reset form after 3 seconds
    setTimeout(() => {
        form.reset();
        window.location.reload();
    }, 3000);
}

// Initialize the page
document.addEventListener('DOMContentLoaded', () => {
    populateBloodTypes();
    
    const form = document.getElementById('donationForm');
    if (form) {
        form.addEventListener('submit', handleFormSubmit);
    }

    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });
    });
}); 