<?php
declare(strict_types=1);


$page_title   = "Contact Us — Schedule a Tour or Send an Enquiry";
$meta_desc    = 'Get in touch with Sandworth Properties Ltd. Our advisors respond within 24 hours for property viewings, enquiries, and investment consultations.';
$current_page = 'contact-us';
$og_image     = './images/arepo-slider-1024x598.png';

// Pre-fill support: ?enquiry=Buy+a+Property or ?property=Arepo+Gardens
$prefill_enquiry  = htmlspecialchars($_GET['enquiry']  ?? '', ENT_QUOTES, 'UTF-8');
$prefill_property = htmlspecialchars($_GET['property'] ?? '', ENT_QUOTES, 'UTF-8');

// Build a prefilled message if a property was passed
$prefill_message = '';
if ($prefill_property) {
    $prefill_message = "I am interested in " . htmlspecialchars($_GET['property'], ENT_QUOTES, 'UTF-8') . " and would like to book a viewing.";
}

$allowed_enquiry_types = [
    'Buy a Property', 'Rent a Property', 'Property Management',
    'Land Acquisition', 'Investment Advisory', 'Facility Management', 'Other',
];

/**
 * Sandworth Properties Ltd.
 * Contact Form Handler — PHP 8+ / PDO / OOP
 * 
 * Database table (run once in phpMyAdmin):
 * 
 * CREATE TABLE `enquiries` (
 *   `id`            INT UNSIGNED NOT NULL AUTO_INCREMENT,
 *   `first_name`    VARCHAR(80)  NOT NULL,
 *   `last_name`     VARCHAR(80)  NOT NULL,
 *   `email`         VARCHAR(180) NOT NULL,
 *   `phone`         VARCHAR(40)  DEFAULT NULL,
 *   `enquiry_type`  VARCHAR(60)  NOT NULL,
 *   `message`       TEXT         NOT NULL,
 *   `ip_address`    VARCHAR(45)  DEFAULT NULL,
 *   `created_at`    DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
 *   PRIMARY KEY (`id`)
 * ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
 */

// ─── Configuration ────────────────────────────────────────────────────────────
// Edit these to match your phpMyAdmin / cPanel database settings
define('DB_HOST', 'localhost');
define('DB_NAME', 'sandworth_db');      // your database name
define('DB_USER', 'root');    // your database username
define('DB_PASS', '');     // your database password
define('DB_CHARSET', 'utf8mb4');

// Notification email (change to your real email)
define('NOTIFY_EMAIL', 'info@sandworthproperties.ng');
define('SITE_NAME',    'Sandworth Properties Ltd.');


// ─── Database Class ───────────────────────────────────────────────────────────
class Database
{
    private static ?PDO $instance = null;

    public static function getConnection(): PDO
    {
        if (self::$instance === null) {
            $dsn = sprintf(
                'mysql:host=%s;dbname=%s;charset=%s',
                DB_HOST, DB_NAME, DB_CHARSET
            );
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
            self::$instance = new PDO($dsn, DB_USER, DB_PASS, $options);
        }
        return self::$instance;
    }
}


// ─── Enquiry Model ────────────────────────────────────────────────────────────
class Enquiry
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    /**
     * Persist a validated enquiry to the database.
     *
     * @param array<string,string> $data
     * @return int  The new enquiry ID
     */
    public function save(array $data): int
    {
        $sql = "INSERT INTO enquiries
                    (first_name, last_name, email, phone, enquiry_type, message, ip_address)
                VALUES
                    (:first_name, :last_name, :email, :phone, :enquiry_type, :message, :ip_address)";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':first_name'   => $data['first_name'],
            ':last_name'    => $data['last_name'],
            ':email'        => $data['email'],
            ':phone'        => $data['phone'] ?? '',
            ':enquiry_type' => $data['enquiry_type'],
            ':message'      => $data['message'],
            ':ip_address'   => $data['ip_address'],
        ]);

        return (int) $this->db->lastInsertId();
    }
}


