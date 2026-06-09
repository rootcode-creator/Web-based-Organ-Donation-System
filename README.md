<p align="center">
  <img src="./Image/organ.svg" alt="Organ donation icon" width="96" height="96" />
</p>

<h1 align="center">web-based-organ-donation-system</h1>

<p align="center"><i>Role-based organ donation workflow app powered by PHP, MySQL, Bootstrap, and jQuery.</i></p>

<p align="center">
  <img src="https://img.shields.io/badge/VERSION-1.0.0-E11D48?style=for-the-badge&logo=semanticrelease&logoColor=white&labelColor=7F1D1D" alt="Version 1.0.0" />
  <img src="https://img.shields.io/badge/LICENSE-MIT-84CC16?style=for-the-badge&logo=opensourceinitiative&logoColor=white&labelColor=14532D" alt="MIT License" />
  <img src="https://img.shields.io/badge/TYPE-ORGAN%20DONATION-8B5CF6?style=for-the-badge&labelColor=4C1D95" alt="Organ donation app" />
</p>

<p align="center">
  <img src="https://img.shields.io/badge/PHP-7.4+-14B8A6?style=for-the-badge&logo=php&logoColor=white&labelColor=0F766E" alt="PHP" />
  <img src="https://img.shields.io/badge/MYSQL-DATABASE-06B6D4?style=for-the-badge&logo=mysql&logoColor=white&labelColor=155E75" alt="MySQL" />
  <img src="https://img.shields.io/badge/BOOTSTRAP-UI-3B82F6?style=for-the-badge&logo=bootstrap&logoColor=white&labelColor=1E3A8A" alt="Bootstrap" />
  <img src="https://img.shields.io/badge/JQUERY-FRONTEND-6366F1?style=for-the-badge&logo=jquery&logoColor=white&labelColor=4338CA" alt="jQuery" />
  <img src="https://img.shields.io/badge/APACHE-SERVER-0EA5E9?style=for-the-badge&logo=apache&logoColor=white&labelColor=1E40AF" alt="Apache" />
</p>

<p align="center">
  <a href="#-project-intro"><img src="https://img.shields.io/badge/EXPLORE-PROJECT%20INTRO-6366F1?style=for-the-badge&logo=gitbook&logoColor=white&labelColor=4F46E5" alt="Project intro" /></a>
  <a href="#-install-methods"><img src="https://img.shields.io/badge/SETUP-INSTALL%20GUIDE-14B8A6?style=for-the-badge&logo=readme&logoColor=white&labelColor=0F766E" alt="Install guide" /></a>
  <a href="#-entry-points"><img src="https://img.shields.io/badge/OPEN-ENTRY%20POINTS-A855F7?style=for-the-badge&logo=files&logoColor=white&labelColor=7E22CE" alt="Entry points" /></a>
</p>

## web-based-organ-donation-system — README

Role-based PHP/MySQL web application for organ request management, doctor review, admin approval workflow, and prescription-to-medicine fulfillment.

## Table of Contents

