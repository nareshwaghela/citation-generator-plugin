/**
 * Citation Generator Pro - Main Stylesheet
 * Version: 1.0.0
 * Author: Naresh Waghela
 * 
 * Yelp-inspired modern UI with WordPress integration
 */

/* ===== CSS VARIABLES (WordPress Theme Compatible) ===== */
:root {
    /* Primary Colors */
    --cg-red: #d32323;
    --cg-red-dark: #b71c1c;
    --cg-red-light: #ff5252;
    --cg-red-bg: #fff5f5;
    
    /* Accent Colors */
    --cg-gold: #f4c150;
    --cg-green: #28a745;
    --cg-blue: #007bff;
    --cg-orange: #ffa726;
    
    /* Neutral Colors */
    --cg-text-primary: #333333;
    --cg-text-secondary: #666666;
    --cg-text-muted: #999999;
    --cg-white: #ffffff;
    --cg-bg-gray: #f5f5f5;
    --cg-border-color: #e6e6e6;
    
    /* Shadows */
    --cg-shadow-sm: 0 2px 8px rgba(0, 0, 0, 0.08);
    --cg-shadow-md: 0 4px 16px rgba(0, 0, 0, 0.12);
    --cg-shadow-lg: 0 8px 30px rgba(0, 0, 0, 0.15);
    --cg-shadow-hover: 0 12px 40px rgba(211, 35, 35, 0.25);
    
    /* Border Radius */
    --cg-radius-sm: 8px;
    --cg-radius-md: 12px;
    --cg-radius-lg: 16px;
    --cg-radius-full: 50%;
    
    /* Transitions */
    --cg-transition-fast: all 0.2s ease;
    --cg-transition-normal: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    --cg-transition-slow: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
}

/* ===== RESET & BASE STYLES ===== */
.cg-wrapper {
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
    line-height: 1.6;
    color: var(--cg-text-primary);
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

.cg-wrapper *,
.cg-wrapper *::before,
.cg-wrapper *::after {
    box-sizing: inherit;
}

/* ===== PAGE CONTAINER ===== */
.cg-page-container {
    max-width: 1200px;
    margin: 40px auto;
    padding: 0 20px;
}

/* ===== HERO SECTION ===== */
.cg-hero {
    background: linear-gradient(135deg, var(--cg-red) 0%, var(--cg-red-dark) 100%);
    color: var(--cg-white);
    padding: 70px 50px;
    border-radius: var(--cg-radius-lg);
    text-align: center;
    margin-bottom: 45px;
    box-shadow: var(--cg-shadow-lg);
    position: relative;
    overflow: hidden;
}

.cg-hero::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
    animation: cg-pulse-animation 4s ease-in-out infinite;
}

@keyframes cg-pulse-animation {
    0%, 100% { transform: scale(1); opacity: 0.5; }
    50% { transform: scale(1.1); opacity: 0.8; }
}

.cg-hero-icon {
    font-size: 4.5rem;
    margin-bottom: 20px;
    position: relative;
    z-index: 1;
    display: inline-block;
    animation: cg-bounce 2s infinite;
}

@keyframes cg-bounce {
    0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
    40% { transform: translateY(-15px); }
    60% { transform: translateY(-7px); }
}

.cg-hero h1 {
    font-size: 3.2rem;
    font-weight: 800;
    margin-bottom: 18px;
    position: relative;
    z-index: 1;
    letter-spacing: -1.5px;
    line-height: 1.2;
}

.cg-hero p {
    font-size: 1.25rem;
    opacity: 0.95;
    max-width: 750px;
    margin: 0 auto;
    line-height: 1.7;
    position: relative;
    z-index: 1;
    font-weight: 300;
}

/* ===== MAIN LAYOUT GRID ===== */
.cg-main-grid {
    display: grid;
    grid-template-columns: 320px 1fr;
    gap: 35px;
    align-items: start;
}

