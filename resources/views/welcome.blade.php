<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Mawaddah Oasis · Muslim Family Haven</title>
    <!-- Google Fonts (Arabic-inspired + clean sans) -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@0,400;0,700;1,400&family=Inter:opsz,wght@14..32,300;14..32,400;14..32,600;14..32,700;14..32,800&display=swap"
        rel="stylesheet" />

    <!-- Font Awesome 6 (free) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

    <style>
        /* ============================================================
                   CSS CUSTOM PROPERTIES (Theming)
                   ============================================================ */
        :root {
            --primary: #1a6b3c;
            --primary-dark: #0f4a2a;
            --primary-light: #2a9d5a;
            --gold: #c9a84c;
            --gold-light: #e8d28a;
            --gold-glow: rgba(201, 168, 76, 0.35);
            --deep-blue: #1a3a5c;
            --cream: #faf8f5;
            --cream-dark: #f0ede7;
            --text-dark: #1a1a2e;
            --text-soft: #3d3d5c;
            --white: #ffffff;
            --shadow: 0 20px 60px rgba(0, 0, 0, 0.08);
            --shadow-hover: 0 30px 80px rgba(0, 0, 0, 0.15);
            --radius: 28px;
            --radius-sm: 16px;
            --transition: 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            --font-arabic: 'Amiri', serif;
            --font-sans: 'Inter', sans-serif;
        }

        /* ============================================================
                   RESET & BASE
                   ============================================================ */
        *,
        *::before,
        *::after {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
            -webkit-font-smoothing: antialiased;
        }

        body {
            font-family: var(--font-sans);
            background: var(--cream);
            color: var(--text-dark);
            line-height: 1.6;
            overflow-x: hidden;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        img {
            max-width: 100%;
            display: block;
        }

        ul {
            list-style: none;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 24px;
        }

        /* ============================================================
                   SECTION HEADERS
                   ============================================================ */
        .section-badge {
            display: inline-block;
            background: var(--gold);
            color: var(--white);
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
            padding: 6px 18px;
            border-radius: 50px;
            margin-bottom: 12px;
        }

        .section-title {
            font-family: var(--font-arabic);
            font-size: clamp(2.2rem, 5vw, 3.6rem);
            font-weight: 700;
            color: var(--primary-dark);
            line-height: 1.2;
        }

        .section-title span {
            color: var(--gold);
        }

        .section-sub {
            font-size: 1.1rem;
            color: var(--text-soft);
            max-width: 560px;
            margin-top: 8px;
            font-weight: 300;
        }

        .section-header {
            text-align: center;
            margin-bottom: 56px;
        }

        .section-header .section-sub {
            margin-left: auto;
            margin-right: auto;
        }

        /* ============================================================
                   BUTTONS
                   ============================================================ */
        .btn-primary {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: var(--primary);
            color: var(--white);
            padding: 14px 36px;
            border-radius: 60px;
            font-weight: 600;
            font-size: 1rem;
            border: none;
            cursor: pointer;
            transition: var(--transition);
            box-shadow: 0 8px 28px rgba(26, 107, 60, 0.30);
        }

        .btn-primary:hover {
            background: var(--primary-dark);
            transform: translateY(-3px);
            box-shadow: 0 14px 40px rgba(26, 107, 60, 0.40);
        }

        .btn-gold {
            background: var(--gold);
            box-shadow: 0 8px 28px rgba(201, 168, 76, 0.35);
        }

        .btn-gold:hover {
            background: #b8963a;
            box-shadow: 0 14px 40px rgba(201, 168, 76, 0.45);
        }

        .btn-outline {
            background: transparent;
            color: var(--primary);
            border: 2px solid var(--primary);
            box-shadow: none;
        }

        .btn-outline:hover {
            background: var(--primary);
            color: var(--white);
            transform: translateY(-3px);
            box-shadow: 0 14px 40px rgba(26, 107, 60, 0.30);
        }

        /* ============================================================
                   NAVIGATION
                   ============================================================ */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            padding: 18px 0;
            transition: var(--transition);
            background: transparent;
        }

        .navbar.scrolled {
            background: rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(18px);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.06);
            padding: 12px 0;
        }

        .navbar .container {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .nav-logo {
            display: flex;
            align-items: center;
            gap: 12px;
            font-family: var(--font-arabic);
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--white);
            transition: var(--transition);
        }

        .nav-logo i {
            color: var(--gold);
            font-size: 2rem;
        }

        .navbar.scrolled .nav-logo {
            color: var(--primary-dark);
        }

        .nav-logo span {
            color: var(--gold);
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 32px;
        }

        .nav-links a {
            color: rgba(255, 255, 255, 0.85);
            font-weight: 500;
            font-size: 0.95rem;
            transition: var(--transition);
            position: relative;
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: -4px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--gold);
            transition: var(--transition);
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        .nav-links a:hover {
            color: var(--gold);
        }

        .navbar.scrolled .nav-links a {
            color: var(--text-dark);
        }

        .navbar.scrolled .nav-links a:hover {
            color: var(--primary);
        }

        .nav-cta {
            background: var(--gold);
            color: var(--white) !important;
            padding: 10px 24px;
            border-radius: 60px;
            font-weight: 600;
            transition: var(--transition);
        }

        .nav-cta:hover {
            background: #b8963a;
            transform: scale(1.04);
            color: var(--white) !important;
        }

        .nav-cta::after {
            display: none !important;
        }

        /* Mobile menu toggle */
        .nav-toggle {
            display: none;
            flex-direction: column;
            gap: 5px;
            cursor: pointer;
            background: transparent;
            border: none;
            padding: 6px;
        }

        .nav-toggle span {
            display: block;
            width: 28px;
            height: 3px;
            background: var(--white);
            border-radius: 4px;
            transition: var(--transition);
        }

        .navbar.scrolled .nav-toggle span {
            background: var(--text-dark);
        }

        /* ============================================================
                   HERO SECTION
                   ============================================================ */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
            background: linear-gradient(145deg, #0f4a2a 0%, #1a6b3c 50%, #1a3a5c 100%);
            overflow: hidden;
            padding: 120px 0 80px;
        }

        /* Islamic geometric pattern overlay */
        .hero-pattern {
            position: absolute;
            inset: 0;
            opacity: 0.06;
            background-image:
                radial-gradient(circle at 20% 50%, var(--gold) 1px, transparent 1px),
                radial-gradient(circle at 80% 50%, var(--gold) 1px, transparent 1px);
            background-size: 60px 60px;
            background-position: 0 0, 30px 30px;
            pointer-events: none;
        }

        /* Large geometric ornament */
        .hero-ornament {
            position: absolute;
            right: -6%;
            top: 10%;
            width: 600px;
            height: 600px;
            border: 2px solid rgba(201, 168, 76, 0.12);
            border-radius: 50%;
            pointer-events: none;
        }

        .hero-ornament::before {
            content: '';
            position: absolute;
            inset: 40px;
            border: 2px solid rgba(201, 168, 76, 0.08);
            border-radius: 50%;
        }

        .hero-ornament::after {
            content: '';
            position: absolute;
            inset: 80px;
            border: 2px solid rgba(201, 168, 76, 0.05);
            border-radius: 50%;
        }

        /* Floating stars (tiny) */
        .stars {
            position: absolute;
            inset: 0;
            pointer-events: none;
            overflow: hidden;
        }

        .star {
            position: absolute;
            width: 4px;
            height: 4px;
            background: var(--gold);
            border-radius: 50%;
            opacity: 0.3;
            animation: twinkle 4s ease-in-out infinite alternate;
        }

        @keyframes twinkle {
            0% {
                opacity: 0.1;
                transform: scale(0.8);
            }

            100% {
                opacity: 0.5;
                transform: scale(1.2);
            }
        }

        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 720px;
        }

        .hero-badge {
            display: inline-block;
            background: rgba(201, 168, 76, 0.18);
            color: var(--gold-light);
            padding: 8px 22px;
            border-radius: 60px;
            font-size: 0.85rem;
            font-weight: 500;
            letter-spacing: 0.5px;
            backdrop-filter: blur(4px);
            border: 1px solid rgba(201, 168, 76, 0.15);
            margin-bottom: 20px;
        }

        .hero-badge i {
            margin-right: 8px;
        }

        .hero h1 {
            font-family: var(--font-arabic);
            font-size: clamp(2.8rem, 7vw, 5.2rem);
            font-weight: 700;
            color: var(--white);
            line-height: 1.1;
            margin-bottom: 16px;
        }

        .hero h1 span {
            color: var(--gold);
            display: inline-block;
            position: relative;
        }

        .hero h1 span::after {
            content: '';
            position: absolute;
            bottom: 4px;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--gold);
            border-radius: 4px;
            opacity: 0.4;
        }

        .hero p {
            color: rgba(255, 255, 255, 0.8);
            font-size: 1.2rem;
            max-width: 540px;
            font-weight: 300;
            line-height: 1.8;
            margin-bottom: 36px;
        }

        .hero-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 16px;
            align-items: center;
        }

        .hero-actions .btn-primary {
            background: var(--gold);
            box-shadow: 0 8px 32px rgba(201, 168, 76, 0.35);
        }

        .hero-actions .btn-primary:hover {
            background: #b8963a;
            box-shadow: 0 14px 44px rgba(201, 168, 76, 0.45);
        }

        .hero-actions .btn-outline-light {
            background: transparent;
            color: var(--white);
            border: 2px solid rgba(255, 255, 255, 0.25);
            padding: 14px 36px;
            border-radius: 60px;
            font-weight: 600;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }

        .hero-actions .btn-outline-light:hover {
            background: rgba(255, 255, 255, 0.08);
            border-color: var(--gold);
            transform: translateY(-3px);
        }

        /* Hero stats */
        .hero-stats {
            display: flex;
            gap: 48px;
            margin-top: 52px;
            padding-top: 32px;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
        }

        .hero-stats .stat h3 {
            font-size: 2rem;
            font-weight: 700;
            color: var(--gold);
            font-family: var(--font-arabic);
        }

        .hero-stats .stat p {
            font-size: 0.85rem;
            color: rgba(255, 255, 255, 0.6);
            margin-bottom: 0;
            font-weight: 400;
        }

        /* ============================================================
                   SECTION: ABOUT / INTRO
                   ============================================================ */
        .about {
            padding: 100px 0;
            background: var(--white);
        }

        .about-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: center;
        }

        .about-image {
            position: relative;
            border-radius: var(--radius);
            overflow: hidden;
            box-shadow: var(--shadow);
            background: var(--cream-dark);
            aspect-ratio: 4/3;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(145deg, #e8e0d6, #d5cdc0);
        }

        .about-image .placeholder-icon {
            font-size: 8rem;
            color: var(--primary-light);
            opacity: 0.3;
        }

        .about-image .floating-card {
            position: absolute;
            bottom: -20px;
            right: -20px;
            background: var(--white);
            padding: 20px 28px;
            border-radius: var(--radius-sm);
            box-shadow: var(--shadow-hover);
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .about-image .floating-card i {
            font-size: 2rem;
            color: var(--gold);
        }

        .about-image .floating-card span {
            font-weight: 600;
            font-size: 0.95rem;
        }

        .about-text .section-badge {
            margin-bottom: 12px;
        }

        .about-text h2 {
            font-family: var(--font-arabic);
            font-size: clamp(2rem, 4vw, 3rem);
            color: var(--primary-dark);
            line-height: 1.2;
            margin-bottom: 16px;
        }

        .about-text h2 span {
            color: var(--gold);
        }

        .about-text p {
            color: var(--text-soft);
            margin-bottom: 20px;
            font-size: 1.05rem;
            font-weight: 300;
        }

        .about-features {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
            margin-top: 28px;
        }

        .about-features li {
            display: flex;
            align-items: center;
            gap: 12px;
            font-weight: 500;
        }

        .about-features li i {
            color: var(--gold);
            font-size: 1.2rem;
            width: 28px;
        }

        /* ============================================================
                   SECTION: FOOD & DRINKS
                   ============================================================ */
        .food {
            padding: 100px 0;
            background: var(--cream);
        }

        .food-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 32px;
        }

        .food-card {
            background: var(--white);
            border-radius: var(--radius);
            padding: 36px 28px 32px;
            text-align: center;
            transition: var(--transition);
            box-shadow: var(--shadow);
            border: 1px solid rgba(0, 0, 0, 0.02);
            position: relative;
            overflow: hidden;
        }

        .food-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--gold), var(--primary-light), var(--gold));
            opacity: 0;
            transition: var(--transition);
        }

        .food-card:hover::before {
            opacity: 1;
        }

        .food-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-hover);
        }

        .food-card .icon-wrap {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: rgba(26, 107, 60, 0.06);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 2.4rem;
            color: var(--primary);
            transition: var(--transition);
        }

        .food-card:hover .icon-wrap {
            background: var(--primary);
            color: var(--white);
        }

        .food-card h3 {
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 6px;
            color: var(--primary-dark);
        }

        .food-card .tag {
            display: inline-block;
            background: rgba(201, 168, 76, 0.12);
            color: var(--gold);
            font-size: 0.7rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 3px 14px;
            border-radius: 50px;
            margin-bottom: 12px;
        }

        .food-card p {
            color: var(--text-soft);
            font-size: 0.95rem;
            font-weight: 300;
        }

        /* ============================================================
                   SECTION: SPORTS
                   ============================================================ */
        .sports {
            padding: 100px 0;
            background: var(--white);
        }

        .sports-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 28px;
        }

        .sport-card {
            background: var(--cream);
            border-radius: var(--radius);
            padding: 32px 24px;
            text-align: center;
            transition: var(--transition);
            border: 1px solid transparent;
            position: relative;
        }

        .sport-card:hover {
            border-color: var(--gold);
            transform: translateY(-8px);
            box-shadow: var(--shadow);
            background: var(--white);
        }

        .sport-card .emoji-big {
            font-size: 3.4rem;
            display: block;
            margin-bottom: 16px;
        }

        .sport-card h4 {
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--primary-dark);
        }

        .sport-card p {
            font-size: 0.9rem;
            color: var(--text-soft);
            font-weight: 300;
            margin-top: 4px;
        }

        .sport-card .badge-sport {
            display: inline-block;
            margin-top: 12px;
            background: rgba(26, 107, 60, 0.08);
            color: var(--primary);
            font-size: 0.7rem;
            font-weight: 600;
            padding: 4px 16px;
            border-radius: 50px;
        }

        /* ============================================================
                   SECTION: FAMILY & KIDS
                   ============================================================ */
        .family {
            padding: 100px 0;
            background: linear-gradient(160deg, #faf8f5 0%, #f0ede7 100%);
            position: relative;
            overflow: hidden;
        }

        .family::before {
            content: '✦';
            position: absolute;
            font-size: 20rem;
            color: rgba(201, 168, 76, 0.04);
            right: -5%;
            bottom: -10%;
            transform: rotate(12deg);
            pointer-events: none;
        }

        .family-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 48px;
            align-items: center;
        }

        .family-image {
            border-radius: var(--radius);
            overflow: hidden;
            background: linear-gradient(145deg, #d5cdc0, #c4bbad);
            aspect-ratio: 4/3;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: var(--shadow);
            position: relative;
        }

        .family-image .placeholder-icon {
            font-size: 7rem;
            color: var(--primary-light);
            opacity: 0.25;
        }

        .family-image .badge-float {
            position: absolute;
            top: 24px;
            left: 24px;
            background: var(--white);
            padding: 10px 20px;
            border-radius: 60px;
            font-weight: 600;
            font-size: 0.85rem;
            box-shadow: var(--shadow);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .family-image .badge-float i {
            color: var(--gold);
        }

        .family-text h2 {
            font-family: var(--font-arabic);
            font-size: clamp(2rem, 4vw, 3rem);
            color: var(--primary-dark);
            line-height: 1.2;
            margin-bottom: 16px;
        }

        .family-text h2 span {
            color: var(--gold);
        }

        .family-text p {
            color: var(--text-soft);
            font-size: 1.05rem;
            font-weight: 300;
            margin-bottom: 24px;
        }

        .family-list {
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .family-list li {
            display: flex;
            align-items: center;
            gap: 14px;
            font-weight: 500;
        }

        .family-list li i {
            color: var(--gold);
            font-size: 1.2rem;
            width: 28px;
        }

        /* ============================================================
                   SECTION: TESTIMONIALS / QUOTE
                   ============================================================ */
        .testimonial {
            padding: 80px 0;
            background: var(--primary-dark);
            color: var(--white);
            text-align: center;
            position: relative;
        }

        .testimonial::before {
            content: '"';
            font-family: var(--font-arabic);
            font-size: 8rem;
            position: absolute;
            left: 5%;
            top: 10%;
            opacity: 0.06;
            color: var(--gold);
        }

        .testimonial blockquote {
            font-family: var(--font-arabic);
            font-size: clamp(1.6rem, 3.5vw, 2.6rem);
            font-weight: 400;
            max-width: 760px;
            margin: 0 auto 20px;
            line-height: 1.5;
            color: rgba(255, 255, 255, 0.9);
        }

        .testimonial cite {
            display: block;
            font-style: normal;
            font-weight: 600;
            color: var(--gold);
            font-size: 1rem;
        }

        .testimonial cite span {
            font-weight: 300;
            color: rgba(255, 255, 255, 0.5);
        }

        /* ============================================================
                   SECTION: RESERVATION / BOOKING
                   ============================================================ */
        .booking {
            padding: 100px 0;
            background: var(--white);
        }

        .booking-wrapper {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            background: var(--cream);
            border-radius: var(--radius);
            padding: 56px 60px;
            box-shadow: var(--shadow);
            border: 1px solid rgba(0, 0, 0, 0.03);
        }

        .booking-info h2 {
            font-family: var(--font-arabic);
            font-size: clamp(2rem, 3.5vw, 2.8rem);
            color: var(--primary-dark);
            line-height: 1.2;
            margin-bottom: 12px;
        }

        .booking-info h2 span {
            color: var(--gold);
        }

        .booking-info p {
            color: var(--text-soft);
            font-weight: 300;
            margin-bottom: 24px;
            font-size: 1.05rem;
        }

        .booking-info .contact-row {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 12px;
            font-weight: 500;
        }

        .booking-info .contact-row i {
            color: var(--gold);
            width: 24px;
            font-size: 1.2rem;
        }

        .booking-form {
            display: flex;
            flex-direction: column;
            gap: 18px;
        }

        .booking-form .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        .booking-form input,
        .booking-form select,
        .booking-form textarea {
            width: 100%;
            padding: 14px 18px;
            border: 1px solid rgba(0, 0, 0, 0.08);
            border-radius: var(--radius-sm);
            font-family: var(--font-sans);
            font-size: 0.95rem;
            background: var(--white);
            transition: var(--transition);
            color: var(--text-dark);
        }

        .booking-form input:focus,
        .booking-form select:focus,
        .booking-form textarea:focus {
            outline: none;
            border-color: var(--gold);
            box-shadow: 0 0 0 4px rgba(201, 168, 76, 0.12);
        }

        .booking-form textarea {
            resize: vertical;
            min-height: 100px;
        }

        .booking-form .btn-primary {
            width: 100%;
            justify-content: center;
            padding: 16px;
            font-size: 1.05rem;
        }

        /* ============================================================
                   FOOTER
                   ============================================================ */
        .footer {
            background: var(--primary-dark);
            color: rgba(255, 255, 255, 0.7);
            padding: 60px 0 30px;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 48px;
            padding-bottom: 40px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.06);
            margin-bottom: 30px;
        }

        .footer-brand h3 {
            font-family: var(--font-arabic);
            font-size: 2rem;
            color: var(--white);
            margin-bottom: 8px;
        }

        .footer-brand h3 span {
            color: var(--gold);
        }

        .footer-brand p {
            font-weight: 300;
            max-width: 320px;
            font-size: 0.95rem;
        }

        .footer-socials {
            display: flex;
            gap: 14px;
            margin-top: 16px;
        }

        .footer-socials a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.06);
            color: var(--white);
            transition: var(--transition);
            font-size: 1.1rem;
        }

        .footer-socials a:hover {
            background: var(--gold);
            color: var(--primary-dark);
            transform: translateY(-3px);
        }

        .footer-col h4 {
            color: var(--white);
            font-weight: 600;
            margin-bottom: 16px;
            font-size: 1rem;
        }

        .footer-col ul li {
            margin-bottom: 10px;
        }

        .footer-col ul li a {
            transition: var(--transition);
            font-weight: 300;
        }

        .footer-col ul li a:hover {
            color: var(--gold);
        }

        .footer-bottom {
            text-align: center;
            font-size: 0.85rem;
            font-weight: 300;
            opacity: 0.6;
        }

        /* ============================================================
                   RESPONSIVE
                   ============================================================ */
        @media (max-width: 1024px) {
            .booking-wrapper {
                grid-template-columns: 1fr;
                padding: 40px 32px;
            }

            .footer-grid {
                grid-template-columns: 1fr 1fr;
                gap: 32px;
            }
        }

        @media (max-width: 900px) {
            .about-grid {
                grid-template-columns: 1fr;
                gap: 40px;
            }

            .family-grid {
                grid-template-columns: 1fr;
                gap: 40px;
            }

            .family-image {
                order: -1;
            }

            .hero-stats {
                gap: 28px;
                flex-wrap: wrap;
            }

            .nav-links {
                position: fixed;
                top: 0;
                right: -100%;
                width: 70%;
                max-width: 340px;
                height: 100vh;
                background: var(--white);
                flex-direction: column;
                padding: 80px 32px 40px;
                box-shadow: -10px 0 40px rgba(0, 0, 0, 0.08);
                transition: var(--transition);
                gap: 20px;
                align-items: flex-start;
            }

            .nav-links.open {
                right: 0;
            }

            .nav-links a {
                color: var(--text-dark) !important;
                font-size: 1.1rem;
            }

            .nav-cta {
                background: var(--gold);
                color: var(--white) !important;
            }

            .nav-toggle {
                display: flex;
                z-index: 1001;
            }

            .nav-toggle.open span:nth-child(1) {
                transform: rotate(45deg) translate(5px, 5px);
            }

            .nav-toggle.open span:nth-child(2) {
                opacity: 0;
            }

            .nav-toggle.open span:nth-child(3) {
                transform: rotate(-45deg) translate(5px, -5px);
            }

            .navbar.scrolled .nav-toggle span {
                background: var(--text-dark);
            }

            /* Mobile overlay */
            .nav-overlay {
                position: fixed;
                inset: 0;
                background: rgba(0, 0, 0, 0.3);
                backdrop-filter: blur(2px);
                z-index: 999;
                opacity: 0;
                pointer-events: none;
                transition: var(--transition);
            }

            .nav-overlay.open {
                opacity: 1;
                pointer-events: all;
            }
        }

        @media (max-width: 600px) {
            .hero {
                padding: 100px 0 60px;
                min-height: auto;
            }

            .hero h1 {
                font-size: 2.4rem;
            }

            .hero p {
                font-size: 1rem;
            }

            .hero-actions {
                flex-direction: column;
                align-items: stretch;
            }

            .hero-actions .btn-primary,
            .hero-actions .btn-outline-light {
                justify-content: center;
            }

            .hero-stats {
                flex-direction: column;
                gap: 12px;
                padding-top: 20px;
            }

            .hero-stats .stat h3 {
                font-size: 1.6rem;
            }

            .about-features {
                grid-template-columns: 1fr;
            }

            .booking-wrapper {
                padding: 28px 18px;
            }

            .booking-form .form-row {
                grid-template-columns: 1fr;
            }

            .footer-grid {
                grid-template-columns: 1fr;
                gap: 28px;
            }

            .nav-logo {
                font-size: 1.4rem;
            }

            .food-grid {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 420px) {
            .food-grid {
                grid-template-columns: 1fr;
            }

            .sports-grid {
                grid-template-columns: 1fr 1fr;
            }
        }

        /* ============================================================
                   SCROLL ANIMATIONS (simple reveal)
                   ============================================================ */
        .reveal {
            opacity: 0;
            transform: translateY(40px);
            transition: opacity 0.8s ease, transform 0.8s ease;
        }

        .reveal.visible {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>

<body>

    <!-- ============================================================
    NAVIGATION
    ============================================================ -->
    <nav class="navbar" id="navbar" role="navigation" aria-label="Main navigation">
        <div class="container">
            <a href="#" class="nav-logo" aria-label="Mawaddah Oasis home">
                <i class="fas fa-mosque"></i>
                Mawaddah<span>Oasis</span>
            </a>

            <ul class="nav-links" id="navLinks" role="menubar">
                <li role="none"><a href="#about" role="menuitem">About</a></li>
                <li role="none"><a href="#food" role="menuitem">Food &amp; Drinks</a></li>
                <li role="none"><a href="#sports" role="menuitem">Sports</a></li>
                <li role="none"><a href="#family" role="menuitem">Family &amp; Kids</a></li>
                <li role="none"><a href="#booking" role="menuitem" class="nav-cta">Book Now</a></li>
                <li role="none"><a href="{{ route('bookings.index') }}" role="menuitem" class="nav-cta">View Bookings</a></li>
            </ul>

            <button class="nav-toggle" id="navToggle" aria-label="Toggle navigation menu" aria-expanded="false">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </nav>

    <!-- Mobile overlay -->
    <div class="nav-overlay" id="navOverlay"></div>

    <!-- ============================================================
    HERO
    ============================================================ -->
    <section class="hero" id="hero">
        <div class="hero-pattern"></div>
        <div class="hero-ornament"></div>

        <!-- Floating stars -->
        <div class="stars" aria-hidden="true">
            <span class="star" style="top:12%;left:8%;animation-delay:0.2s;"></span>
            <span class="star" style="top:25%;left:85%;animation-delay:1.1s;"></span>
            <span class="star" style="top:60%;left:5%;animation-delay:0.7s;"></span>
            <span class="star" style="top:80%;left:92%;animation-delay:1.8s;"></span>
            <span class="star" style="top:45%;left:78%;animation-delay:0.4s;"></span>
            <span class="star" style="top:15%;left:55%;animation-delay:2.2s;"></span>
        </div>

        <div class="container">
            <div class="hero-content">
                <div class="hero-badge">
                    <i class="fas fa-hand-holding-heart"></i> Where families flourish
                </div>

                <h1>
                    A <span>Haven</span> of Love,<br />
                    Food &amp; Togetherness
                </h1>

                <p>
                    Welcome to Mawaddah Oasis — a warm sanctuary for Muslim couples,
                    families, and children. Savor exquisite halal cuisine, refreshing
                    drinks, and bond through sports and play.
                </p>

                <div class="hero-actions">
                    <a href="#booking" class="btn-primary">
                        <i class="fas fa-calendar-check"></i> Plan Your Visit
                    </a>
                    <a href="#about" class="btn-outline-light">
                        <i class="fas fa-chevron-circle-down"></i> Discover More
                    </a>
                </div>

                <div class="hero-stats">
                    <div class="stat">
                        <h3>+1,200</h3>
                        <p>Happy Families</p>
                    </div>
                    <div class="stat">
                        <h3>48</h3>
                        <p>Halal Dishes</p>
                    </div>
                    <div class="stat">
                        <h3>16</h3>
                        <p>Sports &amp; Activities</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================================
    ABOUT
    ============================================================ -->
    <section class="about" id="about">
        <div class="container">
            <div class="about-grid">
                <div class="about-image reveal">
                    <span class="placeholder-icon"><i class="fas fa-people-arrows"></i></span>
                    <div class="floating-card">
                        <i class="fas fa-star"></i>
                        <span>Rated 4.9 ★ by families</span>
                    </div>
                </div>

                <div class="about-text reveal">
                    <span class="section-badge"><i class="fas fa-heart"></i> Our Story</span>
                    <h2>Where <span>Barakah</span> Meets Joy</h2>
                    <p>
                        Mawaddah Oasis was born from a simple vision: create a space
                        where Muslim families can unwind, connect, and create lasting
                        memories — all in an environment that honors our values.
                    </p>
                    <p>
                        From our farm-to-table halal kitchen to our family‑friendly
                        sports courts, every detail is crafted with love, safety, and
                        togetherness in mind.
                    </p>

                    <ul class="about-features">
                        <li><i class="fas fa-check-circle"></i> 100% Halal &amp; Tayyib</li>
                        <li><i class="fas fa-check-circle"></i> Family‑safe spaces</li>
                        <li><i class="fas fa-check-circle"></i> Prayer facilities</li>
                        <li><i class="fas fa-check-circle"></i> Kids' play zones</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================================
    FOOD & DRINKS
    ============================================================ -->
    <section class="food" id="food">
        <div class="container">
            <div class="section-header reveal">
                <span class="section-badge"><i class="fas fa-utensils"></i> Culinary Delights</span>
                <h2 class="section-title">Food &amp; <span>Drinks</span></h2>
                <p class="section-sub">
                    Exquisite halal cuisine inspired by flavors from across the Muslim
                    world, crafted with love and the finest ingredients.
                </p>
            </div>

            <div class="food-grid">
                <div class="food-card reveal">
                    <div class="icon-wrap"><i class="fas fa-drumstick-bite"></i></div>
                    <span class="tag">Signature</span>
                    <h3>Grilled Lamb Kofta</h3>
                    <p>Succulent spiced lamb served with saffron rice, grilled vegetables, and tahini sauce.</p>
                </div>

                <div class="food-card reveal">
                    <div class="icon-wrap"><i class="fas fa-fish"></i></div>
                    <span class="tag">Fresh Catch</span>
                    <h3>Mediterranean Sea Bass</h3>
                    <p>Oven‑baked sea bass with lemon, herbs, and a side of za'atar roasted potatoes.</p>
                </div>

                <div class="food-card reveal">
                    <div class="icon-wrap"><i class="fas fa-leaf"></i></div>
                    <span class="tag">Vegan</span>
                    <h3>Falafel &amp; Hummus Bowl</h3>
                    <p>Crispy chickpea falafel, creamy hummus, tabbouleh, and warm pita bread.</p>
                </div>

                <div class="food-card reveal">
                    <div class="icon-wrap"><i class="fas fa-mug-hot"></i></div>
                    <span class="tag">Refreshments</span>
                    <h3>Rose &amp; Cardamom Latte</h3>
                    <p>A fragrant blend of rose water, cardamom, and oat milk — sweetened with honey.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================================
    SPORTS
    ============================================================ -->
    <section class="sports" id="sports">
        <div class="container">
            <div class="section-header reveal">
                <span class="section-badge"><i class="fas fa-futbol"></i> Active Bonding</span>
                <h2 class="section-title">Sports &amp; <span>Play</span></h2>
                <p class="section-sub">
                    Strengthen family ties through friendly competition and
                    shared movement — for all ages and skill levels.
                </p>
            </div>

            <div class="sports-grid">
                <div class="sport-card reveal">
                    <span class="emoji-big">⚽</span>
                    <h4>Football</h4>
                    <p>5‑a‑side matches &amp; kids' clinics</p>
                    <span class="badge-sport">All ages</span>
                </div>

                <div class="sport-card reveal">
                    <span class="emoji-big">🏸</span>
                    <h4>Badminton</h4>
                    <p>Indoor courts with family doubles</p>
                    <span class="badge-sport">Beginner friendly</span>
                </div>

                <div class="sport-card reveal">
                    <span class="emoji-big">🏊</span>
                    <h4>Swimming</h4>
                    <p>Separate sessions for men &amp; women</p>
                    <span class="badge-sport">With lifeguards</span>
                </div>

                <div class="sport-card reveal">
                    <span class="emoji-big">🧘</span>
                    <h4>Family Yoga</h4>
                    <p>Mindful movement &amp; relaxation</p>
                    <span class="badge-sport">All levels</span>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================================
    FAMILY & KIDS
    ============================================================ -->
    <section class="family" id="family">
        <div class="container">
            <div class="family-grid">
                <div class="family-text reveal">
                    <span class="section-badge"><i class="fas fa-child"></i> For Little Ones</span>
                    <h2>Family &amp; <span>Kids</span> Zone</h2>
                    <p>
                        We believe every child deserves a safe, joyful space to explore,
                        learn, and play. Our dedicated kids' area is supervised,
                        engaging, and filled with activities that nurture curiosity.
                    </p>

                    <ul class="family-list">
                        <li><i class="fas fa-puzzle-piece"></i> Interactive play area with Islamic toys &amp; books</li>
                        <li><i class="fas fa-paint-brush"></i> Arts &amp; crafts workshops (calligraphy, painting)</li>
                        <li><i class="fas fa-mosque"></i> Mini‑masjid for children's prayer practice</li>
                        <li><i class="fas fa-users"></i> Family storytelling circles &amp; nasheed sessions</li>
                    </ul>
                </div>

                <div class="family-image reveal">
                    <span class="placeholder-icon"><i class="fas fa-smile"></i></span>
                    <div class="badge-float">
                        <i class="fas fa-certificate"></i> Trusted by 400+ parents
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================================
    TESTIMONIAL
    ============================================================ -->
    <section class="testimonial">
        <div class="container">
            <blockquote>
                “Mawaddah Oasis has become our second home. The food is incredible,
                the sports bring us together, and our children beg to come back every
                weekend. Truly a blessing.”
            </blockquote>
            <cite>— Fatima &amp; Ahmed <span>· with their 3 children</span></cite>
        </div>
    </section>

    <!-- ============================================================
    BOOKING
    ============================================================ -->
    <section class="booking" id="booking">
        <div class="container">
            <div class="booking-wrapper reveal">
                <div class="booking-info">
                    <span class="section-badge"><i class="fas fa-calendar-plus"></i> Reserve Your Spot</span>
                    <h2>Plan Your <span>Visit</span></h2>
                    <p>
                        Whether it's a family day out, a couple's retreat, or a group
                        gathering — we're ready to welcome you. Book ahead to secure
                        your preferred activities and dining.
                    </p>

                    <div class="contact-row">
                        <i class="fas fa-phone-alt"></i>
                        <span>+254705295239 </span>
                    </div>
                    <div class="contact-row">
                        <i class="fas fa-envelope"></i>
                        <span>munirbonaya324@gmail.com</span>
                    </div>
                    <div class="contact-row">
                        <i class="fas fa-clock"></i>
                        <span>Open daily from 10 AM – 10 PM for Regular Visitors </span>
                    </div>
                    <div class="contact-row">
                        <i class="fas fa-clock"></i>
                        <span>Open full time for couples </span>
                    </div>
                </div>

                <!-- Display Success Message -->
                @if (session('success'))
                    <div style="color: green; padding: 10px; border: 1px solid green; margin-bottom: 15px;">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Display Validation Errors -->
                @if ($errors->any())
                    <div style="color: red; padding: 10px; border: 1px solid red; margin-bottom: 15px;">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form class="booking-form" id="bookingForm" action="{{ route('booking.store') }}" method="POST">
                    @csrf

                    <div class="form-row">
                        <input type="text" name="full_name" placeholder="Full name *" value="{{ old('full_name') }}"
                            required />
                        <input type="email" name="email" placeholder="Email address *" value="{{ old('email') }}"
                            required />
                    </div>

                    <div class="form-row">
                        <input type="text" name="phone_number" placeholder="Phone number"
                            value="{{ old('phone_number') }}" />
                        <input type="text" name="group_size" placeholder="Group size" value="{{ old('group_size') }}" />
                    </div>

                    <div class="form-row">
                        <input type="date" name="preferred_date" value="{{ old('preferred_date') }}" />
                    </div>

                    <textarea name="special_requests"
                        placeholder="Special requests">{{ old('special_requests') }}</textarea>

                    <button type="submit">Submit Booking</button>
                </form>
            </div>
        </div>
    </section>

    <!-- ============================================================
    FOOTER
    ============================================================ -->
    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-brand">
                    <h3>Mawaddah<span>Oasis</span></h3>
                    <p>
                        A sanctuary of love, flavor, and togetherness for Muslim
                        families and couples.
                    </p>
                    <div class="footer-socials">
                        <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                        <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
                        <a href="#" aria-label="TikTok"><i class="fab fa-tiktok"></i></a>
                    </div>
                </div>

                <div class="footer-col">
                    <h4>Explore</h4>
                    <ul>
                        <li><a href="#about">About Us</a></li>
                        <li><a href="#food">Menu</a></li>
                        <li><a href="#sports">Sports</a></li>
                        <li><a href="#family">Kids Zone</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h4>Support</h4>
                    <ul>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">FAQs</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h4>Visit</h4>
                    <ul>
                        <li><i class="fas fa-map-pin" style="color:var(--gold);margin-right:6px;"></i> 123 Oasis Blvd,
                            CA</li>
                        <li><i class="fas fa-phone" style="color:var(--gold);margin-right:6px;"></i> +1 (800) 555‑MAWA
                        </li>
                        <li><i class="fas fa-clock" style="color:var(--gold);margin-right:6px;"></i> 10 AM – 10 PM</li>
                    </ul>
                </div>
            </div>

            <div class="footer-bottom">
                &copy; 2026 Mawaddah Oasis &middot; Built with <i class="fas fa-heart" style="color:var(--gold);"></i>
                for the Ummah
            </div>
        </div>
    </footer>


    <!-- ============================================================
    JAVASCRIPT
    ============================================================ -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            // ---- NAVBAR SCROLL ----
            const navbar = document.getElementById('navbar');
            let lastScroll = 0;

            window.addEventListener('scroll', function () {
                const currentScroll = window.pageYOffset || document.documentElement.scrollTop;
                if (currentScroll > 60) {
                    navbar.classList.add('scrolled');
                } else {
                    navbar.classList.remove('scrolled');
                }
                lastScroll = currentScroll;
            });

            // ---- MOBILE MENU ----
            const toggle = document.getElementById('navToggle');
            const links = document.getElementById('navLinks');
            const overlay = document.getElementById('navOverlay');

            function toggleMenu() {
                const isOpen = links.classList.toggle('open');
                toggle.classList.toggle('open');
                overlay.classList.toggle('open');
                toggle.setAttribute('aria-expanded', isOpen);
                document.body.style.overflow = isOpen ? 'hidden' : '';
            }

            toggle.addEventListener('click', toggleMenu);
            overlay.addEventListener('click', toggleMenu);

            // Close menu when a link is clicked
            document.querySelectorAll('.nav-links a').forEach(link => {
                link.addEventListener('click', function () {
                    if (links.classList.contains('open')) {
                        toggleMenu();
                    }
                });
            });

            // ---- REVEAL ON SCROLL (Intersection Observer) ----
            const revealElements = document.querySelectorAll('.reveal');

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                    }
                });
            }, {
                threshold: 0.12,
                rootMargin: '0px 0px -40px 0px'
            });

            revealElements.forEach(el => observer.observe(el));

            // ---- SMOOTH SCROLL FOR ANCHOR LINKS (progressive enhancement) ----
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    const href = this.getAttribute('href');
                    if (href === '#') return;
                    const target = document.querySelector(href);
                    if (target) {
                        e.preventDefault();
                        const offsetTop = target.getBoundingClientRect().top + window.pageYOffset - 80;
                        window.scrollTo({ top: offsetTop, behavior: 'smooth' });
                    }
                });
            });

            // ---- KEYBOARD SUPPORT: close menu on Escape ----
            document.addEventListener('keydown', function (e) {
                if (e.key === 'Escape' && links.classList.contains('open')) {
                    toggleMenu();
                }
            });

        });
    </script>

</body>

</html>