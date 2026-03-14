<div align="center">

# 📦 MyShop: Advanced Inventory System
**Secure. Scalable. Pro-Level Architecture.**

[![Laravel 11](https://img.shields.io/badge/Laravel-11.x-FF2D20?style=for-the-badge&logo=laravel)](https://laravel.com)
[![Spatie Security](https://img.shields.io/badge/Security-Spatie_RBAC-blue?style=for-the-badge&logo=google-cloud)](https://spatie.be/docs/laravel-permission/)
[![PHP 8.2](https://img.shields.io/badge/PHP-8.2-777BB4?style=for-the-badge&logo=php)](https://php.net)

<p align="center">
    <a href="#-key-features">Key Features</a> 
    <a href="#-system-preview">System Preview</a> 
    <a href="#-tech-stack">Tech Stack</a> 
    <a href="#-installation">Installation</a>
</p>

</div>

---

## 📖 Introduction
**MyShop** sirf ek inventory module nahi hai, balki ek **Enterprise-ready Workflow** hai. Isme maine ek full-cycle product management system banaya hai jahan roles (Admin/User) decide karte hain ki kaunsa data kab live jayega.



---

## 📸 System Preview
*Visualizing the flow from Admin Dashboard to public User Site.*

<div align="center">
  <img src="./product.png" width="900" alt="Full Workflow" style="border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
</div>

---

## 🌟 Key Features

### 🛡️ 1. Granular Access Control (RBAC)
* **Role Management:** Spatie library ka use karke Admin aur User roles ko secure kiya gaya hai.
* **Permission Logic:** Frontend buttons (Edit/Delete) sirf authorized users ko hi dikhte hain (`@can` directive).

### ⚙️ 2. Smart Approval Workflow
* **Automation:** Admin dwara banaye gaye products turant `Approved` mark hote hain.
* **Moderation:** Normal user ke products `Pending` status mein jaate hain, jo Admin review ke baad hi live hote hain.

### 🚀 3. Optimized Performance
* **Yajra DataTables:** Server-side pagination aur search ka use kiya hai taaki heavy data par bhi site hang na ho.
* **Eager Loading:** Database par load kam karne ke liye Relationships ko optimize kiya hai.

---

## 🛠️ Tech Stack

| Type | Technology | Purpose |
| :--- | :--- | :--- |
| **Backend** | Laravel 11 | Core Framework & Logic |
| **Security** | Spatie | Role & Permission Management |
| **Database** | MySQL | Data Persistence |
| **Frontend** | Bootstrap 5 + AJAX | Responsive UI & Seamless Experience |
| **Tables** | Yajra DataTables | High-Performance Listings |

---

## ⚙️ Installation & Setup

1️⃣ **Clone the Repo:**
```bash
git clone [https://github.com/mathakiyataslim/Basic-Inventory-Module.git](https://github.com/mathakiyataslim/Basic-Inventory-Module.git)
cd Basic-Inventory-Module