/* ===== SIDEBAR (INPUT FORM) ===== */
.cg-sidebar {
    background: var(--cg-white);
    border-radius: var(--cg-radius-md);
    padding: 35px;
    box-shadow: var(--cg-shadow-md);
    position: sticky;
    top: 30px;
    transition: var(--cg-transition-normal);
}

.cg-sidebar:hover {
    box-shadow: var(--cg-shadow-lg);
}

.cg-sidebar-title {
    font-size: 1.6rem;
    font-weight: 700;
    color: var(--cg-text-primary);
    margin-bottom: 28px;
    display: flex;
    align-items: center;
    gap: 12px;
    padding-bottom: 18px;
    border-bottom: 3px solid var(--cg-red);
}

/* ===== FORM ELEMENTS ===== */
.cg-form-group {
    margin-bottom: 24px;
}

.cg-form-label {
    display: block;
    font-weight: 600;
    margin-bottom: 9px;
    color: var(--cg-text-primary);
    font-size: 14px;
    letter-spacing: 0.3px;
}

.cg-form-label .required {
    color: var(--cg-red);
    margin-left: 3px;
}

.cg-form-input,
.cg-form-textarea,
.cg-form-select {
    width: 100%;
    padding: 13px 17px;
    border: 2px solid var(--cg-border-color);
    border-radius: var(--cg-radius-sm);
    font-size: 14px;
    font-family: inherit;
    outline: none;
    transition: var(--cg-transition-fast);
    background: var(--cg-white);
    color: var(--cg-text-primary);
}

.cg-form-input:hover,
.cg-form-textarea:hover,
.cg-form-select:hover {
    border-color: #ccc;
}

.cg-form-input:focus,
.cg-form-textarea:focus,
.cg-form-select:focus {
    border-color: var(--cg-red);
    box-shadow: 0 0 0 4px rgba(211, 35, 35, 0.1);
}

.cg-form-input::placeholder,
.cg-form-textarea::placeholder {
    color: var(--cg-text-muted);
    opacity: 0.7;
}

.cg-form-textarea {
    resize: vertical;
    min-height: 110px;
    line-height: 1.6;
}

/* ===== GENERATE BUTTON ===== */
.cg-generate-btn {
    width: 100%;
    background: linear-gradient(135deg, var(--cg-red) 0%, var(--cg-red-dark) 100%);
    color: var(--cg-white);
    border: none;
    padding: 16px 32px;
    border-radius: var(--cg-radius-sm);
    cursor: pointer;
    font-weight: 700;
    font-size: 16px;
    font-family: inherit;
    letter-spacing: 0.5px;
    transition: var(--cg-transition-normal);
    box-shadow: 0 5px 20px rgba(211, 35, 35, 0.35);
    margin-top: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    position: relative;
    overflow: hidden;
}

.cg-generate-btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
    transition: left 0.5s;
}

.cg-generate-btn:hover::before {
    left: 100%;
}

.cg-generate-btn:hover {
    transform: translateY(-4px);
    box-shadow: 0 10px 30px rgba(211, 35, 35, 0.45);
}

.cg-generate-btn:active {
    transform: translateY(-2px);
}

.cg-generate-btn .btn-icon {
    font-size: 1.2em;
}

/* Loading state */
.cg-generate-btn.loading {
    opacity: 0.7;
    cursor: not-allowed;
    pointer-events: none;
}

.cg-generate-btn.loading::after {
    content: '';
    width: 18px;
    height: 18px;
    border: 2px solid rgba(255,255,255,0.3);
    border-top-color: white;
    border-radius: 50%;
    animation: cg-spin 0.8s linear infinite;
    margin-left: 10px;
}

@keyframes cg-spin {
    to { transform: rotate(360deg); }
}

/* ===== CONTENT AREA ===== */
.cg-content-area {
    display: flex;
    flex-direction: column;
    gap: 28px;
}

