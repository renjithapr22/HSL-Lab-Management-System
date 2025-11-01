Created on : 29/10/2025
By : Renjitha P R

# 🧬 HSL LAB – Provider & Staff Management System

A Laravel-based application built for **HSL Labs**, enabling role-based access control for **Providers, Staff, and Patients** using **Spatie Laravel Permission**.


# 🧩 HSL LABS – Project Planning Document

## 🔍 Understanding of Project Scope
Develop a **user-friendly Laravel 10 dashboard** for **HSL Labs** that enables **Licensed Providers (plastic surgeons)** and their **staff** to manage their supplement business efficiently.  
The system will allow:
- Providers to order and manage inventory from HSL Labs.
- Staff to track patient treatments, subscriptions, and renewals.
- Real-time visibility into orders, payments, and stock levels.
- Role-based access for Admin (HSL Labs), Providers, Staff, and Patients.

The goal is a secure, scalable, and intuitive platform for operational management.

---

## 🧠 Assumptions
- Providers and staff are registered and approved by the Admin (HSL Labs).
- Patients are managed by Providers(authorized plastic surgeons); patients cannot directly order from HSL.
- The system uses **Spatie Laravel Permission** for role/permission control.
- Orders placed by providers automatically update inventory counts.
- Email notifications are required for key events (e.g., new order, low inventory, send upcoming suppliments time to patients etc).
- The application will initially support only one manufacturer (HSL Labs, Later we can add any number of manufactures, option is already provided).

---

## 🧱 Main Components / Modules
1. **Authentication & Roles**
   - Admin, Provider, Staff, and Patient access using Spatie Permissions.
2. **Provider Management**
   - Manage provider profiles, specialization, and contact details.
3. **Provider Staff**
   - Manage staff accounts linked to specific providers.
4. **Patients**
   - Maintain patient details, treatment records, and Suppliments subscriptions.
5. **Orders & Order Items**
   - Providers place wholesale orders; orders update inventory in real time, and update inventroy usage.
6. **Inventory Management**
   - Track available stock, usage, and replenishment.
7. **Subscriptions & Renewals**
   - Monitor patient supplement usage and renewal timelines.
8. **Reports & Dashboard**
   - View real-time data on sales, inventory, and billing.

---

## ❓ Key Questions to Ask the Company
1. Only one Manufature/Product for this system..?
2. Need any 2FA authentication needed(Twilio integration is needed or not)?
3. Is there an expected integration with external CRM or ERP systems?
4. How often should inventory sync with the manufacturer’s system (real-time or batch)?
5. Are notifications (email/SMS) required for low inventory or expiring subscriptions?
6. Should patients have read-only access to their orders/subscriptions? 
7. ARe we send a remainder for patients regarding upcoming order's through SMS or EMail
8. Will there be a reporting API or export functionality (CSV/PDF)?
9. What payment gateway is preferred (e.g., Razorpay, Stripe, PayPal)? 
10. Should Providers and provider Staff share the same login portal or separate interfaces?
---

## 🗓️ Milestone Timeline

| Week | Phase | Deliverables |
|------|--------|--------------|
| **Week 1** | **Planning & Setup** | Requirements finalization, environment setup, DB schema design |
| **Week 2** | **Authentication & Roles** | Implement login, roles (Admin/Provider/Staff), Spatie integration |
| **Week 3** | **Core Modules** | Providers, Staff, Patients CRUD; order & inventory management |
| **Week 4** | **Business Logic** | Order flow (place → update inventory → confirmation) |
| **Week 5** | **Reports & UI Polish** | Dashboard visuals, charts, summaries |
| **Week 6** | **Testing & Handover** | QA testing, seeders, README & deployment documentation |

---

## ✅ Outcome
A **fully functional, role-based Laravel 10 dashboard** for HSL Labs with complete CRUD operations, integrated ordering workflows, and real-time data management—ready for production deployment or client demonstration.
