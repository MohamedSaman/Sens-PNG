Now that Navin has approved the project, I would not start writing Laravel code immediately. First we should lock the architecture, content model, hosting requirements, UI structure, admin requirements, and deployment plan. That will prevent us from rebuilding things halfway through.
The company material gives us a clear starting point: Sens PNG is a PNG-owned wholesale distributor serving retailers and businesses, currently covering FMCG and automotive products, with warehouses/teams in Port Moresby and Lae. The portfolio currently includes Punjas, Happy Mum, Nachorittos, Kapsen Tyres and Long March Tyres, while the company positioning emphasizes international sourcing, competitive pricing and dependable distribution.
Sens PNG Website — Development Blueprint
1. Technology architecture
For version 1, I recommend:
Area	Technology
Backend	Laravel 13
PHP	PHP 8.3+
Database	MySQL
Frontend	Blade + Tailwind CSS
JavaScript	Alpine.js / vanilla JS where appropriate
Build system	Vite
Authentication	Laravel authentication for admin
Hosting	Existing Bluehost initially
Source control	Private Git repository
Email	SMTP-based enquiry delivery
Images	WebP/AVIF optimization
SSL	HTTPS
SEO	Server-rendered metadata + sitemap/schema
Laravel 13 currently requires PHP 8.3 or later. Laravel also recommends that production traffic be served specifically through the application's public directory.
Bluehost currently provides PHP versions up to 8.5 on shared hosting and provides SSH access on shared accounts, so there is a reasonable technical basis for the deployment. We should still test the actual Sens hosting account before depending on it.
2. Website architecture
I would build the public website with this structure:
Home
The homepage should be much more than a company profile pasted onto a webpage.
Header
Sens PNG logo
Home
About
Products & Brands
Distribution
Leadership
Contact
Business Enquiry CTA
Hero
Strong corporate image combining FMCG / wholesale distribution.
Possible messaging direction:
Connecting Global Brands with Local Businesses
Supporting message about quality products, competitive pricing and dependable distribution.
Buttons:
Explore Our Products
Become a Customer / Enquire
Then:
Company introduction
Short presentation of Sens PNG.
Business divisions
Two major cards:
FMCG Distribution
Automotive Distribution
Featured brands
Punjas
Happy Mum
Nachorittos
Kapsen
Long March
Why Sens PNG
International sourcing
Competitive pricing
Reliable distribution
Wholesale focus
Business partnerships
Distribution network
Port Moresby
Lae
Eventually we can make this visually strong with a PNG map.
Our Commitment
Use the company commitment/message from the supplied profile.
CTA
Looking for a reliable wholesale distribution partner?
Request a Business Enquiry.
Footer
Company
Products
Contact
Locations
Social channels
Legal links
3. About Sens PNG
This page should contain:
Company overview
The story and reason the company exists.
What Sens PNG does
Explain the wholesale-only positioning.
Vision
Use the approved company vision.
Mission
Use the approved mission.
Values / Why choose Sens PNG
Use the existing five strengths.
Our commitment
Company commitment statement.
Distribution presence
Port Moresby + Lae.
The profile specifically positions Sens PNG around improving access to competitively priced products for independent businesses rather than competing with those businesses at retail level.
That distinction should become an important part of the website's messaging.
4. Products & Brands
This should not be one static page.
I recommend the structure:
/products
Then:
/products/fmcg
/products/automotive
And potentially:
/brands/punjas
/brands/happy-mum
/brands/nachorittos
/brands/kapsen
/brands/long-march
This means that later, adding a new supplier or brand requires adding it in the admin panel rather than changing code.
FMCG page
Hero
Introduction
Brand grid
Products
Wholesale enquiry CTA
Automotive page
Hero
Introduction
Kapsen
Long March
Vehicle/application information
Commercial/fleet enquiry
The source profile already differentiates Kapsen as serving passenger/SUV/light commercial applications and Long March as focused on trucks, buses and commercial/heavy transport.
5. Brand pages
Each brand should support:
Brand logo
Hero/banner
Brand description
Product range
Product images
Brochure/catalogue
Related products
Enquiry CTA
Even if Navin doesn't have enough content to create individual brand pages immediately, we should build the database to support them now.
That avoids restructuring Laravel later.
6. Distribution page
I recommend a separate Our Distribution Network page.
It can explain:
Port Moresby operations
Lae operations
Nationwide distribution capability
Warehouse capability
Supply-chain approach
Customer support
Stock availability
The company profile specifically states that Sens PNG has warehouses and dedicated teams in both Lae and Port Moresby.
Later, this page can expand to include delivery coverage or distributor locations.
7. Leadership
We should create:
/leadership
Initially:
Navin Raju — Founder & Managing Director
Photo
Biography
Experience
Leadership message
The supplied profile provides the approved leadership background, including more than 20 years across retail, logistics, supply chain, aviation and commercial operations in PNG, New Zealand and Australia.
Importantly, I would make leadership entries database-driven rather than hard-coded.
That means another executive can be added later.
8. Downloads
I recommend adding:
/downloads
This can eventually contain:
Company Profile
Product Catalogues
Brand Catalogues
Technical brochures
Tyre catalogues
Corporate documents
Each download should be manageable from admin.
9. Contact / Business Enquiry
This is important for Sens PNG because this is a B2B website, not an ordinary consumer site.
Instead of only:
Name
Email
Message
I recommend:
Business name
Contact person
Email
Phone
Location / Province
Business type
Retailer / Wholesaler / Commercial / Fleet / Other
Interested in
FMCG / Automotive / General Distribution
Brand of interest
Message
The form should:
Save the enquiry in Laravel/MySQL
Email Sens PNG
Send acknowledgement to customer
Record date/time
Record enquiry status
Protect against spam
Allow admin to mark enquiries as New / Contacted / Closed
That makes the site genuinely useful to Sens PNG rather than merely informational.
10. Admin system
I definitely recommend providing Sens PNG with a CMS/admin panel.
Example:
domain.com/admin
Dashboard could show:
Enquiries
New enquiries
Recent enquiries
Website Content
Pages
Homepage sections
Products
Products
Categories
Brands
Brands
Downloads
Catalogues/documents
Company
Locations
Leadership
Contact information
Media
Images/documents
SEO
Meta information
Settings
Phone
Email
Address
Social media
Site configuration
11. Database design
I would establish the database before building the screens.
Core tables:
Table	Purpose
users	Admin accounts
pages	Editable website pages
brands	Punjas, Happy Mum, etc.
product_categories	FMCG, Automotive
products	Individual products
product_images	Product gallery
downloads	Catalogues/PDFs
locations	Lae, Port Moresby
leadership	Management profiles
enquiries	Business enquiries
enquiry_statuses	New/contacted/closed
site_settings	Phone, email, address etc.
seo_metadata	SEO information
media	Managed website assets
I would also use slug, sort_order, status, created_at and updated_at appropriately.
For example:
brands
 ├── id
 ├── name
 ├── slug
 ├── logo
 ├── banner
 ├── description
 ├── website_url
 ├── sort_order
 ├── status
 ├── created_at
 └── updated_at
