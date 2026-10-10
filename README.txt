ACE Precision Technology website — fixed responsive version

Open index.html to view the site locally. All main pages share style.css.

FIXES
- The OEM Products sidebar now appears consistently across all pages, uses the supplied p01.png–p06.png images, and each item opens its own page.
- Added oem02.html through oem06.html for the remaining product categories.
- The current page is highlighted in the top navigation.
- Contact Us now includes Name, Email, Phone Number, Message, and Submit Message fields.
- contact-submit.php validates and sends form submissions to ace@aceprectech.com using PHP mail().

IMPORTANT EMAIL DEPLOYMENT NOTE
The contact form cannot send email when opened as a local file. Upload the website to a PHP-enabled web server and ensure PHP mail()/outgoing mail is configured by the hosting provider. If the host disables PHP mail, configure an authenticated SMTP service in the PHP handler before using the form in production. Test delivery and spam filtering after deployment.

The form uses Reply-To for the visitor's email and a basic honeypot anti-spam field. No email can be sent from a static-only host without a server-side handler or external form service.
