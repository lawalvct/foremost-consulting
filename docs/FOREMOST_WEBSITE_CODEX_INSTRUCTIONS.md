# Foremost Consulting Associates Website — Codex Development Instructions

**Project type:** Corporate professional-services website with a lightweight content-management and lead-management dashboard  
**Owner:** Victor T. Lawal  
**Business:** Foremost Consulting Associates  
**Deployment target:** VPS managed with aaPanel  
**Production runtime:** PHP 8.3, MySQL, Nginx or Apache, Node.js for Inertia SSR  
**Container policy:** **Do not use Docker, Laravel Sail, Docker Compose, or container-based deployment.**  
**Last updated:** 13 August 2026

---

## 1. Instructions to Codex

Treat this document as the primary product and engineering brief for the project.

Before modifying code:

1. Inspect the repository, existing dependencies, routes, migrations, components, assets, and deployment files.
2. Preserve useful existing work and the user's changes. Do not replace the project blindly.
3. Report the current project state, the gaps you found, and the next implementation phase.
4. Implement the work in small, testable phases.
5. After each phase, run the relevant automated checks and report exactly what changed.
6. Do not invent credentials, phone numbers, qualifications, client endorsements, testimonials, regulatory claims, or business statistics.
7. Mark missing business content clearly as `[TO CONFIRM]` instead of guessing.
8. Never commit `.env`, production credentials, database dumps, `vendor`, `node_modules`, generated logs, or private uploads.
9. Do not add Docker files or require Docker at any stage.
10. Do not introduce Next.js, Nuxt, a separate API application, or microservices. This is one Laravel application using Inertia and Vue.

When a requirement conflicts with an existing implementation, explain the conflict before making a destructive change.

---

## 2. Product Goal

Build a premium, modern and trustworthy website that presents **Foremost Consulting Associates** as an established Nigerian professional-services firm, not merely as a CAC-registration agent or a small bookkeeping office.

The website must:

- Establish credibility in audit, accounting, tax, consulting, corporate affairs, training and accounting technology.
- Explain services clearly to businesses, institutions and government-related organisations.
- Generate qualified consultation enquiries.
- Promote training and capacity-development programmes.
- Publish useful accounting, audit, tax and business insights.
- Support local discovery for Abeokuta, Ogun State, while presenting the firm as capable of serving clients across Nigeria.
- Give authorised staff a simple dashboard to update content and manage enquiries without editing source code.
- Be responsive, accessible, secure, fast and search-engine friendly.

This is a **corporate website and CMS**, not an accounting application, client portal, LMS or multi-tenant SaaS.

---

## 3. Confirmed Company Context

Use these facts as the initial content foundation, subject to final confirmation by Foremost management:

- Official name: **Foremost Consulting Associates**.
- The profile states that the firm was formally registered in February 2006.
- The firm originated from three auditing practices that came together under one umbrella.
- Its historical divisions are:
  - Consultancy and Training
  - Audit and Tax
  - Corporate Affairs and Investment
- Its professional values include **probity, integrity and honesty**.
- Historical motto: **Our Words and Deed Are Irredeemable Bond**.
- Historical address: **1, Onikoko Road, Ibara, Panseke, Abeokuta, Ogun State, Nigeria**.
- Historical email: **foremostchartered@gmail.com**.
- The profile lists experience across government/public institutions, education, healthcare, microfinance and financial services, manufacturing, hospitality, and oil and gas.

### Important content cautions

- Do not publish old staff-count figures until management confirms current numbers.
- Do not claim that every historical client is still a client.
- Do not publish client logos or named client endorsements without approval.
- Do not copy outdated legal references from the old profile.
- Use current tax-authority and company-law terminology in final public copy.
- Use **Nigeria Revenue Service (NRS)** in formal current tax copy. Where useful for audience understanding, an FAQ may explain that many people previously knew the federal authority as FIRS.
- Refer to the current Companies and Allied Matters Act framework rather than the old CAMA 1990 wording.
- Regulatory and legal content must be reviewed by Foremost before publication.

---

## 4. Approved Technology Stack

### Backend

- **Laravel 13.x**
- **PHP 8.3**
- MySQL 8.0+ preferred
- Eloquent ORM
- Laravel authentication, authorization, notifications, mail, queues, scheduler and filesystem
- Pest for PHP tests
- Laravel Pint for PHP formatting

### Frontend

- **Inertia.js 3**
- **Vue 3 Composition API**
- **TypeScript in strict mode**
- **Tailwind CSS 4**
- **shadcn-vue** for accessible foundational UI components
- Vite
- Lucide icons or another single consistent open-source icon set
- Inertia server-side rendering for public pages

### Production support

- Node.js **22 or higher** for Inertia SSR
- npm unless the existing repository already standardises on another package manager
- aaPanel website management
- aaPanel Supervisor Manager or system Supervisor for long-running processes
- SMTP for application email
- MySQL-backed sessions, cache and queues for the first release

### Explicitly excluded

- Docker
- Laravel Sail
- Docker Compose
- Kubernetes
- Next.js
- Nuxt
- A separate REST API unless a later approved integration truly requires one
- Redis as a mandatory dependency for version 1
- Laravel Octane as a mandatory dependency for version 1

### PHP compatibility rule

The production server is fixed at PHP 8.3. Configure Composer to resolve dependencies for PHP 8.3 even when development occurs on a newer PHP version:

```bash
composer config platform.php 8.3.0
```

Commit the resulting Composer configuration and lock file. Do not generate a lock file on PHP 8.4/8.5 that cannot install on PHP 8.3.

If a required package cannot resolve under PHP 8.3, stop and report the dependency conflict. Do not silently upgrade the server, downgrade Laravel or add unsafe package constraints.

---

## 5. Application Architecture

Use one Laravel application:

```text
Browser
  ↓
Nginx/Apache on aaPanel
  ↓
Laravel routes, middleware, controllers and policies
  ↓
Inertia responses
  ↓
Vue 3 pages and components
  ↓
MySQL / Filesystem / Mail / Queue
```