And:
products
 ├── id
 ├── category_id
 ├── brand_id
 ├── name
 ├── slug
 ├── short_description
 ├── description
 ├── image
 ├── status
 ├── featured
 ├── sort_order
 ├── created_at
 └── updated_at
12. Laravel application structure
I would keep the code clean rather than putting everything inside controllers.
app/
├── Http/
│   ├── Controllers/
│   │   ├── Website/
│   │   └── Admin/
│   ├── Middleware/
│   └── Requests/
│
├── Models/
│   ├── Brand.php
│   ├── Product.php
│   ├── ProductCategory.php
│   ├── Enquiry.php
│   ├── Location.php
│   ├── Leadership.php
│   └── SiteSetting.php
│
├── Services/
│   ├── EnquiryService.php
│   ├── MediaService.php
│   └── SeoService.php
│
resources/
├── views/
│   ├── layouts/
│   ├── components/
│   ├── pages/
│   └── admin/
│
├── css/
└── js/

routes/
├── web.php
└── admin.php

database/
├── migrations/
├── factories/
└── seeders/
Laravel itself separates application code, database migrations, public assets, views and routes in this general structure.
13. SEO structure
SEO should be built during development rather than added at the end.
Every page should support:
SEO title
Meta description
Canonical URL
OG title
OG description
OG image
Twitter/social sharing metadata
We should also generate:
sitemap.xml
robots.txt
Structured data:
Organization schema
WebSite schema
Breadcrumb schema
Product/brand schema where appropriate
URLs should look like:
senspng.com/about
senspng.com/products
senspng.com/products/fmcg
senspng.com/products/automotive
senspng.com/brands/kapsen
Not:
senspng.com/page.php?id=27
14. Performance requirements
From the beginning:
Responsive images
WebP/AVIF
Lazy loading
Optimized CSS/JS
Minified production assets
Browser caching
Laravel caching
Database indexing
Optimized fonts
No unnecessary plugins/libraries
For production, Laravel recommends caching configuration, routes and views as part of deployment.
15. Security
Before launch we need:
HTTPS only
CSRF protection
Server-side form validation
Admin authentication
Strong password policy
Login rate limiting
Form rate limiting
File upload validation
Restricted file extensions
Secure .env
No debugging in production
Database credentials outside public directory
Regular database backups
Secure headers
Spam protection
Activity logging for important admin actions
Most importantly, we must never expose the entire Laravel directory through Bluehost. Laravel explicitly advises routing web traffic through public/index.php, because exposing the project root could expose sensitive configuration files.
16. Hosting checks — do this BEFORE development goes too far
We need access to Navin's Bluehost account and should confirm:
PHP ≥ 8.3
Required PHP extensions
MySQL availability
SSH access
Composer availability
Document-root configuration
SSL
DNS/domain status
Storage limits
Email/SMTP configuration
Backup options
Bluehost says shared servers currently support PHP through 8.5 and provide SSH access.
I would perform a small Laravel deployment test early, rather than completing the whole site locally and discovering a hosting limitation at launch.
17. Development environments
We should have three environments:
LOCAL
Our development machine.
STAGING
Something like:
staging.senspng.com
Password-protected and hidden from Google.
Navin reviews development here.
PRODUCTION
senspng.com
We don't develop directly on production.
18. Git workflow
Create a private repository:
sens-png-website
Branches:
main
develop
feature/homepage
feature/products
feature/admin
feature/enquiries
main = production-ready.
No passwords or .env files committed.
19. Design system
Before programming individual pages, we should establish:
Sens PNG blue
Secondary dark/navy color
Neutral backgrounds
Typography
Button styles
Container widths
Border radius
Spacing system
Cards
Forms
Image treatment
Navigation behavior
Mobile breakpoints
We should use the actual SPL/Sens PNG logo supplied in the company material rather than recreating it.
The visual direction I recommend is:
Modern corporate + distribution + international sourcing
rather than something that looks like a supermarket or retail e-commerce site.
Sens PNG's customers are businesses.
The website should therefore feel:
credible → established → commercial → international → reliable.
20. Content/assets we still need from Navin
Before we reach final content implementation, I would request all of these together:
High-resolution Sens PNG logo, preferably SVG/AI/EPS/transparent PNG; official brand colors if available; original/high-resolution product and brand logos; product photographs; warehouse photographs from Lae and Port Moresby; office/team photographs; Navin's original leadership photo; company/product catalogues; any supplier brochures approved for public use; social media links; confirmation of the main website enquiry email; confirmation of the public phone number and address; location/map information; any additional staff profiles; any partner/supplier logos they have permission to display; and any Privacy Policy or Terms content already available.
We already have the profile's current public contact details as +675 8387 5018, admin@senspng.com, Unit 04 Wamco Haus, Section 35 Lot 50, Kunai Street, Hohola, but we should confirm these are the details Navin wants published before launch.
21. Phase-one scope boundary
One important development decision:
Do not turn phase one into e-commerce.
Currently I would build:
Corporate website
Dynamic product catalogue
Brand management
Downloads
Business enquiries
CMS/admin
SEO
Analytics readiness
I would not build yet:
Online checkout
Online payments
Inventory synchronization
Customer accounts
Wholesale pricing login
Order processing
ERP integration
We should architect Laravel so those can be added later.
That protects the approved project scope while keeping the application scalable.
22. Future Phase 2 potential
Later Sens PNG could add:
B2B customer portal
Dealer registration
Wholesale price access
Quote requests
Purchase orders
Inventory availability
Customer-specific pricing
Order tracking
Sales representative accounts
Supplier portal
ERP/accounting integration
Product/API feeds
This is one of the reasons the Laravel decision is useful.
23. Development sequence
I would execute the project in this order:
Week 1 — Foundation
Requirements freeze → hosting audit → repository → Laravel setup → database architecture → design system → wireframes.
Week 2 — Frontend
Header/footer → homepage → about → products → brands → distribution → leadership → contact.
Week 3 — Laravel CMS
Authentication → products → brands → leadership → downloads → settings → enquiries → media management.
Week 4 — Content & QA
Populate Sens PNG content → optimize images → responsive QA → enquiry/email testing → SEO → performance/security.
Week 5 — Client review & launch
Staging review → Navin corrections → acceptance → production deployment → Search Console/analytics → backups → handover.
That keeps us aligned with the 4–5 week project window we had planned.
What I would do first now
Before touching the visual homepage, I would start with these four things:
1. Audit the Bluehost account
Confirm Laravel deployment is safe and supported.
2. Create the technical specification
Freeze page structure + database + CMS functionality.
3. Organize all client assets
Logo → Brands → Products → Leadership → Warehouse → Documents.
4. Build the UX/design direction
First produce the homepage desktop + mobile design.
Once Navin approves the design direction, we reuse that system for every other page.
Only then should we move deeply into Laravel development.
My recommended first Laravel milestone
When we actually initialize the repository, the first milestone should give us:
Laravel 13 installed
↓
Environment configured
↓
MySQL connected
↓
Git configured
↓
Admin authentication
↓
Database migrations
↓
Base layout
↓
Header/footer
↓
Site settings
↓
Homepage foundation
From there we build modules systematically rather than page-by-page with hard-coded content.
That gives us a proper production project, not simply a collection of Laravel pages.
The next practical thing I can do with you is create the actual Laravel project architecture — migrations, models, controllers, routes, Blade directory structure, admin modules and initial installation commands — so you can create the repository and start coding Sens PNG from zero in the correct structure.

