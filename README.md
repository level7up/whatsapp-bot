# Laravel WhatsApp Package

A simple Laravel package to send WhatsApp messages via the Facebook Graph API.

## 📦 Installation

### Step 1: Add the Package Locally

If you're using this as a local package, add the repository to your Laravel project’s `composer.json`:

```json
"repositories": [
  {
    "type": "path",
    "url": "./packages/levelup/whatsapp"
  }
]
```

### Step 2: Require the Package

```bash
composer require levelup/whatsapp:@dev
```

### Step 3: Publish the Configuration

```bash
php artisan vendor:publish --tag=config
```

This will create a `config/whatsappbot.php` file in your Laravel project.

---

## ⚙️ Configuration

Add your WhatsApp API credentials to your `.env` file:

```env
WHATSAPP_ACCESS_TOKEN=your_whatsapp_api_token
WHATSAPP_BUSINESS_ID=your_business_id
```

These values will be automatically read via Laravel's `config()` helper from `config/whatsappbot.php`.

---

## ✅ Usage

You can inject the `WhatsAppService` class into any Laravel controller or service:

```php
use levelup\WhatsApp\WhatsAppService;

class MessageController extends Controller
{
    public function send(WhatsAppService $whatsAppService)
    {
        $response = $whatsAppService->sendMessage('201234567890', 'Hello from Laravel!');
        return response()->json(['response' => $response]);
    }
}
```

---

## 📁 Package Structure

```
whatsapp/
├── config/
│   └── whatsappbot.php
├── src/
│   ├── WhatsAppService.php
│   └── WhatsAppServiceProvider.php
├── composer.json
└── README.md
```

---

## 🛠 Requirements

- PHP >= 7.4
- Laravel >= 8
- GuzzleHttp >= 7
- Facebook Business Account with WhatsApp access

---

## 📄 License

This package is open-source software licensed under the [MIT license](LICENSE).

---

## 🤝 Contributing

Contributions are welcome. Please fork the repository and submit a pull request.
