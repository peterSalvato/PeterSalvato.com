#!/bin/bash
set -e

DIR="src/Journal/2025-04-15-PoeticInfrastructure"

mkdir -p "$DIR/Images"

cat > "$DIR/Entry.md" <<'ENTRY'
---
title: Poetic Infrastructure
date: 2025-04-15
slug: poetic-infrastructure
tags: [ritual, creative-rhythm, design-as-practice]
status: draft
summary: A reflection on design as a form of sacred repetition—ritual through making, presence through structure.
---

# Poetic Infrastructure

> _“I’m not making work. I’m laying stone.”_

We don’t build systems to be clever.  
We build them because they carry weight.

There is rhythm in repetition.  
There is integrity in form chosen deliberately—again and again.

When I say “infrastructure,” I don’t mean backend servers.  
I mean the invisible cadence of how you move through your tools, your thoughts, your days.

Design becomes sacred when it is shaped through presence, not performance.

---

\`\`\`plaintext
<Savepoint
  protocol_version:3.0
  category:[philosophical_structure]
  function:[ritual_logic]
  timestamp:2025-04-15T10:02:00-04:00
  # This entry frames repetition and ritual design as cultural infrastructure.
  # Establishes the sacred cadence of presence through form.
  # End of Savepoint.
  #
/>
\`\`\`

> _“Poetic Infrastructure” is not style—it’s structure that makes space for meaning._

(→ Expand with closing synthesis: how this frames your use of layout, journal cadence, and symbolic design.)
ENTRY

echo "✔ Created: $DIR/Entry.md"
