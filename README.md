# 🎮 Edukids API

Edukids adalah API backend sederhana untuk game edukasi anak, dilengkapi dengan fitur:

-   Autentikasi pengguna (Register & Login)
-   Leaderboard untuk mencatat dan menampilkan skor
-   Progress tracker untuk memantau perkembangan belajar anak

---

## 🚀 Base URL

```
http://127.0.0.1:8000/api
```

Gunakan header `Authorization: Bearer <token>` untuk semua endpoint yang memerlukan login.

---

## 🔐 Authentication

### ✅ Register

**Endpoint:**

```
POST /register
```

**Request Body (JSON):**

```json
{
    "name": "Anak Pintar",
    "email": "anak@example.com",
    "password": "password123"
}
```

---

### 🔓 Login

**Endpoint:**

```
POST /login
```

**Request Body (JSON):**

```json
{
    "email": "anak@example.com",
    "password": "password123"
}
```

**Response:**

```json
{
    "token": "YOUR_ACCESS_TOKEN"
}
```

Gunakan token ini untuk endpoint lain dengan `Bearer` token di header.

---

## 🏆 Leaderboard

### 📝 Submit Score

**Endpoint:**

```
POST /score
```

**Headers:**

```
Authorization: Bearer <token>
```

**Request Body (JSON):**

```json
{
    "game_id": 3,
    "score": 1200
}
```

---

### 📊 Lihat Top 10 Leaderboard

**Endpoint:**

```
GET /leaderboard/{game_id}
```

**Contoh:**

```
GET /leaderboard/3
```

**Headers:**

```
Authorization: Bearer <token>
```

**Response:**

```json
[
  {
    "user": "Anak Pintar",
    "score": 1200
  },
  ...
]
```

---

## 📈 Progress Tracker

### 💾 Simpan Progress

**Endpoint:**

```
POST /progress
```

**Headers:**

```
Authorization: Bearer <token>
```

**Request Body (JSON):**

```json
{
    "game_id": 3,
    "level": 3,
    "completed_tasks": 12
}
```

---

### 📥 Lihat Progress Pengguna

**Endpoint:**

```
GET /progress
```

**Headers:**

```
Authorization: Bearer <token>
```

**Response:**

```json
[
    {
        "game_id": 3,
        "level": 3,
        "completed_tasks": 12,
        "updated_at": "2025-07-16T09:23:45.000000Z"
    }
]
```

---

## 📌 Catatan Teknis

-   Semua endpoint menggunakan JSON.
-   Pastikan menggunakan token dari login untuk autentikasi.
-   Jika ingin mencoba dengan Postman, export koleksi dan gunakan `Bearer Token`.

---

## 📦 Postman Collection

Gunakan file koleksi Postman ini untuk mencoba API:  
**[📥 Download Postman Collection (JSON)](https://drive.google.com/file/d/1_x-gADrgZE9h6XIHegyoZ5v4uPZaxOYI/view?usp=sharing)**

---

## 🧑‍💻 Author

**Gevano Kevin Ravensy**  
📧 kevin304.kv@gmail.com