/* ===== FORMAT TABS ===== */
.cg-format-tabs-container {
    background: var(--cg-white);
    border-radius: var(--cg-radius-md);
    padding: 22px 28px;
    box-shadow: var(--cg-shadow-sm);
    display: flex;
    gap: 11px;
    flex-wrap: wrap;
    align-items: center;
    transition: var(--cg-transition-normal);
}

.cg-format-tabs-container:hover {
    box-shadow: var(--cg-shadow-md);
}

.cg-format-label {
    font-weight: 700;
    color: var(--cg-text-secondary);
    margin-right: 12px;
    font-size: 14px;
    text-transform: uppercase;
    letter-spacing: 0.8px;
}

.cg-format-tab {
    padding: 11px 24px;
    background: transparent;
    border: 2px solid var(--cg-border-color);
    border-radius: 28px;
    cursor: pointer;
    font-family: inherit;
    font-size: 14px;
    font-weight: 600;
    color: var(--cg-text-secondary);
    transition: var(--cg-transition-normal);
    position: relative;
    overflow: hidden;
}

.cg-format-tab::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 0;
    height: 0;
    border-radius: 50%;
    background: rgba(211, 35, 35, 0.1);
    transform: translate(-50%, -50%);
    transition: width 0.4s, height 0.4s;
}

.cg-format-tab:hover::before {
    width: 250px;
    height: 250px;
}

.cg-format-tab:hover {
    border-color: var(--cg-red);
    color: var(--cg-red);
    background: var(--cg-red-bg);
}

.cg-format-tab.active {
    background: var(--cg-red);
    color: var(--cg-white);
    border-color: var(--cg-red);
    box-shadow: 0 5px 15px rgba(211, 35, 35, 0.35);
    transform: translateY(-3px);
}

.cg-format-tab.active:hover {
    background: var(--cg-red-dark);
    color: var(--cg-white);
}

/* ===== CITATION OUTPUT CARD ===== */
.cg-output-card {
    background: var(--cg-white);
    border-radius: var(--cg-radius-md);
    overflow: hidden;
    box-shadow: var(--cg-shadow-md);
    transition: var(--cg-transition-slow);
}

.cg-output-card:hover {
    box-shadow: var(--cg-shadow-hover);
    transform: translateY(-6px);
}

.cg-output-header {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    padding: 22px 28px;
    border-bottom: 2px solid var(--cg-border-color);
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 15px;
}

.cg-output-title {
    font-size: 1.35rem;
    font-weight: 700;
    color: var(--cg-text-primary);
    display: flex;
    align-items: center;
    gap: 12px;
}

.cg-copy-btn {
    background: var(--cg-red);
    color: var(--cg-white);
    border: none;
    padding: 12px 26px;
    border-radius: var(--cg-radius-sm);
    cursor: pointer;
    font-weight: 600;
    font-size: 13px;
    font-family: inherit;
    transition: var(--cg-transition-normal);
    display: flex;
    align-items: center;
    gap: 9px;
    box-shadow: 0 3px 10px rgba(211, 35, 35, 0.3);
    white-space: nowrap;
}

.cg-copy-btn:hover {
    background: var(--cg-red-dark);
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(211, 35, 35, 0.4);
}

.cg-copy-btn.copied {
    background: var(--cg-green);
}

.cg-copy-btn .copy-icon {
    font-size: 1.1em;
}

/* Output Body */
.cg-output-body {
    padding: 35px 28px;
}

.cg-citation-display {
    background: #f8f9ff;
    border-left: 5px solid var(--cg-red);
    padding: 28px;
    border-radius: 0 var(--cg-radius-sm) var(--cg-radius-sm) 0;
    font-size: 15px;
    line-height: 1.85;
    color: var(--cg-text-primary);
    font-style: italic;
    min-height: 90px;
    word-wrap: break-word;
    transition: var(--cg-transition-fast);
}

.cg-citation-display:hover {
    background: #f0f2ff;
}

