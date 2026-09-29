import Alpine from 'alpinejs';
import * as THREE from 'three';
import { createIcons, icons } from 'lucide';

// Make Alpine accessible globally
window.Alpine = Alpine;
Alpine.start();

// Initialize Lucide icons and animations
document.addEventListener('DOMContentLoaded', () => {
    createIcons({ icons });
    initCinematicHeroSequence();
    initStatsCounter();
    initThreeGlobe();
    initSmoothParallax();
    initScrollReveals();
});

// =============================================================
// CINEMATIC HERO SEQUENCE
// Phase 1: Show only the BG image (ship) — clean, no overlays
// Phase 2: Smooth zoom on the image
// Phase 3: Fade in vignettes, then slide text left→right & right→left
// =============================================================
function initCinematicHeroSequence() {
    const heroBg = document.getElementById('hero-ship-bg');
    const contentLayer = document.getElementById('hero-content-layer');
    const vignettes = document.querySelectorAll('.hero-vignette');
    const slideElements = document.querySelectorAll('.slide-from-left, .slide-from-right, .slide-from-bottom, .slide-from-top');

    // PHASE 1: BG image is already visible (no curtain). Wait a moment.
    // User sees the beautiful ship image for ~800ms

    // PHASE 2: Start the zoom (at 800ms)
    setTimeout(() => {
        if (heroBg) heroBg.classList.add('zoom-in');
    }, 800);

    // PHASE 3a: Fade in the gradient vignettes (at 1400ms)
    setTimeout(() => {
        vignettes.forEach(v => v.classList.add('fade-in'));
    }, 1400);

    // PHASE 3b: Show the content layer (at 1600ms)
    setTimeout(() => {
        if (contentLayer) contentLayer.classList.add('show-content');
    }, 1600);

    // PHASE 3c: Trigger directional slide animations (at 1800ms)
    setTimeout(() => {
        slideElements.forEach(el => el.classList.add('animate-in'));
    }, 1800);
}


// =============================================================
// SMOOTH PARALLAX (lerp-based 60fps GPU-accelerated)
// =============================================================
function initSmoothParallax() {
    const heroBg = document.getElementById('hero-ship-bg');
    if (!heroBg) return;

    let currentY = 0;
    let targetY = 0;
    let isAnimating = false;

    function updateTarget() {
        const scrolled = window.scrollY;
        if (scrolled < 1200) {
            targetY = scrolled * 0.1;
        }
    }

    function smoothLoop() {
        currentY += (targetY - currentY) * 0.06;

        if (Math.abs(currentY - targetY) < 0.1) {
            currentY = targetY;
            isAnimating = false;
        } else {
            isAnimating = true;
        }

        // Preserve the zoom-in scale while adding parallax
        const baseScale = heroBg.classList.contains('zoom-in') ? 1.08 : 1;
        heroBg.style.transform = `scale(${baseScale}) translate3d(0, ${currentY}px, 0)`;

        if (isAnimating) {
            requestAnimationFrame(smoothLoop);
        }
    }

    window.addEventListener('scroll', () => {
        updateTarget();
        if (!isAnimating) {
            isAnimating = true;
            requestAnimationFrame(smoothLoop);
        }
    }, { passive: true });
}


// =============================================================
// SCROLL REVEAL (IntersectionObserver)
// =============================================================
function initScrollReveals() {
    const selectors = '.reveal-on-scroll, .reveal-stagger, .reveal-scale, .reveal-left, .reveal-right';
    const reveals = document.querySelectorAll(selectors);
    if (!reveals.length) return;

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                requestAnimationFrame(() => {
                    entry.target.classList.add('revealed');
                });
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.08,
        rootMargin: '0px 0px -60px 0px'
    });

    reveals.forEach(el => observer.observe(el));
}


// =============================================================
// STATS COUNTER (easeOutQuart for premium feel)
// =============================================================
function initStatsCounter() {
    const statsElements = document.querySelectorAll('[data-counter-target]');
    if (!statsElements.length) return;

    const observer = new IntersectionObserver((entries, obs) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const el = entry.target;
                const target = parseInt(el.getAttribute('data-counter-target'), 10) || 0;
                const suffix = el.getAttribute('data-counter-suffix') || '';
                const duration = 1800;
                const startTime = performance.now();

                function update(currentTime) {
                    const elapsed = currentTime - startTime;
                    const progress = Math.min(elapsed / duration, 1);
                    const ease = 1 - Math.pow(1 - progress, 4);
                    const currentVal = Math.floor(ease * target);
                    el.textContent = currentVal + suffix;

                    if (progress < 1) {
                        requestAnimationFrame(update);
                    } else {
                        el.textContent = target + suffix;
                    }
                }
                requestAnimationFrame(update);
                obs.unobserve(el);
            }
        });
    }, { threshold: 0.3 });

    statsElements.forEach(el => observer.observe(el));
}

