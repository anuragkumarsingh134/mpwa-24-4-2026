# MPWA — Multi-Platform WhatsApp Gateway

**Version 11.5.6** | Built on Laravel 12 + Node.js + Baileys

MPWA is a powerful, self-hosted WhatsApp gateway that allows you to connect multiple WhatsApp accounts, send messages via API, automate replies with AI, run bulk campaigns, and manage everything from a beautiful admin panel.

---

## ✨ Features

### 📱 Multi-Device WhatsApp
- Connect **multiple WhatsApp accounts** simultaneously
- QR code scanning or pairing code connection
- Real-time device status via Socket.IO
- Automatic reconnection on disconnect
- Per-device webhook configuration (incoming, read receipts, typing, etc.)

### 💬 Messaging
- **Text messages** — Plain text with variable support
- **Media messages** — Images, videos, documents, audio
- **Stickers** — Send WebP stickers
- **Buttons** — Interactive button messages
- **List messages** — Scrollable list menus
- **Polls** — Create and send polls
- **Location** — Share GPS coordinates
- **vCards** — Send contact cards
- **Product messages** — WhatsApp catalog integration
- **Channel messages** — Post to WhatsApp channels

### 🤖 AI Chatbot
- **ChatGPT** (OpenAI) integration
- **Google Gemini** integration
- **Claude** (Anthropic) integration
- **DALL·E** image generation
- **Bexa AI** support
- Per-device AI toggle — enable/disable per WhatsApp account

### 🔁 Auto-Reply
- Keyword-based automatic responses
- Support for text, media, button, list, and location replies
- Customizable match patterns
- Per-device auto-reply rules

### 📢 Campaigns & Bulk Messaging
- Create bulk messaging campaigns
- Import contacts from phonebook groups
- Message scheduling with configurable delays
- Pause/resume campaigns
- Campaign analytics and blast history
- Support for all message types in campaigns

### 📇 Contact Management (Phonebook)
- Create contact groups (tags)
- Import contacts from Excel/CSV
- Export contacts
- Fetch WhatsApp groups as contact lists
- Bulk contact operations

### 🔌 REST API
- Full-featured API with API key authentication
- **Endpoints:**
  - `POST /api/send-message` — Send text messages
  - `POST /api/send-media` — Send media (image, video, document, audio)
  - `POST /api/send-sticker` — Send stickers
  - `POST /api/send-button` — Send button messages
  - `POST /api/send-list` — Send list messages
  - `POST /api/send-poll` — Send polls
  - `POST /api/send-location` — Send location
  - `POST /api/send-vcard` — Send contact cards
  - `POST /api/send-product` — Send product messages
  - `POST /api/send-text-channel` — Send to WhatsApp channels
  - `POST /api/check-number` — Validate WhatsApp number
  - `POST /api/create-user` — Create user programmatically
  - `GET /api/info-user` — Get user info
  - `GET /api/info-devices` — List connected devices
  - `GET /api/generate-qr` — Generate QR code
  - `POST /api/logout-device` — Logout device
  - `POST /api/delete-device` — Delete device
- Built-in API documentation page
- Per-user API keys

### 💬 Live Chat
- Real-time WhatsApp chat interface
- View and reply to conversations
- Chat session management
- Custom session naming

### 📊 Dashboard
- Message statistics and analytics
- Device overview
- System resource monitoring (CPU, RAM, disk)
- Quick access to all features

### 👥 User Management (Admin)
- Multi-user support with role-based access
- Create, edit, delete users
- "Login as user" functionality for admins
- Per-user permissions (auto-reply, campaigns, chat, API, etc.)

### 💳 Plans & Payments
- Create subscription plans with limits (devices, messages, contacts)
- Trial plans with configurable limits
- **Payment gateways:**
  - Stripe
  - PayPal
  - Midtrans
  - Paymob
  - Bank transfer (manual)
- Order management for admins

### 🔐 Security
- Two-Factor Authentication (2FA) with Google Authenticator
- Laravel Sanctum API authentication
- Rate-limited login (5 attempts per minute)
- Password reset via email
- Session management

### 🎨 Themes & Customization
- Vuexy admin theme included
- Theme management — install, switch, and delete themes
- Customizable landing page (colors, content, features)
- Multi-language support with translation management
- RTL language support

### 🛠️ Admin Tools
- **Settings** — Server configuration, environment management, SSL generation
- **Troubleshoot** — System diagnostics with report upload
- **Updates** — In-app update system
- **File Manager** — Server-side file browser
- **Notifications** — Send notifications to users
- **Ticket System** — User support tickets with admin replies
- **Cron Jobs** — Scheduled task management
- **Message History** — Full message logs with resend capability

### 📋 Additional Features
- Webhook support for incoming messages, read receipts, typing indicators
- Message delay configuration per device
- Configurable CORS and origin settings
- Localization with 20+ language support
- Install wizard for first-time setup
- Responsive mobile-friendly UI

---

## 🏗️ Tech Stack

| Component | Technology |
|-----------|-----------|
| **Frontend** | Laravel 12 Blade + Vuexy Theme |
| **Backend API** | Node.js + Express 5 + Socket.IO |
| **WhatsApp Engine** | @onexgen/baileys v6.7 |
| **Database** | MySQL (via mysql2) |
| **PHP Framework** | Laravel 12 (PHP 8.2+) |
| **Process Manager** | PM2 (production) |
| **Authentication** | Laravel Sanctum + API Keys |
| **AI Integration** | OpenAI, Google Gemini, Anthropic Claude |
| **Image Processing** | Sharp, Jimp |
| **Payments** | Stripe, PayPal, Midtrans, Paymob |

