## Requirements

* PHP 8+
* Composer
* SMTP credentials (e.g. Gmail / Google Workspace)

## Dependencies

* phpmailer/phpmailer

## Installation

Clone the repository:

git clone <your-repo-url>
cd <project-folder>

Install dependencies:

composer install

## Environment Configuration

Create a file in the project root:

.env

Example (see .env.example):
SMTP_USER=[your@email.com](mailto:your@email.com)
SMTP_PASS=yourpassword
RECEIVER=[your@email.com](mailto:your@email.com)

## Local development
cd into the public folder
run "php -S localhost:8000"
open http://localhost:8000 in browser

## Deployment
# Build everything, and copy files to the app public folder
git pull
composer install --no-dev --optimize-autoloader
sudo rsync -av --delete --exclude='.env' ~/oleria/ /var/www/oleria/
sudo find /var/www/oleria -type d -exec chmod 755 {} \;
sudo find /var/www/oleria -type f -exec chmod 644 {} \;
