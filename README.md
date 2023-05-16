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
This project was started on Codeanywhere, and was pushed to Github using Codeanywhere's terminal, which has git already installed (correct me if I'm wrong).

### Anything important new developers should be aware of?
If you're also using Codeanywhere, be sure to use this account's personal access token (or generate a new token) as the password when Github asks for authentication as you push on Codeanywhere's terminal.

In case you started your Git repository and project files separately on Github, be ready to fix some merge conflicts.

# Technologies Used

- Laravel 10.9
- PHP 8.2
- Tailwind CSS
- MySQL


# Personal Notes
### Cloudflare tunnel setup:
download "cloudflared" for Windows 
do "php artisan serve"   
do "cloudflared tunnel --url http://localhost:port" 
*note: change port to the same port you're using

### Pushing to GitHub:  
username: miguel.pajarillo@payreto.com

password (personal access token): 
refer to personal access token in discord channel

git remote add origin <project_link>

#### Main Workflow
git add *
git status 
git commit -m "commit message"
git push origin main/master (check the branches)

git status 
git commit -m "commit message"
git push origin main/master (check the branches)

### To use cloudflare
download "cloudflared" for Windows
do "php artisan serve"
do "cloudflared tunnel --url http://localhost:port"
    *note: change port to the same port you're using
