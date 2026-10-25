<?php
/**
 * Portfolio Data Source - Student Edition
 * 
 * Centralized data file for John Senen Estrella.
 * 3rd Year College Student taking Bachelor of Science in Information Technology (BSIT)
 * at National University (NU) Baliwag.
 * 
 * Contains placeholder samplers so you can easily follow through and replace
 * each section with your actual subjects, projects, and experiences.
 */

return [
    // Personal & Student Information
    'site' => [
        'title' => 'John Senen Estrella | 3rd Year BSIT Student @ NU Baliwag',
        'meta_description' => 'Personal student portfolio and project notebook of John Senen Estrella, 3rd year BSIT student at National University Baliwag.',
        'author' => 'John Senen Estrella',
        'role' => '3rd Year BSIT Student',
        'subrole' => 'BS in Information Technology · NU Baliwag',
        'degree' => 'BS in Information Technology',
        'institution' => 'NU Baliwag',
        'location' => 'Baliwag, Bulacan, Philippines',
        'term' => '3rd Year · AY 2024–2025',
        'availability' => 'Available for OJT / Practicum',
        'objective' => 'Seeking IT Internship / Industry Practicum Opportunities',
        'email' => 'johnsenenestrella@gmail.com',
        'phone' => '+63 (900) 000-0000', // [Sample: Replace with your phone]
        'github_username' => 'blaizy20',
        'avatar_photo' => '', // Relative path to student photo (e.g. 'assets/img/profile.jpg'). Defaults to JSE monogram if empty or not found
        'resume_url' => '#resumeModal',
        'first_portfolio_note' => 'Student portfolio built by hand with vanilla PHP and modern CSS.',
    ],

    // Terminal Quick Commands & Interactive Outputs
    'terminal' => [
        'default_prompt' => 'john@nubaliwag:~$',
        'commands' => [
            'whoami' => [
                'cmd' => 'whoami',
                'label' => 'whoami',
                'output' => "John Senen Estrella\n3rd Year College Student taking BS in Information Technology (BSIT)\nNational University (NU) Baliwag\nBackend & Database Architect for CredenceLend · Frontend UI/UX for CityWatch."
            ],
            'status' => [
                'cmd' => 'cat status.txt',
                'label' => 'cat status.txt',
                'output' => "Academic Standing: 3rd Year College Student\nProgram: Bachelor of Science in Information Technology (BSIT)\nInstitution: National University (NU) Baliwag\nCurrent Focus: Web Systems (PHP), Relational Databases (MySQL), Multi-Tenancy & UI/UX\nGitHub: https://github.com/blaizy20\nGoal: Seeking IT Practicum / Internship"
            ],
            'courses' => [
                'cmd' => 'courses --current',
                'label' => 'courses --current',
                'output' => "Active 3rd Year BSIT Curriculum Load:\n- IT 301: Web Systems and Technologies\n- IT 302: Database Management Systems\n- IT 303: Networking and Communications\n- IT 304: Systems Analysis and Design"
            ],
            'goals' => [
                'cmd' => 'cat goals.txt',
                'label' => 'cat goals.txt',
                'output' => "Student Goals:\n1. Build scalable multi-tenant web systems & secure REST APIs\n2. Design intuitive, accessible UI/UX for civic & business platforms\n3. Complete capstone systems requirements for CredenceLend\n4. Prepare for 4th year IT industry practicum / internship"
            ],
            'favorite_bug' => [
                'cmd' => 'cat favorite_bug.log',
                'label' => 'cat favorite_bug.log',
                'output' => "Multi-Tenant Query Leakage in CredenceLend:\nIssue: Cross-tenant data isolation risk when joining tables without explicit tenant scopes.\nFix: Implemented tenant key middleware and database-level foreign key isolation with indexed tenant IDs.\nTakeaway: Strict tenant context boundary enforcement is non-negotiable."
            ],
            'contact' => [
                'cmd' => 'finger john',
                'label' => 'finger john',
                'output' => "Name: John Senen Estrella\nProgram: BSIT, 3rd Year\nCampus: NU Baliwag (National University Baliwag)\nGitHub: https://github.com/blaizy20\nEmail: johnsenenestrella@gmail.com\nStatus: Open for internship inquiries and academic collaborations."
            ]
        ]
    ],

    // Academic Highlights & Student Metrics (Asymmetric Bento Hierarchy)
    'student_milestones' => [
        [
            'id' => 'focus',
            'is_highlight' => true,
            'tag' => 'Technical Focus',
            'value' => 'Web & DB',
            'label' => 'Core Specialization',
            'detail' => 'Web Systems Architecture, Relational Databases (MySQL) & Network Infrastructure.',
            'chips' => ['PHP 8', 'MySQL', 'TypeScript', 'HTML5', 'CSS3']
        ],
        [
            'id' => 'practicum',
            'is_highlight' => true,
            'tag' => 'Target Milestone',
            'value' => 'Practicum',
            'label' => 'Upcoming Internship',
            'detail' => 'Actively preparing for incoming 3rd year practicum (OJT) placement.',
            'chips' => ['Industry OJT', 'System Modeling']
        ],
        [
            'id' => 'year',
            'is_highlight' => false,
            'tag' => 'Academic Standing',
            'value' => '3rd Year',
            'label' => 'Degree Program',
            'detail' => 'BS in Information Technology (BSIT)'
        ],
        [
            'id' => 'institution',
            'is_highlight' => false,
            'tag' => 'Campus',
            'value' => 'NU Baliwag',
            'label' => 'Institution',
            'detail' => 'National University Baliwag Campus'
        ]
    ],

    // Social & Professional Links
    'socials' => [
        'github' => [
            'name' => 'GitHub',
            'url' => 'https://github.com/blaizy20',
            'icon' => 'github',
            'handle' => '@blaizy20'
        ],
        'linkedin' => [
            'name' => 'LinkedIn',
            'url' => 'https://linkedin.com',
            'icon' => 'linkedin',
            'handle' => 'john-senen-estrella'
        ],
        'email' => [
            'name' => 'Email',
            'url' => 'mailto:johnsenenestrella@gmail.com',
            'icon' => 'mail',
            'handle' => 'johnsenenestrella@gmail.com'
        ]
    ],

    // Coursework Matrix - BSIT Curriculum Sampler
    'courses' => [
        [
            'code' => 'IT 301',
            'title' => 'Web Systems and Technologies',
            'term' => '3rd Year (Active)',
            'category' => 'Web Systems',
            'languages' => ['PHP', 'MySQL', 'JavaScript', 'HTML5', 'CSS3'],
            'summary' => 'Development of dynamic, database-driven web applications. Covers client-server architecture, session management, and CRUD operations.',
            'lesson' => 'Learned how server-side PHP interacts with relational databases and how to sanitize input data to prevent SQL injection.'
        ],
        [
            'code' => 'IT 302',
            'title' => 'Database Management Systems',
            'term' => '3rd Year (Active)',
            'category' => 'Databases',
            'languages' => ['SQL', 'MySQL', 'phpMyAdmin', 'Relational Modeling'],
            'summary' => 'Relational database design, Entity-Relationship Diagrams (ERD), normalization (1NF to 3NF), and structured SQL querying.',
            'lesson' => 'Proper table normalization and foreign key constraints prevent data redundancy and make application queries much faster.'
        ],
        [
            'code' => 'IT 303',
            'title' => 'Networking and Data Communications',
            'term' => '3rd Year (Active)',
            'category' => 'Networking',
            'languages' => ['TCP/IP', 'VLAN Configuration', 'Subnetting', 'LAN/WAN'],
            'summary' => 'Network topologies, OSI reference model, IPv4 subnetting, router/switch configuration, and basic troubleshooting in simulated environments.',
            'lesson' => 'Hands-on packet tracing helped demystify how DNS resolution, routing hops, and subnets work together.'
        ],
        [
            'code' => 'IT 304',
            'title' => 'Systems Analysis and Design',
            'term' => '3rd Year (Active)',
            'category' => 'Analysis',
            'languages' => ['UML', 'Data Flow Diagrams', 'Agile', 'Figma'],
            'summary' => 'Software development lifecycles, user requirement documentation, system modeling with UML diagrams, and UI/UX wireframing.',
            'lesson' => 'Documenting user workflows and data flow diagrams before coding saves countless hours of rebuilding later.'
        ],
        [
            'code' => 'IT 201',
            'title' => 'Object-Oriented Programming',
            'term' => '2nd Year',
            'category' => 'Programming',
            'languages' => ['Java / Python', 'OOP Principles', 'GUI'],
            'summary' => 'Core object-oriented programming concepts: classes, inheritance, encapsulation, polymorphism, and basic GUI form development.',
            'lesson' => 'Writing modular, object-oriented classes makes code easier to maintain and reuse across larger assignments.'
        ],
        [
            'code' => 'IT 202',
            'title' => 'Information Assurance and Security',
            'term' => '3rd Year',
            'category' => 'Security',
            'languages' => ['Security Principles', 'Access Control', 'OWASP'],
            'summary' => 'Introduction to cybersecurity fundamentals, authentication protocols, secure coding best practices, and vulnerability prevention.',
            'lesson' => 'Security must be considered from the first line of code, not as an afterthought.'
        ]
    ],

    // Tools & Technologies in Active Use (BSIT Focused)
    'toolkit' => [
        'Languages & Web' => ['PHP', 'TypeScript', 'JavaScript', 'HTML5', 'CSS3', 'SQL', 'Java / Python'],
        'Tools & Platforms' => ['VS Code', 'Git & GitHub', 'XAMPP / Apache', 'MySQL / phpMyAdmin', 'Railway', 'Leaflet.js'],
        'Core IT Competencies' => ['Multi-Tenant Systems', 'Database Normalization', 'Frontend UI/UX Design', 'Network Subnetting', 'RESTful APIs']
    ],

    // Featured Real Student Projects
    'projects' => [
        [
            'id' => 'credencelend',
            'title' => 'CredenceLend: Multi-Tenant Cooperative Lending Platform',
            'subtitle' => 'Full-stack multi-tenant loan management system with Web Staff Portal & Mobile App',
            'category' => 'Web & Database Systems',
            'tagline' => 'Multi-tenant cooperative lending platform streamlining member onboarding, loan origination, underwriting, and payment tracking.',
            'context' => 'Engineered the core database architecture, multi-tenant relational schemas (schema.sql), and secure REST API services connecting the PHP web portal with mobile member applications. Implemented role-based workflows for Superadmins, Tenant Managers, Credit Investigators, Cashiers, and Loan Officers.',
            'tags' => ['PHP', 'MySQL', 'Node.js', 'REST API', 'Railway'],
            'what_broke' => 'Multi-tenant isolation initially risked query data leakage if scopes were omitted on join tables. Designed strict tenant key middleware validation and database-level foreign key constraints with indexed tenant identifiers.',
            'takeaway' => 'Mastered scalable multi-tenant relational schemas, role authorization flowcharts, and decoupled backend APIs for unified web and mobile client consumption.',
            'github_url' => 'https://github.com/Blaizy20/CredenceLend',
            'live_url' => 'https://credencelendv1-production.up.railway.app/',
            'badge' => 'Featured Production'
        ],
        [
            'id' => 'citywatch',
            'title' => 'CityWatch: Community Incident Reporting & Analytics Platform',
            'subtitle' => 'Civic reporting system with interactive geospatial mapping and municipal analytics',
            'category' => 'Civic Tech & UI/UX Design',
            'tagline' => 'Empowers residents to report community incidents with geolocation and municipal teams to visualize resolution metrics.',
            'context' => 'Served as Frontend UI/UX Developer. Architected the responsive interface, interactive Leaflet.js geospatial mapping with coordinate pinpointing, resident incident submission flows, and high-density municipal analytics dashboards.',
            'tags' => ['UI/UX Design', 'JavaScript', 'Leaflet.js', 'Python / Django', 'CSS3'],
            'what_broke' => 'High-density incident clusters on Leaflet mapping caused canvas stutter and frame drops on mobile devices during map pan and zoom. Implemented canvas-rendered marker layers with bounds-based viewport clipping.',
            'takeaway' => 'Learned how to turn complex municipal incident data into intuitive, human-centered UI with smooth geospatial interactions and responsive layouts.',
            'github_url' => 'https://github.com/mendozakiaro-jpg/citywatch',
            'live_url' => 'https://github.com/mendozakiaro-jpg/citywatch',
            'badge' => 'Frontend UI/UX'
        ],
        [
            'id' => 'final-project',
            'title' => 'CredenceLend Systems Architecture & Capstone Submission',
            'subtitle' => 'System engineering documentation, ERD specifications, and role transition matrices',
            'category' => 'Systems Analysis & Architecture',
            'tagline' => 'Academic capstone specification repository containing multi-tenant schema documentation, SQL validation suites, and deployment guides.',
            'context' => 'Authored comprehensive technical documentation, SQL validation query suites (SQL_VALIDATION_QUERIES.sql), role flowcharts (ROLE_FLOWCHARTS.md), and Railway deployment infrastructure for the CredenceLend cooperative lending platform.',
            'tags' => ['Systems Analysis', 'ERD Design', 'SQL Validation', 'Multi-Tenancy', 'Railway'],
            'what_broke' => 'Initial role hierarchy definitions had circular permission dependencies between loan officers and cashiers during payment approval. Remapped the workflow into a deterministic state machine using explicit transition matrices.',
            'takeaway' => 'Proved that meticulous data flow diagrams and validation test suites prior to production cut downstream bugs by over 80%.',
            'github_url' => 'https://github.com/Blaizy20/Final-Project-Requirement',
            'live_url' => 'https://github.com/Blaizy20/Final-Project-Requirement',
            'badge' => 'Capstone Architecture'
        ],
        [
            'id' => 'portfolio-site',
            'title' => 'Handcrafted Student Web Portfolio',
            'subtitle' => 'Accessible, framework-free personal portfolio and technical notebook',
            'category' => 'Personal Project',
            'tagline' => 'Built from scratch with vanilla PHP, modern CSS, and JavaScript.',
            'context' => 'Created to document my 3rd year BSIT journey at NU Baliwag, project contributions to CredenceLend and CityWatch, and technical lessons learned throughout my studies.',
            'tags' => ['PHP 8', 'Vanilla CSS', 'JavaScript', 'SPA Router'],
            'what_broke' => 'Building an SPA view router with browser back/forward history without relying on heavy frontend frameworks required careful popstate and hash routing handling.',
            'takeaway' => 'Understood how powerful vanilla web technologies are when written with clean, modular architecture.',
            'github_url' => 'https://github.com/Blaizy20/Portfolio',
            'live_url' => '#intro',
            'badge' => 'Live Portfolio'
        ]
    ],

    // Lab Notes & Developer Journal (Honest Reflections & TIL Samplers)
    'lab_notes' => [
        [
            'date' => 'AY 2024–2025',
            'course' => 'IT 301',
            'title' => '[Sample Note] Why Prepared Statements Matter in PHP and MySQL',
            'snippet' => 'While working on our web systems assignment, I learned how concatenating user inputs directly into SQL queries opens up severe security vulnerabilities. Switching to PDO prepared statements with bound parameters made queries both safer and cleaner.',
            'tag' => 'Web Security'
        ],
        [
            'date' => 'AY 2024–2025',
            'course' => 'IT 303',
            'title' => '[Sample Note] Demystifying Subnetting and CIDR Notation',
            'snippet' => 'Subnetting seemed intimidating on lecture slides until I started converting IP addresses and subnet masks into binary octets. Calculating network IDs, broadcast addresses, and usable host ranges became second nature once the binary boundary was clear.',
            'tag' => 'Networking'
        ],
        [
            'date' => 'AY 2024–2025',
            'course' => 'Web Craft',
            'title' => '[Sample Note] Building with Vanilla PHP Instead of Heavy Frameworks',
            'snippet' => 'Rather than installing dozens of dependencies, building this portfolio with vanilla PHP and modular CSS helped me truly understand HTTP requests, template composition, and accessible semantic markup from the ground up.',
            'tag' => 'Web Fundamentals'
        ]
    ],

    // Campus Roles & Student Involvement (Realistic Samplers)
    'experience' => [
        [
            'role' => 'BSIT Student & Project Contributor',
            'organization' => 'National University (NU) Baliwag',
            'period' => '2022 - Present (3rd Year)',
            'type' => 'College of Computing & IT · Baliwag, Bulacan',
            'description' => 'Actively pursuing Bachelor of Science in Information Technology, participating in laboratory exercises, group software systems, and campus IT activities.',
            'bullets' => [
                '[Sample]: Collaborated with student peers on database design and web systems assignments',
                '[Sample]: Participated in technical workshops on web development and network simulation tools',
                '[Sample]: Assisting classmates during hands-on laboratory programming sessions'
            ]
        ],
        [
            'role' => '[Sample Role] Student IT Society / Academic Org Member',
            'organization' => 'NU Baliwag IT Student Organization',
            'period' => 'AY 2023 - Present',
            'type' => 'Student Organization · Campus Involvement',
            'description' => '[Sample Placeholder]: Engaging in departmental seminars, tech exhibits, and peer programming discussions.',
            'bullets' => [
                '[Sample]: Attended campus seminars on emerging technologies and industry best practices',
                '[Sample]: Contributed to student organization tech showcases and event technical support'
            ]
        ],
        [
            'role' => 'Backend & Database Lead / Frontend UI/UX Developer',
            'organization' => 'CredenceLend & CityWatch Projects',
            'period' => '2024 - Present',
            'type' => 'Full-Stack Systems & Civic Platform Development',
            'description' => 'Architected multi-tenant database systems and REST APIs for CredenceLend and served as Frontend UI/UX Developer for the CityWatch community reporting platform.',
            'bullets' => [
                'Engineered multi-tenant relational schemas, role flowcharts, and SQL validation suites for CredenceLend',
                'Designed responsive interface layouts, interactive Leaflet geospatial mapping, and incident dashboards for CityWatch',
                'Documented system specifications and managed cloud continuous deployment on Railway'
            ]
        ]
    ],

    // Resume Data (for modal view)
    'resume' => [
        'summary' => '3rd year Bachelor of Science in Information Technology (BSIT) student at National University (NU) Baliwag with foundations in web systems, database administration, and computer networking. Eager to apply classroom knowledge in a real-world setting, learn from experienced industry professionals, and contribute to software and IT infrastructure projects through an internship / practicum role.',
        'education' => [
            'degree' => 'Bachelor of Science in Information Technology (BSIT)',
            'institution' => 'National University (NU) Baliwag',
            'period' => '2022 - 2026 (Expected Graduation)',
            'honors' => '3rd Year College Student · College of Computing and IT'
        ],
        'core_competencies' => [
            'Web Development Fundamentals (PHP, JavaScript, HTML5, CSS3)',
            'Relational Database Management (MySQL, SQL, phpMyAdmin)',
            'Networking Fundamentals (TCP/IP, VLAN Segmentation, Subnetting)',
            'Systems Analysis & Design (ERD, DFD, Workflow Documentation)',
            'Tools & Platforms (Git, GitHub, VS Code, XAMPP)'
        ]
    ]
];