Do not create a duplicate API layer for normal website and dashboard operations. Use normal Laravel web routes, controllers, Form Requests, policies and Inertia responses.

### Rendering strategy

- Enable Inertia SSR for the public website.
- Public pages must return meaningful HTML before client-side hydration.
- Admin pages may use the same Inertia application and do not require SEO indexing.
- Keep all Vue code SSR-safe:
  - Do not read `window`, `document`, `localStorage` or browser-only APIs at module scope.
  - Access browser-only APIs inside `onMounted` or guarded client-only functions.
  - Do not use browser-only third-party libraries during SSR without a safe wrapper.

---

## 6. Project Scope

### Version 1 must include

- Public corporate website
- Responsive header, navigation and footer
- Homepage
- About page
- Service listing and service-detail pages
- Industry listing and industry-detail pages
- Training listing and programme-detail pages
- Insights/article listing and article-detail pages
- Contact page
- Consultation request page/form
- Privacy page
- Terms/use-of-site page
- Admin authentication
- Admin dashboard
- Content management for core modules
- Consultation/contact lead management
- Training registration management
- Media/file uploads required by content modules
- Dynamic metadata and social sharing images
- Dynamic XML sitemap and robots rules
- Inertia SSR
- Email notifications
- Database queues
- Scheduler configuration
- Automated tests
- aaPanel deployment files and instructions

### Version 1 must not include

- Client login portal
- Audit document exchange portal
- Online accounting software
- Multi-tenant architecture
- Mobile application
- Full learning-management system
- Online examination platform
- Payment gateway
- E-commerce
- Live chat system
- AI chatbot
- Complex page builder
- Public user registration

Keep future expansion possible, but do not over-engineer version 1.

---

## 7. Brand Assets

The user will provide these approved/generated assets to the project:

```text
foremost-logo-full.png   # Full horizontal company logo for header/footer/social use
foremost-fca-mark.png    # FCA emblem for favicon, app icon and compact navigation use
```

Store final public assets under:

```text
public/brand/foremost-logo-full.png
public/brand/foremost-fca-mark.png
public/brand/favicon.ico
public/brand/favicon-16x16.png
public/brand/favicon-32x32.png
public/brand/apple-touch-icon.png
public/brand/icon-192.png
public/brand/icon-512.png
public/brand/og-default.jpg
```

Create properly cropped favicon/app-icon derivatives from the FCA mark. The 16px and 32px favicons must remain legible; simplify or tighten the crop if the detailed circular mark becomes unreadable at small sizes.

Do not hotlink the logo from an external service.

### Brand palette

Use CSS custom properties so colours are centralised and easy to adjust:

```css
:root {
    --brand-forest: #0b4d3b;
    --brand-forest-dark: #07382c;
    --brand-burgundy: #7a263a;
    --brand-gold: #c3a35a;
    --brand-warm-white: #fafaf7;
    --brand-charcoal: #20262b;
    --brand-muted: #66706b;
    --brand-border: #dde4df;
}
```

### Visual direction

The site should feel:

- Established
- Calm
- Competent
- Premium but not flashy
- Modern without looking like a technology startup
- Nigerian and locally relevant without relying on clichés

Avoid:

- Excessive glassmorphism
- Large neon gradients
- Crypto-style visuals
- Overly glossy UI components
- Generic calculator-and-coins imagery everywhere
- Busy animation
- Tiny text
- Stock images that look unrelated to Nigerian businesses

Use generous whitespace, strong typography, restrained motion, professional photography and subtle financial/data-inspired details.

### Typography

Use one strong sans-serif family for most UI and content. A restrained serif may be used for selected headings or quotations.

Preferred approach:

- Sans: Manrope, Inter or an equivalent high-legibility family
- Serif accent: Source Serif, Merriweather or an equivalent professional serif

Self-host or bundle fonts where practical. Provide good system-font fallbacks. Do not block page rendering while waiting for fonts.

---

## 8. Content Voice

Public copy must be:

- Professional
- Clear
- Confident
- Specific
- Ethical
- Easy for non-accountants to understand

Avoid empty claims such as:

- “We are the best”
- “No. 1 accounting firm”
- “Guaranteed tax reduction”
- “We solve every financial problem”

Use evidence-based positioning such as:

- Established professional experience
- Multi-sector exposure
- Integrated audit, accounting, tax, training and advisory capabilities
- Ethical and confidential service
- Technology-supported accounting processes

Do not use lorem ipsum in the final implementation. Draft content may be seeded, but every unconfirmed statement must be clearly marked in the admin area as draft or pending approval.

---

## 9. Public Navigation

Use this primary navigation:

```text
Home
About
Services
Industries
Training
Insights
Contact
[Request Consultation]
```

### Services menu

```text
Audit & Assurance
Accounting & Financial Management
Tax & Regulatory Advisory
Management & Business Advisory
Corporate Affairs Services
Investigation & Special Engagements
Accounting Technology & Systems
Training & Capacity Development
```

On mobile, use an accessible drawer with nested service links. The menu must support keyboard navigation and screen readers.

---

## 10. Public Routes

Use stable, readable, lowercase slugs:

```text
/
/about
/services
/services/{service:slug}
/industries
/industries/{industry:slug}
/training
/training/{trainingProgram:slug}
/insights
/insights/category/{category:slug}
/insights/{article:slug}
/resources
/contact
/request-consultation
/privacy
/terms
/sitemap.xml
/robots.txt
```

Optional approved routes:

```text
/leadership
/faqs
/careers
```

Do not create a separate full leadership page unless the amount of approved content justifies it.

Admin routes must be prefixed with `/admin` and protected by authentication and authorization.

---

## 11. Homepage Requirements

Build the homepage as a high-converting corporate landing page with the following sequence.

### 11.1 Top contact bar

Show only confirmed primary contact information:

