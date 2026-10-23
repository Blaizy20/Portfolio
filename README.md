# Modern PHP Static Portfolio Website

A clean, high-performance, modular PHP static portfolio template built with vanilla CSS (Glassmorphism, Dark/Light modes) and modern responsive design.

---

## ⚡ Features

- **Zero Database Required**: Powered by clean PHP arrays in `data.php`. Edit your details, skills, and projects in one single file.
- **Modular Architecture**: Reusable components (`header.php`, `hero.php`, `about.php`, `skills.php`, `projects.php`, `experience.php`, `contact.php`, `footer.php`).
- **Aesthetic Excellence**:
  - Deep dark mode default with instant light mode switch (saved to `localStorage`).
  - Tactile Obsidian Carbon & Crisp White contrast in dark mode with clean, elevation-based depth.
  - Distinctive brand typography: `Cabinet Grotesk` (Display H1, Foundry: Indian Type Foundry - ITF), `Plus Jakarta Sans` (Headings, Foundry: Tokotype), native system-font stack for body, and `JetBrains Mono` (Code & Terminal, Foundry: JetBrains).
- **Interactive Capabilities**:
  - Category-based project filtering (All, Web App, E-Commerce, AI, Open Source).
  - Smooth anchor scrolling and active navigation indicators.
  - Animated skill progress indicators.
  - Mobile responsive sliding navigation menu.
- **Functional Contact Form**: Built-in PHP server-side input sanitization, email validation, and flash status alerts.
- **Self-Contained Vector Icons**: Inline SVG icon helper (`includes/icons.php`), fast, crisp on 4K/Retina displays, and works offline without third-party CDN dependencies.

---

## 📂 Project Directory Structure

```text
├── index.php             # Main entry point orchestrating all components
├── data.php              # Central data file (Profile, milestones, courses, projects, notes)
├── package.json          # Developer scripts (dev, lint, audit)
├── includes/
│   ├── icons.php         # Standalone SVG icon rendering helper
│   ├── header.php        # HTML head, meta tags, and mobile topbar
│   ├── sidebar.php       # Persistent desktop sidebar & mobile drawer navigation
│   ├── intro.php         # Student bio, milestones & interactive terminal console
│   ├── coursework.php    # Academic curricula, key takeaways & toolkit
│   ├── projects.php      # Project cards with interactive Overview & Retrospective tabs
│   ├── lab_notes.php     # TIL journal & candid reflections on CS topics
│   ├── experience.php    # Campus roles (TA, Tech Committee, Hackathons)
│   ├── contact.php       # Contact form with PHP POST processing & reach-out cards
│   ├── resume_modal.php  # Accessible CV modal dialog
│   └── footer.php        # Colophon, script loader, and closing shell
└── assets/
    ├── css/
    │   └── style.css     # CSS custom properties, sidebar layout, responsive grid
    └── js/
        └── main.js       # Theme sync, terminal engine, drawer, tabs, filters
```

---

## 🚀 Quick Start & Local Preview

### Option 1: npm / PHP Built-in Server (Recommended)
Open your terminal in this directory and run:

```bash
npm run dev
# or: php -S 127.0.0.1:8000
```
Then visit **`http://localhost:8000`** in your browser.

To verify PHP syntax across all project files:
```bash
npm run lint
```

---

### Option 2: XAMPP / WAMP / Laragon
1. Copy or move this project folder into your web server root:
   - **XAMPP**: `C:\xampp\htdocs\portfolio`
   - **Laragon**: `C:\laragon\www\portfolio`
   - **WAMP**: `C:\wamp64\www\portfolio`
2. Start the Apache service.
3. Open `http://localhost/portfolio` in your browser.

---

### Option 3: Docker
If you use Docker, you can run an instant PHP server with one command:

```bash
docker run -d -p 8000:80 -v "$PWD":/var/www/html php:8.2-apache
```
Then visit `http://localhost:8000`.

---

## 🛠️ Customization Guide

### 1. Update Your Information
Open `data.php` and update the values:
- **`site`**: Name, title, job role, location, email, availability status, and resume link.
- **`socials`**: URLs to your GitHub, LinkedIn, Twitter/X, Dribbble, etc.
- **`stats`**: Years of experience, completed projects, uptime, user count.
- **`skill_categories`**: Grouped technical proficiencies and percentages.
- **`projects`**: Add or remove project items with tags, badges, and GitHub/Live links.
- **`experience`**: Career milestones, roles, and achievements.
- **`testimonials`**: Client or colleague endorsements.

### 2. Rearrange or Toggle Sections
In `index.php`, you can reorder or comment out any section with a single line:

```php
require __DIR__ . '/includes/header.php';
require __DIR__ . '/includes/hero.php';
require __DIR__ . '/includes/about.php';
// require __DIR__ . '/includes/skills.php'; // Temporarily hidden
require __DIR__ . '/includes/projects.php';
require __DIR__ . '/includes/experience.php';
require __DIR__ . '/includes/contact.php';
require __DIR__ . '/includes/footer.php';
```

### 3. Connect Real Email Sending
In `includes/contact.php`, find the form handling section around line 24. You can replace the simulated response with PHP's native `mail()` or integrate PHPMailer / SendGrid / Resend:

```php
mail(
    $data['site']['email'],
    "Portfolio Inquiry: " . $subject,
    "From: $name ($email)\n\nMessage:\n$message",
    "From: " . $email
);
```

---

## 🌐 Deployment
This portfolio works on any standard web hosting service supporting PHP 7.4+:
- **cPanel / Shared Hosting**: Upload all files to `public_html`.
- **VPS (Ubuntu/Debian)**: Deploy with Nginx or Apache.
- **Cloud Platforms**: Compatible with Render, Railway, Heroku, or Fly.io using standard PHP buildpacks.
