<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>For You, My Love 💌</title>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Lato:wght@300;400&display=swap" rel="stylesheet" />
  <style>
    :root {
      --cream: #fdf6ec;
      --blush: #f2c4ce;
      --rose: #c9616a;
      --deep-rose: #8b3a4a;
      --gold: #d4a96a;
      --dark: #2c1a1e;
      --petal: #f7dde2;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      min-height: 100vh;
      background: var(--cream);
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      font-family: "Lato", sans-serif;
      overflow-x: hidden;
      position: relative;
    }

    .petals-bg {
      position: fixed;
      inset: 0;
      pointer-events: none;
      overflow: hidden;
      z-index: 0;
    }

    .petal {
      position: absolute;
      top: -40px;
      width: 14px;
      height: 20px;
      background: radial-gradient(ellipse at 40% 30%, #f7c5cc, #e89aa5);
      border-radius: 50% 0 50% 0;
      opacity: 0;
      animation: fallPetal linear infinite;
    }

    @keyframes fallPetal {
      0% {
        transform: translateY(0) rotate(0deg);
        opacity: 0.7;
      }

      100% {
        transform: translateY(110vh) rotate(360deg);
        opacity: 0;
      }
    }

    .stars {
      position: fixed;
      inset: 0;
      pointer-events: none;
      z-index: 0;
    }

    .star {
      position: absolute;
      width: 4px;
      height: 4px;
      border-radius: 50%;
      background: var(--gold);
      opacity: 0;
      animation: twinkle ease-in-out infinite;
    }

    @keyframes twinkle {

      0%,
      100% {
        opacity: 0;
        transform: scale(0.5);
      }

      50% {
        opacity: 0.7;
        transform: scale(1.2);
      }
    }

    .scene {
      position: relative;
      z-index: 10;
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 28px;
    }

    .tagline {
      font-family: "Playfair Display", serif;
      font-style: italic;
      color: var(--deep-rose);
      font-size: 1.1rem;
      letter-spacing: 0.05em;
      opacity: 0;
      animation: fadeUp 1s 0.3s forwards;
    }

    @keyframes fadeUp {
      from {
        opacity: 0;
        transform: translateY(16px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .envelope-wrap {
      cursor: pointer;
      opacity: 0;
      animation: fadeUp 1s 0.6s forwards;
    }

    .envelope {
      position: relative;
      width: 340px;
      height: 240px;
      filter: drop-shadow(0 12px 40px rgba(139, 58, 74, 0.25));
      transition: filter 0.3s;
    }

    .envelope:hover {
      filter: drop-shadow(0 18px 50px rgba(139, 58, 74, 0.38));
    }

    .env-body {
      position: absolute;
      inset: 0;
      background: linear-gradient(160deg, #f9e8d0 0%, #f4d0b5 100%);
      border-radius: 4px 4px 8px 8px;
      border: 1.5px solid var(--gold);
    }

    .env-bottom {
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      height: 50%;
      overflow: hidden;
    }

    .env-bottom::before {
      content: "";
      position: absolute;
      bottom: 0;
      left: -5%;
      right: -5%;
      height: 100%;
      background: linear-gradient(160deg, #f2c4a0 0%, #e8b080 100%);
      clip-path: polygon(50% 0%, 0% 100%, 100% 100%);
      border-top: 1.5px solid var(--gold);
    }

    .env-left,
    .env-right {
      position: absolute;
      top: 0;
      bottom: 0;
      width: 52%;
      background: linear-gradient(135deg, #f5d8b8 0%, #eec898 100%);
    }

    .env-left {
      left: -1px;
      clip-path: polygon(0 0, 100% 50%, 0 100%);
      border-right: 1.5px solid var(--gold);
    }

    .env-right {
      right: -1px;
      clip-path: polygon(100% 0, 0 50%, 100% 100%);
      border-left: 1.5px solid var(--gold);
    }

    .env-flap {
      position: absolute;
      top: 0;
      left: -1px;
      right: -1px;
      height: 55%;
      background: linear-gradient(160deg, #fae0c0 0%, #f2c890 100%);
      clip-path: polygon(0 0, 50% 100%, 100% 0);
      border: 1.5px solid var(--gold);
      transform-origin: top center;
      transition: transform 0.9s cubic-bezier(0.4, 0, 0.2, 1);
      z-index: 5;
    }

    .envelope.open .env-flap {
      transform: rotateX(180deg);
    }

    .wax-seal {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 52px;
      height: 52px;
      background: radial-gradient(circle at 35% 35%, #e05060, #a02030);
      border-radius: 50%;
      border: 2.5px solid #c03040;
      box-shadow: 0 3px 12px rgba(160, 32, 48, 0.4);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 22px;
      z-index: 6;
      transition: opacity 0.4s, transform 0.4s;
    }

    .envelope.open .wax-seal {
      opacity: 0;
      transform: translate(-50%, -50%) scale(0.6);
    }

    .letter-rise {
      position: absolute;
      bottom: 20px;
      left: 50%;
      transform: translateX(-50%) translateY(0px);
      width: 290px;
      background: white;
      border-radius: 3px;
      box-shadow: 0 2px 16px rgba(0, 0, 0, 0.13);
      z-index: 3;
      overflow: hidden;
      transition: transform 1s 0.2s cubic-bezier(0.4, 0, 0.2, 1), height 0.9s 0.2s;
      height: 40px;
    }

    .letter-rise .lr-peek {
      height: 40px;
      background: linear-gradient(to right, #fdf6ec, #f9eee0, #fdf6ec);
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .lr-peek span {
      font-family: "Playfair Display", serif;
      font-style: italic;
      color: var(--deep-rose);
      font-size: 0.75rem;
      opacity: 0.6;
      letter-spacing: 0.08em;
    }

    .envelope.open .letter-rise {
      transform: translateX(-50%) translateY(-130px);
      height: 50px;
    }

    .open-hint {
      font-size: 0.8rem;
      color: var(--rose);
      letter-spacing: 0.12em;
      text-transform: uppercase;
      opacity: 0.7;
      animation: pulse 2s ease-in-out infinite;
    }

    @keyframes pulse {

      0%,
      100% {
        opacity: 0.4
      }

      50% {
        opacity: 0.9
      }
    }

    /* ===== LETTER MODAL ===== */
    .letter-modal {
      position: fixed;
      inset: 0;
      z-index: 100;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 24px;
      pointer-events: none;
      opacity: 0;
      transition: opacity 0.6s;
    }

    .letter-modal.visible {
      pointer-events: auto;
      opacity: 1;
    }

    .modal-overlay {
      position: absolute;
      inset: 0;
      background: rgba(44, 26, 30, 0.65);
      backdrop-filter: blur(6px);
    }

    .letter-paper {
      position: relative;
      z-index: 2;
      background: var(--cream);
      max-width: 620px;
      width: 100%;
      max-height: 90vh;
      overflow-y: auto;
      border-radius: 6px;
      padding: 52px 52px 48px;
      box-shadow: 0 24px 80px rgba(44, 26, 30, 0.35);
      border: 1.5px solid var(--gold);
      transform: translateY(40px) scale(0.96);
      transition: transform 0.7s cubic-bezier(0.4, 0, 0.2, 1);
      scrollbar-width: thin;
      scrollbar-color: var(--blush) transparent;
    }

    .letter-modal.visible .letter-paper {
      transform: translateY(0) scale(1);
    }

    .corner-deco {
      position: absolute;
      width: 48px;
      height: 48px;
      opacity: 0.35;
    }

    .corner-deco.tl {
      top: 12px;
      left: 12px;
    }

    .corner-deco.tr {
      top: 12px;
      right: 12px;
      transform: scaleX(-1);
    }

    .corner-deco.bl {
      bottom: 12px;
      left: 12px;
      transform: scaleY(-1);
    }

    .corner-deco.br {
      bottom: 12px;
      right: 12px;
      transform: scale(-1);
    }

    .photo-frame {
      margin: 0 auto 32px;
      width: 170px;
      height: 170px;
      border-radius: 50%;
      border: 4px solid var(--gold);
      box-shadow: 0 0 0 8px var(--petal), 0 8px 32px rgba(139, 58, 74, 0.2);
      overflow: hidden;
      position: relative;
      background: linear-gradient(135deg, var(--blush), var(--petal));
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
    }

    .photo-frame img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
    }

    .photo-placeholder {
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 8px;
      color: var(--rose);
      font-size: 0.7rem;
      letter-spacing: 0.1em;
      text-transform: uppercase;
      opacity: 0.7;
    }

    .photo-placeholder svg {
      width: 36px;
      height: 36px;
      opacity: 0.5;
    }

    .letter-date {
      text-align: right;
      font-size: 0.78rem;
      color: var(--gold);
      letter-spacing: 0.1em;
      margin-bottom: 24px;
      font-style: italic;
    }

    .letter-salutation {
      font-family: "Playfair Display", serif;
      font-size: 1.45rem;
      color: var(--deep-rose);
      margin-bottom: 22px;
    }

    .letter-body {
      font-family: "Lato", sans-serif;
      font-weight: 300;
      font-size: 1.01rem;
      line-height: 1.9;
      color: var(--dark);
    }

    .letter-body p {
      margin-bottom: 18px;
    }

    .letter-body em {
      font-family: "Playfair Display", serif;
      font-style: italic;
      color: var(--deep-rose);
    }

    .letter-closing {
      margin-top: 28px;
      text-align: right;
    }

    .letter-closing p {
      font-family: "Playfair Display", serif;
      font-style: italic;
      font-size: 1.1rem;
      color: var(--deep-rose);
      line-height: 1.8;
    }

    .letter-closing .sig {
      font-size: 1.6rem;
      font-weight: 700;
      color: var(--rose);
      margin-top: 4px;
    }

    .divider {
      display: flex;
      align-items: center;
      gap: 12px;
      margin: 24px 0;
      color: var(--gold);
      opacity: 0.5;
      font-size: 0.7rem;
      letter-spacing: 0.2em;
    }

    .divider::before,
    .divider::after {
      content: "";
      flex: 1;
      height: 1px;
      background: linear-gradient(to right, transparent, var(--gold));
    }

    .divider::after {
      background: linear-gradient(to left, transparent, var(--gold));
    }

    .close-btn {
      position: absolute;
      top: 16px;
      right: 20px;
      background: none;
      border: none;
      font-size: 1.4rem;
      color: var(--gold);
      cursor: pointer;
      opacity: 0.6;
      transition: opacity 0.2s, transform 0.2s;
      line-height: 1;
    }

    .close-btn:hover {
      opacity: 1;
      transform: rotate(90deg);
    }

    .upload-hint {
      position: relative;
      z-index: 2;
      text-align: center;
      margin-top: 16px;
      opacity: 0;
      animation: fadeUp 1s 1.2s forwards;
    }

    .upload-label {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background: white;
      border: 1.5px dashed var(--blush);
      color: var(--rose);
      font-size: 0.78rem;
      letter-spacing: 0.08em;
      padding: 8px 20px;
      border-radius: 30px;
      cursor: pointer;
      transition: background 0.2s, border-color 0.2s;
    }

    .upload-label:hover {
      background: var(--petal);
      border-color: var(--rose);
    }

    #photoInput {
      display: none;
    }

    .heart-burst {
      position: fixed;
      pointer-events: none;
      z-index: 200;
      font-size: 1.4rem;
      opacity: 0;
      animation: heartFly 1.4s ease-out forwards;
    }

    @keyframes heartFly {
      0% {
        opacity: 1;
        transform: translateY(0) scale(1);
      }

      100% {
        opacity: 0;
        transform: translateY(-90px) scale(0.5);
      }
    }

    /* ─── Nailong Walking ─────────────────────────────────── */
    .nailong-track {
      position: fixed;
      bottom: 10px;
      left: 0;
      right: 0;
      height: 110px;
      pointer-events: none;
      z-index: 5;
      overflow: hidden;
    }

    .nailong-wrap {
      position: absolute;
      bottom: 0;
      display: flex;
      flex-direction: column;
      align-items: center;
      animation: nailongWalk 16s linear infinite;
    }

    .nailong-img {
      width: 90px;
      height: 90px;
      object-fit: contain;
      animation: nailongBob 0.38s ease-in-out infinite alternate;
      filter: drop-shadow(0 6px 10px rgba(0, 0, 0, 0.15));
    }

    @keyframes nailongBob {
      from {
        transform: translateY(0px) rotate(-4deg);
      }

      to {
        transform: translateY(-8px) rotate(4deg);
      }
    }

    @keyframes nailongWalk {
      0% {
        left: -130px;
        transform: scaleX(1);
      }

      48% {
        left: calc(100% + 30px);
        transform: scaleX(1);
      }

      50% {
        left: calc(100% + 30px);
        transform: scaleX(-1);
      }

      98% {
        left: -130px;
        transform: scaleX(-1);
      }

      100% {
        left: -130px;
        transform: scaleX(1);
      }
    }

    .nailong-bubble {
      background: white;
      border: 2px solid var(--blush);
      border-radius: 14px 14px 14px 4px;
      padding: 5px 10px;
      font-size: 0.68rem;
      color: var(--deep-rose);
      white-space: nowrap;
      opacity: 0;
      font-family: 'Lato', sans-serif;
      margin-bottom: 4px;
      animation: bubblePop 16s linear infinite;
      pointer-events: none;
      position: relative;
    }

    .nailong-bubble::after {
      content: '';
      position: absolute;
      bottom: -7px;
      left: 12px;
      border: 4px solid transparent;
      border-top-color: var(--blush);
    }

    @keyframes bubblePop {
      0% {
        opacity: 0;
      }

      10% {
        opacity: 1;
      }

      42% {
        opacity: 1;
      }

      50% {
        opacity: 0;
      }

      100% {
        opacity: 0;
      }
    }

    @media (max-width: 500px) {
      .letter-paper {
        padding: 36px 24px 32px;
      }

      .envelope {
        width: 290px;
        height: 200px;
      }

      .letter-rise {
        width: 248px;
      }

      .nailong-img {
        width: 68px;
        height: 68px;
      }
    }

    /* ─── Couple Alert Modal ───────────────────────── */
    .couple-alert {
      position: fixed;
      inset: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      z-index: 999;
      opacity: 0;
      pointer-events: none;
      transition: 0.35s ease;
    }

    .couple-alert.show {
      opacity: 1;
      pointer-events: auto;
    }

    .couple-alert-overlay {
      position: absolute;
      inset: 0;
      background: rgba(44, 26, 30, 0.55);
      backdrop-filter: blur(5px);
    }

    .couple-alert-box {
      position: relative;
      z-index: 2;
      width: 90%;
      max-width: 360px;
      background: linear-gradient(145deg, #fff7f9, #ffecef);
      border: 2px solid var(--blush);
      border-radius: 24px;
      padding: 30px 25px;
      text-align: center;
      box-shadow: 0 18px 50px rgba(201, 97, 106, 0.25);
      animation: popupLove 0.35s ease;
    }

    .alert-hearts {
      font-size: 1.8rem;
      margin-bottom: 12px;
      animation: pulseHearts 1.5s infinite;
    }

    .couple-alert-box h2 {
      font-family: "Playfair Display", serif;
      color: var(--deep-rose);
      margin-bottom: 12px;
      font-size: 1.5rem;
    }

    .couple-alert-box p {
      color: var(--dark);
      font-size: 0.95rem;
      line-height: 1.6;
      margin-bottom: 22px;
    }

    .couple-alert-box button {
      border: none;
      background: linear-gradient(135deg, var(--rose), var(--deep-rose));
      color: white;
      padding: 12px 24px;
      border-radius: 999px;
      cursor: pointer;
      font-size: 0.9rem;
      font-family: "Lato", sans-serif;
      transition: 0.25s ease;
      box-shadow: 0 6px 18px rgba(201, 97, 106, 0.35);
    }

    .couple-alert-box button:hover {
      transform: translateY(-2px) scale(1.04);
    }

    @keyframes popupLove {
      from {
        transform: scale(0.8) translateY(20px);
        opacity: 0;
      }

      to {
        transform: scale(1) translateY(0);
        opacity: 1;
      }
    }

    @keyframes pulseHearts {

      0%,
      100% {
        transform: scale(1);
      }

      50% {
        transform: scale(1.15);
      }
    }
  </style>
</head>

<body>

  <div class="petals-bg" id="petalsBg"></div>
  <div class="stars" id="starsBg"></div>

  <!-- Nailong walking -->
  <div class="nailong-track">
    <div class="nailong-wrap">
      <div class="nailong-bubble">rawrrrrr💕 HAHAHAHA</div>
      <img class="nailong-img" src="data:image/png;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/4gHYSUNDX1BST0ZJTEUAAQEAAAHIAAAAAAQwAABtbnRyUkdCIFhZWiAH4AABAAEAAAAAAABhY3NwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAQAA9tYAAQAAAADTLQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAlkZXNjAAAA8AAAACRyWFlaAAABFAAAABRnWFlaAAABKAAAABRiWFlaAAABPAAAABR3dHB0AAABUAAAABRyVFJDAAABZAAAAChnVFJDAAABZAAAAChiVFJDAAABZAAAAChjcHJ0AAABjAAAADxtbHVjAAAAAAAAAAEAAAAMZW5VUwAAAAgAAAAcAHMAUgBHAEJYWVogAAAAAAAAb6IAADj1AAADkFhZWiAAAAAAAABimQAAt4UAABjaWFlaIAAAAAAAACSgAAAPhAAAts9YWVogAAAAAAAA9tYAAQAAAADTLXBhcmEAAAAAAAQAAAACZmYAAPKnAAANWQAAE9AAAApbAAAAAAAAAABtbHVjAAAAAAAAAAEAAAAMZW5VUwAAACAAAAAcAEcAbwBvAGcAbABlACAASQBuAGMALgAgADIAMAAxADb/2wBDAAUDBAQEAwUEBAQFBQUGBwwIBwcHBw8LCwkMEQ8SEhEPERETFhwXExQaFRERGCEYGh0dHx8fExciJCIeJBweHx7/2wBDAQUFBQcGBw4ICA4eFBEUHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh7/wAARCAZABkADASIAAhEBAxEB/8QAHQABAAIDAQEBAQAAAAAAAAAAAAIDAQQFBgcICf/EAFMQAQABAwMCAwUCCAoHBgQGAwACAQMEBRESIjIGEyEHFDFCUmKRFSMzQXFykqEIJENRU2GBgrHBNERzorLC0RYlNTZFYxdUVeFkZXSTo/Cz0vH/xAAcAQEAAgMBAQEAAAAAAAAAAAAAAgMEBQYBBwj/xAA3EQEAAgICAQMCBQEHAwUBAQAAAQIDEQQSBRMhMQZBFCIyUWEjBxUzQlJxgSRykTRDYrHBodH/2gAMAwEAAhEDEQA/AP2WAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA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AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAf//Z" alt="Nailong">
    </div>
  </div>

  <div class="scene">
    <p class="tagline">— A little something, just for you my lovee —</p>

    <div class="envelope-wrap" id="envelopeWrap">
      <div class="envelope" id="envelope">
        <div class="env-body"></div>
        <div class="env-left"></div>
        <div class="env-right"></div>
        <div class="env-bottom"></div>
        <div class="letter-rise">
          <div class="lr-peek"><span>a letter for you ♡</span></div>
        </div>
        <div class="env-flap"></div>
        <div class="wax-seal">💌</div>
      </div>
    </div>

    <p class="open-hint" id="openHint">✦ upload our photo first ✦</p>

    <div class="upload-hint">
      <label class="upload-label" for="photoInput">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
          <polyline points="17 8 12 3 7 8" />
          <line x1="12" y1="3" x2="12" y2="15" />
        </svg>
        Upload our photo
      </label>
      <input type="file" id="photoInput" accept="image/*">
    </div>
  </div>

  <!-- Letter Modal -->
  <div class="letter-modal" id="letterModal">
    <div class="modal-overlay" id="modalOverlay"></div>
    <div class="letter-paper">
      <button class="close-btn" id="closeBtn">✕</button>
      <svg class="corner-deco tl" viewBox="0 0 48 48" fill="none">
        <path d="M4 44 C4 20 20 4 44 4" stroke="#d4a96a" stroke-width="1.5" fill="none" />
        <circle cx="6" cy="42" r="2" fill="#d4a96a" />
        <circle cx="42" cy="6" r="2" fill="#d4a96a" />
      </svg>
      <svg class="corner-deco tr" viewBox="0 0 48 48" fill="none">
        <path d="M4 44 C4 20 20 4 44 4" stroke="#d4a96a" stroke-width="1.5" fill="none" />
        <circle cx="6" cy="42" r="2" fill="#d4a96a" />
        <circle cx="42" cy="6" r="2" fill="#d4a96a" />
      </svg>
      <svg class="corner-deco bl" viewBox="0 0 48 48" fill="none">
        <path d="M4 44 C4 20 20 4 44 4" stroke="#d4a96a" stroke-width="1.5" fill="none" />
        <circle cx="6" cy="42" r="2" fill="#d4a96a" />
        <circle cx="42" cy="6" r="2" fill="#d4a96a" />
      </svg>
      <svg class="corner-deco br" viewBox="0 0 48 48" fill="none">
        <path d="M4 44 C4 20 20 4 44 4" stroke="#d4a96a" stroke-width="1.5" fill="none" />
        <circle cx="6" cy="42" r="2" fill="#d4a96a" />
        <circle cx="42" cy="6" r="2" fill="#d4a96a" />
      </svg>

      <div class="photo-frame" id="photoFrame">
        <div class="photo-placeholder" id="photoPlaceholder">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
            <rect x="3" y="3" width="18" height="18" rx="4" />
            <circle cx="8.5" cy="8.5" r="1.5" />
            <path d="M21 15l-5-5L5 21" />
          </svg>
          <span>our photo</span>
        </div>
        <img id="photoImg" src="" alt="Our photo" style="display:none;">
      </div>

      <p class="letter-date">June 01, 2026</p>
      <p class="letter-salutation">My Dearest Lablabb Ingkay,</p>
      <div class="divider">♡</div>
      <div class="letter-body">
        <p>
          Hello, my lovee! Hihihihi. Happy 1st Monthsary poo! I love youuuu sooo muchhhh, lablabb 💕💕💕
          Sorry I don't have any gift to give you for our first monthsary, lovee, but I promise that once I have enough money, <em>babawi ako sa'yo.</em>
          Being with you has shown me what it truly means to feel at home — not in a place, but in a person. <em>You are my home, lablabb.</em> Hihihihi.
        </p>
        <p>
          Thank you for your patience, your kindness, and your warmth.
          Thank you for choosing and loving me, lablabb. Thank you for being exactly who you are.
          Our relationship is so unexpected no lablabb, I never expected us to get to this point HAHAHA.
        </p>
        <p>
          No matter where life takes us, I want you by my side. You are my favorite person, my greatest blessing, and my best reason to smile this way again.
          You are my reason to trust and risk all my love again.
          I hope you'll stay by my side through the highs and lows.
        </p>
        <p>
          Even though you always doubt my love, <em>I will never get tired of making you feel how much I love you</em> and how happy I am that you came into my life.
        </p>
      </div>
      <div class="divider">♡</div>
      <div class="letter-closing">
        <p>Forever yours,</p>
        <p class="sig">with all my love 💕</p>
      </div>
    </div>
  </div>
  <!-- Couple Alert Modal -->
  <div class="couple-alert" id="coupleAlert">
    <div class="couple-alert-overlay"></div>

    <div class="couple-alert-box">
      <div class="alert-hearts">💕 💖 💕</div>

      <h2>Waitttt loveee 🥺</h2>

      <p>
        Please upload our photo first before opening the letter 💌
      </p>

      <button id="closeAlertBtn">Okayyy 💕</button>
    </div>
  </div>
  <script>
    // Petals
    const petalsBg = document.getElementById('petalsBg');
    for (let i = 0; i < 18; i++) {
      const p = document.createElement('div');
      p.className = 'petal';
      p.style.left = Math.random() * 100 + 'vw';
      p.style.animationDuration = (6 + Math.random() * 8) + 's';
      p.style.animationDelay = (Math.random() * 12) + 's';
      p.style.transform = 'rotate(' + (Math.random() * 360) + 'deg)';
      petalsBg.appendChild(p);
    }
    // Stars
    const starsBg = document.getElementById('starsBg');
    for (let i = 0; i < 30; i++) {
      const s = document.createElement('div');
      s.className = 'star';
      s.style.left = Math.random() * 100 + 'vw';
      s.style.top = Math.random() * 100 + 'vh';
      s.style.animationDuration = (2 + Math.random() * 4) + 's';
      s.style.animationDelay = (Math.random() * 5) + 's';
      starsBg.appendChild(s);
    }
    // Envelope
    const envelope = document.getElementById('envelope');
    const modal = document.getElementById('letterModal');
    const hint = document.getElementById('openHint');
    document.getElementById('envelopeWrap').addEventListener('click', openEnvelope);

    function openEnvelope() {
      const photoInput = document.getElementById('photoInput');
      if (!photoInput.files || photoInput.files.length === 0) {
        showCoupleAlert();
        return;
      }
      if (envelope.classList.contains('open')) return;
      envelope.classList.add('open');
      hint.style.opacity = '0';
      spawnHearts(envelope);
      setTimeout(() => {
        modal.classList.add('visible');
      }, 900);
    }
    document.getElementById('closeBtn').addEventListener('click', closeModal);
    document.getElementById('modalOverlay').addEventListener('click', closeModal);

    function closeModal() {
      modal.classList.remove('visible');
    }

    function spawnHearts(el) {
      const rect = el.getBoundingClientRect();
      const cx = rect.left + rect.width / 2;
      const cy = rect.top + rect.height / 2;
      const hearts = ['💕', '💖', '💗', '💓', '🌸', '✨'];
      for (let i = 0; i < 12; i++) {
        setTimeout(() => {
          const h = document.createElement('div');
          h.className = 'heart-burst';
          h.textContent = hearts[Math.floor(Math.random() * hearts.length)];
          h.style.left = (cx + (Math.random() - 0.5) * 130) + 'px';
          h.style.top = (cy + (Math.random() - 0.5) * 90) + 'px';
          h.style.animationDuration = (1 + Math.random() * 0.6) + 's';
          document.body.appendChild(h);
          setTimeout(() => h.remove(), 2000);
        }, i * 80);
      }
    }
    document.getElementById('photoInput').addEventListener('change', function(e) {
      const file = e.target.files[0];
      if (!file) return;
      const reader = new FileReader();
      reader.onload = function(ev) {
        const img = document.getElementById('photoImg');
        img.src = ev.target.result;
        img.style.display = 'block';
        document.getElementById('photoPlaceholder').style.display = 'none';
        document.getElementById('openHint').textContent = '✦ tap to open ✦';
      };
      reader.readAsDataURL(file);
    });

    const coupleAlert = document.getElementById('coupleAlert');
    const closeAlertBtn = document.getElementById('closeAlertBtn');

    function showCoupleAlert() {
      coupleAlert.classList.add('show');
    }

    function hideCoupleAlert() {
      coupleAlert.classList.remove('show');
    }

    closeAlertBtn.addEventListener('click', hideCoupleAlert);

    document
      .querySelector('.couple-alert-overlay')
      .addEventListener('click', hideCoupleAlert);
  </script>
</body>

</html>