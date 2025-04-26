-- Create the database
CREATE DATABASE IF NOT EXISTS dochub;
USE dochub;

-- Create users table
CREATE TABLE users (
    id INT(11) NOT NULL AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    UNIQUE (username),
    UNIQUE (email)
);

-- Create user_details table
CREATE TABLE user_details (
    id INT(11) NOT NULL AUTO_INCREMENT,
    user_id INT(11),
    fullname VARCHAR(100) NOT NULL,
    dob DATE NOT NULL,
    gender ENUM('Male', 'Female') NOT NULL,
    phone VARCHAR(20) NOT NULL,
    address TEXT NOT NULL,
    emergency_name VARCHAR(100) NOT NULL,
    emergency_phone VARCHAR(20) NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Create medicines table
CREATE TABLE medicines (
    id INT(11) NOT NULL AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10,2) NOT NULL,
    stock INT(11) NOT NULL,
    image_url VARCHAR(255),
    category VARCHAR(50),
    PRIMARY KEY (id)
);

CREATE TABLE orders (
    id INT(11) NOT NULL AUTO_INCREMENT,
    user_id INT(11),
    patient_name VARCHAR(100) NOT NULL,
    age INT(11) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    place VARCHAR(255) NOT NULL,
    total_amount DECIMAL(10,2) NOT NULL,
    order_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    status VARCHAR(20) DEFAULT 'pending',
    PRIMARY KEY (id)
);

-- Create order_items table
CREATE TABLE order_items (
    id INT(11) NOT NULL AUTO_INCREMENT,
    order_id INT(11),
    medicine_id INT(11),
    quantity INT(11),
    price DECIMAL(10,2),
    PRIMARY KEY (id)
);

-- Insert medicine data
INSERT INTO medicines (name, description, price, stock, image_url, category) VALUES
('Paracetamol 500mg', 'Pain reliever and fever reducer. Effective for mild to moderate pain and fever.', 25.00, 100, 'assets/medicines/paracetamol.jpg', 'Pain Relief'),
('Azithromycin 500mg', 'Antibiotic used to treat bacterial infections including respiratory infections.', 180.00, 50, 'assets/medicines/azithromycin.jpg', 'Antibiotics'),
('Omeprazole 20mg', 'Reduces stomach acid production. Used for acid reflux and ulcers.', 95.00, 75, 'assets/medicines/omeprazole.jpg', 'Digestive Health'),
('Cetirizine 10mg', 'Antihistamine that reduces allergy symptoms like sneezing and runny nose.', 45.00, 120, 'assets/medicines/cetirizine.jpg', 'Allergy'),
('Vitamin D3 1000IU', 'Supports bone health, immune system, and overall wellbeing.', 195.00, 80, 'assets/medicines/vitamind.jpg', 'Vitamins'),
('Metformin 500mg', 'Oral diabetes medicine that helps control blood sugar levels.', 125.00, 60, 'assets/medicines/metformin.jpg', 'Diabetes'),
('Aspirin 75mg', 'Blood thinner used to prevent heart attacks and strokes.', 35.00, 150, 'assets/medicines/aspirin.jpg', 'Heart Health'),
('Vitamin B Complex', 'Essential B vitamins for energy metabolism and nervous system health.', 275.00, 90, 'assets/medicines/bcomplex.jpg', 'Vitamins'),
('Calcium + D3 Tablets', 'Supports bone health and prevents calcium deficiency.', 245.00, 85, 'assets/medicines/calcium.jpg', 'Supplements'),
('Amoxicillin 250mg', 'Broad-spectrum antibiotic for various bacterial infections.', 150.00, 70, 'assets/medicines/amoxicillin.jpg', 'Antibiotics'),
('Cough Syrup 100ml', 'Relief from dry cough and throat irritation.', 85.00, 65, 'assets/medicines/coughsyrup.jpg', 'Cold & Flu'),
('Ibuprofen 400mg', 'Anti-inflammatory pain reliever for arthritis and muscle pain.', 40.00, 110, 'assets/medicines/ibuprofen.jpg', 'Pain Relief'),
('Multivitamin Daily', 'Complete daily nutritional support with essential vitamins and minerals.', 325.00, 95, 'assets/medicines/multivitamin.jpg', 'Vitamins'),
('Blood Glucose Strips', 'For monitoring blood sugar levels at home.', 850.00, 40, 'assets/medicines/glucosestrips.jpg', 'Diabetes Care'),
('First Aid Kit', 'Essential medical supplies for emergency care.', 499.00, 30, 'assets/medicines/firstaid.jpg', 'Medical Supplies');