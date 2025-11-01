Created on : 29/10/2025
By : Renjitha P R

# 🧬 HSL LAB – Provider & Staff Management System

A Laravel-based application built for **HSL Labs**, enabling role-based access control for **Providers, Staff, and Patients** using **Spatie Laravel Permission**.


# 🏗️ HSL LABS – System Architecture

## 🧠 Entity Relationship Diagram (ERD)

The Entity Relationship Diagram (ERD) visually represents how data is structured and related within the HSL Labs system.
It defines the main entities — such as Manufacturers, Providers, Patients, Orders, Inventory, and Subscriptions — and shows how they connect through relationships (one-to-many or many-to-one).
The ERD helps developers and stakeholders understand the database design at a glance, ensuring data consistency, reducing redundancy, and providing a clear foundation for building and maintaining the application.

┌──────────────────────────┐
│ Manufacturer (HSL LAB)  |
│──────────────────────────│ 
│ id (PK) │
│ name │ 
│ created_at │  
│ updated_at │  
└──────────────────────────┘ 
│ 1
│
│ has many
▼
┌──────────────────────────┐
│ Provider (Doctors) │
│──────────────────────────│
│ id (PK) │
│ manufacturer_id (FK) │
│ created_at, updated_at │
│ name, email, phone │
│ created_at │  
│ updated_at │  
└──────────────────────────┘
│ 1
│
│ has many
▼
┌──────────────────────────┐
│ Provider Staff (Nurses/other staff) │
│──────────────────────────│
│ id (PK) │
│ provider_id (FK) │
│ role (FK) │
│ name, email, phone │
│ created_at │  
│ updated_at │  
└──────────────────────────┘
│
│ manages
▼
┌──────────────────────────┐
│ Patient │
│──────────────────────────│
│ id (PK) │
│ provider_id (FK) │
│ name, email, dob │
│ surgical_date, prescription │
│ subscription, duration │
│ created_at │  
│ updated_at │  
└──────────────────────────┘
│
│ places
▼
┌──────────────────────────┐
│ Order │
│──────────────────────────│
│ id (PK) │
│ provider_id (FK) │
│ order_date, total │
│ status,ordernumber │
│ created_at │  
│ updated_at │  
└──────────────────────────┘
│
│ has many
▼
┌──────────────────────────┐
│ Order Item │
│──────────────────────────│
│ id (PK) │
│ order_id (FK) │
│ product_id, qty │
│ price,total │
│ created_at │  
│ updated_at │  
└──────────────────────────┘
│
│ updates
▼
┌──────────────────────────┐
│ Inventory │
│──────────────────────────│
│ id (PK) │
│ product_id (FK) │
│ transaction_type, quantity │
│ created_at │  
│ updated_at │  
└──────────────────────────┘
│
│ updates
▼
┌──────────────────────────┐
│ Inventory_Usage │
│──────────────────────────│
│ id (PK) │
│ product_id (FK) │
│ order_id, quantity │
│ ,transaction_type, 
│ created_at │  
│ updated_at │  
└──────────────────────────┘
│
│ linked to
▼
┌──────────────────────────┐
│ Subscription │
│──────────────────────────│
│ id (PK) │
│ patient_id (FK) │
| plan_name
│ start_date, end_date │
│ renewal_status │
│ created_at │  
│ updated_at │  
└──────────────────────────┘




---

## 🧩 High-Level System Explanation

The **HSL Labs System** is built around the core relationship between **Manufacturers**, **Providers**, **Staff**, and **Patients**.  

At the top level, **HSL Labs** (the manufacturer) supplies supplement products to **Licensed Providers** (plastic surgeons).  
Each provider can register **Staff Members**, who assist in managing **Patients** and operational workflows.

When a **Provider** places a wholesale **Order**, the system creates related **Order Items** that reference specific products.  
Upon successful order creation, the **Inventory** table updates automatically to reflect available stock.  

Each **Patient** is linked to their provider and may have one or more **Subscriptions**, representing supplement usage and renewal cycles.  

The **Subscription** module tracks product delivery timelines and ensures patients stay on their prescribed supplement plan.  

All entities are connected through clear one-to-many or many-to-one relationships, ensuring data integrity and traceability. 

This structure enables real-time insights into product flow, patient engagement, and provider-level performance across the entire HSL Labs ecosystem.

---

## 🧩 Relationship Summary

| From Entity         | Relationship Type | To Entity         | Description |
|----------------------|------------------|-------------------|--------------|
| Manufacturer         | 1 → many         | Providers         | HSL Labs supplies products to providers |
| Provider             | 1 → many         | Provider Staff    | Providers have staff members |
| Provider             | 1 → many         | Patients          | Each provider manages multiple patients |
| Provider             | 1 → many         | Orders            | Providers place multiple wholesale orders |
| Order                | 1 → many         | Order Items       | Each order has multiple items |
| Order Item           | many → 1         | Inventory         | Each item updates inventory |
| Patient              | 1 → many         | Subscriptions     | Patients have multiple supplement subscriptions |

---

## 🧩 Technologies & Architecture Overview

- **Framework**: Laravel 10 (MVC structure)
- **Database**: MySQL (Eloquent ORM)
- **Auth & Roles**: Laravel Breeze + Spatie Laravel Permission
- **UI Layer**: Laravel Blade / Breeze / Spatie / Livewire
- **Key Focus**: Role-based access, modular CRUDs, transactional consistency
- **Deployment Ready**: Supports local (XAMPP) and cloud environments


