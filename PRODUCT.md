# Product

<!-- impeccable:product-schema 1 -->

## Platform

web

## Users

University recruiters, internship hiring managers, and engineering team leads evaluating student software engineering talent for summer internships and entry-level junior roles.

## Product Purpose

A fast, clean personal portfolio for a Computer Science undergraduate that highlights academic projects, programming foundations, and collaborative leadership. It serves as an authoritative proof-of-work that converts internship applications into interview invitations.

## Positioning

A lightweight, zero-dependency PHP static architecture combining the ease of content editing (centralized PHP arrays) with the aesthetic polish of modern design systems, without the bloat of heavy CMS platforms or heavyweight client frameworks.

## Operating Context

Evaluated across desktop and mobile screens by university recruiters and hiring managers who review student applications quickly. Requires immediate clarity, rapid scannability, and instant interactive responsiveness.

## Capabilities and Constraints

- **Modular Architecture**: Componentized PHP templates (`includes/*.php`) orchestrated by a clean `index.php`.
- **Data Isolation**: All biographical, project, skill, and milestone data strictly organized in `data.php`.
- **Zero-Dependency Runtime**: Self-contained inline SVGs and vanilla CSS/JS requiring no build steps, CDNs, or database servers.
- **Dual-Theming**: First-class dark and light themes with automatic system preference detection and `localStorage` persistence.
- **Server-Side Reliability**: PHP POST handling with input sanitization and email validation.
- **Responsive & Accessible**: Strict adherence to semantic HTML5, fluid layouts, and keyboard-accessible navigation.

## Brand Commitments

- **Tone of Voice**: Pragmatic, curious, engineering-focused, and articulate.
- **Typography**: Distinctive foundry display typeface *Cabinet Grotesk* (Indian Type Foundry - ITF) for display H1 titles, native system-font stack for structural headings and body (`-apple-system, BlinkMacSystemFont, "Segoe UI"`), and native system monospace stack for code & terminal.
- **Visual Palette**: Obsidian Carbon foundation with crisp high-contrast White accents in dark mode, and clean monochrome contrasts in light mode.

## Evidence on Hand

- Centralized portfolio configuration file at `data.php`.
- Modular includes for Sidebar, Intro & Terminal, Coursework & Stack, Projects & Dual-Mode Retrospective, Lab Notes, Experience, and Contact sections.
- Bespoke design system in `assets/css/style.css` and interactivity in `assets/js/main.js`.

## Product Principles

1. **Instant Scannability**: Core technical stack, student standing, GPA, and featured projects absorbable at a glance.
2. **Zero-Bloat Engineering**: Maximum performance with vanilla CSS and lightweight PHP, no unnecessary dependencies or render-blocking scripts.
3. **Impeccable Polish**: Thoughtful micro-animations, accessible contrast ratios, and cohesive visual hierarchy.
4. **Frictionless Maintenance**: Updating projects, skills, or contact info should require editing only `data.php`.

## Accessibility & Inclusion

- WCAG AA contrast compliance across both dark and light themes.
- Clear focus indicators and full keyboard operability for navigation, modals, and interactive filters.
- Descriptive ARIA attributes on buttons and form elements.
