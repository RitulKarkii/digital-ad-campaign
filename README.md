🎯 Digital Ad Campaign Management System

A full-stack web application to manage digital advertising campaigns.
Built using Angular (Frontend) and Laravel (Backend API).

🚀 Features
👤 User Features
Registration and Login 
Create and manage ad campaigns
Upload image/video content
Set campaign budget
Schedule start & end dates
Update campaign status (Active / Paused / Completed)
Dynamic Campaign Status based on Dates
Role-Based Access Control (RBAC)

🛠️ Admin Features
Registration and login
Create and manage pages
Create Campaign
View all campaigns
Edit and delete campaigns


Pagination (Angular)
Image preview before upload
Form validation
Role-based UI (Admin/User)

🏗️ Tech Stack
Frontend (adCampaign)
Angular
Bootstrap
TypeScript
HTLM

Backend (campaignApi)
Laravel
REST API
MySQL

📁 Project Structure
digital-ad-campaign/
│
├── adCampaign      # Angular frontend
├── campaignApi     # Laravel backend
└── README.md.txt

⚙️ Installation & Setup
🔹 Backend (Laravel)
cd campaignApi
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve

🔹 Frontend (Angular)
cd adCampaign
npm install
ng serve

🌐 API Endpoints (Sample)
POST/api/register
POST/api/login
GET /api/campaigns
POST /api/campaigns
PUT /api/campaigns/{id}
DELETE /api/campaigns/{id}
POST/api/pages

📌 Assumptions Made
Pages are considered as mock data and are not created or edited by users.
Only admin users have permission to assign admin roles to other users.
Uploaded media (image/video) is stored locally and displayed based on file type.
 