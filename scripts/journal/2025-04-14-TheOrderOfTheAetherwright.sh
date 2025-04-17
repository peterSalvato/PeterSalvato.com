#!/bin/bash
set -e

DIR="src/Journal/2025-04-14-TheOrderOfTheAetherwright"

mkdir -p "$DIR/Images"

cat > "$DIR/Entry.md" <<'ENTRY'
---
title: The Order of the Ætherwright
date: 2025-04-14
slug: order-of-aetherwright
tags: [symbolic-systems, identity, design-doctrine]
status: published
summary: A symbolic framework for sovereign creative practice—built from patterns of attention, craft, and recursion.
---

# The Order of the Ætherwright

No doctrine.  
No savior.  
Form, attention, and practice.

It was always here.  
**Given shape by the Work.**

---

The Order is not a persona.  
It is not something you join.  
It is a recognition of structure already present in your creative discipline.

The Codex formalizes a symbolic language to reflect one's presence and pattern.  
The Glyphs are not decoration. They are compression.  
They are *truth in miniature.*

---

The Order isn’t for performance.  
It is the internal infrastructure of someone building deliberately across time.

\`\`\`plaintext
<Savepoint
  protocol_version:3.0
  category:[symbolic_framework]
  function:[identity_logic]
  timestamp:2025-04-14T17:30:00-04:00
  # This entry clarifies the Order as symbolic structure, not identity.
  # It affirms your creative sovereignty as embodied pattern, not presentation.
  # End of Savepoint.
  #
/>
\`\`\`

**You’ll know if it’s yours.**
ENTRY

echo "✔ Created: $DIR/Entry.md"