// ─── Validator ────────────────────────────────────────────────────────────────
class FormValidator
{
    private array $errors = [];

    private array $allowedTypes = [
        'Buy a Property',
        'Rent a Property',
        'Property Management',
        'Land Acquisition',
        'Investment Advisory',
        'Facility Management',
        'Other',
    ];

    public function validate(array $data): bool
    {
        $this->errors = [];

        if (empty(trim($data['first_name'] ?? ''))) {
            $this->errors['first_name'] = 'First name is required.';
        } elseif (strlen(trim($data['first_name'])) > 80) {
            $this->errors['first_name'] = 'First name is too long.';
        }

        if (empty(trim($data['last_name'] ?? ''))) {
            $this->errors['last_name'] = 'Last name is required.';
        } elseif (strlen(trim($data['last_name'])) > 80) {
            $this->errors['last_name'] = 'Last name is too long.';
        }

        $email = trim($data['email'] ?? '');
        if (empty($email)) {
            $this->errors['email'] = 'Email address is required.';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->errors['email'] = 'Please enter a valid email address.';
        }

        if (!empty($data['phone']) && !preg_match('/^(\+234|0)[789][01]\d{8}$/', $data['phone'])) {
            $this->errors['phone'] = 'Please enter a valid phone number.';
        }

        $type = trim($data['enquiry_type'] ?? '');
        if (empty($type) || !in_array($type, $this->allowedTypes, true)) {
            $this->errors['enquiry_type'] = 'Please select a valid enquiry type.';
        }

        if (empty(trim($data['message'] ?? ''))) {
            $this->errors['message'] = 'Please enter your message.';
        } elseif (strlen(trim($data['message'])) < 10) {
            $this->errors['message'] = 'Message is too short (minimum 10 characters).';
        }

        return empty($this->errors);
    }

    public function getErrors(): array
    {
        return $this->errors;
    }
}


// ─── Mailer (optional email notification) ────────────────────────────────────
class Mailer
{
    /**
     * Send a simple notification email using PHP mail().
     * For production, swap this with PHPMailer + SMTP.
     */
    public static function notify(array $data, int $enquiryId): void
    {
        $to      = NOTIFY_EMAIL;
        $subject = '[' . SITE_NAME . '] New Enquiry #' . $enquiryId . ' — ' . $data['enquiry_type'];

        $body  = "A new enquiry has been submitted via the website.\n\n";
        $body .= "Enquiry ID   : #" . $enquiryId . "\n";
        $body .= "Name         : " . $data['first_name'] . ' ' . $data['last_name'] . "\n";
        $body .= "Email        : " . $data['email'] . "\n";
        $body .= "Phone        : " . ($data['phone'] ?: '—') . "\n";
        $body .= "Enquiry Type : " . $data['enquiry_type'] . "\n";
        $body .= "Message      :\n" . $data['message'] . "\n\n";
        $body .= "—\n" . SITE_NAME . " | " . date('Y-m-d H:i:s') . "\n";

        $headers = implode("\r\n", [
            'From: noreply@sandworthproperties.ng',
            'Reply-To: ' . $data['email'],
            'X-Mailer: PHP/' . PHP_VERSION,
        ]);

        @mail($to, $subject, $body, $headers);
    }
}


// ─── Request Handler ──────────────────────────────────────────────────────────
class ContactHandler
{
    private bool $isAjax;

    public function __construct()
    {
        $this->isAjax = (
            isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
            strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest'
        );
    }

