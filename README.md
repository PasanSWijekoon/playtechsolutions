# PlayTechSolutions E-commerce Web Application

## Project Overview

PlayTechSolutions is embarking on a project to develop a fully functional e-commerce web application aimed at expanding their selling rates. The decision was made to transition from their current phone-based customer care service to a comprehensive web-based platform. After evaluating tenders from various software development companies, PlayTechSolutions selected our company to design and develop this application. The project will leverage HTML, CSS, Bootstrap, JavaScript, PHP, and MySQL to create a dynamic and user-friendly e-commerce site.

## Project Scope

The project involves designing and developing the following features and pages:

1. **Customer Login and Registration Page**
2. **Home Page**
3. **Product Listing and Single Product View**
4. **Cart and Watchlist**
5. **Purchase History and Invoicing**
6. **Product Adding and Updating**
7. **Add Feedbacks**
8. **Advanced Search**
9. **Admin Sign-in**
10. **Admin Panel**
    - Manage Products
    - Manage Users
11. **Customer Chat**

## Technology Stack

- **Frontend**: HTML, CSS, Bootstrap, JavaScript
- **Backend**: PHP
- **Database**: MySQL

## How to Setup

Follow these steps to set up the project on your local machine:

### Prerequisites

- Web server (e.g., Apache)
- PHP (version 7.4 or higher)
- MySQL
- Git

### Steps

1. **Clone the Repository**

    ```bash
    git clone [https://github.com/YourUsername/PlayTechSolutions.git](https://github.com/PasanSWijekoon/playtechsolutions.git)
    cd PlayTechSolutions
    ```

2. **Set Up the Database**

    - Create a MySQL database:
    
      ```sql
      import FinalBackup.sql 
      ```

3. **Configure the Project**

    - Edit `includes/connection.php` and set your database details:
    
      ```php
           Database::$connection=new mysqli("localhost","root","password","eShop","3306");
      ```

4. **Set Up the Web Server**

    - Ensure your web server's document root is set to the `public` directory of the project.
    - For Apache, you might update your virtual host configuration:
    
      ```apache
      <VirtualHost *:80>
          DocumentRoot "/path_to_your_project/public"
          ServerName yourdomain.com
          <Directory "/path_to_your_project/public">
              AllowOverride All
              Require all granted
          </Directory>
      </VirtualHost>
      ```

5. **Install Dependencies**

    - Although the project doesn't use a package manager like Composer for PHP, ensure you have the necessary PHP extensions installed (e.g., mysqli).

6. **Run the Application**

    - Start your web server and navigate to `http://yourdomain.com` in your browser.
    - You should see the home page of the PlayTechSolutions e-commerce site.
  
## Project Images

### Home
 ![Home](https://github.com/PasanSWijekoon/playtechsolutions/blob/cbb4e9ef9f51dc1f32751fbc9cdb877ee2bf4216/assets/img/1%20(6).png)


![Image 4](https://github.com/PasanSWijekoon/playtechsolutions/blob/feec3e2ff7462c6d7037136f5b3c1401c4e15206/assets/img/login.png)
![Home](https://github.com/PasanSWijekoon/playtechsolutions/blob/cbb4e9ef9f51dc1f32751fbc9cdb877ee2bf4216/assets/img/1%20(11).png)
![Home](https://github.com/PasanSWijekoon/playtechsolutions/blob/cbb4e9ef9f51dc1f32751fbc9cdb877ee2bf4216/assets/img/1%20(10).png)
![Home](https://github.com/PasanSWijekoon/playtechsolutions/blob/cbb4e9ef9f51dc1f32751fbc9cdb877ee2bf4216/assets/img/1%20(1).png)
![Home](https://github.com/PasanSWijekoon/playtechsolutions/blob/cbb4e9ef9f51dc1f32751fbc9cdb877ee2bf4216/assets/img/1%20(2).png)
![Home](https://github.com/PasanSWijekoon/playtechsolutions/blob/cbb4e9ef9f51dc1f32751fbc9cdb877ee2bf4216/assets/img/1%20(3).png)
![Home](https://github.com/PasanSWijekoon/playtechsolutions/blob/cbb4e9ef9f51dc1f32751fbc9cdb877ee2bf4216/assets/img/1%20(4).png)
![Home](https://github.com/PasanSWijekoon/playtechsolutions/blob/cbb4e9ef9f51dc1f32751fbc9cdb877ee2bf4216/assets/img/1%20(5).png)
![Home](https://github.com/PasanSWijekoon/playtechsolutions/blob/cbb4e9ef9f51dc1f32751fbc9cdb877ee2bf4216/assets/img/1%20(6).png)
![Home](https://github.com/PasanSWijekoon/playtechsolutions/blob/cbb4e9ef9f51dc1f32751fbc9cdb877ee2bf4216/assets/img/1%20(7).png)
![Home](https://github.com/PasanSWijekoon/playtechsolutions/blob/cbb4e9ef9f51dc1f32751fbc9cdb877ee2bf4216/assets/img/1%20(8).png)
![Home](https://github.com/PasanSWijekoon/playtechsolutions/blob/cbb4e9ef9f51dc1f32751fbc9cdb877ee2bf4216/assets/img/1%20(9).png)
![Home](https://github.com/PasanSWijekoon/playtechsolutions/blob/cbb4e9ef9f51dc1f32751fbc9cdb877ee2bf4216/assets/img/1%20(12).png)
That's it! Your local setup for the PlayTechSolutions e-commerce web application is now complete. If you encounter any issues, please refer to the project documentation or contact the development team for support.
