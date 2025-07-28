# 🩸 Blood Donation Management System

This project is a web-based application designed to promote and manage blood donations. It allows users to register, log in, schedule donation appointments, and view donation eligibility and requirements.

---

## 🌐 Features

### 🔐 Authentication
- **User Registration**: New users can create an account by providing personal and medical details.
- **Login**: Existing users can log in securely to access the system.

### 📅 Donation Scheduling
- **Schedule Donation**: Users can book a donation appointment by selecting the date, time, and nearby center.
- **Appointment History**: View past and upcoming donations.

### ✅ Donation Requirements
- Minimum age: **18 years**
- Minimum weight: **50 kg (110 lbs)**
- Must be in good general health
- No recent surgeries, infections, or certain medications
- Must wait at least **8 weeks (56 days)** between whole blood donations

### 📋 Eligibility Checker
- Users can check their eligibility through a questionnaire that evaluates age, weight, health, recent travel, and more.

### 🩸 Blood Type Compatibility
| Blood Type | Can Donate To        | Can Receive From     |
|------------|----------------------|-----------------------|
| A+         | A+, AB+              | A+, A−, O+, O−        |
| A−         | A+, A−, AB+, AB−     | A−, O−                |
| B+         | B+, AB+              | B+, B−, O+, O−        |
| B−         | B+, B−, AB+, AB−     | B−, O−                |
| AB+        | AB+ (Universal recipient) | All types       |
| AB−        | AB+, AB−             | A−, B−, AB−, O−       |
| O+         | O+, A+, B+, AB+      | O+, O−                |
| O−         | All types (Universal donor) | O−         |

---

## 🛠️ Technologies Used
- Frontend: HTML, CSS, JavaScript
- Backend:  PHP
- Database: MySQL

---

## 📦 Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/Ahmadkh04/blood-donation-project.git