// -------------------------------------------------------------
// THREE.JS 3D INTERACTIVE GLOBAL LOGISTICS & SUPPLY CHAIN GLOBE
// -------------------------------------------------------------
function initThreeGlobe() {
    const container = document.getElementById('three-globe-canvas');
    if (!container) return;

    const width = container.clientWidth || 600;
    const height = container.clientHeight || 500;

    const scene = new THREE.Scene();
    const camera = new THREE.PerspectiveCamera(45, width / height, 0.1, 1000);
    camera.position.z = 230;

    let renderer;
    try {
        renderer = new THREE.WebGLRenderer({ antialias: true, alpha: true, powerPreference: 'high-performance' });
    } catch (e) {
        console.warn('WebGL not supported, falling back to static visual.');
        return;
    }

    renderer.setSize(width, height);
    renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
    container.innerHTML = '';
    container.appendChild(renderer.domElement);

    const globeGroup = new THREE.Group();
    scene.add(globeGroup);

    const PNG_ROTATION_Y = 2.15;
    const PNG_ROTATION_X = -0.15;
    globeGroup.rotation.y = PNG_ROTATION_Y;
    globeGroup.rotation.x = PNG_ROTATION_X;

    const radius = 80;

    const textureLoader = new THREE.TextureLoader();
    const earthTexture = textureLoader.load('/images/earth-blue-marble.jpg');
    const bumpTexture = textureLoader.load('/images/earth-topology.png');

    const earthGeo = new THREE.SphereGeometry(radius, 64, 64);
    const earthMat = new THREE.MeshStandardMaterial({
        map: earthTexture,
        bumpMap: bumpTexture,
        bumpScale: 0.08,
        roughness: 0.65,
        metalness: 0.08,
    });
    const earthMesh = new THREE.Mesh(earthGeo, earthMat);
    globeGroup.add(earthMesh);

    const atmosGeo = new THREE.SphereGeometry(radius * 1.018, 48, 48);
    const atmosMat = new THREE.MeshBasicMaterial({
        color: 0x38BDF8,
        transparent: true,
        opacity: 0.12,
        side: THREE.BackSide,
        blending: THREE.AdditiveBlending,
    });
    const atmosMesh = new THREE.Mesh(atmosGeo, atmosMat);
    globeGroup.add(atmosMesh);

    const ambientLight = new THREE.AmbientLight(0xffffff, 1.25);
    scene.add(ambientLight);

    const sunLight = new THREE.DirectionalLight(0xffffff, 1.5);
    sunLight.position.set(130, 70, 150);
    scene.add(sunLight);

    const rimLight = new THREE.DirectionalLight(0x00A3FF, 0.7);
    rimLight.position.set(-140, -40, -100);
    scene.add(rimLight);

    function latLongToVector3(lat, lon, r) {
        const phi = (90 - lat) * (Math.PI / 180);
        const theta = (lon + 180) * (Math.PI / 180);
        const x = -(r * Math.sin(phi) * Math.cos(theta));
        const z = r * Math.sin(phi) * Math.sin(theta);
        const y = r * Math.cos(phi);
        return new THREE.Vector3(x, y, z);
    }

    const pomHub = { name: 'Port Moresby (HQ & Wamco Haus Hub)', lat: -9.44, lon: 147.18, color: 0x00D2FF, size: 3.2, isPNG: true };
    const laeHub = { name: 'Lae Logistics & Highlands Depot', lat: -6.73, lon: 147.00, color: 0x00D2FF, size: 3.0, isPNG: true };

    const globalHubs = [
        { name: 'Suva / Lautoka, Fiji (Punjas Pacific Operations)', lat: -18.14, lon: 178.44, color: 0xF59E0B, size: 2.2, dest: pomHub, cargo: 'Punjas Enriched Flour & Canola Oil' },
        { name: 'Qingdao / Chaoyang, China (Long March Heavy Fleet Tyres)', lat: 36.06, lon: 120.38, color: 0x00D2FF, size: 2.4, dest: laeHub, cargo: 'Long March Heavy TBR Truck Tyres' },
        { name: 'Shandong, China (Kapsen & Habilead Mining Tyres)', lat: 37.51, lon: 122.12, color: 0x38BDF8, size: 2.2, dest: pomHub, cargo: 'Commercial Passenger & Mining Tyres' },
        { name: 'Bangkok, Thailand (Happy Mum Canned Foods)', lat: 13.75, lon: 100.50, color: 0xFB7185, size: 2.2, dest: pomHub, cargo: 'Happy Mum Canned Mackerel & Tuna' },
        { name: 'Singapore (Global FMCG Procurement Center)', lat: 1.35, lon: 103.82, color: 0xFBBF24, size: 2.4, dest: pomHub, cargo: 'Global Tea, Packaging & Commodities' },
        { name: 'Kuala Lumpur, Malaysia (Nachorittos Tortilla Chips)', lat: 3.14, lon: 101.69, color: 0xFB923C, size: 2.0, dest: laeHub, cargo: 'Nachorittos Chips & Confectionery' },
        { name: 'Jakarta, Indonesia (Packaged Pantry Staples)', lat: -6.20, lon: 106.85, color: 0x10B981, size: 2.0, dest: pomHub, cargo: 'Instant Foods & High-Velocity Staples' },
        { name: 'Brisbane, Australia (Coral Sea Cold-Chain Cargo)', lat: -27.47, lon: 153.02, color: 0x3B82F6, size: 2.2, dest: pomHub, cargo: 'Perishables, FMCG & Freight Consolidation' },
        { name: 'Sydney, Australia (Australasia Trade Corridor)', lat: -33.86, lon: 151.21, color: 0x6366F1, size: 2.2, dest: pomHub, cargo: 'Trade Warehouse Logistics & Fleet Gear' },
        { name: 'Auckland, New Zealand (Dairy & Agro Provisions)', lat: -36.85, lon: 174.76, color: 0x14B8A6, size: 2.0, dest: pomHub, cargo: 'Dairy, Butter & Food Provisions' },
        { name: 'Yokohama / Tokyo, Japan (Heavy Fleet Equipment)', lat: 35.44, lon: 139.64, color: 0xA855F7, size: 2.0, dest: laeHub, cargo: 'Automotive Spares & Commercial Transport' },
        { name: 'Mumbai, India (Commodities & Grain Sourcing)', lat: 19.07, lon: 72.88, color: 0x8B5CF6, size: 2.0, dest: pomHub, cargo: 'Bulk Rice, Pulses & Specialty Spices' },
        { name: 'Los Angeles, USA (Mining & Fleet Diagnostics)', lat: 34.05, lon: -118.24, color: 0xEC4899, size: 2.0, dest: pomHub, cargo: 'Specialized Industrial Radials & Fleet Tech' },
    ];

    const domesticHubs = [
        { name: 'Mt. Hagen (Western Highlands Center)', lat: -5.86, lon: 144.23, color: 0x84CC16, size: 1.8, source: laeHub, cargo: 'Highlands Highway Retail Store Feeder' },
        { name: 'Goroka (Eastern Highlands Transit)', lat: -6.08, lon: 145.39, color: 0x84CC16, size: 1.8, source: laeHub, cargo: 'Commercial Fleet Supplies & Wholesale Stores' },
        { name: 'Madang (Momase Coastal Terminal)', lat: -5.22, lon: 145.79, color: 0x10B981, size: 1.8, source: laeHub, cargo: 'North Coast Maritime Distribution' },
        { name: 'Kokopo / Rabaul (New Guinea Islands Hub)', lat: -4.34, lon: 152.27, color: 0x06B6D4, size: 1.8, source: pomHub, cargo: 'Islands Coastal Shipping Corridor' },
        { name: 'Buka (Bougainville Autonomous Region)', lat: -5.42, lon: 154.67, color: 0x06B6D4, size: 1.8, source: pomHub, cargo: 'Autonomous Region Distribution' },
    ];

    const markerGroup = new THREE.Group();
    globeGroup.add(markerGroup);
    const rippleRings = [];

    function addBeacon(hub, isMain = false) {
        const pos = latLongToVector3(hub.lat, hub.lon, radius + 0.6);
        const geo = new THREE.SphereGeometry(hub.size, 16, 16);
        const mat = new THREE.MeshBasicMaterial({
            color: hub.color,
            transparent: true,
            opacity: 0.95,
        });
        const mesh = new THREE.Mesh(geo, mat);
        mesh.position.copy(pos);
        markerGroup.add(mesh);

        if (isMain) {
            const pinGeo = new THREE.CylinderGeometry(0.2, 0.6, 5, 8);
            const pinMat = new THREE.MeshBasicMaterial({ color: hub.color, transparent: true, opacity: 0.9 });
            const pinMesh = new THREE.Mesh(pinGeo, pinMat);
            const pinPos = latLongToVector3(hub.lat, hub.lon, radius + 2.5);
            pinMesh.position.copy(pinPos);
            pinMesh.quaternion.setFromUnitVectors(new THREE.Vector3(0, 1, 0), pos.clone().normalize());
            markerGroup.add(pinMesh);

            const crownGeo = new THREE.SphereGeometry(hub.size * 0.7, 14, 14);
            const crownMat = new THREE.MeshBasicMaterial({ color: 0xFFFFFF });
            const crownMesh = new THREE.Mesh(crownGeo, crownMat);
            crownMesh.position.copy(latLongToVector3(hub.lat, hub.lon, radius + 5));
            markerGroup.add(crownMesh);

            for (let i = 0; i < 2; i++) {
                const ringGeo = new THREE.RingGeometry(hub.size * 1.2, hub.size * 2.8, 24);
                const ringMat = new THREE.MeshBasicMaterial({
                    color: hub.color,
                    side: THREE.DoubleSide,
                    transparent: true,
                    opacity: 0.85,
                });
                const ring = new THREE.Mesh(ringGeo, ringMat);
                ring.position.copy(pos);
                ring.lookAt(new THREE.Vector3(0, 0, 0));
                markerGroup.add(ring);
                rippleRings.push({ mesh: ring, offset: i * 0.5 });
            }
        }
    }

    addBeacon(pomHub, true);
    addBeacon(laeHub, true);
    globalHubs.forEach(h => addBeacon(h, false));
    domesticHubs.forEach(h => addBeacon(h, false));

    const arcObjects = [];

    function createRouteArc(fromHub, toHub, color, speed = 0.005) {
        const vStart = latLongToVector3(fromHub.lat, fromHub.lon, radius);
        const vEnd = latLongToVector3(toHub.lat, toHub.lon, radius);

        const distance = vStart.distanceTo(vEnd);
        const altitude = radius + Math.min(distance * 0.32, 45);
        const vMid = vStart.clone().add(vEnd).multiplyScalar(0.5);
        vMid.normalize().multiplyScalar(altitude);

        const curve = new THREE.QuadraticBezierCurve3(vStart, vMid, vEnd);
        
        const tubeGeo = new THREE.TubeGeometry(curve, 36, 0.45, 6, false);
        const tubeMat = new THREE.MeshBasicMaterial({
            color: color,
            transparent: true,
            opacity: 0.75,
        });

        const tube = new THREE.Mesh(tubeGeo, tubeMat);
        globeGroup.add(tube);

        const pulseGeo = new THREE.SphereGeometry(1.8, 12, 12);
        const pulseMat = new THREE.MeshBasicMaterial({
            color: 0xFFFFFF,
            blending: THREE.AdditiveBlending,
        });
        const pulse = new THREE.Mesh(pulseGeo, pulseMat);
        globeGroup.add(pulse);

        arcObjects.push({ curve, pulse, progress: Math.random(), speed });
    }

    createRouteArc(pomHub, laeHub, 0x00FFB2, 0.008);
    globalHubs.forEach(h => {
        createRouteArc(h, h.dest, h.color, 0.004 + Math.random() * 0.003);
    });
    domesticHubs.forEach(h => {
        createRouteArc(h.source, h, h.color, 0.007 + Math.random() * 0.003);
    });

    let isDragging = false;
    let previousMousePosition = { x: 0, y: 0 };
    let targetRotationY = PNG_ROTATION_Y;
    let targetRotationX = PNG_ROTATION_X;
    let idleAfterDrag = 0;

    window.focusGlobePNG = function() {
        targetRotationY = PNG_ROTATION_Y;
        targetRotationX = PNG_ROTATION_X;
        idleAfterDrag = 0;
    };

    container.addEventListener('mousedown', (e) => {
        isDragging = true;
        previousMousePosition = { x: e.clientX, y: e.clientY };
    });

    window.addEventListener('mouseup', () => { isDragging = false; });

    container.addEventListener('mousemove', (e) => {
        if (!isDragging) return;
        const deltaX = e.clientX - previousMousePosition.x;
        const deltaY = e.clientY - previousMousePosition.y;
        targetRotationY += deltaX * 0.006;
        targetRotationX += deltaY * 0.006;
        targetRotationX = Math.max(-0.6, Math.min(0.6, targetRotationX));
        previousMousePosition = { x: e.clientX, y: e.clientY };
    });

    container.addEventListener('touchstart', (e) => {
        if (e.touches.length === 1) {
            isDragging = true;
            previousMousePosition = { x: e.touches[0].clientX, y: e.touches[0].clientY };
        }
    }, { passive: true });

    window.addEventListener('touchend', () => { isDragging = false; });

    container.addEventListener('touchmove', (e) => {
        if (!isDragging || e.touches.length !== 1) return;
        const deltaX = e.touches[0].clientX - previousMousePosition.x;
        const deltaY = e.touches[0].clientY - previousMousePosition.y;
        targetRotationY += deltaX * 0.007;
        targetRotationX += deltaY * 0.007;
        targetRotationX = Math.max(-0.6, Math.min(0.6, targetRotationX));
        previousMousePosition = { x: e.touches[0].clientX, y: e.touches[0].clientY };
    }, { passive: true });

    window.addEventListener('resize', () => {
        const newW = container.clientWidth || 600;
        const newH = container.clientHeight || 500;
        camera.aspect = newW / newH;
        camera.updateProjectionMatrix();
        renderer.setSize(newW, newH);
    });

    let clock = 0;
    function animate() {
        requestAnimationFrame(animate);
        clock += 0.018;

        if (isDragging) {
            idleAfterDrag = 0;
        } else {
            idleAfterDrag += 0.018;
            if (idleAfterDrag > 5) {
                targetRotationY += (PNG_ROTATION_Y - targetRotationY) * 0.015;
                targetRotationX += (PNG_ROTATION_X - targetRotationX) * 0.015;
            }
        }

        globeGroup.rotation.y += (targetRotationY - globeGroup.rotation.y) * 0.06;
        globeGroup.rotation.x += (targetRotationX - globeGroup.rotation.x) * 0.06;

        if (!isDragging && Math.abs(globeGroup.rotation.y - PNG_ROTATION_Y) < 0.25) {
            globeGroup.rotation.y += Math.sin(clock * 0.5) * 0.0005;
        }

        arcObjects.forEach(arc => {
            arc.progress += arc.speed;
            if (arc.progress > 1) arc.progress = 0;
            const point = arc.curve.getPoint(arc.progress);
            arc.pulse.position.copy(point);
        });

        rippleRings.forEach(ring => {
            const phase = (clock + ring.offset) % 2;
            const scale = 1 + phase * 0.9;
            ring.mesh.scale.set(scale, scale, 1);
            ring.mesh.material.opacity = Math.max(0, 0.85 * (1 - phase / 2));
        });

        renderer.render(scene, camera);
    }

    animate();
}