- [🚀 Project intro](#-project-intro)
- [📁 Project structure](#-project-structure)
- [⭐ Differentiators](#-differentiators)
- [🔧 Features](#-features)
  - [🧭 Flow diagrams](#-flow-diagrams)
- [🧰 Tech stack](#-tech-stack)
- [⚙️ Install methods](#-install-methods)
  - [📦 XAMPP / WAMP / LAMP (Apache + PHP + MySQL)](#-xampp--wamp--lamp-apache--php--mysql)
- [🔐 Configuration](#-configuration)
- [🗄️ Database structure](#-database-structure)
- [📜 Entry points](#-entry-points)
- [🚀 Deployment notes](#-deployment-notes)
- [🤝 Contributing](#-contributing)
- [📄 License](#-license)

## 🚀 Project intro

`web-based-organ-donation-system` is a multi-role healthcare workflow app with:

- User registration/login and organ application submission
- Admin review, doctor assignment, and final approve/reject actions
- Doctor recommendation and prescription generation
- Pharmacist medicine inventory and order processing
- End-to-end medicine ordering and delivery status tracking

It is designed as an academic/project-friendly foundation for organ donation and associated treatment operations.

## 📁 Project structure

```txt
Web-based-Organ-Donation-System/
├── index.html
├── style.css
├── README.md
├── LICENSE
├── Image/
├── admins/
│   ├── dashboard.php
│   ├── adminsignin.php / adminsignup.php
│   ├── accept.php / doctorassign.php / assign.php
│   ├── addpharmacy.php
│   ├── userdelete.php / doctordelete.php / applicationdelete.php
│   ├── inc/
│   │   ├── config.php
│   │   └── head.php
│   ├── css/ js/ images/ fonts/
│   └── ...
├── users/
│   ├── dashboard.php
│   ├── signin.php / signup.php
│   ├── organ.php
│   ├── ordermedicine.php / ordermedicinepannel.php
│   ├── usercomment.php / userpriceacceptreject.php
│   ├── css/ images/ fonts/
│   └── ...
├── doctors/
│   ├── doctorshomepage.php
│   ├── doctorsignin.php / doctorsignup.php
│   ├── accept.php
│   ├── prescription.php
│   ├── inc/
│   │   ├── config.php
│   │   └── head.php
│   ├── css/ js/ images/ fonts/
│   └── ...
└── pharmacist/
    ├── dashboard.php
    ├── pharmacistsignin.php / pharmacistsignup.php
    ├── addmedicine.php / medicinedetailsupdate.php
    ├── priceupdate.php / deliverystatuschange.php
    ├── inc/
    │   ├── config.php
    │   └── head.php
    ├── css/ js/ images/
    └── ...
```

## ⭐ Differentiators

- Full role separation (`Admin`, `User`, `Doctor`, `Pharmacist`) with dedicated dashboards
- Practical workflow from organ request → doctor recommendation → admin decision
- Integrated post-approval prescription and pharmacy order lifecycle
- Bootstrap-based UI with modal-driven dashboard operations

## 🔧 Features

### Core features

| Feature | Status | Notes |
| --- | --- | --- |
| User authentication | ✅ Current | Signup/signin/logout for users |
| Admin authentication | ✅ Current | Admin account management and dashboard access |
| Doctor authentication | ✅ Current | Doctor signup/signin and assigned application view |
| Pharmacist authentication | ✅ Current | Pharmacist signup/signin and medicine/order handling |
| Organ application | ✅ Current | Users submit organ requests with date/reason |
| Doctor assignment | ✅ Current | Admin assigns doctors to pending applications |
| Application decision | ✅ Current | Admin approves/rejects applications |
| Recommendation flow | ✅ Current | Doctors write recommendation/decision for assigned cases |
| Prescription flow | ✅ Current | Doctors create prescriptions for approved cases |
| Medicine order flow | ✅ Current | Users place orders from prescriptions |
| Pharmacy operations | ✅ Current | Stock updates, pricing, comments, delivery updates |

### 🧭 Flow diagrams

#### 1) End-to-end application journey

```mermaid
flowchart TD
  A[Visitor] --> B[Landing page]
  B --> C{Has account?}
  C -- No --> D[Register]
  D --> E[Login]
  C -- Yes --> E
  E --> F[User dashboard]
  F --> G[Submit organ request]
  G --> H[Admin reviews request]
  H --> I{Doctor assigned?}
  I -- No --> H
  I -- Yes --> J[Doctor reviews case]
  J --> K[Admin approve or reject]
  K -- Reject --> L[Notify user]
  K -- Approve --> M[Create prescription]
  M --> N[User places medicine order]
  N --> O[Pharmacist processes order]
  O --> P[Update delivery status]
  P --> L
```

#### 2) User request flow

```mermaid
flowchart TD
  A[User signs in] --> B[Open organ request form]
  B --> C[Fill personal and request details]
  C --> D[Submit request]
  D --> E[Track application status]
  E --> F{Approved?}
  F -- No --> G[Wait for admin or doctor action]
  F -- Yes --> H[View prescription]
  H --> I[Order required medicine]
  I --> J[Track delivery]
```

#### 3) Admin, doctor, and pharmacy workflow

```mermaid
flowchart TD
  A[Admin dashboard] --> B[View pending applications]
  B --> C[Assign doctor]
  C --> D[Doctor accepts case]
  D --> E[Doctor adds recommendation]
  E --> F{Admin decision}
  F -- Reject --> G[Delete or close application]
  F -- Approve --> H[Generate prescription]
  H --> I[Pharmacist updates stock and price]
  I --> J[Process medicine order]
  J --> K[Update delivery status]
  K --> L[User receives completion notice]
```

#### 4) Route access control flow

```mermaid
flowchart TD
  A[Request enters app] --> B{Authenticated?}
  B -- No --> C[Send to public pages]
  B -- Yes --> D{Role}
  D -- User --> E[/users/* routes/]
  D -- Doctor --> F[/doctors/* routes/]
  D -- Admin --> G[/admins/* routes/]
  D -- Pharmacist --> H[/pharmacist/* routes/]
  E --> I[User dashboard and organ flow]
  F --> J[Doctor assignment and prescription flow]
  G --> K[Admin moderation and assignment flow]
  H --> L[Inventory and delivery flow]
```

### Route protection behavior

- Public entry: `/index.html`
- Admin routes: `/admins/*` (requires admin session)
- User routes: `/users/*` (requires user session)
- Doctor routes: `/doctors/*` (requires doctor session)
- Pharmacist routes: `/pharmacist/*` (requires pharmacist session)

## 🧰 Tech stack

- **Backend:** PHP (procedural style with mysqli)
- **Database:** MySQL / MariaDB
- **Frontend:** HTML, CSS, Bootstrap, JavaScript, jQuery
- **Hosting target:** Apache + PHP runtime (XAMPP/WAMP/LAMP compatible)

## ⚙️ Install methods

### 📦 XAMPP / WAMP / LAMP (Apache + PHP + MySQL)

Prerequisites:

- PHP 7.4+ (or newer)
- MySQL/MariaDB
- Apache web server

```bash
git clone https://github.com/rootcode-creator/Web-based-Organ-Donation-System.git
cd Web-based-Organ-Donation-System
```

1) Copy project into your web root (`htdocs` / `www`).

2) Create/import the MySQL database schema used by this project.

3) Configure database connection in each role config file:

- `admins/inc/config.php`
- `doctors/inc/config.php`
- `pharmacist/inc/config.php`

4) Start Apache + MySQL.

5) Open `http://localhost/Web-based-Organ-Donation-System/`.

## 🔐 Configuration

This project does not use `.env` by default. It uses direct DB config in PHP files:

```php
$host = "localhost";
$dbUsername = "your_db_user";
$dbPassword = "your_db_password";
$dbName = "your_db_name";
```

Notes:

- Keep all role config files synchronized.
- Never commit real production credentials.
- Rotate any exposed credentials before deployment.

## 🗄️ Database structure

Main tables used in codebase:

- `users`
- `admins`
- `doctors`
- `pharmacist`
- `pharmacy`
- `organ`
- `prescription`
- `ordermedicine`
- `stockmedicine`

Typical workflow:

- `users` submit to `organ`
- `admins` assign doctor (`organ.doctor_info`) and set application status
- `doctors` write recommendations and insert into `prescription`
- `users` place orders into `ordermedicine`
- `pharmacist` updates `stockmedicine`, pricing, comments, and delivery status

## 📜 Entry points

- Landing page: `index.html`
- Admin login: `admins/adminsignin.html`
- User login: `users/signin.html`
- Doctor login: `doctors/doctorsignin.html`
- Pharmacist login: `pharmacist/pharmacistsignin.html`

## 🚀 Deployment notes

- Ensure all module-level `config.php` files point to the same database.
- Use HTTPS and secure session settings in production.
- Add server-side validation/sanitization hardening before public deployment.
- Move credentials from source files to environment variables for safer operations.

## 🤝 Contributing

- Fork the repository and create a focused feature branch.
- Keep pull requests scoped and include verification steps.
- Never commit credentials, secrets, or production config.

## 📄 License

This project is licensed under the MIT License. See the `LICENSE` file for details.