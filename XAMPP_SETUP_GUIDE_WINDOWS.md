# Running KrishiDisha on XAMPP (Windows)

The project has been configured to seamlessly support XAMPP right out of the box! Follow these steps to easily get it running on your Windows machine.

### Step 1: Download & Install XAMPP
1. Go to the official [Apache Friends website](https://www.apachefriends.org/download.html).
2. Download **XAMPP for Windows** (Look for the version with PHP 8.0+).
3. Open the downloaded `.exe` file and follow the standard Windows installation process. 
   *(Note: It is highly recommended to install XAMPP in the default `C:\xampp` folder to avoid permission issues).*

### Step 2: Start the XAMPP Servers
1. Open the **XAMPP Control Panel** from your Start Menu.
2. In the control panel, click the **Start** button next to **Apache**.
3. Click the **Start** button next to **MySQL**.
4. Wait for both modules to turn green in the list (meaning they are successfully running).

### Step 3: Move the Project Code
1. Open File Explorer and navigate to your XAMPP installation folder, specifically the `htdocs` directory (Usually located at `C:\xampp\htdocs\`).
2. Delete everything currently inside the `htdocs` folder to keep it clean.
3. Now, move or copy the entire `KrishiDisha` project folder (which you downloaded/cloned from GitHub) into this `htdocs` folder.
   *(The final path should look exactly like: `C:\xampp\htdocs\KrishiDisha\`)*.

### Step 4: Import the Database
1. Open your web browser (Chrome, Firefox, Edge, etc.) and go to: [http://localhost/phpmyadmin](http://localhost/phpmyadmin)
2. In the left sidebar of phpMyAdmin, click **New** to create a database.
3. Name the database exactly **`krishidisha`** (all lowercase) and click **Create**.
4. With the `krishidisha` database selected, click on the **Import** tab at the top.
5. Click **Choose File** and locate the `krishidisha.sql` file from inside your project folder (`C:\xampp\htdocs\KrishiDisha\database\krishidisha.sql`).
6. Scroll down to the bottom and click the **Import** (or Go) button.
   *(Wait a few seconds for the success message saying all queries were executed successfully).*

### Step 5: Run the Project!
1. Open a new tab in your web browser.
2. Go to: [http://localhost/KrishiDisha](http://localhost/KrishiDisha)
3. The project will now load! You can log in using any of the default accounts (for example, general user: `sadia@user.com` with password `password123`).

**Note on Code Setup:** The `config/db.php` file has been uniquely programmed to detect whether the project is running inside Docker or XAMPP, so you do not need to edit any code or passwords! It will connect automatically.
