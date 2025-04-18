# 🎯 Project Goals – PeterSalvato.com

The system you’re working on is a clean-slate build of a personal site that adheres to strict structural, philosophical, and architectural rules.

## 🔒 Immutable Design Goals

- [x] **Encapsulation**  
  Every content item lives in its own folder with scoped config and output.

- [x] **Declarative Source of Truth**  
  No PHP files should be written by hand unless they are rendering or routing. All content comes from `Config.yaml`.

- [x] **Minimal Dependencies**  
  Native PHP. No frameworks. No JS routing. Static where possible.

- [x] **Human-readable input, machine-generated output**  
  All generation flows from YAML, Markdown, and image folders.

- [x] **Portable & Git-storable**  
  The entire site must run locally and deploy statically, no build server needed.

## ✅ Deliverable Format

- `Config.yaml` → `Data.php`
- `Entry.md` → `Meta.php`
- Structured PHP partials for layout/templating

## 🧠 Assistant Guidance

All AI assistants must follow:

- No freeform decisions or creative structure suggestions
- Use only files and schema defined by the user
- Never bypass casing/slug/group rules without an approved Savepoint