    public function handle(): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return;
        }

        // ── Anti-spam: honeypot field must be empty ──
        if (!empty($_POST['website'])) {
            // Silently "succeed" to not reveal the trap
            $this->respond(true, 'Thank you. We will be in touch shortly.');
            return;
        }

        // ── Sanitise raw input ──
        $raw = [
            'first_name'   => $this->sanitise($_POST['first_name']   ?? ''),
            'last_name'    => $this->sanitise($_POST['last_name']    ?? ''),
            'email'        => $this->sanitise($_POST['email']        ?? ''),
            'phone'        => $this->sanitise($_POST['phone']        ?? ''),
            'enquiry_type' => $this->sanitise($_POST['enquiry_type'] ?? ''),
            'message'      => $this->sanitise($_POST['message']      ?? ''),
            'ip_address'   => $_SERVER['REMOTE_ADDR'] ?? '',
        ];

        // ── Validate ──
        $validator = new FormValidator();
        if (!$validator->validate($raw)) {
            $firstError = array_values($validator->getErrors())[0];
            $this->respond(false, $firstError, $validator->getErrors());
            return;
        }

        // ── Persist to database ──
        try {
            $enquiry   = new Enquiry();
            $enquiryId = $enquiry->save($raw);

            // ── Send email notification (best-effort) ──
            Mailer::notify($raw, $enquiryId);

            $this->respond(true, 'Your enquiry has been received. We will contact you within 24 hours.');

        } catch (PDOException $e) {
            // Log error server-side; do not expose details to client
            error_log('[Sandworth Contact] DB error: ' . $e->getMessage());
            $this->respond(false, 'We could not process your enquiry right now. Please try again later or call us directly.');
        }
    }

    private function sanitise(string $value): string
    {
        return htmlspecialchars(strip_tags(trim($value)), ENT_QUOTES, 'UTF-8');
    }

    private function respond(bool $success, string $message, array $errors = []): void
    {
        if ($this->isAjax) {
            header('Content-Type: application/json; charset=UTF-8');
            echo json_encode([
                'success' => $success,
                'message' => $message,
                'errors'  => $errors,
            ]);
        } else {
            // Non-JS fallback: redirect back with query-string status
            $status = $success ? 'success' : 'error';
            $msg    = urlencode($message);
            header("Location: contact-us?status={$status}&msg={$msg}#contact");
        }
        exit;
    }
}

// ─── Run ──────────────────────────────────────────────────────────────────────
$handler = new ContactHandler();

// Only trigger the handler logic if the user has clicked "Submit"
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 
    $handler->handle();
}

require './partials/header.php';

?>

