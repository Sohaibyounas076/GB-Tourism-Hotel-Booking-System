
# GB Tourism Website

**GB Tourism** is a dynamic tourism management web platform tailored for showcasing hotels and accommodations across the stunning region of Gilgit Baltistan. The website enables users to explore, register, and book hotels based on detailed listings, service offerings, and room types. Administrators can manage all hotel-related data via a dedicated dashboard, making this platform a complete solution for hotel discovery and management.

## 🎓 Project Background
This project was built for a university student at the **University of Sargodha** as part of their **MSc Final Year Project**. It is designed as a full-stack tourism solution using **HTML5**, **CSS3**, and **Bootstrap 5**, and serves as a practical demonstration of real-world tourism service management.

## ✨ Features
- Admin login system
- Add/Edit/Delete hotels from admin panel
- Add/Edit/Delete rooms and pricing
- View hotel bookings and manage offers
- User registration and login
- Hotel listing with services and room details
- Contact form and review submission

## 🧱 📁 Repository Structure
```bash
GB-Tourism/
│
├── index.php               # Homepage
├── about.php              # About Us page
├── contact.php            # Contact page
├── login.php              # User Login
├── logout.php             # User Logout
├── hotels.php             # Hotel listing for users
├── footer.php             # Footer include
├── README.md              # This file
│
├── gb.sql                 # 📁 Database file (Import in phpMyAdmin)
│                          # Contains all necessary tables to run the project locally
│
├── admin/                 # Admin Dashboard Pages
│   ├── admin-login.php    # Admin login page
│   ├── add-hotel.php      # Add new hotel
│   ├── hotel-offers.php   # View/edit offers
│   ├── add-room.php       # Add rooms to hotels
│   └── ...                # Other admin files
│
├── images/                # All images used in project
│   └── screenshots/       # Screenshots for documentation
│
├── css/                   # Custom CSS files
├── bootstrap/             # Bootstrap files
```

📌 **Note:** A complete SQL database file `gb.sql` is included. You can import it into **phpMyAdmin** using **XAMPP** or **Laragon** and run the entire application on your local machine.
## 💻 How to Set Up the Project (Localhost)

You can use this project **without purchasing hosting** by running it locally using **XAMPP**. Just follow these steps:

1. Install [XAMPP](https://www.apachefriends.org/index.html) on your computer.
2. Copy the `ladies-brand/` folder into the `htdocs/` directory inside your XAMPP installation.
3. Open [phpMyAdmin](http://localhost/phpmyadmin) and create a new database (e.g., `ladies_brand`).
4. Import the `ladies-brand-database.sql` file into your new database.
5. Open the `wp-config.php` file in the project root and update your database credentials accordingly.
6. Visit [http://localhost/ladies-brand](http://localhost/ladies-brand) in your browser to view the site.

---

## 📷 Screenshots

### 🏠 Website Registration Page
![Website Registration Page](https://github.com/Sohaibyounas076/GB-Tourism-Hotel-Booking-System/blob/main/Preview%20Screen%20Shots/reg.png)

### 🏠 Website Login Page
![Website Login Page](https://github.com/Sohaibyounas076/GB-Tourism-Hotel-Booking-System/blob/main/Preview%20Screen%20Shots/login.png)

### 🏠 Website Home Page
![Website Home Page](https://github.com/Sohaibyounas076/GB-Tourism-Hotel-Booking-System/blob/main/Preview%20Screen%20Shots/home.png)

### 🏨 Hotel Details Page 
![Hotel Details Page](https://github.com/Sohaibyounas076/GB-Tourism-Hotel-Booking-System/blob/main/Preview%20Screen%20Shots/hotel%20view.png)

### 📄 About Page
![About Page](https://github.com/Sohaibyounas076/GB-Tourism-Hotel-Booking-System/blob/main/Preview%20Screen%20Shots/about.png)

### 🔐 Admin - Admin Add Hotel's Page 
![Admin Add Hotel's](https://github.com/Sohaibyounas076/GB-Tourism-Hotel-Booking-System/blob/main/Preview%20Screen%20Shots/adin%20hotel%20room.png)

### 🛏️ Admin - Add Hotel Room's Page
![Admin Add  Hotel Room](https://github.com/Sohaibyounas076/GB-Tourism-Hotel-Booking-System/blob/main/Preview%20Screen%20Shots/adin%20hotel%20room.png)

### 🎯 Admin - Hotel Offers
![Admin Add Hotel  Offers](https://github.com/Sohaibyounas076/GB-Tourism-Hotel-Booking-System/blob/main/Preview%20Screen%20Shots/admin%20hotel%20offering.png)

### 🛏️ Admin - Add Hotels Spec Page 
![Admin Add Room Spec](https://github.com/Sohaibyounas076/GB-Tourism-Hotel-Booking-System/blob/main/Preview%20Screen%20Shots/admin%20hotel%20Specifications.png)



## 🎥 Demo Video
Watch the full demo of how GB Tourism works on YouTube:
[![Watch Demo](https://img.youtube.com/vi/YOUR_VIDEO_ID_HERE/0.jpg)](https://www.youtube.com/watch?v=YOUR_VIDEO_ID_HERE)

## 👨‍💻 Developed By
**Sohaib Younas**  
- 🔗 [LinkedIn](https://linkedin.com/in/sohaibyounas076)  
- 🌐 [Portfolio Website](https://sohaibyounas076.github.io/portfolio/)  
- 📧 *Email available via LinkedIn/Fiverr contact*

---

---
Feel free to use, improve, or customize the project for your learning or final year submission.  
Pull requests and feedback are always welcome!