- Abeokuta, Ogun State
- Primary phone
- Email
- Optional office hours

Do not show six phone numbers in the header. Management should select one primary and one secondary number.

### 11.2 Header

- Full logo on desktop
- Compact FCA mark on constrained mobile layouts if needed
- Sticky after scroll
- Clear active states
- Main CTA: **Request Consultation**
- Accessible dropdowns

### 11.3 Hero

Suggested content direction:

**Eyebrow:** Audit • Accounting • Tax • Advisory

**Heading:**

> Professional Insight for Better Business Decisions.

**Supporting text:**

> Foremost Consulting Associates helps organisations strengthen financial reporting, improve controls, meet regulatory obligations and build sustainable systems for growth.

**Primary CTA:** Request a Consultation  
**Secondary CTA:** Explore Our Services

Add a restrained trust line such as:

```text
Established 2006 • Chartered Professionals • Multi-sector Experience
```

Do not publish “nationwide reach”, client counts or staff counts until current figures are approved.

### 11.4 Core services

Show the eight approved service groups as clear cards or a balanced grid. Each card must link to a detailed service page.

### 11.5 Why Foremost

Use five evidence-led themes:

1. Professional expertise
2. Cross-sector experience
3. Integrated advisory capabilities
4. Technology-supported service
5. Integrity and confidentiality

### 11.6 Sector experience

Feature approved sectors:

- Financial institutions and microfinance
- Government and public sector
- Education
- Healthcare
- Manufacturing
- Hospitality
- Oil and gas
- SMEs and growing businesses

Link to the Industries page.

### 11.7 Accounting technology section

Position software work as a professional implementation service, not software reselling:

- Accounting-process assessment
- Software-selection advisory
- Chart-of-accounts configuration
- Data and opening-balance migration
- Inventory/payroll setup
- User training
- Post-implementation support

Do not name Ballie or any other software publicly until Foremost approves the partnership and positioning.

### 11.8 Training section

Feature:

- Young accountants' practical training
- Corporate/in-house training
- Tax and compliance workshops
- Accounting software training
- Custom capacity-building programmes

Include a **View Training Programmes** CTA.

### 11.9 Insights section

Show the latest three published articles with category, date, reading time and image.

### 11.10 Final CTA

Suggested heading:

> Let’s Strengthen Your Financial and Business Systems.

Buttons:

- Request Consultation
- Contact Foremost

### 11.11 Footer

Include:

- Compact logo
- Short positioning statement
- Services links
- Company links
- Contact details
- Social links only when confirmed
- Privacy and terms
- Copyright year generated dynamically
- Optional historical motto in a subtle treatment

---

## 12. About Page

The About page should include:

- Firm overview
- History since 2006
- Mission
- Vision
- Values
- Divisions/capabilities
- Sector reach
- Leadership summary
- CTA

### Leadership rule

Do **not** reproduce full CV-style biographies from the company profile.

Show only approved leadership cards, likely:

- Two Principal Partners
- One Associate Partner

For each person, limit content to:

- Name
- Current role
- Key professional designations
- Primary specialization
- Approximately 60–120 words of approved biography
- Professional portrait if supplied

Do not show nationality, full employment history, every seminar attended, extracurricular posts or historical examination appointments.

---

## 13. Service Pages

Every service page must contain:

- Hero/title
- Short value proposition
- Problems the service addresses
- Service components
- Who the service is for
- Engagement approach
- Relevant sector examples without breaching confidentiality
- FAQs where approved
- Consultation CTA
- Unique metadata and structured data

### 13.1 Audit & Assurance

Seed topics:

- Statutory audit
- Financial statement audit
- Management audit
- Internal-control review
- Operational and compliance review
- Audit recommendations and management letters

Avoid claiming services beyond the firm's current professional authorization.

### 13.2 Accounting & Financial Management

Seed topics:

- Bookkeeping and periodic accounting
- Clearing accounting backlogs
- Financial statement preparation
- Management accounts
- Bank reconciliation
- Customer and supplier reconciliation
- Physical inventory and inventory-control support
- Fixed-asset register and verification
- Accounting and cost-accounting system design
- Business valuation, subject to confirmation

### 13.3 Tax & Regulatory Advisory

Seed topics:

- Tax planning and advisory
- Tax computations and returns
- Tax-clearance support
- Tax compliance review
- Tax audit/investigation support
- Reconciliation of tax positions
- Representation and correspondence with relevant authorities

Use current terminology. Do not guarantee outcomes.

### 13.4 Management & Business Advisory

Seed topics:

- Project and investment appraisal
- Feasibility studies
- Business plans
- Cash-flow projections
- Funding documentation for banks/lenders
- Budgeting
- Strategic planning
- Management structure review
- Business turnaround/restructuring support

Services involving recruitment, microfinance-bank establishment or regulated activities must remain unpublished until management confirms that they are still actively offered and appropriately authorized.

### 13.5 Corporate Affairs Services

Seed topics:

- Business and company incorporation
- Annual returns
- Changes of directors
- Registered-address changes
- Share-capital changes
- Other post-incorporation filings

Do not promise approval timelines controlled by regulators.

### 13.6 Investigation & Special Engagements

Seed topics:

- Fraud-related review
- Verification exercises
- Due diligence
- Merger/acquisition support
- Corporate-governance review
- Project evaluation
- Special-purpose investigation

All wording must preserve confidentiality and avoid implying law-enforcement powers.

### 13.7 Accounting Technology & Systems

Seed topics:

- Accounting-process review
- Software selection
- Software implementation
- Chart of accounts
- Data migration
- Opening balances
- Inventory and payroll configuration
- User roles and approval workflows
- Management reporting setup
- Staff training and post-launch support

### 13.8 Training & Capacity Development

Seed topics:

- In-house corporate training
- General professional programmes
- Custom training packages
- Young accountant development
- Tax and audit workshops
- Accounting software training
- On-site and designated-centre delivery

### Bank-charge investigation

