# 🧩 Templating – Layout and Slot System (PHP Native)

This project uses a custom PHP-based templating system. No Blade, Twig, or Smarty — just native functions for full transparency and portability.

---

## 🔧 Core Functions

### `layout($template, $data = [])`

Sets the outer layout wrapper for a view.

```php
layout('Explainer', [
  'title' => 'Math on Tape',
  'sections' => $sections
]);

slot($name)

Injects content into a named region of the layout.

<h1><?php slot('title') ?></h1>

render($partial, $data = [])

Renders a shared partial file from /Partials/.

render('Nav', ['active' => 'Projects']);

�� Layout Types
Explainer

Used for narrative projects with title, body, image blocks.

YAML:

layout: Explainer
sections:
  - title: "..."
    text: "..."
    image: Images/...
    imageAlt: "..."

Gallery

Used for visual projects with multiple images.

YAML:

layout: Gallery
images:
  - src: Images/...
    alt: "..."

📌 Layout File Structure

/Layout/
  Layout.php          ← global layout + shell
  Explainer.php       ← explainer layout
  Gallery.php         ← gallery layout

/Partials/
  Nav.php
  Head.php
  Footer.php

⚠️ Rules

    Layouts must never hardcode content — use slot() only.

    layout() must be called before rendering output.

    Partials must not contain logic; only rendering and structure.