.cg-citation-display.empty {
    color: var(--cg-text-muted);
    font-style: normal;
    text-align: center;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* ===== METADATA SECTION ===== */
.cg-metadata-section {
    background: linear-gradient(135deg, #fff9e6 0%, #fffbf0 100%);
    border-left: 5px solid var(--cg-orange);
    padding: 24px 28px;
    margin-top: 22px;
    border-radius: 0 var(--cg-radius-sm) var(--cg-radius-sm) 0;
    box-shadow: inset 0 2px 8px rgba(255, 167, 38, 0.08);
}

.cg-metadata-title {
    font-weight: 700;
    color: #e65100;
    margin-bottom: 18px;
    font-size: 1.05rem;
    display: flex;
    align-items: center;
    gap: 10px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.cg-metadata-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 16px;
}

.cg-metadata-item {
    font-size: 14px;
}

.cg-metadata-item strong {
    display: block;
    color: var(--cg-text-secondary);
    font-size: 12px;
    text-transform: uppercase;
    letter-spacing: 0.6px;
    margin-bottom: 5px;
    font-weight: 600;
}

.cg-metadata-item span {
    color: var(--cg-text-primary);
    word-break: break-word;
    font-weight: 500;
}

/* ===== FEATURES SECTION ===== */
.cg-features-section {
    margin-top: 55px;
}

.cg-section-heading {
    text-align: center;
    font-size: 2.2rem;
    font-weight: 800;
    color: var(--cg-text-primary);
    margin-bottom: 38px;
    letter-spacing: -0.8px;
    position: relative;
    padding-bottom: 18px;
}

.cg-section-heading::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 80px;
    height: 4px;
    background: linear-gradient(90deg, var(--cg-red), var(--cg-gold));
    border-radius: 2px;
}

.cg-features-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(290px, 1fr));
    gap: 28px;
}

.cg-feature-card {
    background: var(--cg-white);
    padding: 35px;
    border-radius: var(--cg-radius-md);
    box-shadow: var(--cg-shadow-sm);
    transition: var(--cg-transition-normal);
    text-align: center;
    position: relative;
    overflow: hidden;
}

.cg-feature-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 4px;
    background: linear-gradient(90deg, var(--cg-red), var(--cg-gold));
    transform: scaleX(0);
    transition: transform 0.3s;
}

.cg-feature-card:hover::before {
    transform: scaleX(1);
}

.cg-feature-card:hover {
    transform: translateY(-10px);
    box-shadow: var(--cg-shadow-lg);
}

.cg-feature-icon {
    font-size: 3.5rem;
    margin-bottom: 18px;
    display: inline-block;
    transition: var(--cg-transition-normal);
}

.cg-feature-card:hover .cg-feature-icon {
    transform: scale(1.15) rotate(5deg);
}

.cg-feature-card h3 {
    color: var(--cg-red);
    margin-bottom: 14px;
    font-size: 1.35rem;
    font-weight: 700;
}

.cg-feature-card p {
    color: var(--cg-text-secondary);
    line-height: 1.7;
    font-size: 14px;
}

/* ===== TOAST NOTIFICATION ===== */
.cg-toast {
    position: fixed;
    bottom: 35px;
    right: 35px;
    background: #2d3436;
    color: var(--cg-white);
    padding: 18px 30px;
    border-radius: var(--cg-radius-sm);
    font-size: 14px;
    font-weight: 500;
    box-shadow: 0 10px 35px rgba(0, 0, 0, 0.3);
    opacity: 0;
    visibility: hidden;
    transform: translateY(30px) scale(0.95);
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    z-index: 99999;
    display: flex;
    align-items: center;
    gap: 12px;
    max-width: 400px;
    backdrop-filter: blur(10px);
}

.cg-toast.show {
    opacity: 1;
    visibility: visible;
    transform: translateY(0) scale(1);
}