The old profile contains a dedicated bank-charge investigation service. Create this only as an **unpublished draft** under Investigation or Financial Review until Foremost confirms that the service remains current and approves its wording.

---

## 14. Industries Pages

Create an industry landing page and detailed pages for approved sectors.

Each industry page should explain:

- Typical financial/control challenges
- Relevant Foremost services
- Common engagement outcomes
- Related insights
- Consultation CTA

Do not display historical client names automatically. Client references must have explicit publication approval.

Suggested initial industry slugs:

```text
financial-services-and-microfinance
government-and-public-sector
education
healthcare
manufacturing
hospitality
oil-and-gas
smes-and-growing-businesses
```

---

## 15. Training Module

### Public features

- Training listing
- Search/filter by delivery mode or category if enough programmes exist
- Programme detail page
- Upcoming date/session
- Venue or online mode
- Intended audience
- Objectives
- Modules/topics
- Facilitator summary if approved
- Registration form
- “Request custom corporate training” CTA

### Admin features

- Create/edit/archive programmes
- Set registration status: draft, open, closed, completed, cancelled
- Optional capacity
- Session dates
- Export registrations to CSV
- Registration status: new, confirmed, attended, cancelled
- Internal notes
- Email acknowledgement

No payment collection in version 1.

---

## 16. Insights Module

Use **Insights** or **Knowledge Centre** publicly rather than only “Blog”.

### Categories

- Audit & Assurance
- Accounting
- Tax & Compliance
- Business Advisory
- Corporate Affairs
- Accounting Technology
- Training

### Article fields

- Title
- Slug
- Excerpt
- Featured image
- Category
- Body
- Author display name
- Status: draft, scheduled, published, archived
- Published date
- Reading time
- SEO title
- Meta description
- Canonical URL
- Open Graph image
- Optional FAQ data

### Editorial rules

- Never publish legal/tax advice without Foremost approval.
- Add a suitable professional disclaimer where necessary.
- Do not create fabricated quotations or statistics.
- Show the last updated date for time-sensitive tax/regulatory articles.
- Schedule publication through Laravel's scheduler.

Use a manageable rich-text editor such as TipTap if it integrates cleanly. Sanitize all saved/rendered HTML on the server. If a safe rich-text setup becomes disproportionately complex, use Markdown with a secure preview rather than accepting unsafe HTML.

---

## 17. Contact and Consultation Workflows

### Contact form

Fields:

- Full name
- Organisation
- Email
- Phone
- Subject
- Message
- Consent acknowledgement

### Consultation form

Fields:

- Full name
- Organisation
- Role/title, optional
- Email
- Phone
- Location
- Service required
- Industry, optional
- Brief description
- Preferred contact method
- Preferred date/time, optional
- Optional attachment
- Consent acknowledgement

### Service options

- Audit & Assurance
- Accounting & Financial Management
- Tax & Regulatory Advisory
- Management & Business Advisory
- Corporate Affairs
- Investigation/Special Engagement
- Accounting Technology
- Training
- Other

### Attachment security

- Attachments are optional.
- Allow only approved document formats such as PDF, DOCX, XLSX, JPG and PNG.
- Set a conservative maximum size, initially 5 MB.
- Validate MIME type and extension.
- Store attachments on a non-public/private disk.
- Never execute or render uploaded office documents.
- Generate a protected admin download route with authorization.

### Lead statuses

```text
new
reviewing
contacted
in_progress
closed
spam
```

### Notifications

- Store every valid submission in MySQL.
- Queue email acknowledgement to the sender.
- Queue notification to configured Foremost recipients.
- Log mail failures without losing the lead.
- Provide an admin unread/new count.

### Spam protection

Start with:

- CSRF protection
- Rate limiting by IP and email
- Honeypot field
- Minimum form completion time
- Server-side validation

Add CAPTCHA only if actual spam volume justifies it.

---

## 18. Admin Dashboard

Use an authenticated Inertia/Vue dashboard.

### Authentication

- No public registration.
- Seed the first owner account through a secure production command or environment-assisted seeder.
- Support login, logout, password reset and email verification where appropriate.
- Rate-limit login attempts.
- Require a secure password.

### Roles

Use a simple first-party role enum/column initially:

```text
owner
admin
editor
```

Permissions:

- Owner: all settings and user management
- Admin: all content and lead management, excluding ownership-sensitive settings
- Editor: content creation/editing; no user management or sensitive lead exports unless approved

Use Laravel policies. Do not rely only on hiding navigation links.

### Admin navigation

```text
Dashboard
Website
  Pages
  Services
  Industries
  Leadership
  Client References
  Testimonials
Insights
  Articles
  Categories
Training
  Programmes
  Registrations
Leads
  Consultation Requests
  Contact Messages
Resources
Media
Users
Settings
```

Hide modules that are not yet enabled rather than showing non-functional pages.

### Dashboard widgets

- New consultation requests
- New contact messages
- Open training registrations
- Published/draft articles
- Recent activity
- Quick-create links

Do not build vanity analytics that are not backed by real data.

---

## 19. Data Model

Use migrations, foreign keys, indexes, soft deletes where useful, enums/value objects and factories.

### Core tables

#### `users`

- id
- name
- email
- email_verified_at
- password
- role
- is_active
- last_login_at
- remember_token
- timestamps

#### `site_settings`

Use structured groups or key/value storage for:

- company identity
- contact details
- address
- office hours
- social links
- email recipients
- SEO defaults
- analytics IDs
- consultation settings
- brand assets

Cache settings and invalidate the cache when updated.

#### `pages`

- id
- title
- slug
- template
- status
- hero_eyebrow
- hero_title
- hero_summary
- content or validated structured sections
- seo_title
- meta_description
- canonical_url
- og_image_path
- published_at
- timestamps

Do not build an unrestricted drag-and-drop page builder. Use fixed templates and well-defined structured fields.

#### `services`