// Global Confetti Burst helper
window.runConfetti = function() {
    const canvas = document.createElement('canvas');
    canvas.style.position = 'fixed';
    canvas.style.top = '0';
    canvas.style.left = '0';
    canvas.style.width = '100vw';
    canvas.style.height = '100vh';
    canvas.style.pointerEvents = 'none';
    canvas.style.zIndex = '9999';
    document.body.appendChild(canvas);

    const ctx = canvas.getContext('2d');
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;

    const confettiPieces = [];
    const colors = ['#00D2FF', '#38BDF8', '#F59E0B', '#10B981', '#FFFFFF', '#6366F1'];

    for (let i = 0; i < 90; i++) {
        confettiPieces.push({
            x: canvas.width / 2 + (Math.random() - 0.5) * 100,
            y: canvas.height / 2,
            w: Math.random() * 8 + 4,
            h: Math.random() * 8 + 4,
            vx: (Math.random() - 0.5) * 14,
            vy: (Math.random() - 1.2) * 12,
            color: colors[Math.floor(Math.random() * colors.length)],
            rotation: Math.random() * 360,
            rotSpeed: (Math.random() - 0.5) * 10,
            opacity: 1
        });
    }

    let frame = 0;
    function renderConfetti() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        frame++;

        confettiPieces.forEach(p => {
            p.x += p.vx;
            p.y += p.vy;
            p.vy += 0.35;
            p.rotation += p.rotSpeed;
            if (frame > 50) p.opacity -= 0.015;

            ctx.save();
            ctx.translate(p.x, p.y);
            ctx.rotate((p.rotation * Math.PI) / 180);
            ctx.fillStyle = p.color;
            ctx.globalAlpha = Math.max(0, p.opacity);
            ctx.fillRect(-p.w / 2, -p.h / 2, p.w, p.h);
            ctx.restore();
        });

        if (frame < 120) {
            requestAnimationFrame(renderConfetti);
        } else {
            canvas.remove();
        }
    }
    requestAnimationFrame(renderConfetti);
};