.cg-toast.success {
    background: linear-gradient(135deg, #00b894 0%, #55efc4 100%);
    color: #ffffff;
    box-shadow: 0 10px 35px rgba(0, 184, 148, 0.4);
}

.cg-toast.error {
    background: linear-gradient(135deg, #d63031 0%, #ff7675 100%);
}

.cg-toast.warning {
    background: linear-gradient(135deg, #e17055 0%, #fab1a0 100%);
}

.cg-toast-icon {
    font-size: 1.4em;
}

/* ===== RESPONSIVE DESIGN ===== */

/* Tablet and below */
@media (max-width: 1024px) {
    .cg-main-grid {
        grid-template-columns: 1fr;
        gap: 30px;
    }

    .cg-sidebar {
        position: static;
        max-width: 600px;
        margin: 0 auto;
    }

    .cg-hero h1 {
        font-size: 2.6rem;
    }

    .cg-hero p {
        font-size: 1.1rem;
    }
}

/* Mobile devices */
@media (max-width: 768px) {
    .cg-page-container {
        margin: 25px auto;
        padding: 0 15px;
    }

    .cg-hero {
        padding: 45px 28px;
        border-radius: var(--cg-radius-md);
        margin-bottom: 30px;
    }

    .cg-hero-icon {
        font-size: 3.5rem;
    }

    .cg-hero h1 {
        font-size: 2rem;
        margin-bottom: 14px;
    }

    .cg-hero p {
        font-size: 1rem;
    }

    .cg-sidebar {
        padding: 25px;
    }

    .cg-sidebar-title {
        font-size: 1.4rem;
    }

    .cg-format-tabs-container {
        flex-direction: column;
        align-items: stretch;
        padding: 18px 20px;
    }

    .cg-format-label {
        margin-right: 0;
        margin-bottom: 12px;
        text-align: center;
    }

    .cg-format-tab {
        text-align: center;
        padding: 10px 18px;
    }

    .cg-output-header {
        flex-direction: column;
        align-items: stretch;
        padding: 18px 22px;
    }

    .cg-copy-btn {
        width: 100%;
        justify-content: center;
    }

    .cg-output-body {
        padding: 25px 20px;
    }

    .cg-citation-display {
        padding: 22px;
        font-size: 14px;
    }

    .cg-metadata-grid {
        grid-template-columns: 1fr;
        gap: 14px;
    }

    .cg-features-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }

    .cg-feature-card {
        padding: 28px 22px;
    }

    .cg-section-heading {
        font-size: 1.75rem;
        margin-bottom: 28px;
    }

    .cg-toast {
        left: 20px;
        right: 20px;
        bottom: 20px;
        max-width: none;
    }
}

/* Small mobile phones */
@media (max-width: 480px) {
    .cg-hero {
        padding: 35px 20px;
    }

    .cg-hero h1 {
        font-size: 1.7rem;
    }

    .cg-generate-btn {
        padding: 14px 24px;
        font-size: 15px;
    }

    .cg-format-tab {
        font-size: 13px;
        padding: 9px 16px;
    }
}

/* Print styles */
@media print {
    .cg-sidebar,
    .cg-generate-btn,
    .cg-copy-btn,
    .cg-format-tabs-container,
    .cg-toast,
    .cg-features-section {
        display: none !important;
    }

    .cg-output-card {
        box-shadow: none !important;
        border: 1px solid #000 !important;
    }

    .cg-citation-display {
        font-style: normal !important;
    }
}

/* Accessibility improvements */
@media (prefers-reduced-motion: reduce) {
    *,
    *::before,
    *::after {
        animation-duration: 0.01ms !important;
        animation-iteration-count: 1 !important;
        transition-duration: 0.01ms !important;
    }
}

/* High contrast mode support */
@media (prefers-contrast: high) {
    :root {
        --cg-border-color: #000000;
        --cg-text-secondary: #000000;
    }

    .cg-form-input,
    .cg-form-textarea {
        border-width: 3px;
    }
}
