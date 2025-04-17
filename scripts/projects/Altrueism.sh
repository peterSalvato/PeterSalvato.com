#!/bin/bash
set -e

DIR="src/Projects/Altrueism"

mkdir -p "$DIR/Images"

# Config.yaml
cat > "$DIR/Config.yaml" <<'YAML'
title: Altrueism
slug: altrueism
group: CaseStudies
layout: Explainer
summary: A speculative nonprofit prototype that transforms giving into symbolic storytelling and communal participation.

sections:
  - title: Gift as Signal
    text: |
      Altrueism rethinks charity. It turns altruism into a narrative act.

      Each donation triggers a symbolic visualization—a "signal"—that represents the giver's intent, not just the amount.

      Giving becomes expressive, not transactional.
    image: Images/altrueism-signal.jpg
    imageAlt: Visual glyph representation of donation intent

  - title: Platform as Ritual
    text: |
      Instead of gamifying generosity, we ritualized it.

      The platform invited users to reflect on their motivations and inscribe their contributions into a visual language.

      This positioned design as moral infrastructure.
    image: Images/altrueism-interface.jpg
    imageAlt: Interface showing layered ritual prompts

  - title: The Archive of Gifts
    text: |
      Every symbolic donation was stored as a timestamped artifact.

      Over time, this created a communal semantic archive—a living record of intention and exchange.

      Altrueism wasn't a product. It was a practice.
    image: Images/altrueism-archive.jpg
    imageAlt: Grid of encoded donation visualizations
YAML

# Touch Data.php for build output
touch "$DIR/Data.php"

echo "✔ Project scaffolded: $DIR"