- id
- title
- slug
- short_title, optional
- summary
- body
- icon
- featured_image_path
- status
- sort_order
- seo_title
- meta_description
- canonical_url
- published_at
- timestamps
- soft deletes

#### `industries`

- id
- title
- slug
- summary
- body
- featured_image_path
- status
- sort_order
- SEO fields
- published_at
- timestamps

Use a service/industry pivot if services are related to industries.

#### `article_categories`

- id
- name
- slug
- description
- sort_order
- timestamps

#### `articles`

- id
- article_category_id
- author_id, nullable when using a display author
- title
- slug
- excerpt
- body
- featured_image_path
- status
- published_at
- scheduled_for, optional
- reading_minutes
- seo_title
- meta_description
- canonical_url
- og_image_path
- timestamps
- soft deletes

#### `training_programs`

- id
- title
- slug
- summary
- description
- audience
- objectives
- modules/content
- delivery_mode
- venue
- starts_at
- ends_at
- capacity, nullable
- registration_status
- status
- featured_image_path
- SEO fields
- timestamps
- soft deletes

#### `training_registrations`

- id
- training_program_id
- full_name
- organisation
- email
- phone
- job_title, nullable
- notes, nullable
- status
- consent_at
- timestamps

Add indexes for programme, status and email.

#### `consultation_requests`

- id
- full_name
- organisation
- job_title, nullable
- email
- phone
- location, nullable
- service_key
- industry, nullable
- description
- preferred_contact_method
- preferred_at, nullable
- attachment_disk, nullable
- attachment_path, nullable
- attachment_original_name, nullable
- status
- assigned_to, nullable
- internal_notes, nullable
- consent_at
- source_url, nullable
- timestamps

#### `contact_messages`

- id
- full_name
- organisation, nullable
- email
- phone, nullable
- subject
- message
- status
- internal_notes, nullable
- consent_at
- timestamps

#### `team_members`

- id
- name
- role_title
- qualifications
- short_bio
- image_path
- linkedin_url, nullable
- sort_order
- is_featured
- status
- timestamps

#### `client_references`

- id
- name
- sector
- service_summary, nullable
- logo_path, nullable
- publication_permission_status
- is_featured
- status
- sort_order
- timestamps

Default publication permission must be `pending`, not `approved`.

#### `testimonials`

- id
- quote
- person_name
- organisation
- role_title, nullable
- approval_confirmed_at
- status
- sort_order
- timestamps

Do not seed invented testimonials.

#### `downloads`

- id
- title
- slug
- description
- file_disk
- file_path
- status
- published_at
- download_count
- SEO fields
- timestamps

### Optional later tables

- newsletter_subscribers
- redirects
- faq_items
- activity_logs
- case_studies

Do not add optional tables until their features are implemented.

---

## 20. Backend Code Standards

Use conventional Laravel architecture.

### Required patterns

- Named routes
- Route model binding using slugs where appropriate
- Form Request classes for validation and authorization
- Policies for admin resources
- Eloquent scopes for published/active records
- PHP enums for statuses and roles
- Database transactions for multi-step writes
- Queued notifications/emails
- Resource collections or view-data classes when page payloads become complex
- Strict return types where practical
- `declare(strict_types=1);` in project-created PHP classes where it does not conflict with framework conventions

### Controllers

Keep controllers focused on HTTP orchestration. Do not place large business workflows directly in controllers.

Suggested namespaces:

```text
App\Http\Controllers\Public
App\Http\Controllers\Admin
App\Http\Requests\Public
App\Http\Requests\Admin
App\Actions
App\Enums
App\Policies
App\Notifications
App\Jobs
```

Do not create a service/repository class for every model. Introduce action/service classes only where they simplify meaningful workflows.

### Database rules

- Use `utf8mb4`.
- Use foreign-key constraints.
- Index slugs, statuses, publication dates and frequently filtered columns.
- Avoid database-specific features that prevent MySQL deployment.
- Never modify production tables manually; use migrations.
- Never use `migrate:fresh` or destructive seed commands on production.

---

## 21. Frontend Code Standards

Use Vue single-file components with:

```vue
<script setup lang="ts">
```

### Suggested structure

```text
resources/js/
├── components/
│   ├── admin/
│   ├── public/
│   ├── shared/
│   └── ui/
├── composables/
├── layouts/
│   ├── AdminLayout.vue
│   ├── AuthLayout.vue
│   └── PublicLayout.vue
├── lib/
├── pages/
│   ├── Admin/
│   ├── Auth/
│   └── Public/
├── types/
├── app.ts
└── ssr.ts
```

### Component rules

- Use semantic HTML first.
- Keep components small enough to understand.
- Do not create one-off abstractions that make simple markup harder to follow.
- Centralise repeated buttons, cards, form controls, alert states, pagination and modal patterns.
- Use Inertia `<Link>` for internal navigation.
- Use Inertia forms or Laravel Precognition where it improves validation UX without duplicating backend rules.
- Provide loading, empty, success and error states.
- Use TypeScript types for page props and forms.
- Do not use `any` without a documented reason.
- Avoid global state unless a real cross-page need exists.
- Do not store sensitive data in local storage.

### Motion

Use motion sparingly:

- Gentle reveal/transition
- Respect `prefers-reduced-motion`
- No blocking intro animation
- No continuous decorative animation that harms performance

---

## 22. SEO Requirements

SEO is a core requirement, not a later patch.

### Rendering and metadata

- Use Inertia SSR for public pages.
- Use Inertia `<Head>` for title, description, canonical URL and social metadata.
- Provide sensible global fallbacks from settings.
- Every published service, industry, programme and article must have unique metadata.
- Ensure unpublished content is not indexable or accessible through public routes.

### Technical SEO

- Dynamic `/sitemap.xml`
- Valid `/robots.txt`
- Canonical URLs
- 301 redirects when slugs change
- Breadcrumbs
- Clean pagination URLs
- Open Graph and X card metadata
- Default social image
- Semantic heading hierarchy
- Descriptive image alt text
- Proper 404 page
- No broken internal links

