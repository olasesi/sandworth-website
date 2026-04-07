<?php
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

declare(strict_types=1);

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

        if (!empty($data['phone']) && !preg_match('/^[\+0-9\s\-\(\)]{7,20}$/', $data['phone'])) {
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
            $this->respond(false, 'Invalid request method.');
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
            header("Location: index.html?status={$status}&msg={$msg}#contact");
        }
        exit;
    }
}

// ─── Run ──────────────────────────────────────────────────────────────────────
(new ContactHandler())->handle();
