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
        'email' => 'johnsenen.estrella@example.com', // [Sample: Replace with your email]
        'phone' => '+63 (900) 000-0000', // [Sample: Replace with your phone]
        'github_username' => 'johnsenen', // [Sample: Replace with your GitHub]
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
                'output' => "John Senen Estrella\n3rd Year College Student taking BS in Information Technology (BSIT)\nNational University (NU) Baliwag\nInterested in web development, database management, and networking."
            ],
            'status' => [
                'cmd' => 'cat status.txt',
                'label' => 'cat status.txt',
                'output' => "Academic Standing: 3rd Year College Student\nProgram: Bachelor of Science in Information Technology (BSIT)\nInstitution: National University (NU) Baliwag\nCurrent Focus: Web Systems, Databases, Systems Analysis & Networking\nGoal: Seeking IT Practicum / Internship"
            ],
            'courses' => [
                'cmd' => 'courses --current',
                'label' => 'courses --current',
                'output' => "[Sample 3rd Year BSIT Subjects - Replace with your current load]\n- IT 301: Web Systems and Technologies\n- IT 302: Database Management Systems\n- IT 303: Networking and Communications\n- IT 304: Systems Analysis and Design"
            ],
            'goals' => [
                'cmd' => 'cat goals.txt',
                'label' => 'cat goals.txt',
                'output' => "Student Goals:\n1. Build full-stack web and database applications\n2. Gain hands-on network administration and security skills\n3. Complete capstone project / systems requirements\n4. Prepare for 4th year IT internship / industry practicum"
            ],
            'favorite_bug' => [
                'cmd' => 'cat favorite_bug.log',
                'label' => 'cat favorite_bug.log',
                'output' => "[Sample Debugging Lesson - Replace with your own bug story]\nSpent 2 hours troubleshooting a database connection failure in PHP.\nRoot cause: Misconfigured database credentials in the config file.\nLesson: Always verify connection strings and inspect error logs first."
            ],
            'contact' => [
                'cmd' => 'finger john',
                'label' => 'finger john',
                'output' => "Name: John Senen Estrella\nProgram: BSIT, 3rd Year\nCampus: NU Baliwag (National University Baliwag)\nEmail: johnsenen.estrella@example.com\nStatus: Open for internship inquiries and academic collaborations."
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
            'chips' => ['PHP 8', 'MySQL', 'Cisco Packet Tracer']
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

    // Social & Professional Links (Placeholders)
    'socials' => [
        'github' => [
            'name' => 'GitHub',
            'url' => 'https://github.com', // [Sample: update with your profile]
            'icon' => 'github',
            'handle' => '@johnsenen'
        ],
        'linkedin' => [
            'name' => 'LinkedIn',
            'url' => 'https://linkedin.com', // [Sample: update with your profile]
            'icon' => 'linkedin',
            'handle' => 'john-senen-estrella'
        ],
        'email' => [
            'name' => 'Email',
            'url' => 'mailto:johnsenen.estrella@example.com',
            'icon' => 'mail',
            'handle' => 'johnsenen.estrella@example.com'
        ]
    ],

    // Coursework Matrix - BSIT Curriculum Sampler
    'courses' => [
        [
            'code' => 'IT 301',
            'title' => 'Web Systems and Technologies',
            'term' => '3rd Year (Sample)',
            'category' => 'Web Systems',
            'languages' => ['PHP', 'MySQL', 'JavaScript', 'HTML5', 'CSS3'],
            'summary' => '[Sample Coursework]: Development of dynamic, database-driven web applications. Covers client-server architecture, session management, and CRUD operations.',
            'lesson' => '[Sample Takeaway]: Learned how server-side PHP interacts with relational databases and how to sanitize input data to prevent SQL injection.'
        ],
        [
            'code' => 'IT 302',
            'title' => 'Database Management Systems',
            'term' => '3rd Year (Sample)',
            'category' => 'Databases',
            'languages' => ['SQL', 'MySQL', 'phpMyAdmin', 'Relational Modeling'],
            'summary' => '[Sample Coursework]: Relational database design, Entity-Relationship Diagrams (ERD), normalization (1NF to 3NF), and structured SQL querying.',
            'lesson' => '[Sample Takeaway]: Proper table normalization and foreign key constraints prevent data redundancy and make application queries much faster.'
        ],
        [
            'code' => 'IT 303',
            'title' => 'Networking and Data Communications',
            'term' => '3rd Year (Sample)',
            'category' => 'Networking',
            'languages' => ['TCP/IP', 'Cisco Packet Tracer', 'Subnetting', 'LAN/WAN'],
            'summary' => '[Sample Coursework]: Network topologies, OSI reference model, IPv4 subnetting, router/switch configuration, and basic troubleshooting in simulated environments.',
            'lesson' => '[Sample Takeaway]: Hands-on packet tracing helped demystify how DNS resolution, routing hops, and subnets work together.'
        ],
        [
            'code' => 'IT 304',
            'title' => 'Systems Analysis and Design',
            'term' => '3rd Year (Sample)',
            'category' => 'Analysis',
            'languages' => ['UML', 'Data Flow Diagrams', 'Agile', 'Figma'],
            'summary' => '[Sample Coursework]: Software development lifecycles, user requirement documentation, system modeling with UML diagrams, and UI/UX wireframing.',
            'lesson' => '[Sample Takeaway]: Documenting user workflows and data flow diagrams before coding saves countless hours of rebuilding later.'
        ],
        [
            'code' => 'IT 201',
            'title' => 'Object-Oriented Programming',
            'term' => '2nd Year (Sample)',
            'category' => 'Programming',
            'languages' => ['Java / Python', 'OOP Principles', 'GUI'],
            'summary' => '[Sample Coursework]: Core object-oriented programming concepts: classes, inheritance, encapsulation, polymorphism, and basic GUI form development.',
            'lesson' => '[Sample Takeaway]: Writing modular, object-oriented classes makes code easier to maintain and reuse across larger assignments.'
        ],
        [
            'code' => 'IT 202',
            'title' => 'Information Assurance and Security',
            'term' => '3rd Year (Sample)',
            'category' => 'Security',
            'languages' => ['Security Principles', 'Access Control', 'OWASP'],
            'summary' => '[Sample Coursework]: Introduction to cybersecurity fundamentals, authentication protocols, secure coding best practices, and vulnerability prevention.',
            'lesson' => '[Sample Takeaway]: Security must be considered from the first line of code, not as an afterthought.'
        ]
    ],

    // Tools & Technologies in Active Use (BSIT Focused)
    'toolkit' => [
        'Languages & Web' => ['PHP', 'JavaScript', 'HTML5', 'CSS3', 'SQL', 'Java / Python'],
        'Tools & Platforms' => ['VS Code', 'Git & GitHub', 'XAMPP / Apache', 'MySQL / phpMyAdmin', 'Cisco Packet Tracer'],
        'Core IT Competencies' => ['Web Development', 'Database Normalization', 'Network Subnetting', 'Systems Analysis', 'CRUD Operations']
    ],

    // Featured Student Projects (BSIT Samplers)
    'projects' => [
        [
            'id' => 'campus-portal',
            'title' => '[Sample Project] Student Information / Portal System',
            'subtitle' => 'Web-based student record and enrollment management prototype',
            'category' => 'Web & Database',
            'tagline' => 'A coursework project demonstrating relational database design and CRUD operations.',
            'context' => '[Sample Placeholder]: Built as a semester project for Web Systems and Database Management classes. Allows student registration, course viewing, and grade records management with role-based access for students and administrators.',
            'tags' => ['PHP', 'MySQL', 'JavaScript', 'HTML5', 'CSS3'],
            'what_broke' => '[Sample Bug Story]: During initial testing, session authentication allowed unauthorized access to admin pages via direct URL entry. Implemented strict session checks and redirect guards.',
            'takeaway' => '[Sample Takeaway]: Gained solid understanding of user session management, password hashing, and clean PHP-MySQL integration.',
            'github_url' => 'https://github.com',
            'live_url' => 'https://example.com',
            'badge' => 'Coursework Project'
        ],
        [
            'id' => 'inventory-system',
            'title' => '[Sample Project] Inventory & Stock Management System',
            'subtitle' => 'Database-driven inventory tracking tool with transaction logging',
            'category' => 'Database Application',
            'tagline' => 'Designed to help small businesses track incoming and outgoing product stock.',
            'context' => '[Sample Placeholder]: Developed to apply relational database normalization concepts. Features product categorization, stock level alerts, and transaction history generation.',
            'tags' => ['PHP / Java', 'MySQL', 'Bootstrap / CSS', 'SQL'],
            'what_broke' => '[Sample Bug Story]: Deleting product categories caused orphan records in the inventory table. Resolved by configuring foreign key ON DELETE CASCADE constraints and soft-deletes.',
            'takeaway' => '[Sample Takeaway]: Appreciated the importance of database integrity rules and automated inventory calculations.',
            'github_url' => 'https://github.com',
            'live_url' => 'https://example.com',
            'badge' => 'Class Project'
        ],
        [
            'id' => 'network-sim',
            'title' => '[Sample Project] Campus Network Architecture Simulation',
            'subtitle' => 'LAN/WAN infrastructure design and IP subnetting model',
            'category' => 'Networking',
            'tagline' => 'Simulated multi-department campus network in Cisco Packet Tracer.',
            'context' => '[Sample Placeholder]: Created for Networking and Data Communications coursework. Configured routers, switches, DHCP pools, and VLANs to segregate faculty and student lab subnets.',
            'tags' => ['Cisco Packet Tracer', 'IPv4 Subnetting', 'VLANs', 'DHCP', 'Routing'],
            'what_broke' => '[Sample Bug Story]: Subnet mask miscalculations caused cross-VLAN communication failures between faculty and lab switches. Rewrote the IP addressing table using VLSM.',
            'takeaway' => '[Sample Takeaway]: Learned how to design efficient subnet hierarchies and verify connectivity using ping and traceroute tests.',
            'github_url' => 'https://github.com',
            'live_url' => 'https://example.com',
            'badge' => 'Lab Simulation'
        ],
        [
            'id' => 'portfolio-site',
            'title' => '[Current Project] Handcrafted Student Web Portfolio',
            'subtitle' => 'Accessible, framework-free personal portfolio and technical notebook',
            'category' => 'Personal Project',
            'tagline' => 'Built from scratch with vanilla PHP, modern CSS, and JavaScript.',
            'context' => 'Created to document my 3rd year BSIT journey at NU Baliwag, project samplers, and technical lessons learned throughout my studies.',
            'tags' => ['PHP 8', 'Vanilla CSS', 'JavaScript', 'SPA Navigation'],
            'what_broke' => 'Building an SPA view router with browser back/forward history without relying on heavy frontend frameworks required careful popstate and hash routing handling.',
            'takeaway' => 'Understood how powerful vanilla web technologies are when written with clean, modular architecture.',
            'github_url' => 'https://github.com',
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
            'role' => '[Sample Milestone] Academic Project / Hackathon Participant',
            'organization' => 'College IT Project Showcase',
            'period' => 'AY 2024',
            'type' => 'Academic Showcase · Team Project',
            'description' => '[Sample Placeholder]: Teamed up with classmates to design, develop, and present a functional software prototype for semester evaluation.',
            'bullets' => [
                '[Sample]: Handled backend database setup and connection testing for our team prototype',
                '[Sample]: Prepared project documentation and presented system features to faculty evaluators'
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
            'Networking Fundamentals (TCP/IP, Cisco Packet Tracer, Subnetting)',
            'Systems Analysis & Design (ERD, DFD, Workflow Documentation)',
            'Tools & Platforms (Git, GitHub, VS Code, XAMPP)'
        ]
    ]
];
