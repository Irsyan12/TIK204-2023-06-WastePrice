## WastePrice

This repository contains a web-based application focused on waste management, likely facilitating the buying and selling of recyclable waste materials. The project appears to be a platform where users can manage their waste transactions, with different roles for administrators and officers.

### Features

Based on the file structure and naming conventions, the application likely includes the following functionalities:

* **User Authentication:** Login and registration for users (`login.php`, `daftar.php`).
* **User Profiles:** Management of user profiles (`profil.php`, `ubahProfil.php`).
* **Waste Price Information:** Displaying and managing waste prices (`hargasampah.php`).
* **Waste Selling/Transaction:** Functionality for users to sell waste and view their transactions (`jualsampah.php`, `transaksisaya.php`, `checkout.php`, `detailpenjualan.php`).
* **Notifications:** System for user notifications (`notifikasi.php`).
* **Admin and Officer Panels:** Separate interfaces for administrative and officer roles (`admin/`, `petugas/`).
* **Database Management:** SQL script for database setup (`db_wasteprice.sql`).
* **Static Pages:** Landing page, home, help, and terms and conditions (`landingpage.php`, `home.php`, `bantuan.php`, `sk.php`).

### Technologies Used

The project is built using a combination of web technologies:

* **Backend:** PHP
* **Frontend:**
    * HTML
    * CSS
    * JavaScript
* **Database:** SQL (as indicated by `db_wasteprice.sql`)

### Setup Instructions

To set up and run this project locally, you will typically need a web server environment (like Apache or Nginx) with PHP and a MySQL/MariaDB database.

1.  **Clone the Repository:**
    ```bash
    git clone https://github.com/Irsyan12/TIK204-2023-06-WastePrice.git
    ```
2.  **Set up Database:**
    * Create a new database in your MySQL/MariaDB server.
    * Import the `db_wasteprice.sql` file into your newly created database. This will set up the necessary tables and initial data.
3.  **Configure Database Connection:**
    * Locate the database connection file (this is usually a PHP file that contains database credentials, often named `config.php`, `db.php`, or similar, though not explicitly listed in the provided files).
    * Update the database credentials (hostname, username, password, database name) to match your local setup.
4.  **Place Files on Web Server:**
    * Move the cloned `TIK204-2023-06-WastePrice` directory into your web server's document root (e.g., `htdocs` for Apache, `www` for Nginx).
5.  **Access the Application:**
    * Open your web browser and navigate to the URL corresponding to your project's location on the web server (e.g., `http://localhost/TIK204-2023-06-WastePrice/`).

### Contributing

Further instructions on how to contribute to this project could be added here.
