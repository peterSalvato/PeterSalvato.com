#!/bin/bash
set -e

DIR="src/Projects/MathOnTape"

mkdir -p "$DIR/Images"

# Config.yaml
cat > "$DIR/Config.yaml" <<'YAML'
title: Math on Tape
slug: math-on-tape
group: CaseStudies
layout: Gallery
summary: An analog visualization experiment mapping mathematical structures using magnetic tape.

images:
  - src: Images/tape-diagram-1.jpg
    alt: Graphing functions on magnetic tape

  - src: Images/tape-loop-2.jpg
    alt: Audio loop showing topological repetition

  - src: Images/tape-matrix-3.jpg
    alt: Composite image of algebraic modulation
YAML


# Touch placeholder for build output
touch "$DIR/Data.php"

echo "✔ Project scaffolded: $DIR"
