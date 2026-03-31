## Requirements

* PHP 8+
* Composer
* SMTP credentials (e.g. Gmail / Google Workspace)

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

## Contact Form

The contact form sends emails via SMTP using PHPMailer.
Configuration is loaded from `.env`.

## Security

* Do not commit `.env`
* Keep it outside the `public/` directory
* Set proper permissions (e.g. chmod 600)
* Validate all user input

## Deployment

Upload project files to your server and run:

composer install --no-dev --optimize-autoloader

Ensure your web server points to the `public/` directory.

## Dependencies

* phpmailer/phpmailer

## License

Private project
