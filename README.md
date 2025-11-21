TinyLink SaaS — Open Source URL Shortener (Laravel 12)

TinyLink is a clean, minimal, open-source SaaS-style URL shortener built with Laravel 12, featuring custom short codes, click tracking, QR code generation, and a simple dashboard interface.

This project is perfect for:

learning how to structure a SaaS in Laravel

building an open-source micro-SaaS

self-hosting a lightweight URL shortener

extending into a paid SaaS later

🚀 Features

🔗 Shorten long URLs

✏️ Custom short codes

📊 Click analytics (simple counter)

🧾 Link expiration (optional)

🎛 Enable/disable links

📱 Automatic QR code generation

🧑‍💼 User authentication (Laravel Breeze)

📦 Clean, extendable SaaS-style codebase

🎨 Blade + Tailwind UI

📁 Project Structure

Your Laravel app is inside the src folder:

project-root/
│
├── README.md
└── src/
    ├── app/
    ├── bootstrap/
    ├── config/
    ├── public/
    ├── resources/
    ├── routes/
    ├── vendor/
    └── ...


This allows the repository root to stay clean while keeping Laravel contained inside src/ — perfect for open-source hosting.

🛠️ Tech Stack

Laravel 12

PHP 8.2+

MySQL / MariaDB or PostgreSQL

TailwindCSS (via Laravel Breeze)

Simple QrCode Package

⚙️ Installation

Clone the repository:

git clone https://github.com/YOUR_USERNAME/tinylink-saas.git
cd tinylink-saas/src


Install PHP dependencies:

composer install


Install JavaScript dependencies:

npm install && npm run build


Copy .env:

cp .env.example .env


Generate app key:

php artisan key:generate


Run migrations:

php artisan migrate


Start local development server:

php artisan serve

🧩 Environment Variables

Important ENV settings:

APP_NAME="TinyLink"
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tinylink
DB_USERNAME=root
DB_PASSWORD=

# Breeze mail
MAIL_MAILER=log

🔗 Short Link Redirects

Short links follow this format:

/r/{code}


Example:

https://yourdomain.com/r/xYz123

🎨 UI Pages Included
Page	Path	Description
Login / Register	/login, /register	Breeze auth
Dashboard	/dashboard	Analytics summary
All Links	/links	View, edit, delete links
Create Link	/links/create	Generate short URLs
Edit Link	/links/{id}/edit	Update settings
QR Code	/links/{id}/qr	View QR
🧪 Example API Flow

Creating a link (web form):

URL: /links/create

Validate → generate code → save → redirect

Clicking a short link:

URL: /r/{code}

Lookup → check active/expired → increment counter → redirect

🎯 Roadmap

Planned enhancements:

📊 Click analytics chart (daily breakdown)

🧭 UTM parameter support

🔐 Private/public links

🪄 AI-powered URL summaries

👥 Team accounts (multi-user orgs)

💳 SaaS billing version (Stripe)

🌙 Dark mode

🔌 REST API (public endpoints)

🤝 Contributing

Contributions are welcome!
Open a PR or create an issue if you’d like to improve or extend the project.

📜 License

This project is open-source under the MIT License.

⭐ Support

If you like the project, star the repo ❤️
It helps other developers discover it!