#!/bin/bash
set -e

DIR="src/Projects/SavepointProtocol"

mkdir -p "$DIR/Images"

# Config.yaml
cat > "$DIR/Config.yaml" <<'YAML'
title: Savepoint Protocol
slug: savepoint-protocol
group: Systems
layout: Explainer
summary: A lightweight cognitive protocol for externalizing state and recovering flow.

sections:
  - title: What Is Savepoint?
    text: |
      Savepoint is semantic versioning for your thinking.
      
      It’s not a journaling tool. It’s a structured method for timestamping conceptual shift.
      Not what happened—but what **changed**.

      Savepoint exists to support thinkers, writers, and builders as they move through complex ideation work.
      It’s designed to mark those moments when your understanding flickers, pivots, or sharpens.
    image: Images/savepoint-core.png
    imageAlt: Diagram showing Savepoint shift

  - title: Why It Matters
    text: |
      In a nonlinear creative process, clarity is recursive.
      Savepoint allows you to trace how your understanding evolved over time—without the need to explain it in the moment.

      Later, you can synthesize. At the time, you just mark the shift.
    image: Images/savepoint-syntax-block.png
    imageAlt: Annotated Savepoint syntax block

  - title: Real-World Usage
    text: |
      Savepoint is used across your journal entries, publishing pipelines, and internal notebooks.
      It lets you externalize your mental state as a protocol—consistent, timestamped, and symbolic.
    image: Images/savepoint-integrated.png
    imageAlt: Example of Savepoint inside a journal entry
YAML

# Touch placeholder for build output
touch "$DIR/Data.php"

echo "✔ Project scaffolded: $DIR"
