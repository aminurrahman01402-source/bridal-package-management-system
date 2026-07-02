
// 1. Service List Rendering
// 1. Service List with Proper Details
const serviceList = [
    {n: "HD Makeup", i: "image/hd makeup 1.jfif?w=300", d: "High-definition makeup for a flawless, camera-ready look that lasts 24 hours."},
    {n: "Skin Treatment", i: "image/Skin Treatment.jfif?w=300", d: "Pre-bridal facial and skin glowing therapy for natural radiance on your big day."},
    {n: "Royal Mehndi", i: "image/Royal Mehndi.jfif?w=300", d: "Intricate organic henna designs for hands and feet by specialist artists."},
    {n: "Luxury Hair", i: "image/Luxury Hair.jfif?w=300", d: "Expert bridal buns, braids, and elegant hair extensions tailored to your style."},
    {n: "Saree Draping", i: "image/Saree Draping.jfif?w=300", d: "Perfectly pinned sarees and lehengas for a neat and comfortable finish."},
    {n: "Body Spa", i: "image/Body Spa.jfif?w=300", d: "Relaxing full-body rejuvenation to glow from within before your wedding."},
    {n: "Nail Care", i: "image/Nail Care.jfif?w=300", d: "Gel extensions and luxury bridal nail art designs to match your outfit."},
    {n: "Grooming", i: "image/Grooming.jfif?w=300", d: "Specialized packages for the groom's skin, hair, and overall wedding look."},
    {n: "Engagement", i: "image/Engagement.jfif?w=300", d: "Soft and elegant look tailored specifically for engagement ceremonies."},
    {n: "Reception", i: "image/Reception.jfif?w=300", d: "Glamorous and bold look to shine under the bright reception lights."},
    {n: "Jewelry", i: "image/Jewelry.jfif?w=300", d: "Premium bridal jewelry rental and expert styling assistance."},
    {n: "Photography", i: "image/Photography.jfif?w=300", d: "Cinematic wedding photography and high-quality couple portraits."},
    {n: "Decor", i: "image/Decor.jfif?w=300", d: "Exquisite floral arrangements and stage decoration themes."},
    {n: "Airbrush", i: "image/airbrush.jfif?w=300", d: "Premium long-lasting airbrush makeup for summer and outdoor weddings."},
    {n: "Events", i: "image/Events.jfif?w=300", d: "End-to-end wedding planning and management services for a stress-free day."}
];

// Displaying services with a "Details" Button
const grid = document.getElementById('serviceGrid');
if(grid) {
    grid.innerHTML = ''; 
    serviceList.forEach((s, index) => {
        grid.innerHTML += `
            <div class="bg-white rounded-3xl shadow-sm img-popup overflow-hidden border border-pink-50">
                <img src="${s.i}" class="w-full h-36 object-cover" alt="${s.n}">
                <div class="p-4 text-center">
                    <h4 class="font-bold text-[10px] text-gray-800 uppercase tracking-widest mb-2">${s.n}</h4>
                    <button onclick="showServiceDetail(${index})" class="text-[9px] bg-pink-600 text-white px-4 py-1 rounded-full hover:bg-pink-700 transition font-bold uppercase tracking-tighter">
                        View Details
                    </button>
                </div>
            </div>`;
    });
}

// Function to push details into the Lightbox/Modal
function showServiceDetail(index) {
    const service = serviceList[index];
    const modal = document.getElementById('imageModal');
    const modalImg = document.getElementById('modalImg');
    
    if(modal && modalImg) {
        modalImg.src = service.i;
        
        // Remove any old detail text first
        let oldText = document.getElementById('modalDetailText');
        if(oldText) oldText.remove();
        
        // Add new detail text inside the modal
        let detailText = document.createElement('p');
        detailText.id = 'modalDetailText';
        detailText.className = 'text-white text-center mt-4 px-6 serif italic text-sm md:text-lg max-w-2xl';
        detailText.innerText = service.d;
        
        // Place text after the image
        modalImg.parentNode.appendChild(detailText);
        
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }
}

// 2. Hero Slider
const slider = [
    'image/aF_679184899_vkb4XBBaKi3yScsH82wQCeKaOMEL25CG.jpg',
    'image/b_F_929960721_B6uwUarrwkxFx8qygoZjg9FlkLZlDMbF.jpg',
    'image/cF_764397182_pi4lzaUUXS5S5IW94XkNUkuXNfFhsRRA.jpg',
];
let current = 0;
const hero = document.getElementById('home');
if(hero) hero.style.backgroundImage = `url('${slider[0]}')`;
setInterval(() => {
    current = (current + 1) % slider.length;
    if(hero) hero.style.backgroundImage = `url('${slider[current]}')`;
}, 4500);

// 3. Admin Toggle
function toggleAdmin() {
    const panel = document.getElementById('adminPanel');
    if(panel.classList.contains('hidden')) {
        let pass = prompt("Enter Admin Password:");
        if(pass === "admin123") panel.classList.remove('hidden');
        else alert("Access Denied");
    } else {
        panel.classList.add('hidden');
    }
}

// 4. Invoice Generator
function generateInvoice() {
    const name = document.getElementById('custName').value;
    const pkg = document.getElementById('selectedPkg').value;
    const method = document.querySelector('input[name="pay"]:checked').value;
    const prices = { 'Silver': 'BDT 10,000', 'Gold': 'BDT 25,000', 'Diamond': 'BDT 50,000' };
    
    if(!name || name.length < 3) return alert('Please enter a valid Client Name');
    
    document.getElementById('invName').innerText = name;
    document.getElementById('invPkg').innerText = pkg + " Luxury Plan";
    document.getElementById('invMethod').innerText = method;
    document.getElementById('invTotal').innerText = prices[pkg];
    
    document.getElementById('invoiceDisplay').classList.remove('hidden');
    document.getElementById('invoiceDisplay').scrollIntoView({ behavior: 'smooth' });
}

// 5. Lightbox for Zoom
function openLightbox(src) {
    const modal = document.getElementById('imageModal');
    const modalImg = document.getElementById('modalImg');
    modalImg.src = src;
    modal.classList.remove('hidden');
}

// Section Show korar function
function showSection(sectionId) {
    const section = document.getElementById(sectionId);
    if (section) {
        section.classList.remove('hidden'); // 'hidden' class-ti muche dibe
        section.scrollIntoView({ behavior: 'smooth' }); // Section-e auto niye jabe
    }
}

function closeLightbox() {
    document.getElementById('imageModal').classList.add('hidden');
}

    function closeLightbox() {
    document.getElementById('imageModal').classList.add('hidden');
    document.body.style.overflow = 'auto';
    
    let oldText = document.getElementById('modalDetailText');
    if(oldText) oldText.remove();
}