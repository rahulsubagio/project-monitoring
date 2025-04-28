# Project Monitoring System

Project monitoring system adalah sistem informasi sederhana untuk memantau dan mengelola data project.
Dibangun menggunakan:

- **Backend:** Laravel 12
- **Frontend:** Tailwind CSS
- **Database:** MySQL

---

## ✨ Fitur Utama

- CRUD (Create, Read, Update, Delete) Project
- Upload Photo Project Leader
- Search Project berdasarkan Nama, Client, atau Project Leader
- Filter Project berdasarkan Status Progress
- Sortir Project berdasarkan Tanggal Mulai
- Pagination untuk menavigasi project dengan rapi
- Tampilan Responsive menggunakan Tailwind CSS

---

## 💂 Struktur Database (Tabel projects)

| Field           | Tipe        | Keterangan                    |
|-----------------|-------------|--------------------------------|
| id              | BigIncrements | Primary Key                  |
| project_name    | String      | Nama Project                  |
| client          | String      | Nama Client                   |
| project_leader  | String      | Nama Project Leader           |
| leader_email    | String      | Email Project Leader          |
| leader_photo    | String (nullable) | Path Foto Project Leader |
| start_date      | Date        | Tanggal Mulai                 |
| end_date        | Date        | Tanggal Selesai               |
| progress        | Integer     | Progress (%)                  |
| created_at      | Timestamp   | Otomatis Laravel              |
| updated_at      | Timestamp   | Otomatis Laravel              |

---

## 📄 Dokumentasi Fitur

- CRUD Project:
  - Tambah Project baru
    ![dashboard](/public/storage/photos/image.png)
    ![alt text](/public/storage/photos/create-project.png)
  - Edit dan Update Project
