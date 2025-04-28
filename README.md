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
    ![create project](/Documentation/create-project.png)
    ![dashboard](/Documentation/dashboard.png)

  - Edit dan Update Project
    ![edit project](/Documentation/edit.png)

  - Hapus Project
    ![edit project](/Documentation/delete.png)

- Upload Photo:
  - Bisa upload foto profil Project Leader
  - Foto akan tampil bulat di tabel Project Monitoring
    ![edit project](/Documentation/upload.png)

- Search, Filter, Sort:
  - Cari project berdasarkan kata kunci
    ![edit project](/Documentation/search.png)
  - Filter project berdasarkan status progress
    ![edit project](/Documentation/filter.png)
  - Urutkan project berdasarkan tanggal mulai (baru atau lama)
    ![edit project](/Documentation/sorting.png)

- Pagination:
  - Data project dipaginasi agar rapi
    ![edit project](/Documentation/page.png)

---

