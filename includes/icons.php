<?php
/**
 * SVG Icon Helper
 * Returns inline SVG icons for crisp vector rendering without external dependencies.
 */

function render_icon(string $name, string $class = 'icon'): string {
    $icons = [
        'github' => '<svg class="' . htmlspecialchars($class) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>',
        'linkedin' => '<svg class="' . htmlspecialchars($class) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg>',
        'twitter' => '<svg class="' . htmlspecialchars($class) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4l11.733 16h4.267l-11.733 -16z"></path><path d="M4 20l6.768 -6.768m2.46 -2.46l6.772 -6.772"></path></svg>',
        'dribbble' => '<svg class="' . htmlspecialchars($class) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><path d="M19.13 5.09C15.22 9.14 10 10.44 2.25 10.94"></path><path d="M21.75 12.84c-6.62-1.41-12.14 1-16.38 6.32"></path><path d="M8.56 2.75c4.37 6 6 9.42 8 17.72"></path></svg>',
        'sun' => '<svg class="' . htmlspecialchars($class) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="5"></circle><line x1="12" y1="1" x2="12" y2="3"></line><line x1="12" y1="21" x2="12" y2="23"></line><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line><line x1="1" y1="12" x2="3" y2="12"></line><line x1="21" y1="12" x2="23" y2="12"></line><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line></svg>',
        'moon' => '<svg class="' . htmlspecialchars($class) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path></svg>',
        'external-link' => '<svg class="' . htmlspecialchars($class) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" y1="14" x2="21" y2="3"></line></svg>',
        'arrow-right' => '<svg class="' . htmlspecialchars($class) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>',
        'mail' => '<svg class="' . htmlspecialchars($class) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>',
        'map-pin' => '<svg class="' . htmlspecialchars($class) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>',
        'phone' => '<svg class="' . htmlspecialchars($class) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>',
        'download' => '<svg class="' . htmlspecialchars($class) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>',
        'menu' => '<svg class="' . htmlspecialchars($class) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>',
        'close' => '<svg class="' . htmlspecialchars($class) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>',
        'check' => '<svg class="' . htmlspecialchars($class) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>',
        'code' => '<svg class="' . htmlspecialchars($class) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg>',
        'react' => '<svg class="' . htmlspecialchars($class) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><ellipse cx="12" cy="12" rx="10" ry="4"></ellipse><ellipse cx="12" cy="12" rx="10" ry="4" transform="rotate(60 12 12)"></ellipse><ellipse cx="12" cy="12" rx="10" ry="4" transform="rotate(120 12 12)"></ellipse><circle cx="12" cy="12" r="1.5" fill="currentColor"></circle></svg>',
        'vue' => '<svg class="' . htmlspecialchars($class) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="2 3 12 21 22 3 17 3 12 12 7 3 2 3"></polygon><polygon points="7 3 12 12 17 3 13 3 12 5 11 3 7 3"></polygon></svg>',
        'palette' => '<svg class="' . htmlspecialchars($class) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="13.5" cy="6.5" r=".5"></circle><circle cx="17.5" cy="10.5" r=".5"></circle><circle cx="8.5" cy="7.5" r=".5"></circle><circle cx="6.5" cy="12.5" r=".5"></circle><path d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10c.926 0 1.648-.746 1.648-1.688 0-.437-.18-.835-.437-1.125-.29-.289-.438-.652-.438-1.125a1.64 1.64 0 0 1 1.668-1.668h1.996c3.051 0 5.563-2.512 5.563-5.563C22 6.5 17.5 2 12 2z"></path></svg>',
        'php' => '<svg class="' . htmlspecialchars($class) . '" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-label="PHP"><ellipse cx="12" cy="12" rx="11" ry="7.5" fill="#777BB4"/><ellipse cx="12" cy="12" rx="9.8" ry="6.4" fill="#4F5B93"/><path d="M5.5 15V9h2.3c1.3 0 2 .7 2 1.8s-.7 1.8-2 1.8H6.8V15H5.5zm1.3-3.4h1c.5 0 .8-.3.8-.8s-.3-.8-.8-.8h-1v1.6zm4.8 3.4V9h1.3v2.3h2.2V9h1.3v6h-1.3v-2.5h-2.2V15h-1.3zm6.2 0V9h2.3c1.3 0 2 .7 2 1.8s-.7 1.8-2 1.8h-1V15h-1.3zm1.3-3.4h1c.5 0 .8-.3.8-.8s-.3-.8-.8-.8h-1v1.6z" fill="#FFFFFF"/></svg>',
        'nodejs' => '<svg class="' . htmlspecialchars($class) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2l9 5v10l-9 5-9-5V7l9-5z"></path><path d="M12 12l9-5"></path><path d="M12 12v10"></path><path d="M12 12L3 7"></path></svg>',
        'database' => '<svg class="' . htmlspecialchars($class) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><ellipse cx="12" cy="5" rx="9" ry="3"></ellipse><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path></svg>',
        'bolt' => '<svg class="' . htmlspecialchars($class) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>',
        'docker' => '<svg class="' . htmlspecialchars($class) . '" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-label="Docker"><path d="M22 13a6.8 6.8 0 0 0-4.3-3.8c-.3-.8-.8-1.5-1.5-2-.2 1.3-1.1 2.2-2.2 2.2V9H2v4c0 4.4 3.6 8 8 8 5.5 0 9.8-3.7 10.8-8.8.8.4 1.8.4 2.2.3-.2-.5-.4-1-.7-1.5z" fill="#2496ED"/><rect x="5" y="6" width="2" height="2" fill="#2496ED"/><rect x="8" y="6" width="2" height="2" fill="#2496ED"/><rect x="11" y="6" width="2" height="2" fill="#2496ED"/><rect x="5" y="3" width="2" height="2" fill="#2496ED"/><rect x="8" y="3" width="2" height="2" fill="#2496ED"/><rect x="11" y="3" width="2" height="2" fill="#2496ED"/></svg>',
        'cloud' => '<svg class="' . htmlspecialchars($class) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 10h-1.26A8 8 0 1 0 9 20h9a5 5 0 0 0 0-10z"></path></svg>',
        'git' => '<svg class="' . htmlspecialchars($class) . '" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-label="Git"><path d="M22.5 10.7l-9.2-9.2c-.8-.8-2.2-.8-3 0L8.1 3.7l3.8 3.8c.8-.3 1.7-.1 2.3.5.6.6.8 1.5.5 2.3l3.6 3.6c.8-.3 1.7-.1 2.3.5.9.9.9 2.3 0 3.2-.9.9-2.3.9-3.2 0-.7-.7-.9-1.8-.4-2.6l-3.4-3.4v4.9c.3.2.5.5.6.9.5 1.1 0 2.4-1.1 2.9-1.1.5-2.4 0-2.9-1.1-.5-1.1 0-2.4 1.1-2.9.4-.2.8-.2 1.2-.2V8.2c-.4 0-.8-.1-1.2-.3L7.1 9.7l-.4-.4c-.8-.8-.8-2.2 0-3L1.5 11.5c-.8.8-.8 2.2 0 3l9.2 9.2c.8.8 2.2.8 3 0l8.8-8.8c.8-.8.8-2.2 0-3.2z" fill="#F05032"/><circle cx="16.5" cy="7.5" r="1.5" fill="#FFFFFF"/><circle cx="17.5" cy="14.5" r="1.5" fill="#FFFFFF"/><circle cx="10.5" cy="18.5" r="1.5" fill="#FFFFFF"/></svg>',
        'api' => '<svg class="' . htmlspecialchars($class) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="4 17 10 11 4 5"></polyline><line x1="12" y1="19" x2="20" y2="19"></line></svg>',
        'sparkles' => '<svg class="' . htmlspecialchars($class) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2l2.4 7.2L22 12l-7.6 2.8L12 22l-2.4-7.2L2 12l7.6-2.8z"></path></svg>',
        'briefcase' => '<svg class="' . htmlspecialchars($class) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg>',
        'terminal' => '<svg class="' . htmlspecialchars($class) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="4 17 10 11 4 5"></polyline><line x1="12" y1="19" x2="20" y2="19"></line></svg>',
        'book' => '<svg class="' . htmlspecialchars($class) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>',
        'layers' => '<svg class="' . htmlspecialchars($class) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>',
        'sidebar' => '<svg class="' . htmlspecialchars($class) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="9" y1="3" x2="9" y2="21"></line></svg>',
        'sidebar-collapse' => '<svg class="' . htmlspecialchars($class) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><path d="M9 3v18"></path><path d="m16 15-3-3 3-3"></path></svg>',
        'sidebar-expand' => '<svg class="' . htmlspecialchars($class) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><path d="M9 3v18"></path><path d="m14 9 3 3-3 3"></path></svg>',
        'chevron-left' => '<svg class="' . htmlspecialchars($class) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"></polyline></svg>',
        'chevron-right' => '<svg class="' . htmlspecialchars($class) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>',
        'send' => '<svg class="' . htmlspecialchars($class) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>',
        'compass' => '<svg class="' . htmlspecialchars($class) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"></polygon></svg>',
        'help-circle' => '<svg class="' . htmlspecialchars($class) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>',
        'sliders' => '<svg class="' . htmlspecialchars($class) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="4" y1="21" x2="4" y2="14"></line><line x1="4" y1="10" x2="4" y2="3"></line><line x1="12" y1="21" x2="12" y2="12"></line><line x1="12" y1="8" x2="12" y2="3"></line><line x1="20" y1="21" x2="20" y2="16"></line><line x1="20" y1="12" x2="20" y2="3"></line><line x1="1" y1="14" x2="7" y2="14"></line><line x1="9" y1="8" x2="15" y2="8"></line><line x1="17" y1="16" x2="23" y2="16"></line></svg>',
        'javascript' => '<svg class="' . htmlspecialchars($class) . '" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-label="JavaScript"><rect width="24" height="24" rx="4.5" fill="#F7DF1E"/><path d="M7.5 17.6c.8.5 1.7.7 2.6.7 1.5 0 2.4-.7 2.4-2.1v-5.6h-2.2v5.5c0 .5-.3.8-.8.8-.4 0-.8-.1-1.2-.3l-.8 1zm8.3.2c1.7 0 3-.9 3-2.6 0-1.7-1-2.4-2.6-3.1-.9-.4-1.4-.7-1.4-1.3 0-.5.4-.9 1.2-.9.7 0 1.4.3 1.9.7l.8-1.5c-.7-.5-1.7-.8-2.7-.8-1.7 0-2.8 1-2.8 2.4 0 1.6 1 2.3 2.5 2.9 1 .4 1.5.8 1.5 1.5 0 .6-.5 1-1.3 1-.9 0-1.7-.4-2.3-1l-.9 1.5c.8.7 1.9 1.1 3.2 1.1z" fill="#000000"/></svg>',
        'html5' => '<svg class="' . htmlspecialchars($class) . '" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-label="HTML5"><path d="M3.2 2l1.7 17.5 7.1 2 7.1-2 1.7-17.5H3.2z" fill="#E34F26"/><path d="M12 3.7v16.2l5.6-1.6 1.4-14.6H12z" fill="#EF652A"/><path d="M12 7.5H7.3l.3 3.3H12V7.5zm0 5.6H9.7l.2 2.5 2.1.6v2.1l-4.1-1.1-.3-3.1h4.4v-1z" fill="#EBEBEB"/><path d="M12 7.5v3.3h4.4l-.4 4.2-4 1.1v2.1l6.1-1.7.7-9H12z" fill="#FFFFFF"/></svg>',
        'css3' => '<svg class="' . htmlspecialchars($class) . '" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-label="CSS3"><path d="M3.2 2l1.7 17.5 7.1 2 7.1-2 1.7-17.5H3.2z" fill="#1572B6"/><path d="M12 3.7v16.2l5.6-1.6 1.4-14.6H12z" fill="#33A9DC"/><path d="M12 7.5H7.3l.3 3.3H12V7.5zm0 5.6H9.7l.2 2.5 2.1.6v2.1l-4.1-1.1-.3-3.1h4.4v-1z" fill="#EBEBEB"/><path d="M12 7.5v3.3h4.4l-.4 4.2-4 1.1v2.1l6.1-1.7.7-9H12z" fill="#FFFFFF"/></svg>',
        'mysql' => '<svg class="' . htmlspecialchars($class) . '" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-label="MySQL"><ellipse cx="12" cy="6.5" rx="8.5" ry="3" fill="#00758F"/><path d="M3.5 6.5v9c0 1.6 3.8 3 8.5 3s8.5-1.4 8.5-3v-9" stroke="#00758F" stroke-width="1.8" fill="none"/><path d="M3.5 11c0 1.6 3.8 3 8.5 3s8.5-1.4 8.5-3" stroke="#00758F" stroke-width="1.8" fill="none"/><path d="M17.8 12c-2.4 1.1-5.6.4-7.8-1.3-2.6-2.1-3.5-5.3-3-7.8.2-1.4 1-2.6 1.6-3 .3-.2.8-.1.9.2.2.3.1.8-.2 1-.4.4-1 1.2-1.1 2.3-.3 2 .3 4.5 2.3 6.2 1.6 1.3 4.2 1.6 5.8 1 .4-.2.9.1 1 .5.2.4 0 .7-.5.9z" fill="#F29111"/><circle cx="11.2" cy="4.2" r="0.8" fill="#F29111"/></svg>',
        'java' => '<svg class="' . htmlspecialchars($class) . '" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-label="Java"><path d="M9.8 1.5c-1.2 1.6.4 2.8 1.4 3.9 1.1 1.2 1.8 2.2 1.2 3.8-.4 1.1-1.3 1.8-2 2.7-.3.4-.6.8-.7 1.2.7-.1 1.4-.4 1.9-.9 1-1 1.5-2.2 1-3.7-.6-1.5-1.5-2.4-2.2-3.6-.4-.7-.9-1.6-.6-3.4z" fill="#E76F00"/><path d="M13.8 4c-.7 1.1-.1 2 .6 2.8.8.9 1.4 1.7 1 2.8-.3.8-.9 1.4-1.5 2.1-.2.3-.4.6-.5.9.5-.1 1-.3 1.4-.7.7-.7 1.1-1.6.8-2.7-.4-1.1-1.1-1.8-1.6-2.7-.3-.5-.6-1.2-.2-2.5z" fill="#E76F00"/><path d="M5 14.5c0 2.5 3.1 4.5 7 4.5s7-2 7-4.5h-14zm14.5 1c.5-.4.8-.9.8-1.5h-1.2c0 .6-.4 1.1-.9 1.4l1.3.1zm-15.8 4.2c2.2 1.1 5.3 1.8 8.3 1.8 3 0 6.1-.7 8.3-1.8-1.8 1.5-5 2.3-8.3 2.3s-6.5-.8-8.3-2.3z" fill="#5382A1"/></svg>',
        'python' => '<svg class="' . htmlspecialchars($class) . '" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-label="Python"><path d="M11.9 2c-3.1 0-4.9 1.4-4.9 3.8v2.7h5.1v.8H5.2C3 9.3 2 10.7 2 13.5c0 2.7 1.4 4.2 4.1 4.2h1.6v-2.3c0-2.2 1.8-3.9 4.1-3.9h3.7c1.3 0 2.3-.9 2.3-2.2V5.8c0-2.4-1.8-3.8-5.9-3.8zm-2.4 2a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" fill="#3776AB"/><path d="M12.1 22c3.1 0 4.9-1.4 4.9-3.8v-2.7h-5.1v-.8h6.9c2.2 0 3.2-1.4 3.2-4.2 0-2.7-1.4-4.2-4.1-4.2h-1.6v2.3c0 2.2-1.8 3.9-4.1 3.9H8.5c-1.3 0-2.3.9-2.3 2.2v3.5c0 2.4 1.8 3.8 5.9 3.8zm2.4-2a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" fill="#FFD43B"/></svg>',
        'vscode' => '<svg class="' . htmlspecialchars($class) . '" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-label="Visual Studio Code"><path d="M17.5 2.2l-9.8 9.3-4.2-3.3-2 1.4 4.3 3.4-4.3 3.4 2 1.4 4.2-3.3 9.8 9.3 5-2.4V4.6l-5-2.4zm1.5 15.5l-6-4.7 6-4.7v9.4z" fill="#007ACC"/><path d="M17.5 2.2L11.5 8l6 4.7 1.5-.7V4.6l-1.5-2.4z" fill="#1F9CF0"/><path d="M17.5 21.8L11.5 16l6-4.7 1.5.7v6.7l-1.5 3.1z" fill="#0065A9"/></svg>',
        'apache' => '<svg class="' . htmlspecialchars($class) . '" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-label="Apache"><path d="M18.8 2.5C17.2 4.8 15 9.2 14.2 12c1.3-.8 2.8-1.5 4.3-1.9-.8-2.6-.2-5.7.3-7.6z" fill="#E42528"/><path d="M14.2 12c-1.2 4-2.8 7.5-4.4 9.5.5-1.5 1.2-3.3 1.8-5.3.8-2.6 1.7-4.1 2.6-4.2z" fill="#EE5B2B"/><path d="M10.8 13.5c-.8 2.6-1.7 5.1-2.8 7.3 1.4-2.1 2.9-4.8 3.8-7.8-1 0-1.8 1.2-1 3.5l-1-.7c0-.8.5-1.6 1-2.3z" fill="#F7971E"/><path d="M17.2 7.8c-1.5 1.5-3.2 3.8-4.5 6.4.8-1.9 1.8-3.4 3-4.5 1-.9 1.9-1.5 2.5-1.9l-1 0z" fill="#8DC63F"/></svg>',
        'network' => '<svg class="' . htmlspecialchars($class) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="6" height="6" rx="1"></rect><rect x="16" y="2" width="6" height="6" rx="1"></rect><rect x="9" y="16" width="6" height="6" rx="1"></rect><path d="M5 8v3a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V8"></path><line x1="12" y1="12" x2="12" y2="16"></line></svg>',
        'typescript' => '<svg class="' . htmlspecialchars($class) . '" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-label="TypeScript"><rect width="24" height="24" rx="4.5" fill="#3178C6"/><path d="M11.5 7.8H5.8V10h1.8v8.2h2.2V10h1.7V7.8z" fill="#FFFFFF"/><path d="M18.8 10.6c-.4-.5-1-.9-1.9-.9-1.2 0-1.9.6-1.9 1.5 0 1.1.9 1.5 2.2 2 1.7.6 2.6 1.3 2.6 2.9 0 1.8-1.4 2.9-3.5 2.9-1.5 0-2.7-.6-3.3-1.7l1.6-1.1c.4.7 1 1 1.7 1 .8 0 1.3-.4 1.3-.9 0-.6-.5-.9-1.7-1.4-1.5-.6-2.7-1.3-2.7-2.9 0-1.7 1.3-2.9 3.3-2.9 1.2 0 2.3.5 3 1.3l-1.6 1.2z" fill="#FFFFFF"/></svg>',
        'nu-logo' => '<img src="assets/img/nu-logo.png" alt="National University Logo" class="' . htmlspecialchars($class) . '" loading="lazy">'
    ];

    return $icons[$name] ?? '<span class="icon-fallback">•</span>';
}