### Structured data

Generate valid JSON-LD where relevant:

- Organization/ProfessionalService
- Service
- Article
- BreadcrumbList
- FAQPage only when the FAQ is visibly rendered on the page

Do not generate fake ratings, review counts, prices or awards.

### Local search

Naturally include:

- Abeokuta
- Ogun State
- Nigeria

Do not keyword-stuff page titles or paragraphs.

---

## 23. Accessibility Requirements

Target WCAG 2.2 AA practices.

At minimum:

- Full keyboard navigation
- Visible focus states
- Correct labels and error associations
- Sufficient colour contrast
- Logical heading order
- Descriptive link text
- Accessible dialogs/drawers/dropdowns
- Skip-to-content link
- Reduced-motion support
- Touch targets suitable for mobile
- No important information communicated by colour alone
- Form errors announced appropriately
- Images have meaningful alt text or empty alt text when decorative

Run automated accessibility checks and perform basic keyboard testing before release.

---

## 24. Security Requirements

- `APP_DEBUG=false` in production.
- Use Laravel CSRF protection.
- Validate and authorize every write operation.
- Rate-limit login and public forms.
- Escape normal content output.
- Sanitize rich-text HTML on the server.
- Use policies for every admin resource.
- Disable public registration.
- Store confidential attachments privately.
- Use secure, HTTP-only cookies in production.
- Use HTTPS only in production.
- Add suitable security headers without breaking Inertia/Vite SSR.
- Never expose stack traces, environment variables or SQL errors publicly.
- Do not store SMTP or database credentials in source control.
- Protect exports and file downloads with authorization.
- Record enough logs to investigate failed submissions and mail jobs without logging confidential document contents.

Have all privacy, tax and regulatory copy reviewed by the client before launch.

---

## 25. Performance Requirements

- Server-render public pages.
- Use responsive images with explicit width and height.
- Use modern formats such as WebP/AVIF where practical.
- Lazy-load below-the-fold images.
- Prioritise only the hero image and critical logo assets.
- Avoid large JavaScript libraries for minor effects.
- Use Vite code splitting.
- Prefetch Inertia pages selectively, not indiscriminately.
- Eager-load relationships to prevent N+1 queries.
- Cache public settings and suitable published-content queries.
- Invalidate caches after admin updates.
- Minimise third-party scripts.
- Load analytics only when configured.
- Avoid autoplay videos and heavy homepage carousels.

Aim for strong Lighthouse results on representative mobile and desktop pages, while prioritising real usability over chasing a synthetic score.

---

## 26. Testing Requirements

Use Pest for backend and feature tests.

### Minimum feature tests

- Public homepage loads
- Published service page loads
- Draft/unpublished service is not publicly available
- Published industry page loads
- Article listing and article detail load
- Scheduled/draft articles are hidden appropriately
- Contact form validates and stores a message
- Consultation form validates and stores a request
- Invalid attachment is rejected
- Training registration stores correctly
- Closed training programme rejects registration
- Admin login works
- Guest cannot access admin routes
- Editor cannot manage users or owner settings
- Admin CRUD works for services/articles/training
- Slugs are unique
- Sitemap contains only published canonical URLs
- Password-reset flow works
- Mail/notification dispatch is tested with fakes
- Queue jobs are dispatched

### Frontend checks

Add scripts for:

```bash
npm run lint
npm run typecheck
npm run build:ssr
```

Use `vue-tsc --noEmit` for type checking.

### PHP checks

```bash
./vendor/bin/pint --test
php artisan test
```

Before a production release, all checks must pass and the SSR bundle must build successfully.

---

## 27. Seed Content

Create production-safe seeders that can initialise categories and approved draft content without overwriting live edits.

### Initial service records

1. Audit & Assurance
2. Accounting & Financial Management
3. Tax & Regulatory Advisory
4. Management & Business Advisory
5. Corporate Affairs Services
6. Investigation & Special Engagements
7. Accounting Technology & Systems
8. Training & Capacity Development

### Initial article categories

1. Audit & Assurance
2. Accounting
3. Tax & Compliance
4. Business Advisory
5. Corporate Affairs
6. Accounting Technology
7. Training

### Initial industries

1. Financial Services & Microfinance
2. Government & Public Sector
3. Education
4. Healthcare
5. Manufacturing
6. Hospitality
7. Oil & Gas
8. SMEs & Growing Businesses

### Seed-data safety

- Seed content as draft when facts have not been approved.
- Never seed fake testimonials.
- Never mark client publication permission as approved.
- Do not overwrite existing production content when a seeder is re-run.
- Keep the first owner-account creation separate from normal demo seeders.

---

## 28. Recommended Implementation Phases

### Phase 0 — Repository audit and foundation

- Inspect project
- Confirm Laravel/PHP/Node compatibility
- Configure Composer platform PHP 8.3
- Confirm MySQL connection strategy
- Remove/avoid Docker and Sail
- Configure formatting, linting and tests
- Add project documentation

### Phase 1 — Design system and public shell

- Brand tokens
- Typography
- Buttons, forms, cards and layout primitives
- Public header, mobile navigation and footer
- Logo/favicon assets
- Responsive container system
- Accessible interaction patterns

### Phase 2 — Public pages

- Homepage
- About
- Services and service details
- Industries and industry details
- Training listing/detail
- Insights listing/detail
- Contact
- Consultation
- Privacy/terms
- 404/error pages

Initially use seed data or clear draft fixtures so UI work is not blocked by the admin dashboard.

### Phase 3 — Admin foundation

- Authentication
- Roles and policies
- Admin layout/navigation
- Dashboard
- Settings
- Media handling

### Phase 4 — CMS modules

- Pages
- Services
- Industries
- Leadership
- Client references
- Articles/categories
- Training programmes
- Downloads/resources

### Phase 5 — Leads and notifications

