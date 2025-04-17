# 🛑 SAVEPOINT – Structural Lock

This file defines the **enforced boundaries** of the PeterSalvato.com system.  
No contributor or assistant — human or AI — may violate these rules without explicit approval and versioned override.

This file **must be read and acknowledged** before any architectural change.

---

## 🚫 Do Not Do These Things

- ❌ Create a `Data.php` or `Meta.php` file by hand
- ❌ Invent a new field not defined in a `Config.yaml` schema
- ❌ Modify routing structure or query format
- ❌ Break casing rules (PascalCase for folders, kebab-case for slugs)
- ❌ Embed content directly in PHP files
- ❌ Add new layout types without user authorization

---

## ✅ Required Behaviors

- [x] Every project/journal lives in its **own folder**
- [x] Each folder contains a `Config.yaml` as source of truth
- [x] Output files are generated using `scripts/build.php`
- [x] All views are rendered via `layout()`, `slot()`, `render()`
- [x] Nav structure is sourced from `Nav.php` and is not inferred

---

## 🧠 Guidance for Future Assistants

This project is designed to **prevent entropy**. Your job is to extend it **within the defined system**, not to reimagine or simplify it.

If you think something should change:
- Propose it clearly
- Log it in `HANDOFF.md`
- Wait for approval or version bump to update this Savepoint

Otherwise, stick to spec.  
