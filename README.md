# PDPPN

A PHP and MySQL e-commerce project with separate interfaces for customers,
companies, and administrators. The repository also includes the project's thesis
materials, database export, and frontend assets.

## Features

- Customer registration, sign-in, profiles, product browsing, and orders.
- Company tools for managing products, orders, profiles, messages, and ratings.
- Administrator tools for managing users, companies, categories, sizes, colors,
  and contact messages.
- A frontend built with HTML, CSS, JavaScript, jQuery, and Bootstrap-based assets.

## Repository structure

| Directory | Contents |
| --- | --- |
| [`Perdoruesi/`](Perdoruesi/) | Customer-facing pages and account/order flows |
| [`Kompani/`](Kompani/) | Company and seller interface |
| [`Admin/`](Admin/) | Administration interface |
| [`images/`](images/) | Shared product, company, and interface images |
| [`Important Files/`](Important%20Files/) | SQL export, project documents, setup references, and upstream notices |

## Run locally

This is a legacy PHP project. Use a local Apache/PHP and MySQL/MariaDB environment
such as Laragon, XAMPP, or WAMP. An exact supported PHP version is not declared;
compatibility with your installed version needs to be checked.

1. Clone the repository into your local web server's document root:

   ```sh
   git clone https://github.com/UranikSejdiu/PDPPN.git
   ```

2. Create a local database named `pdppn` and import
   [`Important Files/pdppn.sql`](Important%20Files/pdppn.sql).
3. Configure the database connection in `Admin/config.php`, `Kompani/config.php`,
   and `Perdoruesi/config.php` for your own local database.
4. Open `http://localhost/PDPPN/Perdoruesi/` for the customer interface.
   The other interfaces are under `/PDPPN/Kompani/` and `/PDPPN/Admin/`.
5. Configure a local mail service if testing verification or password-reset mail.
   [`Important Files/readme.txt`](Important%20Files/readme.txt) contains the
   original setup references.

Use your own local credentials and test accounts. Included database exports and
server configuration examples are project materials, not production settings.
This repository does not claim a production-readiness or security audit.

## License and usage

The author's original work is **free for noncommercial use, learning,
modification, and free noncommercial sharing**. Selling it, using it in paid
products, or using it for paid client services requires prior written permission.
Keep author credit and all required notices.

Read the [full license](LICENSE.md), [usage guide](USAGE.md), and
[third-party notices](THIRD_PARTY_NOTICES.md). Templates, libraries, fonts, icons,
and artwork keep their own licenses.

## Author

[Uranik Sejdiu](https://github.com/UranikSejdiu). For questions or permission
requests, use this repository's issue tracker or the contact options on the
GitHub profile.