- Contact workflow
- Consultation workflow
- Training registration workflow
- Queued email notifications
- Status management
- CSV exports where approved

### Phase 6 — SEO and SSR

- Inertia SSR
- Dynamic metadata
- Sitemap
- robots
- JSON-LD
- Canonicals and redirects
- Social images

SSR should be considered throughout development, but this phase completes and verifies the production configuration.

### Phase 7 — Quality and hardening

- Test coverage
- Accessibility review
- Security review
- Performance optimisation
- Content-state review
- Broken-link check
- Mobile/browser testing

### Phase 8 — aaPanel deployment

- Production configuration
- Database migration
- Asset/SSR build
- Supervisor processes
- Scheduler cron
- SSL
- Backups
- Smoke test
- Handover documentation

Do not proceed to the next phase with known failing tests from the current phase.

---

## 29. VPS and aaPanel Deployment — No Docker

### 29.1 Expected server software

Install/configure through aaPanel or the operating system:

- Nginx or Apache
- PHP 8.3
- MySQL 8.0+ preferred
- Composer 2
- Node.js 22+
- npm
- Supervisor or aaPanel Supervisor Manager
- Git
- SSL certificate through Let's Encrypt

### 29.2 PHP extensions

Confirm at least:

```text
bcmath
ctype
curl
dom
fileinfo
gd or imagick
intl
mbstring
openssl
pdo_mysql
tokenizer
xml
zip
```

For Composer and Inertia SSR process management, ensure aaPanel has not disabled required process functions such as `proc_open`. Do not enable unnecessary dangerous functions; enable only what the application/build tooling requires.

### 29.3 aaPanel website layout

Recommended project path:

```text
/www/wwwroot/<domain>/
```

Laravel remains in that directory. Configure aaPanel's **Running Directory** or document root to:

```text
/www/wwwroot/<domain>/public
```

Do not copy the entire Laravel application into `public`.

For Nginx, use Laravel-compatible rewrite/`try_files` rules. Deny hidden files except `.well-known`.

For Apache, ensure `mod_rewrite` is enabled and Laravel's `public/.htaccess` is honoured.

### 29.4 Ownership and permissions

Use the aaPanel web-server user, commonly `www`, according to the actual server configuration.

Laravel needs write access only where required:

```text
storage/
bootstrap/cache/
```

Avoid `chmod 777`.

Example, adjusted to the real user/group:

```bash
chown -R www:www /www/wwwroot/<domain>
find /www/wwwroot/<domain> -type f -exec chmod 644 {} \;
find /www/wwwroot/<domain> -type d -exec chmod 755 {} \;
chmod -R ug+rwx /www/wwwroot/<domain>/storage
chmod -R ug+rwx /www/wwwroot/<domain>/bootstrap/cache
```

### 29.5 MySQL

Create a dedicated database and user in aaPanel.

- Do not use MySQL root credentials in the application.
- Restrict the database user to the application database.
- Use a strong generated password.
- Keep database remote access disabled unless there is a justified, secured need.
- Use `utf8mb4`.

### 29.6 Production environment

Create `.env` directly on the server and never commit it.

Suggested baseline:

```dotenv
APP_NAME="Foremost Consulting Associates"
APP_ENV=production
APP_KEY=
APP_DEBUG=false
APP_URL=https://<domain>
APP_TIMEZONE=Africa/Lagos
APP_LOCALE=en
APP_FALLBACK_LOCALE=en

LOG_CHANNEL=stack
LOG_LEVEL=warning

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=<database>
DB_USERNAME=<database_user>
DB_PASSWORD=<strong_password>

SESSION_DRIVER=database
SESSION_LIFETIME=120
SESSION_SECURE_COOKIE=true
SESSION_SAME_SITE=lax

CACHE_STORE=database
QUEUE_CONNECTION=database

FILESYSTEM_DISK=public

MAIL_MAILER=smtp
MAIL_HOST=<smtp_host>
MAIL_PORT=587
MAIL_USERNAME=<smtp_username>
MAIL_PASSWORD=<smtp_password>
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=<approved_email>
MAIL_FROM_NAME="${APP_NAME}"

INERTIA_SSR_ENABLED=true
```

Use the exact Inertia SSR environment keys generated by the installed package/configuration. Do not assume an environment key without checking `config/inertia.php`.

### 29.7 First deployment commands

Run from the project root:

```bash
cd /www/wwwroot/<domain>

composer install --no-dev --prefer-dist --optimize-autoloader --no-interaction
npm ci
npm run build:ssr

/www/server/php/83/bin/php artisan key:generate --force
/www/server/php/83/bin/php artisan storage:link
/www/server/php/83/bin/php artisan migrate --force
/www/server/php/83/bin/php artisan optimize
```

Generate the application key only on the first deployment. Never regenerate it on an existing production system.

If the aaPanel PHP binary path differs, use the actual PHP 8.3 path returned by:

```bash
which php
php -v
```

### 29.8 Queue worker

Use the database queue for version 1.

Example Supervisor configuration:

```ini
[program:foremost-queue]
process_name=%(program_name)s_%(process_num)02d
directory=/www/wwwroot/<domain>
command=/www/server/php/83/bin/php artisan queue:work database --sleep=3 --tries=3 --timeout=90 --max-time=3600
autostart=true
autorestart=true
stopasgroup=true
killasgroup=true
user=www
numprocs=1
redirect_stderr=true
stdout_logfile=/www/wwwroot/<domain>/storage/logs/queue-worker.log
stopwaitsecs=3600
```

Use the aaPanel Supervisor Manager UI if preferred. Replace paths and user values with the real server values.

### 29.9 Inertia SSR process

Inertia SSR requires a persistent Node process in production.

Example Supervisor configuration:

