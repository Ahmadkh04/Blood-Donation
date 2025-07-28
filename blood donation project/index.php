<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>LifeDrop - Blood Donation</title>
    <link
      href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="styles.css" />
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
    
      #hero-slideshow img {
        transition: opacity 0.7s ease-in-out;
      }
    </style>
  </head>
 
  <body class="min-h-screen bg-white">
    <?php
        // Database connection
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "blood_donation";
 
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
 
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
 
        // Handle form submission
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $blood_type = $_POST['blood_type'];
            $donation_date = $_POST['donation_date'];
 
            $sql = "INSERT INTO donors (name, email, phone, blood_type, donation_date) 
                    VALUES ('$name', '$email', '$phone', '$blood_type', '$donation_date')";
 
            if ($conn->query($sql) === TRUE) {
                echo "<div class='bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative' role='alert'>
                        <strong class='font-bold'>Success!</strong>
                        <span class='block sm:inline'> Your donation has been scheduled.</span>
                      </div>";
            } else {
                echo "<div class='bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative' role='alert'>
                        <strong class='font-bold'>Error!</strong>
                        <span class='block sm:inline'> " . $conn->error . "</span>
                      </div>";
            }
        }
    ?>
 
    <!-- Hero Section -->
    <header class="relative">
      <div class="bg-gradient-to-r from-red-600 to-red-700 text-white">
        <div class="container mx-auto px-4 py-16 md:py-24">
          <nav class="flex justify-between items-center mb-16">
            <div class="flex items-center">
              <i
                data-lucide="droplet"
                class="mr-2 text-white"
                style="width: 32px; height: 32px;"
              ></i>
              <span class="text-2xl font-bold">LifeDrop</span>
            </div>
 
            <!-- Mobile menu button -->
            <div class="md:hidden">
              <button type="button" class="text-white" id="mobile-menu-button">
                <i data-lucide="menu" style="width: 24px; height: 24px;"></i>
              </button>
            </div>
 
            <!-- Desktop Navigation -->
            <div class="hidden md:flex space-x-6">
              <a href="#about" class="hover:underline">About</a>
              <a href="#eligibility" class="hover:underline">Eligibility</a>
              <a href="#donations" class="hover:underline">Donate</a>
              <a href="#contact" class="hover:underline">Contact</a>
            </div>
 
            <!-- Desktop Login/Register -->
            <div class="hidden md:flex items-center space-x-4">
              <?php if (isset($_SESSION['user_id'])): ?>
              <span class="text-white">
                Welcome, <?php echo htmlspecialchars($_SESSION['user_name']); ?>
              </span>
              <a
                href="logout.php"
                class="bg-white text-red-600 hover:bg-red-50 px-4 py-2 rounded-md border border-white"
              >
                Logout
              </a>
              <?php else: ?>
              <a
                href="login.php"
                class="bg-white text-red-600 hover:bg-red-50 px-4 py-2 rounded-md border border-white"
              >
                Login
              </a>
              <a
                href="register.php"
                class="bg-red-600 text-white hover:bg-red-700 px-4 py-2 rounded-md border border-white"
              >
                Register
              </a>
              <?php endif; ?>
            </div>
 
            <!-- Mobile Navigation Menu -->
            <div
              id="mobile-menu"
              class="hidden md:hidden fixed inset-0 bg-gray-900 bg-opacity-95 z-50"
            >
              <div
                class="flex flex-col items-center justify-center h-full space-y-8"
              >
                <button
                  type="button"
                  class="absolute top-4 right-4 text-white"
                  id="close-menu"
                >
                  <i data-lucide="x" style="width: 24px; height: 24px;"></i>
                </button>
                <a href="#about" class="text-white text-xl hover:text-red-400"
                  >About</a
                >
                <a
                  href="#eligibility"
                  class="text-white text-xl hover:text-red-400"
                  >Eligibility</a
                >
                <a href="#donations" class="text-white text-xl hover:text-red-400"
                  >Donate</a
                >
                <a href="#contact" class="text-white text-xl hover:text-red-400"
                  >Contact</a
                >
                <?php if (isset($_SESSION['user_id'])): ?>
                <span class="text-white text-xl">
                  Welcome, <?php echo htmlspecialchars($_SESSION['user_name']); ?>
                </span>
                <a
                  href="logout.php"
                  class="bg-white text-red-600 hover:bg-red-50 px-6 py-2 rounded-md"
                >
                  Logout
                </a>
                <?php else: ?>
                <a
                  href="login.php"
                  class="bg-white text-red-600 hover:bg-red-50 px-6 py-2 rounded-md"
                >
                  Login
                </a>
                <a
                  href="register.php"
                  class="bg-red-600 text-white hover:bg-red-700 px-6 py-2 rounded-md"
                >
                  Register
                </a>
                <?php endif; ?>
              </div>
            </div>
          </nav>
 
          <div class="flex flex-col md:flex-row items-center">
            <div class="md:w-1/2 mb-10 md:mb-0">
              <h1
                class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6"
              >
                Your Donation Can Save Lives
              </h1>
              <p class="text-lg mb-8 max-w-md">
                Every 2 seconds, someone needs blood. Your donation can make a
                critical difference for patients in need.
              </p>
              <div class="flex flex-col sm:flex-row gap-4">
                <a
                  href="#donations"
                  class="bg-white text-red-600 hover:bg-red-50 px-6 py-3 rounded-md text-lg text-center"
                >
                  Schedule Donation
                </a>
                <a
                  href="#about"
                  class="border border-white text-white hover:bg-red-700 px-6 py-3 rounded-md text-lg text-center"
                >
                  Learn More
                </a>
              </div>
            </div>
            <div class="md:w-1/2 flex justify-center relative max-w-md w-full">
              <div
                id="hero-slideshow"
                class="relative rounded-lg shadow-xl overflow-hidden w-full h-64 md:h-80 lg:h-96"
              >
                <img
                  src="https://images.unsplash.com/photo-1615461066841-6116e61058f4?w=600&auto=format&fit=crop"
                  alt="Blood donation 1"
                  class="absolute inset-0 w-full h-full object-cover transition-opacity duration-700 opacity-100"
                />
                <img
                  src="image2 (2).jpg"
                  alt="Blood donation 2"
                  class="absolute inset-0 w-full h-full object-cover transition-opacity duration-700 opacity-0"
                />
                <img
                  src="image3 (2).jpg"
                  alt="Blood donation 3"
                  class="absolute inset-0 w-full h-full object-cover transition-opacity duration-700 opacity-0"
                />
 
                <!-- Navigation buttons -->
                <button
                  id="prevSlide"
                  aria-label="Previous slide"
                  class="absolute top-1/2 left-2 transform -translate-y-1/2 bg-red-600 bg-opacity-50 hover:bg-opacity-75 text-white rounded-full p-2 z-10"
                >
                  <i data-lucide="chevron-left" style="width: 24px; height: 24px;"></i>
                </button>
                <button
                  id="nextSlide"
                  aria-label="Next slide"
                  class="absolute top-1/2 right-2 transform -translate-y-1/2 bg-red-600 bg-opacity-50 hover:bg-opacity-75 text-white rounded-full p-2 z-10"
                >
                  <i data-lucide="chevron-right" style="width: 24px; height: 24px;"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
 
    <!-- Eligibility Section -->
    <section id="eligibility" class="py-16 bg-gray-50">
      <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto">
          <h2 class="text-3xl font-bold text-center mb-8">
            Blood Donor Eligibility Requirements
          </h2>
 
          <!-- General Requirements -->
          <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <h3 class="text-xl font-semibold mb-4 border-b pb-2">
              General Requirements
            </h3>
            <ul class="space-y-3">
              <li class="flex items-start">
                <i
                  data-lucide="check-circle"
                  class="text-green-500 mr-2 flex-shrink-0 mt-1"
                  style="width: 20px; height: 20px;"
                ></i>
                <span
                  >Age: Must be at least 17 years old (16 with parental consent
                  in some states)</span
                >
              </li>
              <li class="flex items-start">
                <i
                  data-lucide="check-circle"
                  class="text-green-500 mr-2 flex-shrink-0 mt-1"
                  style="width: 20px; height: 20px;"
                ></i>
                <span>Weight: Must weigh at least 110 pounds (50 kg)</span>
              </li>
              <li class="flex items-start">
                <i
                  data-lucide="check-circle"
                  class="text-green-500 mr-2 flex-shrink-0 mt-1"
                  style="width: 20px; height: 20px;"
                ></i>
                <span>Health: Must be in good general health and feeling well</span>
              </li>
              <li class="flex items-start">
                <i
                  data-lucide="check-circle"
                  class="text-green-500 mr-2 flex-shrink-0 mt-1"
                  style="width: 20px; height: 20px;"
                ></i>
                <span
                  >Hemoglobin: Must have adequate iron levels (minimum 12.5 g/dL
                  for females, 13.0 g/dL for males)</span
                >
              </li>
            </ul>
          </div>
 
          <!-- Time-Based Requirements -->
          <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <h3 class="text-xl font-semibold mb-4 border-b pb-2">
              Time-Based Requirements
            </h3>
            <ul class="space-y-3">
              <li class="flex items-start">
                <i
                  data-lucide="clock"
                  class="text-blue-500 mr-2 flex-shrink-0 mt-1"
                  style="width: 20px; height: 20px;"
                ></i>
                <span>Must wait 56 days between whole blood donations</span>
              </li>
              <li class="flex items-start">
                <i
                  data-lucide="clock"
                  class="text-blue-500 mr-2 flex-shrink-0 mt-1"
                  style="width: 20px; height: 20px;"
                ></i>
                <span>Must wait 7 days after taking antibiotics</span>
              </li>
              <li class="flex items-start">
                <i
                  data-lucide="clock"
                  class="text-blue-500 mr-2 flex-shrink-0 mt-1"
                  style="width: 20px; height: 20px;"
                ></i>
                <span>Must wait 24 hours after dental work</span>
              </li>
              <li class="flex items-start">
                <i
                  data-lucide="clock"
                  class="text-blue-500 mr-2 flex-shrink-0 mt-1"
                  style="width: 20px; height: 20px;"
                ></i>
                <span>Must wait 6 months after major surgery</span>
              </li>
            </ul>
          </div>
 
          <!-- Medical Conditions -->
          <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <h3 class="text-xl font-semibold mb-4 border-b pb-2">
              Medical Conditions
            </h3>
            <ul class="space-y-3">
              <li class="flex items-start">
                <i
                  data-lucide="alert-circle"
                  class="text-red-500 mr-2 flex-shrink-0 mt-1"
                  style="width: 20px; height: 20px;"
                ></i>
                <span
                  >Cannot donate if you have HIV/AIDS, Hepatitis B or C, or
                  Syphilis</span
                >
              </li>
              <li class="flex items-start">
                <i
                  data-lucide="alert-circle"
                  class="text-red-500 mr-2 flex-shrink-0 mt-1"
                  style="width: 20px; height: 20px;"
                ></i>
                <span>Cannot donate if you have active tuberculosis</span>
              </li>
              <li class="flex items-start">
                <i
                  data-lucide="alert-circle"
                  class="text-red-500 mr-2 flex-shrink-0 mt-1"
                  style="width: 20px; height: 20px;"
                ></i>
                <span>Cannot donate if you have certain types of cancer</span>
              </li>
              <li class="flex items-start">
                <i
                  data-lucide="alert-circle"
                  class="text-red-500 mr-2 flex-shrink-0 mt-1"
                  style="width: 20px; height: 20px;"
                ></i>
                <span>Cannot donate if you have certain heart conditions</span>
              </li>
            </ul>
          </div>
 
          <!-- Lifestyle Factors -->
          <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-xl font-semibold mb-4 border-b pb-2">
              Lifestyle Factors
            </h3>
            <ul class="space-y-3">
              <li class="flex items-start">
                <i
                  data-lucide="alert-circle"
                  class="text-red-500 mr-2 flex-shrink-0 mt-1"
                  style="width: 20px; height: 20px;"
                ></i>
                <span>Cannot donate if you have used intravenous drugs</span>
              </li>
              <li class="flex items-start">
                <i
                  data-lucide="alert-circle"
                  class="text-red-500 mr-2 flex-shrink-0 mt-1"
                  style="width: 20px; height: 20px;"
                ></i>
                <span>Cannot donate if you have had a tattoo in the last 3 months</span>
              </li>
              <li class="flex items-start">
                <i
                  data-lucide="alert-circle"
                  class="text-red-500 mr-2 flex-shrink-0 mt-1"
                  style="width: 20px; height: 20px;"
                ></i>
                <span>
                  Cannot donate if you have traveled to certain countries in the
                  past year
                </span>
              </li>
              <li class="flex items-start">
                <i
                  data-lucide="alert-circle"
                  class="text-red-500 mr-2 flex-shrink-0 mt-1"
                  style="width: 20px; height: 20px;"
                ></i>
                <span>Cannot donate if you have had certain types of sexual contact</span>
              </li>
            </ul>
          </div>
 
          <div class="text-center mt-8">
            <p class="text-gray-600 mb-4">
              Not sure if you're eligible? Our medical staff can help determine
              your eligibility.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
              <a
                href="#contact"
                class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded-md inline-block"
              >
                Contact Us
              </a>
              <a
                href="#donations"
                class="bg-white border border-red-600 text-red-600 hover:bg-red-50 px-6 py-2 rounded-md inline-block"
              >
                Schedule Donation
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
 
    <!-- Blood Types Compatibility Section -->
    <section id="blood-types" class="py-16 bg-white">
      <div class="container mx-auto px-4">
        <div
          class="max-w-4xl mx-auto text-center mb-12"
        >
          <i
            data-lucide="server"
            class="text-red-600 mx-auto mb-4"
            style="width: 40px; height: 40px;"
          ></i>
          <h2 class="text-3xl font-bold mb-4">Blood Types & Compatibility</h2>
          <p class="text-gray-600 max-w-xl mx-auto">
            Understanding blood types and their compatibility is crucial for safe
            blood transfusions. Here's a quick guide on who can donate to whom.
          </p>
        </div>
 
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
          <div class="bg-gray-50 rounded-lg shadow p-6">
            <h3 class="text-xl font-semibold mb-3 text-red-600">Type O−</h3>
            <p class="text-gray-700 mb-2">
              <strong>Donate to:</strong> All types (Universal Donor)
            </p>
            <p class="text-gray-700"><strong>Receive from:</strong> O− only</p>
          </div>
          <div class="bg-gray-50 rounded-lg shadow p-6">
            <h3 class="text-xl font-semibold mb-3 text-red-600">Type O+</h3>
            <p class="text-gray-700 mb-2">
              <strong>Donate to:</strong> O+, A+, B+, AB+
            </p>
            <p class="text-gray-700"><strong>Receive from:</strong> O+ and O−</p>
          </div>
          <div class="bg-gray-50 rounded-lg shadow p-6">
            <h3 class="text-xl font-semibold mb-3 text-red-600">Type A−</h3>
            <p class="text-gray-700 mb-2">
              <strong>Donate to:</strong> A−, A+, AB−, AB+
            </p>
            <p class="text-gray-700"><strong>Receive from:</strong> A−, O−</p>
          </div>
          <div class="bg-gray-50 rounded-lg shadow p-6">
            <h3 class="text-xl font-semibold mb-3 text-red-600">Type A+</h3>
            <p class="text-gray-700 mb-2"><strong>Donate to:</strong> A+, AB+</p>
            <p class="text-gray-700">
              <strong>Receive from:</strong> A+, A−, O+, O−
            </p>
          </div>
          <div class="bg-gray-50 rounded-lg shadow p-6">
            <h3 class="text-xl font-semibold mb-3 text-red-600">Type B−</h3>
            <p class="text-gray-700 mb-2">
              <strong>Donate to:</strong> B−, B+, AB−, AB+
            </p>
            <p class="text-gray-700"><strong>Receive from:</strong> B−, O−</p>
          </div>
          <div class="bg-gray-50 rounded-lg shadow p-6">
            <h3 class="text-xl font-semibold mb-3 text-red-600">Type B+</h3>
            <p class="text-gray-700 mb-2"><strong>Donate to:</strong> B+, AB+</p>
            <p class="text-gray-700">
              <strong>Receive from:</strong> B+, B−, O+, O−
            </p>
          </div>
          <div class="bg-gray-50 rounded-lg shadow p-6">
            <h3 class="text-xl font-semibold mb-3 text-red-600">Type AB−</h3>
            <p class="text-gray-700 mb-2"><strong>Donate to:</strong> AB−, AB+</p>
            <p class="text-gray-700">
              <strong>Receive from:</strong> AB−, A−, B−, O−
            </p>
          </div>
          <div class="bg-gray-50 rounded-lg shadow p-6">
            <h3 class="text-xl font-semibold mb-3 text-red-600">Type AB+</h3>
            <p class="text-gray-700 mb-2">Donate to: AB+ only</p>
            <p class="text-gray-700">
              <strong>Receive from:</strong> All blood types (Universal Recipient)
            </p>
          </div>
        </div>
      </div>
    </section>
 
    <!-- About Section -->
    <section id="about" class="py-16 bg-white">
      <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto text-center mb-12">
          <i
            data-lucide="heart"
            class="text-red-600 mx-auto mb-4"
            style="width: 40px; height: 40px;"
          ></i>
          <h2 class="text-3xl font-bold mb-4">Why Donate Blood?</h2>
          <p class="text-lg text-gray-600">
            Blood donation is a critical lifeline for many people. From
            patients undergoing surgery to those battling cancer or chronic
            diseases, donated blood makes a significant difference.
          </p>
        </div>
 
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
          <div class="bg-gray-50 rounded-lg p-6">
            <div class="text-red-600 mb-4">
              <i data-lucide="check-circle" style="width: 28px; height: 28px;"></i>
            </div>
            <h3 class="text-xl font-semibold mb-2">Save Multiple Lives</h3>
            <p class="text-gray-600">
              One donation can save up to three lives as blood is separated into
              red cells, platelets and plasma.
            </p>
          </div>
          <div class="bg-gray-50 rounded-lg p-6">
            <div class="text-red-600 mb-4">
              <i data-lucide="check-circle" style="width: 28px; height: 28px;"></i>
            </div>
            <h3 class="text-xl font-semibold mb-2">Health Benefits</h3>
            <p class="text-gray-600">
              Regular donation reduces iron stores and may lower the risk of heart
              disease. You also get a mini health check each time.
            </p>
          </div>
          <div class="bg-gray-50 rounded-lg p-6">
            <div class="text-red-600 mb-4">
              <i data-lucide="check-circle" style="width: 28px; height: 28px;"></i>
            </div>
            <h3 class="text-xl font-semibold mb-2">Community Impact</h3>
            <p class="text-gray-600">
              Strengthen your community by ensuring hospitals have adequate supplies
              for emergencies and everyday needs.
            </p>
          </div>
        </div>
      </div>
    </section>
 
    <!-- Donation Form Section -->
    <section id="donations" class="py-16 bg-white">
      <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto">
          <h2 class="text-3xl font-bold text-center mb-8">Schedule a Donation</h2>
          <div class="bg-gray-50 rounded-lg shadow-md p-6 md:p-8">
            <form
              method="POST"
              action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
              class="space-y-6"
            >
              <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                  <label for="name" class="block mb-2 font-medium">Full Name</label>
                  <input
                    type="text"
                    id="name"
                    name="name"
                    required
                    placeholder="John Doe"
                    class="w-full rounded-md border border-gray-300 px-3 py-2"
                  />
                </div>
                <div>
                  <label for="email" class="block mb-2 font-medium">Email</label>
                  <input
                    type="email"
                    id="email"
                    name="email"
                    required
                    placeholder="john@example.com"
                    class="w-full rounded-md border border-gray-300 px-3 py-2"
                  />
                </div>
                <div>
                  <label for="phone" class="block mb-2 font-medium">Phone Number</label>
                  <input
                    type="tel"
                    id="phone"
                    name="phone"
                    required
                    placeholder="+961"
                    class="w-full rounded-md border border-gray-300 px-3 py-2"
                  />
                </div>
                <div>
                  <label for="blood_type" class="block mb-2 font-medium">Blood Type</label>
                  <select
                    id="blood_type"
                    name="blood_type"
                    required
                    class="w-full rounded-md border border-gray-300 px-3 py-2"
                  >
                    <option value="">Select Blood Type</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                  </select>
                </div>
                <div>
                  <label for="donation_date" class="block mb-2 font-medium"
                    >Preferred Donation Date</label
                  >
                  <input
                    type="date"
                    id="donation_date"
                    name="donation_date"
                    required
                    class="w-full rounded-md border border-gray-300 px-3 py-2"
                  />
                </div>
              </div>
              <div class="text-center">
                <button
                  type="submit"
                  class="bg-red-600 hover:bg-red-700 text-white px-8 py-3 rounded-md text-lg"
                >
                  Schedule Donation
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
 
    <!-- Contact Section -->
    <section id="contact" class="py-16 bg-gray-50">
      <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto text-center">
          <h2 class="text-3xl font-bold mb-8">Contact Us</h2>
          <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div>
              <i
                data-lucide="phone"
                class="text-red-600 mx-auto mb-4"
                style="width: 32px; height: 32px;"
              ></i>
              <h3 class="text-xl font-semibold mb-2">Phone</h3>
              <p class="text-gray-600">+961 1 368 681</p>
            </div>
            <div>
              <i
                data-lucide="mail"
                class="text-red-600 mx-auto mb-4"
                style="width: 32px; height: 32px;"
              ></i>
              <h3 class="text-xl font-semibold mb-2">Email</h3>
              <p class="text-gray-600">redcross.org.lb</p>
            </div>
            <div>
              <i
                data-lucide="map-pin"
                class="text-red-600 mx-auto mb-4"
                style="width: 32px; height: 32px;"
              ></i>
              <h3 class="text-xl font-semibold mb-2">Location</h3>
              <p class="text-gray-600">Spears,Beirut</p>
            </div>
          </div>
        </div>
      </div>
    </section>
 
    <script>
      // Initialize Lucide icons
      lucide.createIcons();
 
      // Mobile menu functionality
      const mobileMenuButton = document.getElementById("mobile-menu-button");
      const closeMenuButton = document.getElementById("close-menu");
      const mobileMenu = document.getElementById("mobile-menu");
 
      mobileMenuButton.addEventListener("click", () => {
        mobileMenu.classList.remove("hidden");
      });
 
      closeMenuButton.addEventListener("click", () => {
        mobileMenu.classList.add("hidden");
      });
 
      // Slideshow functionality
      const slides = document.querySelectorAll("#hero-slideshow img");
      let currentSlide = 0;
      const totalSlides = slides.length;
 
      const showSlide = (index) => {
        slides.forEach((slide, i) => {
          slide.style.opacity = i === index ? "1" : "0";
          slide.style.zIndex = i === index ? "10" : "0";
        });
      };
 
      document.getElementById("nextSlide").addEventListener("click", () => {
        currentSlide = (currentSlide + 1) % totalSlides;
        showSlide(currentSlide);
      });
 
      document.getElementById("prevSlide").addEventListener("click", () => {
        currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
        showSlide(currentSlide);
      });
 
      // Auto slide every 5 seconds
      setInterval(() => {
        currentSlide = (currentSlide + 1) % totalSlides;
        showSlide(currentSlide);
      }, 5000);
 
      // Show the first slide initially
      showSlide(currentSlide);
    </script>
  </body>
</html>