---------------
If you mean the Sens PNG company details for the website, here is the information we have from the company profile:

Sens PNG — Company Details

* Company: Sens PNG
* Business type: Wholesale distribution
* Market: Papua New Guinea
* Core areas: FMCG and automotive products
* Operations: Port Moresby and Lae
* Customers: Retailers, independent businesses and commercial customers
* Key brands: Punjas, Happy Mum, Nachorittos, Kapsen Tyres and Long March Tyres
* Founder & Managing Director: Navin Raju
* Phone: +675 8387 5018
* Email: admin@senspng.com
* Address: Unit 04 Wamco Haus, Section 35 Lot 50, Kunai Street, Hohola, Papua New Guinea.

Company positioning

Sens PNG focuses on connecting international suppliers and brands with businesses in PNG through wholesale distribution. Its stated approach emphasizes quality products, competitive pricing, reliable distribution and long-term business relationships.

Product areas

FMCG

* Punjas
* Happy Mum
* Nachorittos

Automotive

* Kapsen Tyres
* Long March Tyres

Leadership

Navin Raju is identified in the supplied company profile as the Founder & Managing Director, with experience spanning retail, logistics, supply chain, aviation and commercial operations across PNG, New Zealand and Australia.

If by “company details” you mean the complete content we should put on the Sens PNG website—About Us, Vision, Mission, Values, Products, Leadership, Contact, etc.—I can organize all of it into one clean website-ready document.