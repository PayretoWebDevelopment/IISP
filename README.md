# IISP

This is the repository for the Intern Information System and Payroll Application for Payreto.

# Developers
### Frontend Developers
- Michael James Goyon
- Miguel Bryan Pajarillo

### Backend Developers
- Mirai Reyes Yoshizaki
- Johann Benjamin P. Vivas (Project Lead)

# Things to note
### For future reference, how was this project developed?
This project was started on Codeanywhere, and was pushed to Github using Codeanywhere's terminal, which has git already installed (correct me if I'm wrong). Development was shifted back to Visual Studio Code with occasional liveshare and Cloudflare tunnel (cloudflared) sessions as Codeanywhere's trial period expired.

### Anything important new developers should be aware of?
If you're also using Codeanywhere, be sure to use this account's personal access token (or generate a new token) as the password when Github asks for authentication as you push on Codeanywhere's terminal. This also applies for using Git in general when pushing to this repository without a preset account and email or authentication.

In case you started your Git repository and project files separately on Github, be ready to fix some merge conflicts.

# Technologies Used

- Laravel 10.9
- PHP 8.2.0
- Tailwind CSS 0.9.0
- MySQL 15.1
- PHPMailer 6.8
- Laravel Excel (maatwebsite/excel) 3.1
- Laravel DOMPDF (barryvdh/laravel-dompdf) 2.0
- Cloudflare SDK 1.3
- Cloudflare Tunnels (cloudflared) 2023.5.0


# Personal Notes
### Cloudflare tunnel setup:
- download "cloudflared" for Windows 
- do "php artisan serve"   
- do "cloudflared tunnel --url http://localhost:port" *note: change port to the same port you're using

### Pushing to GitHub:  
- username: miguel.pajarillo@payreto.com or your email/username

- password (personal access token): refer to personal access token in discord channel or create your own token (or set default username and email on your machine)

- git remote add origin <project_link>

#### Main Workflow
- git add *
- git status 
- git commit -m "commit message"
- git push origin main/master (check the branches, see Pushing to GitHub for setting origin)

### To use cloudflare
- download "cloudflared" for Windows
- do "php artisan serve"
- do "npm run dev" for tailwindcss (install package if missing)
- do "cloudflared tunnel --url http://localhost:port" *note: change port to the same port you're using