```ini
[program:foremost-ssr]
directory=/www/wwwroot/<domain>
command=/www/server/php/83/bin/php artisan inertia:start-ssr
autostart=true
autorestart=true
stopasgroup=true
killasgroup=true
user=www
redirect_stderr=true
stdout_logfile=/www/wwwroot/<domain>/storage/logs/inertia-ssr.log
environment=PATH="/usr/local/bin:/usr/bin:/bin"
```

Before enabling this process, confirm that `node` is available to the Supervisor user:

```bash
sudo -u www which node
sudo -u www node --version
```

If Node was installed through NVM or aaPanel's Node Manager, set Supervisor's `PATH` to the actual Node binary directory. Do not assume the interactive shell path is available to Supervisor.

### 29.10 Scheduler

Add this cron job in aaPanel:

```cron
* * * * * cd /www/wwwroot/<domain> && /www/server/php/83/bin/php artisan schedule:run >> /dev/null 2>&1
```

Use the real PHP 8.3 binary path.

### 29.11 SSL and HTTPS

- Issue a Let's Encrypt certificate through aaPanel.
- Redirect HTTP to HTTPS.
- Confirm `APP_URL` uses HTTPS.
- Enable secure cookies.
- Test certificate renewal.

### 29.12 Health check

Keep Laravel's health route enabled, preferably:

```text
/up
```

Use it for uptime monitoring. Do not expose sensitive diagnostic data.

### 29.13 Backups

Before launch, configure:

- Daily MySQL backup
- Daily or scheduled project/storage backup
- Off-server copy through aaPanel's supported backup destination
- Retention policy
- Restore test

Backups are not complete until a restore has been tested.

---

## 30. Deployment Script

Create a reviewed executable script at:

```text
deploy/deploy.sh
```

It should:

1. Stop on errors.
2. Prevent overlapping deployments.
3. Pull only fast-forward changes from the approved branch.
4. Install Composer dependencies for production.
5. Install locked npm dependencies.
6. Build client and SSR assets.
7. Run migrations with `--force`.
8. Clear stale caches and optimise Laravel.
9. Restart/reload queue and SSR processes.
10. Bring the application back up if maintenance mode is used.
11. Log deployment output without exposing secrets.

Suggested starting point, to be adjusted and tested:

```bash
#!/usr/bin/env bash
set -Eeuo pipefail

APP_DIR="/www/wwwroot/<domain>"
PHP_BIN="/www/server/php/83/bin/php"
LOCK_FILE="/tmp/foremost-deploy.lock"

exec 9>"$LOCK_FILE"
flock -n 9 || { echo "Another deployment is running."; exit 1; }

cd "$APP_DIR"

cleanup() {
    "$PHP_BIN" artisan up >/dev/null 2>&1 || true
}
trap cleanup EXIT

"$PHP_BIN" artisan down --retry=60 || true

git pull --ff-only origin main
composer install --no-dev --prefer-dist --optimize-autoloader --no-interaction
npm ci
npm run build:ssr

"$PHP_BIN" artisan optimize:clear
"$PHP_BIN" artisan migrate --force
"$PHP_BIN" artisan storage:link || true
"$PHP_BIN" artisan optimize
"$PHP_BIN" artisan queue:restart || true

supervisorctl restart foremost-queue:* || true
supervisorctl restart foremost-ssr || true

"$PHP_BIN" artisan up
trap - EXIT

echo "Deployment completed successfully."
```

Do not use `git reset --hard` in the default deployment script. Do not use `migrate:fresh`. Confirm the Supervisor programme names on the real server.

---

## 31. Production Handover Documents

Create and maintain:

```text
docs/
├── CONTENT_CONFIRMATION_CHECKLIST.md
├── DEPLOYMENT_AAPANEL.md
├── ADMIN_USER_GUIDE.md
├── BACKUP_AND_RESTORE.md
├── RELEASE_CHECKLIST.md
└── IMPLEMENTATION_STATUS.md
```

### Content confirmation checklist must include

- Final company name styling
- Primary phone
- Secondary phone, if any
- Approved email
- Current office address
- Office hours
- Current leadership names/titles/designations
- Approved short biographies
- Approved professional memberships
- Approved client names/logos
- Approved testimonials
- Current services
- Current tax/regulatory wording
- Social media links
- Privacy/terms approval
- Google Maps location
- Consultation notification recipients

---

## 32. Definition of Done

The first release is complete only when:

- [ ] The project runs on PHP 8.3 without Docker.
- [ ] Composer dependencies are locked for PHP 8.3.
- [ ] The app uses Laravel, Inertia and Vue in one repository.
- [ ] Public pages are server-rendered through Inertia SSR.
- [ ] The design uses the approved Foremost/FCA identity.
- [ ] The site is fully responsive.
- [ ] The homepage and all approved public pages are implemented.
- [ ] Services, industries, training and insights are CMS-managed.
- [ ] Leadership content is concise and does not reproduce full biodata.
- [ ] Contact, consultation and training forms store submissions safely.
- [ ] Email notifications are queued.
- [ ] Admin roles and policies are enforced server-side.
- [ ] Private attachments are protected.
- [ ] SEO metadata, sitemap, robots and structured data are working.
- [ ] Accessibility basics have been tested.
- [ ] No fabricated clients, testimonials, statistics or qualifications appear.
- [ ] Tests, Pint, linting, type checking and SSR build pass.
- [ ] aaPanel document root points to `/public`.
- [ ] HTTPS is enabled.
- [ ] Queue and SSR processes are supervised.
- [ ] Scheduler cron is active.
- [ ] Production debug mode is off.
- [ ] Backups are configured and a restore procedure is documented.
- [ ] Content requiring confirmation is clearly identified.
- [ ] Admin and deployment handover documents are complete.

---

## 33. Final Engineering Principle

Build the simplest professional system that satisfies the approved scope well.

Prioritise:

1. Trust and accuracy
2. Clear service presentation
3. Qualified lead generation
4. SEO and performance
5. Maintainable Laravel/Vue code
6. Secure aaPanel deployment
7. Easy content management

Do not add fashionable complexity that the firm will not use.