/**
 * Maps a tech name or skill to its appropriate icon representation
 * Uses official brand vector assets from assets/img/tech/ when available
 */
function render_tech_icon(string $name, string $class = 'tech-icon'): string {
    $normalized = strtolower(trim($name));
    
    // Direct mapping to official Devicon SVG assets
    $techMap = [
        'php' => 'php',
        'mysql' => 'mysql',
        'sql' => 'mysql',
        'typescript' => 'typescript',
        'ts' => 'typescript',
        'html' => 'html5',
        'html5' => 'html5',
        'css' => 'css3',
        'css3' => 'css3',
        'javascript' => 'javascript',
        'js' => 'javascript',
        'python' => 'python',
        'java' => 'java',
        'git' => 'git',
        'vscode' => 'vscode',
        'vs code' => 'vscode',
        'docker' => 'docker',
        'apache' => 'apache',
    ];

    foreach ($techMap as $keyword => $fileSlug) {
        if ($keyword === 'java' && str_contains($normalized, 'javascript')) continue;
        if (str_contains($normalized, $keyword)) {
            $svgPath = __DIR__ . '/../assets/img/tech/' . $fileSlug . '.svg';
            if (file_exists($svgPath)) {
                return '<img src="assets/img/tech/' . htmlspecialchars($fileSlug) . '.svg" alt="' . htmlspecialchars($name) . '" class="' . htmlspecialchars($class) . '" loading="lazy" width="20" height="20">';
            }
            return render_icon($fileSlug, $class);
        }
    }

    if (str_contains($normalized, 'national university') || str_contains($normalized, 'nu baliwag')) {
        return render_icon('nu-logo', $class);
    }
    if (str_contains($normalized, 'network') || str_contains($normalized, 'vlan') || str_contains($normalized, 'subnet') || str_contains($normalized, 'tcp/ip')) {
        return render_icon('network', $class);
    }
    if (str_contains($normalized, 'linux') || str_contains($normalized, 'terminal') || str_contains($normalized, 'wireshark')) {
        return render_icon('terminal', $class);
    }
    if (str_contains($normalized, 'api') || str_contains($normalized, 'crud') || str_contains($normalized, 'rest')) {
        return render_icon('api', $class);
    }
    if (str_contains($normalized, 'system') || str_contains($normalized, 'sdlc') || str_contains($normalized, 'erd') || str_contains($normalized, 'modeling')) {
        return render_icon('layers', $class);
    }
    if (str_contains($normalized, 'ojt') || str_contains($normalized, 'practicum') || str_contains($normalized, 'internship')) {
        return render_icon('briefcase', $class);
    }
    
    return render_icon('code', $class);
}