<section class="page active" id="page-contact">

  <div class="page-hero">
    <div class="page-hero-bg ph-contact"></div>
    <div class="page-hero-content">
      <div class="sec-tag light">Get in Touch</div>
      <h1>Let's Find Your<br><em>Perfect Property</em></h1>
      <p>Our advisors respond within 24 hours.</p>
    </div>
  </div>

  <div class="section contact-section">
    <div class="contact-grid">

      <!-- Contact info -->
      <div class="contact-info reveal">
        <div class="sec-tag">Contact Information</div>
        <h2>We look forward to working with you and building a life-time relationship</h2>
        <p>Whether you're buying, selling, renting, or seeking estate management — our team is ready to assist.</p>
        <div class="cinfo-list">
          <div class="ci-item">
            <div class="ci-ico">&#128205;</div>
            <div>
              <strong>Operational Office</strong>
              <p>The Facility Management Office,<br>The Nigeria Army Shopping Complex (The Arena),<br>Bolade-Oshodi, 101233, Lagos State, Nigeria.</p>
            </div>
          </div>
          <div class="ci-item">
            <div class="ci-ico">&#128205;</div>
            <div>
              <strong>Registered Office</strong>
              <p>1, Tafawa Balewa Crescent, off Adeniran Ogunsanya,<br>Surulere, Lagos State, Nigeria.</p>
            </div>
          </div>
          <div class="ci-item">
            <div class="ci-ico">&#128336;</div>
            <div>
              <strong>Office Hours</strong>
              <p>Monday &ndash; Friday: 8:00am &ndash; 6:00pm<br>Saturday: 9:00am &ndash; 2:00pm</p>
            </div>
          </div>
          <div class="ci-item">
            <div class="ci-ico">&#128222;</div>
            <div>
              <strong>Phone</strong>
              <p><a href="tel:+2348180452173">+234 (0) 818 0452 173</a><br><a href="tel:+23414538555">+234-145 38555</a></p>
            </div>
          </div>
          <div class="ci-item">
            <div class="ci-ico">&#9993;&#65039;</div>
            <div>
              <strong>Email</strong>
              <p><a href="mailto:info@sandworthproperties.ng">info@sandworthproperties.ng</a><br><a href="mailto:sales@sandworthproperties.ng">sales@sandworthproperties.ng</a></p>
            </div>
          </div>
        </div>
      </div>

      <!-- Contact form -->
      <div class="contact-form-wrap reveal">
        <form class="cform" id="contact-form" action="" method="POST" onsubmit="handleForm(event)" novalidate>
          <div class="cform-head">
            <h3>Send an Enquiry</h3>
            <p>Fill in the form and we'll be in touch within 24 hours.</p>
          </div>

          <div id="form-flash" class="form-flash" style="display:none"></div>

          <div class="form-row">
            <div class="fg">
              <label for="first_name">First Name <span class="req">*</span></label>
              <input type="text" id="first_name" name="first_name" placeholder="e.g. Emeka" required autocomplete="given-name"/>
              <span class="ferr" id="err-first_name"></span>
            </div>
            <div class="fg">
              <label for="last_name">Last Name <span class="req">*</span></label>
              <input type="text" id="last_name" name="last_name" placeholder="e.g. Okafor" required autocomplete="family-name"/>
              <span class="ferr" id="err-last_name"></span>
            </div>
          </div>

          <div class="fg">
            <label for="email">Email Address <span class="req">*</span></label>
            <input type="email" id="email" name="email" placeholder="you@example.com" required autocomplete="email"/>
            <span class="ferr" id="err-email"></span>
          </div>

          <div class="fg">
            <label for="phone">Phone Number</label>
            <input type="tel" id="phone" name="phone" placeholder="+234 800 000 0000" autocomplete="tel"/>
          </div>

          <div class="fg">
            <label for="enquiry_type">Enquiry Type <span class="req">*</span></label>
            <div class="sel-wrap">
              <select id="enquiry_type" name="enquiry_type" required>
                <option value="">Select an option</option>
                <?php foreach ($allowed_enquiry_types as $type): ?>
                <option value="<?= htmlspecialchars($type) ?>" <?= $prefill_enquiry === $type ? 'selected' : '' ?>>
                  <?= htmlspecialchars($type) ?>
                </option>
                <?php endforeach; ?>
              </select>
              <svg class="sel-arr" viewBox="0 0 16 16" fill="none"><path d="M4 6l4 4 4-4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </div>
            <span class="ferr" id="err-enquiry_type"></span>
          </div>

          <div class="fg">
            <label for="message">Your Message <span class="req">*</span></label>
            <textarea id="message" name="message" rows="5"
                      placeholder="Tell us about your property needs..."
                      required><?= $prefill_message ?></textarea>
            <span class="ferr" id="err-message"></span>
          </div>

          <!-- Honeypot anti-spam -->
          <input type="text" name="website" style="position:absolute;left:-9999px;opacity:0" tabindex="-1" autocomplete="off"/>

          <button class="btn-primary btn-submit" type="submit" id="submitBtn">
            Send Enquiry
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </button>
        </form>

        <div class="form-success" id="form-success">
          <div class="fs-icon">&#10003;</div>
          <h3>Message Received!</h3>
          <p>Thank you for reaching out to Sandworth Properties. One of our advisors will contact you within 24 hours.</p>
          <a class="btn-outline" href="contact-us">Send Another Enquiry</a>
        </div>
      </div>

    </div>
  </div>

</section>

<?php require 'partials/footer.php'; ?>
