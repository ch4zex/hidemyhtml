# HideMyHTML

A lightweight, drop-in PHP script to protect any static HTML file behind a beautiful, [Catppuccin](https://github.com/catppuccin/catppuccin)-themed login screen. 

Perfect for sharing private documents, personal dashboards, or small projects without the need to set up a full database or a complex authentication system.

## Features

*   **Simple Setup:** The main logic and UI are bundled in one `index.php` file.
*   **Beautiful UI:** Features a sleek, responsive login box styled with the Catppuccin Mocha color palette.
*   **Session-based:** Uses native PHP sessions to keep you authenticated.
*   **Logout Functionality:** Easily lock the system again using a simple URL parameter.

## Installation & Configuration

1.  **Upload the files:** Place `index.php` and `.htaccess` into your web server's public directory (e.g., `htdocs` or `/var/www/html`).
2.  **Set your password:**
    Open `index.php` and change the default password at the top of the file:
    ```php
    $passwort = "YourPassword";
    ```
3.  **Include your HTML file:**
    At the very bottom of `index.php`, change `yourfile.html` to the name of the static HTML file you want to protect:
    ```php
    include('yourfile.html');
    ```
4.  **Protect your HTML file from direct access:**
    To prevent users from bypassing the login by navigating directly to `yourwebsite.com/yourfile.html`, open the `.htaccess` file and make sure the filename matches your protected file:
    ```apache
    <Files "yourfile.html">
        Require all denied
    </Files>
    ```

## Logout

If you want to add a logout button to your protected HTML file, simply link back to the index file with the `logout` parameter:

```html
<a href="index.php?logout=1">Lock System</a>
```

## Requirements

*   A web server running **PHP** (tested on PHP 7+ / 8+).
*   **Apache** (or a server that supports `.htaccess` overrides) to successfully block direct file access.

## Disclaimer

This is a simple script meant for basic privacy and personal use. It hardcodes the password in plain text within the PHP file. While effective for everyday personal protection, it is **not** intended for enterprise-level security or highly sensitive data.

## License

This project is open-source and available under the MIT License. Feel free to modify and use it for your own projects!