---

## 📋 Requirements

| Requirement | Version |
|-------------|---------|
| **Node.js** | 20+ LTS |
| **PHP** | 8.2+ |
| **MySQL** | 5.7+ / MariaDB 10.4+ |
| **Composer** | 2.x |
| **npm** | 9+ |

### Required PHP Extensions

`mbstring`, `xml`, `bcmath`, `curl`, `zip`, `intl`, `gd`, `mysql`, `tokenizer`

---

## 🚀 Quick Start (Local Development)

### 1. Clone the repository

```bash
git clone https://github.com/anuragkumarsingh134/mpwa-24-4-2026.git
cd mpwa-24-4-2026
```

### 2. Install dependencies

```bash
npm install
composer install
```

### 3. Apply Baileys patch

```bash
cp validate-connection.js node_modules/@onexgen/baileys/lib/Utils/
cp validate-connection.d.ts node_modules/@onexgen/baileys/lib/Utils/
```

### 4. Create MySQL database and user

```sql
CREATE DATABASE mpwa CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER 'mpwa_user'@'localhost' IDENTIFIED BY 'YourStrongPassword123!';
GRANT ALL PRIVILEGES ON mpwa.* TO 'mpwa_user'@'localhost';
FLUSH PRIVILEGES;
```

> **Note:** Change the password to something secure. Remember these credentials — you'll enter them in the install wizard. Don't run any migrations manually — the wizard handles everything.

### 5. Start the servers

```bash
# Terminal 1 — Node.js WhatsApp server
node server.js

# Terminal 2 — Laravel dev server (use 0.0.0.0 to allow network access)
php artisan serve --host=0.0.0.0
```

### 6. Complete the Install Wizard

Open your browser and go to `http://<CONTAINER-IP>:8000`

> **Tip:** Find your container's IP with `hostname -I` or `ip addr`. Since the app runs inside a Proxmox Ubuntu container, you access it from your Windows browser using the container's IP address, not `localhost`.

The 5-step install wizard will automatically:
1. **Check requirements** (PHP version, extensions)
2. **Validate license**
3. **Configure database** — enter your DB host, name, username, password (runs migrations & seeding automatically)
4. **Create admin account** — set your admin username, email, password
5. **Configure server** — set Node.js port and server type

> The wizard writes all settings to `.env`, runs `migrate:fresh` + `db:seed`, creates the admin user, and logs you in — no manual commands needed!

---

## 🌐 Production Deployment

See [DEPLOYMENT.md](DEPLOYMENT.md) for a complete step-by-step guide to deploy on:
- **Proxmox Ubuntu LXC** container
- **Nginx** reverse proxy with PHP-FPM
- **PM2** process management
- **Let's Encrypt** SSL certificate
- **Firewall** and security hardening

---

## 📁 Project Structure

```
mpwa-24-4-2026/
├── app/                    # Laravel application (Controllers, Models, Middleware)
│   ├── Http/Controllers/   # PHP controllers (Admin, API, Auth, Payments...)
│   └── Http/Middleware/     # Auth, 2FA, API key, install check middleware
├── config/                 # Laravel configuration files
├── database/               # Migrations, seeders, factories
├── validate-connection.js   # Baileys patch file (REQUIRED)
├── validate-connection.d.ts # Baileys patch type definitions
├── public/                 # Public assets (CSS, JS, images, themes)
├── resources/              # Blade views, themes, translations
│   └── themes/vuexy/       # Vuexy admin theme
├── routes/                 # Laravel route definitions
│   ├── web.php             # Web routes (UI, admin, auth)
│   ├── api.php             # REST API routes
│   └── custom-route.php    # Custom/extended routes
├── server/                 # Node.js WhatsApp server
│   ├── controllers/        # Message processing, incoming messages
│   ├── database/           # MySQL connection pool
│   ├── lib/                # Utilities, middleware, caching
│   ├── router/             # Express routes for backend
│   ├── chat.js             # Real-time chat handler
│   └── whatsapp.js         # Baileys WhatsApp connection manager
├── storage/                # Logs, cache, sessions, uploads
├── server.js               # Node.js entry point
├── composer.json            # PHP dependencies
├── package.json             # Node.js dependencies
└── .env.example             # Environment template
```

---

## 🔑 API Authentication

All API endpoints require an `Authorization` header with your API key:

```bash
curl -X POST https://yourdomain.com/api/send-message \
  -H "Authorization: your-api-key-here" \
  -H "Content-Type: application/json" \
  -d '{
    "sender": "6281234567890",
    "number": "6289876543210",
    "message": "Hello from MPWA!"
  }'
```

Your API key can be found in **User Settings** → **API Key**.

---

## 📜 License

CC BY-NC-ND 4.0 — Copyright © Magd Almuntaser, OneXGen Technology.

---

## 🙏 Credits

- **[OneXGen](https://www.onexgen.com)** — Original developer (Magd Almuntaser)
- **[Baileys](https://github.com/WhiskeySockets/Baileys)** — WhatsApp Web API library
- **[Laravel](https://laravel.com)** — PHP framework
- **[Vuexy](https://pixinvent.com/vuexy)** — Admin theme
